<?php

class AdministradorModel extends CI_Model {
    private $api_url = "http://localhost:3000/api/admin"; 

   
    public function get_administradores()
    {
        $token = $this->get_token();  

      
        $curl = curl_init($this->api_url);

     
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token  
        ]);

      
        $response = curl_exec($curl);

      
        curl_close($curl);

      
        if ($response === FALSE) {
            return ['error' => 'No se pudo conectar a la API'];
        }

       
        return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
    }


   
    public function insert_administrador($data)
    {
        $token = $this->get_token();  

      
        $curl = curl_init($this->api_url);

      
        $jsonData = json_encode($data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,  
            'Content-Length: ' . strlen($jsonData)
        ]);

       
        $response = curl_exec($curl);

       
        curl_close($curl);

     
        if ($response === FALSE) {
            return ['error' => 'No se pudo crear el administrador'];
        }

      
        return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
    }

  
    public function update_administrador($id, $data)
    {
        $token = $this->get_token();  

        $url = $this->api_url . '/' . $id;

      
        $curl = curl_init($url);

       
        $jsonData = json_encode($data);

      
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token, 
            'Content-Length: ' . strlen($jsonData)
        ]);

      
        $response = curl_exec($curl);

      
        curl_close($curl);

      
        if ($response === FALSE) {
            return ['error' => 'No se pudo actualizar el administrador'];
        }

       
        return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
    }

   
    public function eliminarAdministrador($id)
    {
        $token = $this->get_token();  

        $url = $this->api_url . '/' . $id;

        
        $curl = curl_init($url);

       
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token  
        ]);

      
        $response = curl_exec($curl);

    
        curl_close($curl);

        
        if ($response === FALSE) {
            return ['error' => 'No se pudo eliminar el administrador'];
        }

       
        return json_decode($response, true) ?: ['error' => 'La API no devolvió datos válidos'];
    }

   
    private function get_token()
    {
       
        
        $token = $this->session->userdata('token'); 
        return $token ? $token : '';  
    }
}
