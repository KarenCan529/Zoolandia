<?php
class Donacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Método para guardar los datos de la donación
    public function guardar_donacion($datos_donacion) {
        $this->db->insert('donacion', $datos_donacion);

        // Devuelve true si se insertó correctamente
        return $this->db->affected_rows() > 0;
    }
}


?>
