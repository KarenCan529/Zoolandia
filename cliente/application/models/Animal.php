<?php
class Animal extends CI_Model {
    private $api_url = "http://localhost:3000/api/animales"; // Ruta de la API

    private function get_token() {
        return $this->session->userdata('token'); // Obtener token almacenado en sesión
    }

    private function is_token_expired($token) {
        if (!$token) return true;
        $token_parts = explode('.', $token);
        if (count($token_parts) < 2) return true;
        $payload = json_decode(base64_decode($token_parts[1]), true);
        return isset($payload['exp']) ? ($payload['exp'] < time()) : true;
    }

    private function prepare_curl($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $token = $this->get_token();
        if (!$this->is_token_expired($token)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ]);
        }
        return $curl;
    }

    public function get_animales() {
        $curl = $this->prepare_curl($this->api_url);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response ? json_decode($response, true) : ['error' => 'No se pudo conectar a la API'];
    }

    public function get_animal_by_id($id) {
        $curl = $this->prepare_curl($this->api_url . '/' . $id);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response ? json_decode($response, true) : ['error' => 'No se pudo obtener el animal'];
    }

    public function get_clasificaciones() {
        $curl = $this->prepare_curl($this->api_url . '/clasificaciones');
        $response = curl_exec($curl);
        curl_close($curl);
        return $response ? json_decode($response, true) : ['error' => 'No se pudo conectar a la API'];
    }

    public function get_estado_conservaciones() {
        $curl = $this->prepare_curl($this->api_url . '/estado-conservacion');
        $response = curl_exec($curl);
        curl_close($curl);
        return $response ? json_decode($response, true) : ['error' => 'No se pudo conectar a la API'];
    }
}
