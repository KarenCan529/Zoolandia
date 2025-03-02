<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimalForm extends CI_Model { 

    public function insertarAnimal($data) {
        if ($this->db->insert('animal', $data)) {
            return true; 
        } else {
            log_message('error', 'Error al insertar en la tabla animal: ' . $this->db->error()['message']);
            return false;
        }
    }

    public function insertarGuia($data) {
        if ($this->db->insert('guia', $data)) {
            return true; 
        } else {
            log_message('error', 'Error al insertar en la tabla guia: ' . $this->db->error()['message']);
            return false;
        }
    } 
    
    public function eliminarGuia($id_guia) {
        $this->db->where('id_guia', $id_guia);
        return $this->db->delete('guia'); 
    }  
    
    public function eliminarAnimal($id_animal) {
        $this->db->where('id_animal', $id_animal);
        return $this->db->delete('animal'); 
    } 

    public function eliminarAdministrador($id_administrador) {
        $this->db->where('id_administrador', $id_administrador);
        return $this->db->delete('administrador'); 
    } 
}
