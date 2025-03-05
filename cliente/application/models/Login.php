<?php
class Login extends CI_Model {

    private $api_url = "http://localhost:3000/api/token/login"; // URL de la API de autenticación

    public function __construct() {
        parent::__construct();
     
    }

    // Método para autenticar usuario mediante la API
    public function getLogin($correo, $password) {
        // Datos a enviar en la solicitud
        $datos_login = [
            'correo_administrador' => $correo, // Asegúrate de que los nombres coincidan
            'password_administrador' => $password
        ];

        // Inicializar cURL
        $curl = curl_init($this->api_url);

        // Configurar opciones de cURL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datos_login));

        // Ejecutar la solicitud y obtener la respuesta
        $response = curl_exec($curl);

        // Verificar si hubo un error en la solicitud
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar con el servidor'];
        }

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Cerrar la sesión de cURL
        curl_close($curl);

        // Verificar si la autenticación fue exitosa
        if (isset($data['token'])) {
            $_SESSION['token'] = $data['token']; // Guardar el token en la sesión de PHP
            return ['success' => true, 'token' => $data['token']]; // Retorna éxito y el token
        } else {
            return ['error' => $data['error'] ?? 'Credenciales incorrectas'];
        }
    }

    // Método para obtener el token de la sesión
    public function getTokenFromSession() {
        return isset($_SESSION['token']) ? $_SESSION['token'] : null;
    }
}
