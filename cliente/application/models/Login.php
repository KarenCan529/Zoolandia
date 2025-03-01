<?php
class Login extends CI_Model {

    public function getLogin($correo, $password) {
        // Escapar datos para evitar inyección SQL
        $correo = $this->db->escape_str($correo);

        // Consulta para obtener al usuario
        $query = $this->db->get_where('administrador', ['correo_administrador' => $correo]);
        $usuario = $query->row_array();
    
        if ($usuario && password_verify($password, $usuario['password_administrador'])) {
            return $usuario; // Retorna los datos del usuario si la contraseña coincide
        }
    
        return null; // Devuelve null si no hay coincidencia
    }



}