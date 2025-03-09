<?php
class Pago_model extends CI_Model {

    private $api_url = "http://localhost:3000/api/compras";
    private $token;

    public function __construct() {
        parent::__construct();
        $this->token = $this->session->userdata('token'); // Obtener el token JWT desde la sesión
    }

    private function enviarDatosAPI($endpoint, $datos) {
        $curl = curl_init($this->api_url . $endpoint);

        $headers = [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $this->token // Agregar el token JWT
        ];

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Desactivar verificación SSL (solo en local)

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($http_code == 200) {
            return json_decode($response, true);
        } else {
            return ['error' => 'Error en la solicitud: ' . $http_code, 'detalle' => json_decode($response, true)];
        }
    }

    public function procesarPago($correo, $nombre, $apellidoPaterno, $apellidoMaterno, $fecha_compra, $fecha, $horario, $paqueteSeleccionado, $rutaGuiada, $ruta, $adultos, $ninos, $bebes) {
        $paqueteValor = match ($paqueteSeleccionado) {
            'Zoomax' => 1,
            'Bestial' => 2,
            'VIP' => 3,
            default => 0,
        };

        $rutaGuiadaBoolean = ($rutaGuiada == 'si') ? 1 : 0;

        $rutas = [
            1 => 'Ruta maya',
            2 => 'Ruta reptil',
            3 => 'Aventura tropical',
            4 => 'Aventura salvaje',
            5 => 'Ruta de reptiles y aves'
        ];
        $rutaNombre = $rutas[$ruta] ?? 'Ruta no seleccionada';

        $data_reserva = [
            'fecha_reserva' => $fecha,
            'hora_reserva' => $horario,
            'id_paquete' => $paqueteValor,
            'incluye_tour' => $rutaGuiadaBoolean,
            'id_ruta' => $rutaGuiadaBoolean ? $ruta : NULL
        ];
        $response_reserva = $this->enviarDatosAPI('/reservas', $data_reserva);
        if (isset($response_reserva['error'])) {
            return ['error' => 'Error al crear la reserva: ' . $response_reserva['error']];
        }

        $data_compra = [
            'correo_comprador' => $correo,
            'nombre_comprador' => $nombre,
            'apellido_paterno_comprador' => $apellidoPaterno,
            'apellido_materno_comprador' => $apellidoMaterno,
            'fecha_compra' => $fecha_compra
        ];
        $response_compra = $this->enviarDatosAPI('/', $data_compra);
        if (isset($response_compra['error'])) {
            return ['error' => 'Error al crear la compra: ' . $response_compra['error']];
        }

        $data_boleto = [
            'id_compra' => $response_compra['id_compra'],
            'boletos_adulto' => $adultos,
            'boletos_nino' => $ninos,
            'boletos_nino_menor_3' => $bebes,
            'id_reserva' => $response_reserva['id_reserva']
        ];
        $response_boleto = $this->enviarDatosAPI('/boletos', $data_boleto);
        if (isset($response_boleto['error'])) {
            return ['error' => 'Error al crear el boleto: ' . $response_boleto['error']];
        }

        return true;
    }
}
?>
