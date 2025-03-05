<?php
class Donacion_model extends CI_Model {

    //Cambios aplicados api------------------------------------------------------
    private $api_url = "http://localhost:3000/api/donaciones"; // Ruta de la API

    public function __construct() {
        parent::__construct();
    }

    // Método para enviar los datos de la donación al servidor
    public function guardar_donacion($datos_donacion) {
        // Depuración: Verificar los datos que se enviarán
        //print_r($datos_donacion);

        // Inicializar cURL
        $curl = curl_init($this->api_url);

        // Configurar opciones de cURL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos_donacion));

        // Ejecutar la solicitud y obtener la respuesta
        $response = curl_exec($curl);

        // Depuración: Verificar la respuesta del servidor
        //print_r($response);

        // Verificar si hubo un error en la solicitud
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar al servidor'];
        }

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Cerrar la sesión de cURL
        curl_close($curl);

        // Verificar si la respuesta indica éxito
        if (isset($data['message']) && $data['message'] === 'Donación creada') {
            return true; // Éxito
        } else {
            return ['error' => $data['error'] ?? 'Error desconocido'];
        }
    }
}


?>

