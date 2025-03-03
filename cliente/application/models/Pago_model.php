<?php
class Pago_model extends CI_Model {

    private $api_url = "http://localhost:3000/api/compras";
    public function __construct() {
        parent::__construct();
    }

    // Método privado para reutilizar la lógica de cURL
    private function enviarDatosAPI($endpoint, $datos) {
        $curl = curl_init($this->api_url . $endpoint); // Inicializar cURL con la URL completa
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos));

        $response = curl_exec($curl); // Ejecutar la solicitud
        if ($response === FALSE) {
            curl_close($curl);
            return ['error' => 'No se pudo conectar al servidor'];
        }

        curl_close($curl);
        return json_decode($response, true); // Decodificar la respuesta JSON
    }

    public function procesarPago($correo, $nombre, $apellidoPaterno, $apellidoMaterno, $fecha_compra, $fecha, $horario, $paqueteSeleccionado, $rutaGuiada, $ruta, $adultos, $ninos, $bebes) {
        // Asignar valores a los paquetes
        $paqueteValor = 0;
        switch ($paqueteSeleccionado) {
            case 'Zoomax':
                $paqueteValor = 1;
                break;
            case 'Bestial':
                $paqueteValor = 2;
                break;
            case 'VIP':
                $paqueteValor = 3;
                break;
        }

        // Cambiar "Ruta guiada" a un valor numérico (1 o 0)
        $rutaGuiadaBoolean = ($rutaGuiada == 'si') ? 1 : 0;

        // Mapear las rutas numéricas a rutas de texto
        switch ($ruta) {
            case 1:
                $rutaNombre = 'Ruta maya';
                break;
            case 2:
                $rutaNombre = 'Ruta reptil';
                break;
            case 3:
                $rutaNombre = 'Aventura tropical';
                break;
            case 4:
                $rutaNombre = 'Aventura salvaje';
                break;
            case 5:
                $rutaNombre = 'Ruta de reptiles y aves';
                break;
            default:
                $rutaNombre = 'Ruta no seleccionada';
                break;
        }

        // Crear la reserva
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

        // Crear la compra
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

        // Crear el boleto
        $data_boleto = [
            'id_compra' => $response_compra['id_compra'], // ID de la compra creada
            'boletos_adulto' => $adultos,
            'boletos_nino' => $ninos,
            'boletos_nino_menor_3' => $bebes,
            'id_reserva' => $response_reserva['id_reserva'] // ID de la reserva creada
        ];
        $response_boleto = $this->enviarDatosAPI('/boletos', $data_boleto);
        if (isset($response_boleto['error'])) {
            return ['error' => 'Error al crear el boleto: ' . $response_boleto['error']];
        }

        return true; // Todo ha ido bien
    
    }
}
