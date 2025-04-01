<?php
class Pago_model extends CI_Model {

    private $api_url = "http://localhost:3000/api/compras";

    public function __construct() {
        parent::__construct();
    }

    private function enviarDatosAPI($url, $datos) {
        $curl = curl_init($url);

        $headers = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        if ($response === false) {
            return ['error' => 'Error en la conexión API: ' . curl_error($curl)];
        }
        
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($http_code == 200 || $http_code == 201) {
            return json_decode($response, true);
        } else {
            return ['error' => 'Error en la solicitud: ' . $http_code, 'detalle' => json_decode($response, true)];
        }
    }

    public function procesarPago($correo, $nombre, $apellidoPaterno, $apellidoMaterno, $fecha_compra, $fecha, $horario, $paqueteSeleccionado, $rutaGuiada, $ruta, $adultos, $ninos, $bebes) {
        $paqueteValores = [
            'Zoomax' => 1,
            'Bestial' => 2,
            'VIP' => 3
        ];
        $paqueteValor = $paqueteValores[$paqueteSeleccionado] ?? 0;

        $rutaGuiadaBoolean = ($rutaGuiada == 'si') ? 1 : 0;

        // Crear reserva
        $data_reserva = [
            'fecha_reserva' => $fecha,
            'hora_reserva' => $horario,
            'id_paquete' => $paqueteValor,
            'incluye_tour' => $rutaGuiadaBoolean
        ];
        if ($rutaGuiadaBoolean) {
            $data_reserva['id_ruta'] = $ruta;
        }

        $response_reserva = $this->enviarDatosAPI("{$this->api_url}/reservas", $data_reserva);
        if (isset($response_reserva['error'])) {
            log_message('error', 'Error al crear la reserva: ' . json_encode($response_reserva));
            return ['error' => 'Error al crear la reserva: ' . json_encode($response_reserva)];
        }

        // Crear compra
        $data_compra = [
            'correo_comprador' => $correo,
            'nombre_comprador' => $nombre,
            'apellido_paterno_comprador' => $apellidoPaterno,
            'apellido_materno_comprador' => $apellidoMaterno,
            'fecha_compra' => $fecha_compra
        ];
        $response_compra = $this->enviarDatosAPI("{$this->api_url}", $data_compra);
        if (isset($response_compra['error'])) {
            log_message('error', 'Error al crear la compra: ' . json_encode($response_compra));
            return ['error' => 'Error al crear la compra: ' . json_encode($response_compra)];
        }

        // Crear boleto
        $data_boleto = [
            'id_compra' => $response_compra['id_compra'],
            'boletos_adulto' => $adultos,
            'boletos_nino' => $ninos,
            'boletos_nino_menor_3' => $bebes,
            'id_reserva' => $response_reserva['id_reserva']
        ];
        $response_boleto = $this->enviarDatosAPI("{$this->api_url}/boletos", $data_boleto);
        if (isset($response_boleto['error'])) {
            log_message('error', 'Error al crear el boleto: ' . json_encode($response_boleto));
            return ['error' => 'Error al crear el boleto: ' . json_encode($response_boleto)];
        }

        return true;
    }
}
?>

