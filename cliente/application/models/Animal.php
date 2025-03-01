<?php
class Animal extends CI_Model {

   

    // Ejemplo de una función para obtener todos los animales
    public function get_animales()
    {
        $this->db->select('a.id_animal, a.nombre_animal, a.nombre_comun_animal, a.nombre_cientifico_animal, a.familia_orden_animal, a.habitat_animal, a.alimentacion_animal, a.esperanza_vida_animal, a.id_estado, a.id_clasificacion, a.descripcion_animal, a.imagen_animal, c.nombre_clasificacion');
        $this->db->from('animal a');
        $this->db->join('clasificacion c', 'a.id_clasificacion = c.id_clasificacion');
        
        $query = $this->db->get();
        return $query->result_array(); // Devuelve un array con los datos
    }

    public function get_animal_by_id($id)
{
    $this->db->select('a.id_animal, a.nombre_animal, a.nombre_comun_animal, a.nombre_cientifico_animal, a.familia_orden_animal, a.habitat_animal, a.alimentacion_animal, a.esperanza_vida_animal, a.id_estado, a.id_clasificacion, a.descripcion_animal, a.imagen_animal, e.nombre_estado AS estado_conservacion, c.nombre_clasificacion');
        $this->db->from('animal a');
        $this->db->join('clasificacion c', 'a.id_clasificacion = c.id_clasificacion');
        $this->db->join('estado_conservacion e', 'a.id_estado = e.id_estado');
        $this->db->where('a.id_animal', $id);
        $query = $this->db->get();

        return $query->row_array(); 
}
}
