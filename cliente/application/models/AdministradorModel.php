<?php
class AdministradorModel extends CI_Model {
    private $api_url = "http://localhost:3000/api/admin"; // Ruta de la API de administradores

    // Método para obtener todos los administradores
    public function get_administradores()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url);

        // Configurar cURL para devolver la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);

        // Cerrar la sesión de cURL
        curl_close($curl);

        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API'];
        }

        // Decodificar la respuesta JSON
        return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
    }


    // Método para insertar un nuevo administrador
    public function insert_administrador($data)
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url);

        // Convertir los datos a JSON
        $jsonData = json_encode($data);

        // Configurar cURL para usar el método POST
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ]);

        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);

        // Cerrar la sesión de cURL
        curl_close($curl);

        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo crear el administrador'];
        }

        // Decodificar la respuesta JSON
        return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
    }

    // Método para actualizar un administrador
    public function update_administrador($id, $data)
    {
        $url = $this->api_url . '/' . $id;

        // Inicializar cURL
        $curl = curl_init($url);

        // Convertir los datos a JSON
        $jsonData = json_encode($data);

        // Configurar cURL para usar el método PUT
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ]);

        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);

        // Cerrar la sesión de cURL
        curl_close($curl);

        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo actualizar el administrador'];
        }

        // Decodificar la respuesta JSON
        return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
    }

    // Método para eliminar un administrador
    public function eliminarAdministrador($id)
    {
        $url = $this->api_url . '/' . $id;

        // Inicializar cURL
        $curl = curl_init($url);

        // Configurar cURL para usar el método DELETE
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);

        // Cerrar la sesión de cURL
        curl_close($curl);

        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo eliminar el administrador'];
        }

        // Decodificar la respuesta JSON
        return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
    }
}
