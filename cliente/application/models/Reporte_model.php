<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    private $api_url = "http://localhost:3000/api/reportes"; // URL base de la API

    public function __construct() {
        parent::__construct();
    }

    // Método para hacer solicitudes GET a la API
    private function obtenerDatosAPI($endpoint) {
        // Validar que el endpoint no esté vacío
        if (empty($endpoint)) {
            return ['error' => 'El endpoint no puede estar vacío'];
        }

        // Inicializar cURL
        $curl = curl_init($this->api_url . $endpoint);
        if ($curl === FALSE) {
            return ['error' => 'No se pudo inicializar cURL'];
        }

        // Configurar opciones de cURL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10); // Tiempo de espera de 10 segundos

        // Ejecutar la solicitud
        $response = curl_exec($curl);
        if ($response === FALSE) {
            $error = curl_error($curl);
            curl_close($curl);
            return ['error' => 'Error en la solicitud cURL: ' . $error];
        }

        // Obtener el código de estado HTTP
        

        // Cerrar la conexión cURL
        curl_close($curl);

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['error' => 'Error al decodificar la respuesta JSON: ' . json_last_error_msg()];
        }

        return $data;
    }

    // 1. Boletos vendidos globalmente
    public function getBoletosVendidosGlobal() {
        $response = $this->obtenerDatosAPI('/boletos-vendidos-global');
        if (isset($response['error'])) {
            log_message('error', 'Error en getBoletosVendidosGlobal: ' . $response['error']);
            return ['error' => $response['error']];
        }
        return $response;
    }

    // 2. Ingresos totales
    public function getIngresosTotales() {
    $response = $this->obtenerDatosAPI('/ingresos-totales');
    if (isset($response['error'])) {
        return ['error' => 'Error al obtener los ingresos totales: ' . $response['error']];
    }
    return $response; // Asegúrate de que esto devuelva un arreglo u objeto con 'total_ingresos'
}

    // 3. Donaciones realizadas
    public function getDonacionesRealizadas() {
        $response = $this->obtenerDatosAPI('/donaciones-realizadas');
        if (isset($response['error'])) {
            log_message('error', 'Error en getDonacionesRealizadas: ' . $response['error']);
            return ['error' => $response['error']];
        }
        return $response;
    }

    // 4. Total de dinero en donaciones
    public function getTotalDonaciones() {
        $response = $this->obtenerDatosAPI('/total-donaciones');
        if (isset($response['error'])) {
            log_message('error', 'Error en getTotalDonaciones: ' . $response['error']);
            return ['error' => $response['error']];
        }
        return $response;
    }

    // 5. Recorridos más reservados
    public function getRecorridosMasReservados() {
        $response = $this->obtenerDatosAPI('/recorridos-mas-reservados');
        if (isset($response['error'])) {
            log_message('error', 'Error en getRecorridosMasReservados: ' . $response['error']);
            return ['error' => $response['error']];
        }
        return $response;
    }

    // 6. Paquetes más elegidos
    public function getPaquetesMasElegidos() {
        $response = $this->obtenerDatosAPI('/paquetes-mas-elegidos');
        if (isset($response['error'])) {
            log_message('error', 'Error en getPaquetesMasElegidos: ' . $response['error']);
            return ['error' => $response['error']];
        }
        return $response;
    }

    // 7. Promedio de donaciones
    public function getPromedioDonaciones() {
        $response = $this->obtenerDatosAPI('/promedio-donaciones');
        if (isset($response['error'])) {
            log_message('error', 'Error en getPromedioDonaciones: ' . $response['error']);
            return ['error' => $response['error']];
        }
        return $response;
    }

    // 8. Boletos vendidos por fecha
    public function getBoletosVendidosPorFecha($fecha) {
        // Validar que la fecha no esté vacía
        if (empty($fecha)) {
            return ['error' => 'La fecha no puede estar vacía'];
        }

        // Validar el formato de la fecha (puedes ajustar el formato según tus necesidades)
        if (!DateTime::createFromFormat('Y-m-d', $fecha)) {
            return ['error' => 'Formato de fecha inválido. Use YYYY-MM-DD'];
        }

        $response = $this->obtenerDatosAPI('/boletos-vendidos-por-fecha/' . urlencode($fecha));
        if (isset($response['error'])) {
            log_message('error', 'Error en getBoletosVendidosPorFecha: ' . $response['error']);
            return ['error' => $response['error']];
        }
        return $response;
    }
}