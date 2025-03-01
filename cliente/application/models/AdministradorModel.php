<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministradorModel extends CI_Model {

    // Insertar nuevo administrador
    public function insertarAdministrador($data) {
        $this->db->insert('administrador', $data);
        return $this->db->affected_rows() > 0;
    }
}
