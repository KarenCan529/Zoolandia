<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    private $api_url = "http://localhost:3000/api/reportes"; // URL base de la API

    public function __construct() {
        parent::__construct();
    }

    private function obtenerToken() {
        return $this->session->userdata('token') ?: '';
    }

    // Método para hacer solicitudes GET a la API con autorización
    private function obtenerDatosAPI($endpoint) {
        if (empty($endpoint)) {
            return ['error' => 'El endpoint no puede estar vacío'];
        }

        $token = $this->obtenerToken();
        if (empty($token)) {
            return ['error' => 'No se encontró un token de autenticación'];
        }

        $curl = curl_init($this->api_url . $endpoint);
        if ($curl === FALSE) {
            return ['error' => 'No se pudo inicializar cURL'];
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ]);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($curl);
        if ($response === FALSE) {
            $error = curl_error($curl);
            curl_close($curl);
            return ['error' => 'Error en la solicitud cURL: ' . $error];
        }

        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $data = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['error' => 'Error al decodificar la respuesta JSON: ' . json_last_error_msg()];
        }

        // Verificar si el token ha expirado (suponiendo que la API devuelve un 401 para tokens expirados)
        if ($http_code === 401) {
            return ['error' => 'El token ha expirado. Por favor, inicie sesión nuevamente.'];
        }

        return $data;
    }

    public function getBoletosVendidosGlobal() {
        return $this->obtenerDatosAPI('/boletos-vendidos-global');
    }

    public function getIngresosTotales() {
        return $this->obtenerDatosAPI('/ingresos-totales');
    }

    public function getDonacionesRealizadas() {
        return $this->obtenerDatosAPI('/donaciones-realizadas');
    }

    public function getTotalDonaciones() {
        return $this->obtenerDatosAPI('/total-donaciones');
    }

    public function getRecorridosMasReservados() {
        return $this->obtenerDatosAPI('/recorridos-mas-reservados');
    }

    public function getPaquetesMasElegidos() {
        return $this->obtenerDatosAPI('/paquetes-mas-elegidos');
    }

    public function getPromedioDonaciones() {
        return $this->obtenerDatosAPI('/promedio-donaciones');
    }

    public function getBoletosVendidosPorFecha($fecha) {
        if (empty($fecha)) {
            return ['error' => 'La fecha no puede estar vacía'];
        }

        if (!DateTime::createFromFormat('Y-m-d', $fecha)) {
            return ['error' => 'Formato de fecha inválido. Use YYYY-MM-DD'];
        }

        return $this->obtenerDatosAPI('/boletos-vendidos-por-fecha/' . urlencode($fecha));
    }
}
