<?php
class Donacion_model extends CI_Model {

    private $api_url = "http://localhost:3000/api/donaciones"; // Ruta de la API

    public function __construct() {
        parent::__construct();
    }

    public function guardar_donacion($datos_donacion) {
        $curl = curl_init($this->api_url);

        $headers = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos_donacion));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Desactivar verificación SSL (solo en local)

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        // ✅ Si la API responde con éxito (201 o 200), devolver true
        if ($http_code == 201 || $http_code == 200) {
            return true;
        } else {
            // ❌ Si hay un error, devolverlo
            return ['error' => 'Error en la solicitud: ' . $http_code, 'detalle' => json_decode($response, true)];
        }
    }
}
?>
