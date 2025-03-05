
<?php
class Animal extends CI_Model {
    private $api_url = "http://localhost:3000/api/animales"; // Ruta de la API

    
    public function get_animales()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url);

        // Configurar cURL para que devuelva la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        //DEJAR LISTO PARA IMPLEMETAR JWT
        // curl_setopt($curl, CURLOPT_HTTPHEADER, [
        //     'Content-Type: application/json',
        //     'Authorization: Bearer ' // El token se agregará en el futuro
        // ]);

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

    public function get_animal_by_id($id)
    {
        // Construir la URL para obtener un animal específico
        $url = $this->api_url . '/' . $id;

        // Inicializar cURL
        $curl = curl_init($url);

        // Configurar cURL para que devuelva la respuesta como un string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        //Cabezera lista para implementar token
        //curl_setopt($curl, CURLOPT_HTTPHEADER, [
        //     'Content-Type: application/json',
        //     'Authorization: Bearer ' // El token se agregará en el futuro
        // ]);


        // Ejecutar la solicitud y guardar la respuesta
        $response = curl_exec($curl);

        // Cerrar la sesión de cURL
        curl_close($curl);

        // Verificar si la solicitud falló
        if ($response === FALSE) {
            return ['error' => 'No se pudo obtener el animal'];
        }

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Verificar si la decodificación fue exitosa
        return $data ?: ['error' => 'La API no devolvió datos válidos'];
    }


    //-------------------------------------------------------------

    public function get_clasificaciones()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url . '/clasificaciones');
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
    public function get_estado_conservaciones()
    {
        // Inicializar cURL
        $curl = curl_init($this->api_url . '/estado-conservacion');
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

// class Animal extends CI_Model {
//     // Ejemplo de una función para obtener todos los animales
//     public function get_animales()
//     {
//         $this->db->select('a.id_animal, a.nombre_animal, a.nombre_comun_animal, a.nombre_cientifico_animal, a.familia_orden_animal, a.habitat_animal, a.alimentacion_animal, a.esperanza_vida_animal, a.id_estado, a.id_clasificacion, a.descripcion_animal, a.imagen_animal, c.nombre_clasificacion');
//         $this->db->from('animal a');
//         $this->db->join('clasificacion c', 'a.id_clasificacion = c.id_clasificacion');        
//         $query = $this->db->get();
//         return $query->result_array(); // Devuelve un array con los datos
//     }
//     public function get_animal_by_id($id)
// {
//     $this->db->select('a.id_animal, a.nombre_animal, a.nombre_comun_animal, a.nombre_cientifico_animal, a.familia_orden_animal, a.habitat_animal, a.alimentacion_animal, a.esperanza_vida_animal, a.id_estado, a.id_clasificacion, a.descripcion_animal, a.imagen_animal, e.nombre_estado AS estado_conservacion, c.nombre_clasificacion');
//         $this->db->from('animal a');
//         $this->db->join('clasificacion c', 'a.id_clasificacion = c.id_clasificacion');
//         $this->db->join('estado_conservacion e', 'a.id_estado = e.id_estado');
//         $this->db->where('a.id_animal', $id);
//         $query = $this->db->get();
//         return $query->row_array(); 
// }
// }

}

