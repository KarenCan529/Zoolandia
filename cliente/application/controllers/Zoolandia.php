<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zoolandia extends CI_Controller {


    function __construct()
    {
       parent::__construct();
       $this->load->database();
       $this->load->helper("url");
       $this->load->library('session');
       $this->load->model('Pago_model');
       $this->load->model('Donacion_model');
    }



	public function index()
	{
	    /*sirve para cargar una vista*/
		$this->load->view('inicio');


	}

    public function animales()
    {
        $this->load->model('Animal'); // Cargamos el modelo
        
        // Verificamos si la solicitud es AJAX
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');  // Obtenemos el id del animal
            
            if ($id) {
                // Si se ha recibido un id, obtenemos el animal desde la base de datos
                $animal = $this->Animal->get_animal_by_id($id);
                
                if ($animal) {
                    // Devolvemos los datos en formato JSON
                    echo json_encode($animal);
                } else {
                    echo json_encode(['error' => 'Animal no encontrado']);
                }
            } else {
                echo json_encode(['error' => 'ID no recibido']);
            }
        } else {
            // Si no es AJAX, mostramos la lista de todos los animales
            $data['animales'] = $this->Animal->get_animales();
            $this->load->view('paginaAnimales', $data);
        }
    }
    
    
    public function boletos(){
        $this->load->view('paginaBoletos');
    }
    public function reservas(){
        $this->load->view('Seccion-pagar');
    }



    public function procesar_pago() {
        // Asegurarse de que el formulario fue enviado por POST
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Recuperar los datos del formulario
            $correo = $this->input->post('correo');
            $nombre = $this->input->post('nombre');
            $apellidoPaterno = $this->input->post('apellidoPaterno');
            $apellidoMaterno = $this->input->post('apellidoMaterno');
            $fecha_compra = date('Y-m-d H:i:s');

            // Datos de reserva
            $fecha = $this->input->post('fecha');
            $horario = $this->input->post('horario');
            $paqueteSeleccionado = $this->input->post('paquete', true) ?: 'Zoomax'; // Valor por defecto 'Zoomax'
            $rutaGuiada = $this->input->post('rutaGuiada', true) ?: 'no';
            $ruta = $this->input->post('ruta', true);
            
            // Datos de boleto
            $adultos = $this->input->post('adultos', true) ?: 0;
            $ninos = $this->input->post('ninos', true) ?: 0;
            $bebes = $this->input->post('bebes', true) ?: 0;

            // Llamar al modelo para procesar el pago y la inserción en la base de datos
            $resultado = $this->Pago_model->procesarPago($correo, $nombre, $apellidoPaterno, $apellidoMaterno, $fecha_compra, $fecha, $horario, $paqueteSeleccionado, $rutaGuiada, $ruta, $adultos, $ninos, $bebes);

            if ($resultado) {
                // Redirigir a la página de agradecimiento si todo salió bien
                $this->session->set_flashdata('success', 'Pago procesado exitosamente.');
                redirect('Zoolandia/agradecimientoCompra');
            } else {
                // Mostrar mensaje de error
                $this->session->set_flashdata('error', 'Hubo un problema al procesar el pago.');
                redirect('Zoolandia/reservas');
            }
        } else {
            // Si no es un POST, redirige a la página de error
            $this->session->set_flashdata('error', 'Hubo un problema al procesar tu pago.');
            redirect('Zoolandia/reservas');
        }
    }



    public function procesar_donacion() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Recuperar los datos del formulario
            $nombre = $this->input->post('nombre');
            $apellido_paterno = $this->input->post('apellido_paterno');
            $apellido_materno = $this->input->post('apellido_materno');
            $correo = $this->input->post('correo');
            $monto = $this->input->post('monto');
    
            // Preparar los datos para la base de datos
            $datos_donacion = array(
                'nombre_donante' => $nombre,
                'apellido_paterno_donante' => $apellido_paterno,
                'apellido_materno_donante' => $apellido_materno,
                'correo_donante' => $correo,
                'fecha_donacion' => date('Y-m-d H:i:s'),
                'monto_donacion' => $monto
            );
    
            // Llamar al modelo para guardar los datos
            $resultado = $this->Donacion_model->guardar_donacion($datos_donacion);
    
            if ($resultado) {
                $this->session->set_flashdata('success', '¡Gracias por tu donación!');
                redirect('Zoolandia/agradecimientoDonaciones');
            } else {
                $this->session->set_flashdata('error', 'Hubo un problema al procesar tu donación. Intenta nuevamente.');
                redirect('Zoolandia/paginaDonaciones');
            }
        } else {
            $this->session->set_flashdata('error', 'Método no permitido.');
            redirect('Zoolandia/paginaDonaciones');
        }
    }
    

        

    public function mapa(){
        $this->load->view('mapa');


    }
    public function donaciones(){
        $this->load->view('paginaDonaciones');
    }
    public function nosotros(){
        $this->load->view('paginaNosotros');
    }

    public function agradecimientoCompra(){
        $this->load->view('Agradecimiento');
    }

    public function agradecimientoDonaciones(){
        $this->load->view('AgradecimientoDonar');
    }

    public function loginAdmin() {
        $this->load->model('Login'); // Asegúrate de cargar el modelo
    
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $correo = $this->input->post('Correo', TRUE);
            $password = $this->input->post('Contrasena', TRUE);
    
            if (!empty($correo) && !empty($password)) {
                $usuario = $this->Login->getLogin($correo, $password);
    
                if ($usuario) {
                    // Guardar datos de usuario en la sesión
                    $this->session->set_userdata('nombre_usuario', $usuario['nombre_administrador']);
                    $this->session->set_userdata('logged_in', TRUE);  
    
                    $this->session->set_flashdata('mensaje', 'Inicio de sesión exitoso');
                    redirect('interfazAdministrativo'); 
                } else {
                    $this->session->set_flashdata('error', 'Correo o contraseña incorrectos');
                    redirect('loginAdmin'); 
                }
            } else {
                $this->session->set_flashdata('error', 'Por favor, complete todos los campos');
                redirect('loginAdmin');  
            }
        } else {
            $this->load->view('admin/LoginAdministrativo');  // Muestra la vista de login
        }
    }    

    public function cerrarSesion() {
        // Destruir la sesión
        $this->session->sess_destroy();
    
        // Redirigir al login
        redirect('loginAdmin');
    }

    public function interfazAdministrativo() {
   
        if (!$this->session->userdata('logged_in')) {
           
            $this->session->set_flashdata('error', 'Debes iniciar sesión primero.');
            redirect('loginAdmin'); 
        }
    
        // Si la sesión está activa, carga la vista
        $this->load->view('admin/interfazAdministrativo');
    }
    

    public function FormularioAdministradores() {
        // Verificar si el usuario ha iniciado sesión
        if (!$this->session->userdata('logged_in')) {
            // Si no ha iniciado sesión, redirigir al formulario de inicio de sesión
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin'); // Cambia a la ruta de tu página de inicio de sesión
            return; // Asegúrate de detener la ejecución del resto del método
        }
    
        // Si está autenticado, procede con la carga del formulario
        $this->load->model('AdministradorModel');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Capturar datos del formulario
            $data = array(
                'nombre_administrador' => $this->input->post('nombre_administrador', true),
                'apellido_paterno_administrador' => $this->input->post('apellido_paterno_administrador', true),
                'apellido_materno_administrador' => $this->input->post('apellido_materno_administrador', true),
                'correo_administrador' => $this->input->post('correo_administrador', true),
                'password_administrador' => password_hash($this->input->post('password_administrador', true), PASSWORD_DEFAULT)
            );
    
            // Insertar datos con el modelo
            if ($this->AdministradorModel->insertarAdministrador($data)) {
                $this->session->set_flashdata('success', 'Administrador registrado con éxito.');
            } else {
                $this->session->set_flashdata('error', 'Error al registrar al administrador.');
            }
    
            // Redirigir para evitar doble envío
            redirect('interfazAdministrativo/FormularioAdministradores');
        }
    
        // Cargar vista del formulario
        $this->load->view('admin/FormularioAdministradores');
    }
    

    public function baseAdministradores() {

        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }

        $this->load->database();

        $query = "SELECT id_administrador, nombre_administrador, apellido_paterno_administrador, apellido_materno_administrador, correo_administrador, password_administrador FROM administrador";
        $resultado = $this->db->query($query);

        if ($resultado) {
            $datos['administradores'] = $resultado->result_array();
        } else {
            $datos['error'] = "Error en la consulta: " . $this->db->error();
        }

        // Cargar vista con datos
        $this->load->view('admin/baseAdministradores', $datos);
    }

    public function baseBoletos() {
        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }

        $this->load->database();

        $query = "SELECT id_boleto, id_compra, boletos_adulto, boletos_nino, boletos_nino_menor_3, boleto_total_adulto, boleto_total_nino, boleto_total_nino_menor_3, boleto_total_general, id_reserva FROM boleto";
        $resultado = $this->db->query($query);

        if ($resultado) {
            $datos['boletos'] = $resultado->result_array();
        } else {
            $datos['error'] = "Error en la consulta: " . $this->db->error();
        }

        // Cargar vista con datos
        $this->load->view('admin/baseBoletos', $datos);
    }

    public function baseComprador() {
        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }

        $this->load->database();

        $query = "SELECT id_compra, correo_comprador, nombre_comprador, apellido_paterno_comprador, apellido_materno_comprador, fecha_compra FROM compra ";
        $resultado = $this->db->query($query);

        if ($resultado) {
            $datos['comprador'] = $resultado->result_array();
        } else {
            $datos['error'] = "Error en la consulta: " . $this->db->error();
        }

        // Cargar vista con datos
        $this->load->view('admin/baseComprador', $datos);
    }

    public function baseReservas() {

        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }

        $this->load->database();

        $query = "SELECT id_reserva, fecha_reserva, hora_reserva, id_guia, id_ruta, id_paquete, incluye_tour FROM reserva";
        $resultado = $this->db->query($query);

        if ($resultado) {
            $datos['reserva'] = $resultado->result_array();
        } else {
            $datos['error'] = "Error en la consulta: " . $this->db->error();
        }

        // Cargar vista con datos
        $this->load->view('admin/BaseReservas', $datos);
    }

    public function basePaquetes() {

        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }

        $this->load->database();

        $query = "SELECT id_paquete, nombre_paquete, precio_adulto, precio_nino FROM paquete ";
        $resultado = $this->db->query($query);

        if ($resultado) {
            $datos['paquete'] = $resultado->result_array();
        } else {
            $datos['error'] = "Error en la consulta: " . $this->db->error();
        }

        // Cargar vista con datos
        $this->load->view('admin/BasePaquetes', $datos);
    }

    public function baseGuias() {

        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }

        $this->load->database();

        $query = "SELECT id_guia, nombre_guia, disponibilidad_guia FROM guia ";
        $resultado = $this->db->query($query);

        if ($resultado) {
            $datos['guia'] = $resultado->result_array();
        } else {
            $datos['error'] = "Error en la consulta: " . $this->db->error();
        }

        // Cargar vista con datos
        $this->load->view('admin/BaseGuias', $datos);
    }

    public function baseRutas() {

        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }

        $this->load->database();

        $query = "SELECT id_ruta, nombre_ruta, descripcion_ruta FROM ruta  ";
        $resultado = $this->db->query($query);

        if ($resultado) {
            $datos['ruta'] = $resultado->result_array();
        } else {
            $datos['error'] = "Error en la consulta: " . $this->db->error();
        }

        // Cargar vista con datos
        $this->load->view('admin/BaseRutas', $datos);
    }

   
    public function FormularioAnimales() {


        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }
        $this->load->model('AnimalForm');
        
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $imagen = $this->subirImagen();
            
            if ($imagen) {
                $imagen = 'assets/imgP/' . $imagen; 
            } else {
               
                $this->session->set_flashdata('error', 'La imagen es obligatoria.');
                redirect('interfazAdministrativo/FormularioAnimales');
                return; 
            }
            
          
            $data = array(
                'nombre_animal' => $this->input->post('nombre_animal', true),
                'nombre_comun_animal' => $this->input->post('nombre_comun_animal', true),
                'nombre_cientifico_animal' => $this->input->post('nombre_cientifico_animal', true),
                'familia_orden_animal' => $this->input->post('familia_orden_animal', true),
                'habitat_animal' => $this->input->post('habitat_animal', true),
                'alimentacion_animal' => $this->input->post('alimentacion_animal', true),
                'esperanza_vida_animal' => $this->input->post('esperanza_vida_animal', true),
                'id_estado' => $this->input->post('id_estado', true),
                'id_clasificacion' => $this->input->post('id_clasificacion', true),
                'descripcion_animal' => $this->input->post('descripcion_animal', true),
                'imagen_animal' => $imagen, 
            );
        
          
            if ($this->AnimalForm->insertarAnimal($data)) {
                $this->session->set_flashdata('success', 'Animal registrado con éxito.');
            } else {
                $this->session->set_flashdata('error', 'Error al registrar al animal.');
            }
    
            redirect('interfazAdministrativo/FormularioAnimales');
        }
    
        $this->load->view('admin/FormularioAnimales');
    }
    
    private function subirImagen() {
        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }
        $config['upload_path'] = './assets/imgP/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 2048;
        $config['file_name'] = time() . '_' . $_FILES['imagen_animal']['name'];
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('imagen_animal')) {
            log_message('error', 'Error al subir imagen: ' . $this->upload->display_errors());
            return null; // Si falla, devuelve null
        }
    
        return $this->upload->data('file_name'); // Devuelve solo el nombre del archivo
    }
    
    


    public function baseAnimales() {
        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }
        $this->load->database();
    
        // Consultas para obtener los datos de animales, clasificaciones y estados
        $queryAnimales = "SELECT id_animal, nombre_animal, nombre_comun_animal, nombre_cientifico_animal, id_clasificacion, id_estado, habitat_animal, descripcion_animal, familia_orden_animal, alimentacion_animal, esperanza_vida_animal, imagen_animal FROM animal";
        $resultadoAnimales = $this->db->query($queryAnimales);
    
        $queryClasificacion = "SELECT id_clasificacion, nombre_clasificacion FROM clasificacion";
        $resultadoClasificacion = $this->db->query($queryClasificacion);
    
        $queryEstado = "SELECT id_estado, nombre_estado FROM estado_conservacion";
        $resultadoEstado = $this->db->query($queryEstado);
    
        // Verificar si las consultas tienen resultados
        if ($resultadoAnimales && $resultadoClasificacion && $resultadoEstado) {
            $datos['animal'] = $resultadoAnimales->result_array();
            $datos['clasificacion'] = $resultadoClasificacion->result_array();
            $datos['estado'] = $resultadoEstado->result_array();
        } else {
            $datos['error'] = "Error en la consulta: " . $this->db->error();
        }
    
        // Cargar vista con todos los datos
        $this->load->view('admin/BaseAnimales', $datos);
    }

    //BAseDonaciones

    public function baseDonaciones() {
        if (!$this->session->userdata('logged_in')) {
   
            $this->session->set_flashdata('error', 'Debes iniciar sesión para acceder.');
            redirect('loginAdmin');
            return;
        }
        $this->load->database();

        $query = "SELECT id_donacion, nombre_donante, apellido_paterno_donante, apellido_materno_donante, correo_donante, fecha_donacion, monto_donacion FROM donacion";
        $resultado = $this->db->query($query);

        if ($resultado) {
            $datos['donacion'] = $resultado->result_array();
        } else {
            $datos['error'] = "Error en la consulta: " . $this->db->error();
        }

        // Cargar vista con datos
        $this->load->view('admin/BaseDonaciones', $datos);
    }
}
