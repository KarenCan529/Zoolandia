<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimalForm extends CI_Model { 

    private $api_url_animales = "http://localhost:3000/api/animales";
    private $api_url_compras = "http://localhost:3000/api/compras";
    private $api_url_donaciones = "http://localhost:3000/api/donaciones";

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

    //PARA BASE BOLETOS
    public function get_boletos()
    {
        // Utilizar la función prepare_curl para configurar cURL
        $curl = $this->prepare_curl($this->api_url_compras . '/boletos');

        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);

        // Verificar si hubo un error en la ejecución de cURL
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API: ' . curl_error($curl)];
        }

        // Obtener el código de estado HTTP de la respuesta
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        // Cerrar la sesión de cURL
        curl_close($curl);

        // Verificar si el código de estado es 200 (OK)
        if ($http_code != 200) {
            return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
        }

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }

    
    //PARA BASE COMPRADORES
    public function get_compradores()
    {
        // Utilizar la función prepare_curl para configurar cURL
        $curl = $this->prepare_curl($this->api_url_compras . '/');
    
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
    
        // Verificar si hubo un error en la ejecución de cURL
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API: ' . curl_error($curl)];
        }
    
        // Obtener el código de estado HTTP de la respuesta
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        // Cerrar la sesión de cURL
        curl_close($curl);
    
        // Verificar si el código de estado es 200 (OK)
        if ($http_code != 200) {
            return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
        }
    
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
    
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }
    
    public function get_reservas()
    {
        // Utilizar la función prepare_curl para configurar cURL
        $curl = $this->prepare_curl($this->api_url_compras . '/reservas');
    
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
    
        // Verificar si hubo un error en la ejecución de cURL
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API: ' . curl_error($curl)];
        }
    
        // Obtener el código de estado HTTP de la respuesta
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        // Cerrar la sesión de cURL
        curl_close($curl);
    
        // Verificar si el código de estado es 200 (OK)
        if ($http_code != 200) {
            return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
        }
    
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
    
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }
    
    public function get_paquetes()
    {
        // Utilizar la función prepare_curl para configurar cURL
        $curl = $this->prepare_curl($this->api_url_compras . '/paquetes');
    
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
    
        // Verificar si hubo un error en la ejecución de cURL
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API: ' . curl_error($curl)];
        }
    
        // Obtener el código de estado HTTP de la respuesta
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        // Cerrar la sesión de cURL
        curl_close($curl);
    
        // Verificar si el código de estado es 200 (OK)
        if ($http_code != 200) {
            return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
        }
    
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
    
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }
    
    public function get_guias()
    {
        // Utilizar la función prepare_curl para configurar cURL
        $curl = $this->prepare_curl($this->api_url_compras . '/guias');
    
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
    
        // Verificar si hubo un error en la ejecución de cURL
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API: ' . curl_error($curl)];
        }
    
        // Obtener el código de estado HTTP de la respuesta
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        // Cerrar la sesión de cURL
        curl_close($curl);
    
        // Verificar si el código de estado es 200 (OK)
        if ($http_code != 200) {
            return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
        }
    
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
    
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }
    
    public function get_rutas()
    {
        // Utilizar la función prepare_curl para configurar cURL
        $curl = $this->prepare_curl($this->api_url_compras . '/rutas');
    
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
    
        // Verificar si hubo un error en la ejecución de cURL
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API: ' . curl_error($curl)];
        }
    
        // Obtener el código de estado HTTP de la respuesta
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        // Cerrar la sesión de cURL
        curl_close($curl);
    
        // Verificar si el código de estado es 200 (OK)
        if ($http_code != 200) {
            return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
        }
    
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
    
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }
    
    public function get_donaciones()
    {
        // Utilizar la función prepare_curl para configurar cURL
        $curl = $this->prepare_curl($this->api_url_donaciones . '/');
    
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
    
        // Verificar si hubo un error en la ejecución de cURL
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API: ' . curl_error($curl)];
        }
    
        // Obtener el código de estado HTTP de la respuesta
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
        // Cerrar la sesión de cURL
        curl_close($curl);
    
        // Verificar si el código de estado es 200 (OK)
        if ($http_code != 200) {
            return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
        }
    
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
    
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }
    
//---------------------------------------------------------------------------------------------UPDATES

public function update_paquetes($id, $data)
{
    // Obtener el token de autenticación
    $token = $this->get_token();

    // URL de la API para actualizar el paquete
    $url = $this->api_url_compras . '/paquetes' . '/' . $id;

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
        'Authorization: Bearer ' . $token,  // Agregar el token para la autenticación
        'Content-Length: ' . strlen($jsonData)
    ]);

    // Ejecutar la solicitud y guardar la respuesta
    $response = curl_exec($curl);

    // Cerrar la sesión de cURL
    curl_close($curl);

    // Verificar si hubo un error en la ejecución de cURL
    if ($response === FALSE) {
        return ['error' => 'No se pudo actualizar el paquete'];
    }

    // Obtener el código de estado HTTP de la respuesta
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    // Verificar si el código de estado es 200 (OK)
    if ($http_code != 200) {
        return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
    }

    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}

public function update_guias($id, $data)
{
    // Obtener el token de autenticación
    $token = $this->get_token();

    // URL de la API para actualizar el guía
    $url = $this->api_url_compras . '/guias' . '/' . $id;

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
        'Authorization: Bearer ' . $token,  // Agregar el token para la autenticación
        'Content-Length: ' . strlen($jsonData)
    ]);

    // Ejecutar la solicitud y guardar la respuesta
    $response = curl_exec($curl);

    // Cerrar la sesión de cURL
    curl_close($curl);

    // Verificar si hubo un error en la ejecución de cURL
    if ($response === FALSE) {
        return ['error' => 'No se pudo actualizar el guía'];
    }

    // Obtener el código de estado HTTP de la respuesta
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    // Verificar si el código de estado es 200 (OK)
    if ($http_code != 200) {
        return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
    }

    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}

public function update_rutas($id, $data)
{
    // Obtener el token de autenticación
    $token = $this->get_token();

    // URL de la API para actualizar la ruta
    $url = $this->api_url_compras . '/rutas' . '/' . $id;

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
        'Authorization: Bearer ' . $token,  // Agregar el token para la autenticación
        'Content-Length: ' . strlen($jsonData)
    ]);

    // Ejecutar la solicitud y guardar la respuesta
    $response = curl_exec($curl);

    // Cerrar la sesión de cURL
    curl_close($curl);

    // Verificar si hubo un error en la ejecución de cURL
    if ($response === FALSE) {
        return ['error' => 'No se pudo actualizar la ruta'];
    }

    // Obtener el código de estado HTTP de la respuesta
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    // Verificar si el código de estado es 200 (OK)
    if ($http_code != 200) {
        return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
    }

    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}

public function update_animales($id, $data)
{
    // Obtener el token de autenticación (suponiendo que se implementa la función get_token())
    $token = $this->get_token();

    // Preparar la URL para la solicitud PUT
    $url = $this->api_url_animales . '/' . $id;

    // Utilizar la función prepare_curl para configurar cURL
    $curl = $this->prepare_curl($url);

    // Convertir los datos a JSON
    $jsonData = json_encode($data);

    // Configurar cURL para usar el método PUT
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token,  // Agregar el token para autorización
        'Content-Length: ' . strlen($jsonData)
    ]);

    // Ejecutar la solicitud y guardar la respuesta
    $response = curl_exec($curl);

    // Verificar si hubo un error en la ejecución de cURL
    if ($response === FALSE) {
        return ['error' => 'No se pudo conectar a la API: ' . curl_error($curl)];
    }

    // Obtener el código de estado HTTP de la respuesta
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    // Cerrar la sesión de cURL
    curl_close($curl);

    // Verificar si el código de estado es 200 (OK)
    if ($http_code != 200) {
        return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
    }

    // Decodificar la respuesta JSON
    $data = json_decode($response, true);

    // Verificar si la decodificación fue exitosa
    return $data ?: ['error' => 'La API no devolvió datos válidos'];
}

//----------------------------------------------------------------------- DELETESSS
public function eliminarGuia($id_guia) {
    // Obtener el token de autenticación
    $token = $this->get_token();

    // Inicializar cURL con la URL de la API para eliminar el guía
    $curl = curl_init($this->api_url_compras . '/guias' . '/' . $id_guia);

    // Configurar cURL para usar el método DELETE
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token  // Agregar el token para la autenticación
    ]);

    // Ejecutar la solicitud y guardar la respuesta
    $response = curl_exec($curl);

    // Cerrar la sesión de cURL
    curl_close($curl);

    // Verificar si la solicitud falló
    if ($response === FALSE) {
        return ['error' => 'No se pudo eliminar el guía'];
    }

    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}


public function eliminarAnimal($id_animal)
{
    // Obtener el token de autenticación (suponiendo que se implementa la función get_token())
    $token = $this->get_token();

    // URL de la API para eliminar el animal
    $url = $this->api_url_animales . '/' . $id_animal;

    // Inicializar cURL
    $curl = curl_init($url);

    // Configurar cURL para usar el método DELETE
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token  // Agregar el token para autorización
    ]);

    // Ejecutar la solicitud y guardar la respuesta
    $response = curl_exec($curl);

    // Cerrar la sesión de cURL
    curl_close($curl);

    // Verificar si hubo un error en la ejecución de cURL
    if ($response === FALSE) {
        return ['error' => 'No se pudo eliminar el animal'];
    }

    // Obtener el código de estado HTTP de la respuesta
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    // Verificar si el código de estado es 200 (OK)
    if ($http_code != 200) {
        return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
    }

    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}



//-----------------------------------------------------------
public function insertarAnimal($data)
{
    // Obtener el token de autenticación (suponiendo que se implementa la función get_token())
    $token = $this->get_token();

    // Inicializar cURL para la URL de la API de animales
    $curl = curl_init($this->api_url_animales);

    // Convertir los datos a JSON
    $jsonData = json_encode($data);

    // Configurar cURL para usar el método POST
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token,  // Agregar el token para autorización
        'Content-Length: ' . strlen($jsonData)
    ]);

    // Ejecutar la solicitud y guardar la respuesta
    $response = curl_exec($curl);

    // Cerrar la sesión de cURL
    curl_close($curl);

    // Verificar si hubo un error en la ejecución de cURL
    if ($response === FALSE) {
        return ['error' => 'No se pudo crear el animal'];
    }

    // Obtener el código de estado HTTP de la respuesta
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    // Verificar si el código de estado es 201 (Creado)
    if ($http_code != 201) {
        return ['error' => 'Error en la solicitud. Código HTTP: ' . $http_code];
    }

    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}
public function insertarGuia($data)
{
    // Obtener el token de autenticación
    $token = $this->get_token();

    // Inicializar cURL con la URL de la API para insertar el guía
    $curl = curl_init($this->api_url_compras . '/guias');

    // Convertir los datos a JSON
    $jsonData = json_encode($data);

    // Configurar cURL para usar el método POST
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token,  // Agregar el token para la autenticación
        'Content-Length: ' . strlen($jsonData)
    ]);

    // Ejecutar la solicitud y guardar la respuesta
    $response = curl_exec($curl);

    // Cerrar la sesión de cURL
    curl_close($curl);

    // Verificar si la solicitud falló
    if ($response === FALSE) {
        return ['error' => 'No se pudo crear el guía'];
    }

    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}


}
?>
