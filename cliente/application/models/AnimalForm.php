<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimalForm extends CI_Model { 

    private $api_url_animales = "http://localhost:3000/api/animales";
    private $api_url_compras = "http://localhost:3000/api/compras";
    private $api_url_donaciones = "http://localhost:3000/api/donaciones";

    //----------------------------------------------------------------GETS

    //PARA BASE BOLETOS
    public function get_boletos()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url_compras . '/boletos');
        // Configurar cURL para que devuelva la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
        // Cerrar la sesión de cURL
        curl_close($curl);
        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API'];
        }
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }

    //PARA BASE COMPRADORES
    public function get_compradores()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url_compras . '/');

        // Configurar cURL para que devuelva la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);

        // Cerrar la sesión de cURL
        curl_close($curl);

        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API'];
        }
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }

    public function get_reservas()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url_compras . '/reservas');
        // Configurar cURL para que devuelva la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
        // Cerrar la sesión de cURL
        curl_close($curl);
        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API'];
        }
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }

    public function get_paquetes()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url_compras . '/paquetes');
        // Configurar cURL para que devuelva la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
        // Cerrar la sesión de cURL
        curl_close($curl);
        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API'];
        }
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }

    public function get_guias()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url_compras . '/guias');
        // Configurar cURL para que devuelva la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
        // Cerrar la sesión de cURL
        curl_close($curl);
        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API'];
        }
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }

    public function get_rutas()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url_compras . '/rutas');
        // Configurar cURL para que devuelva la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
        // Cerrar la sesión de cURL
        curl_close($curl);
        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API'];
        }
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }

    public function get_donaciones()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url_donaciones . '/');
        // Configurar cURL para que devuelva la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);
        // Cerrar la sesión de cURL
        curl_close($curl);
        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API'];
        }
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }
    
//---------------------------------------------------------------------------------------------UPDATES

public function update_paquetes($id, $data)
{
    $curl = curl_init($this->api_url_compras . '/paquetes' . '/' . $id);
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
        return ['error' => 'No se pudo actualizar el paquete'];
    }
    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}

public function update_guias($id, $data)
{
    $curl = curl_init($this->api_url_compras . '/guias' . '/' . $id);
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
        return ['error' => 'No se pudo actualizar el guia'];
    }
    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}

public function update_rutas($id, $data)
{
    $curl = curl_init($this->api_url_compras . '/rutas' . '/' . $id);
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
        return ['error' => 'No se pudo actualizar la ruta'];
    }
    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}

public function update_animales($id, $data)
{
    $curl = curl_init($this->api_url_animales . '/' . $id);
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
        return ['error' => 'No se pudo actualizar el animal'];
    }
    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}

//----------------------------------------------------------------------- DELETESSS

public function eliminarGuia($id_guia) {

    $curl = curl_init($this->api_url_compras . '/guias' . '/' . $id_guia);
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
        return ['error' => 'No se pudo eliminar el guia'];
    }
    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
   // $this->db->where('id_guia', $id_guia);
   // return $this->db->delete('guia'); 
}

public function eliminarAnimal($id_animal) {//checho jeje
    $curl = curl_init($this->api_url_animales . '/' . $id_animal);
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
        return ['error' => 'No se pudo eliminar el animal'];
    }
    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
   // $this->db->where('id_guia', $id_guia);
   // return $this->db->delete('guia'); 
}



//-----------------------------------------------------------

public function insertarAnimal($data) {//FUNCONANDOOO
    $curl = curl_init($this->api_url_animales . '/' );
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
        return ['error' => 'No se pudo crear el animal'];
    }
    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
}

public function insertarGuia($data) {///FUNCIONANDO

    $curl = curl_init($this->api_url_compras . '/guias' );
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
        return ['error' => 'No se pudo crear el guia'];
    }
    // Decodificar la respuesta JSON
    return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
} 
 
}
