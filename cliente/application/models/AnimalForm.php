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
}
