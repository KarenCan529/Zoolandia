<?php
class Pago_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function procesarPago($correo, $nombre, $apellidoPaterno, $apellidoMaterno, $fecha_compra, $fecha, $horario, $paqueteSeleccionado, $rutaGuiada, $ruta, $adultos, $ninos, $bebes) {
        // Asignar valores a los paquetes
        $paqueteValor = 0;
        switch ($paqueteSeleccionado) {
            case 'Zoomax':
                $paqueteValor = 1;
                break;
            case 'Bestial':
                $paqueteValor = 2;
                break;
            case 'VIP':
                $paqueteValor = 3;
                break;
        }

        // Cambiar "Ruta guiada" a un valor numérico (1 o 0)
        $rutaGuiadaBoolean = ($rutaGuiada == 'si') ? 1 : 0;

        // Mapear las rutas numéricas a rutas de texto
        switch ($ruta) {
            case 1:
                $rutaNombre = 'Ruta maya';
                break;
            case 2:
                $rutaNombre = 'Ruta reptil';
                break;
            case 3:
                $rutaNombre = 'Aventura tropical';
                break;
            case 4:
                $rutaNombre = 'Aventura salvaje';
                break;
            case 5:
                $rutaNombre = 'Ruta de reptiles y aves';
                break;
            default:
                $rutaNombre = 'Ruta no seleccionada';
                break;
        }

        // Recuperar el ID del último boleto insertado
        $this->db->select_max('id_boleto', 'last_boleto_id');
        $query_last_boleto = $this->db->get('boleto');
        $row_last_boleto = $query_last_boleto->row();
        $id_a_ingresar = $row_last_boleto->last_boleto_id + 1;

        // Insertar en la tabla Reserva
        $data_reserva = array(
            'id_reserva' => $id_a_ingresar,
            'fecha_reserva' => $fecha,
            'hora_reserva' => $horario,
            'id_paquete' => $paqueteValor,
            'incluye_tour' => $rutaGuiadaBoolean,
            'id_ruta' => $rutaGuiadaBoolean ? $ruta : NULL
        );

        if (!$this->db->insert('reserva', $data_reserva)) {
            return false;
        }

        // Insertar en la tabla Compra
        $data_compra = array(
            'id_compra' => $id_a_ingresar,
            'correo_comprador' => $correo,
            'nombre_comprador' => $nombre,
            'apellido_paterno_comprador' => $apellidoPaterno,
            'apellido_materno_comprador' => $apellidoMaterno,
            'fecha_compra' => $fecha_compra
        );

        if (!$this->db->insert('compra', $data_compra)) {
            return false;
        }

        // Insertar en la tabla Boleto
        $data_boleto = array(
            'id_boleto' => $id_a_ingresar,
            'id_compra' => $id_a_ingresar,
            'boletos_adulto' => $adultos,
            'boletos_nino' => $ninos,
            'boletos_nino_menor_3' => $bebes,
            'id_reserva' => $id_a_ingresar
        );

        if (!$this->db->insert('boleto', $data_boleto)) {
            return false;
        }

        return true; // Todo ha ido bien
    }
}
