<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_empleado');
		$this->load->helper('my_helper');
		$this->load->library('recaptcha');
	}

	/**
		* Verifica si el usuario existe para darle el acceso segun el rol o de acuerdo a la session establecida.
		*
		* @author Ricardo Palacios Arce
		* @param login
		* @param password
		* @param idEmpleados
		* @param login
		* @param password
		* @param Nombres
		* @param Apellidos
		* @param Rol
		* @param Sexo
		* @param Estado
	*/

	function index()
	{
		$this->load->model('Model_Caja');
		

		$captcha_answer = $this->input->post('g-recaptcha-response');

		$response = $this->recaptcha->verifyResponse($captcha_answer);

		if( $this->session->userdata('id') ){
			if($this->session->userdata('rol')=='ADMINISTRADOR'){
				$mes 					= date('m');
				$fecha_dia 				= date('Y-m-d');
				$data['cantidad']		= $this->Model_Caja->getPedidoCompletadoMes($mes);
				$data['cantidad_dia'] 	= $this->Model_Caja->getPedidoCompletadoDia($fecha_dia);
				$data['contenido'] 		= 'admin';
				$this->load->view('admin/plantilla',$data);
			}
			elseif($this->session->userdata('rol')=='CAJERO')
				//$this->load->view('Cajero/admin');
				redirect(base_url()."cajero");
			elseif($this->session->userdata('rol')=='COCINA')
				//$this->load->view('cocina/cocina');
				redirect(base_url()."cocina");
			return 0;
		}else{
			$login = $this->input->post('login');
			$password = $this->input->post('password');
		}
		if ($response['success']) {
			if($login!='' and $password!=''){
				$this->load->model('Model_empleado');
				$password = encriptar($password);
				//$password = md5($password);
				$empleado = $this->Model_empleado->getEmpleadoLogin($login,$password);
				if($empleado->num_rows() > 0){
					$empleado = $empleado->row();
					$this->session->set_userdata('id',$empleado->idEmpleados);
					$this->session->set_userdata('login',$login);
					$this->session->set_userdata('password',$password);
					$this->session->set_userdata('nombre',$empleado->Nombres);
					$this->session->set_userdata('apellido',$empleado->Apellidos);
					$this->session->set_userdata('rol',$empleado->Rol);
					$this->session->set_userdata('sexo',$empleado->Sexo);
					$this->session->set_userdata('estado',$empleado->Estado);
					if($this->session->userdata('rol')=='ADMINISTRADOR'){
						$mes 		= date('m');
						$fecha_dia 	= date('Y-m-d');
						$data['cantidad'] = $this->Model_Caja->getPedidoCompletadoMes($mes);
						$data['cantidad_dia'] = $this->Model_Caja->getPedidoCompletadoDia($fecha_dia);
						$data['contenido'] = 'admin';
						$this->load->view('admin/plantilla',$data);
					}
					elseif($this->session->userdata('rol')=='CAJERO')
						redirect(base_url()."cajero");
					elseif($this->session->userdata('rol')=='COCINA')
						//$this->load->view('cocina/cocina');
						redirect(base_url()."cocina");
				}else{
					$data['error']="Usuario o contrase&ntilde;a invalida";
					$this->load->view('login',$data);
				}
			}else{
				$data['error']="Ingrese sus datos";
				$this->load->view('login',$data);
			}
		}else{
				$data['error']="Ingrese sus datos";
				$this->load->view('login',$data);
		}
	}

	/**
		* Lista los empleados.
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function listar(){
		$data['empleados'] = $this->Model_empleado->getEmpleado();
		$data['contenido'] = 'empleados';
		$this->load->view('admin/plantilla',$data);
	}


	/**
		* Inserta un nuevo empleado.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param nombre
		* @param apellido
		* @param rol_idrol
		* @param fecha_nacimiento
		* @param dni
		* @param direccion
		* @param celular
		* @param email
		* @param fecha_ingreso
		* @param estado
		* @param login
		* @param sexo
		* @param password
	*/

	function insertar(){
		$datos = $this->input->post();
		if (isset($datos)) {
			$nombre				= $datos["nombre"];
			$apellido			= $datos["apellido"];
			$rol_idrol			= $datos["cargo"];
			$fecha_nacimiento	= date("Y-m-d",strtotime($datos["fec_nac"]));
			$dni 				= $datos["dni"];
			$direccion 			= $datos["direccion"];
			$celular			= $datos["celular"];
			$email 				= $datos["email"];
			if ($datos["fec_in"]==null) {
				$fecha_ingreso = "0000-00-00";
			}
			else{
				$fecha_ingreso		= date("Y-m-d",strtotime($datos["fec_in"]));
			}
			$estado				= $datos["estado"];
			$login				= $datos["usuario"];
			$sexo 				= $datos["account"];
			$password			= encriptar($datos["password"]);
			$this->Model_empleado->insertEmpleado($nombre,$apellido,$rol_idrol,$fecha_nacimiento,$dni,$direccion,$celular,$email,$fecha_ingreso,$estado,$login,$sexo,$password);
			redirect(base_url('empleados'));
		}
	}

	/**
		* Destruye la sesion.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id	
	*/

	function salir(){
		$this->session->sess_destroy();
		$this->load->view('login');
	}

	/**
		* Obtiene un empleado segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id	
	*/

	function editar(){
		$datos = $this->input->post();
		if (isset($datos)) {
			$edit_emp['a'] = $this->Model_empleado->getEmpleadoById($datos["idempleado"]);
			$edit_emp['contenido'] = 'editar_empleado';
			$this->load->view('admin/plantilla', $edit_emp);
		}
	}

	/**
		* Elimina un empleado segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id	
	*/

	function eliminar(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post("idempleado");
			$this->Model_empleado->deleteEmpleado($id);
		}
		/*$datos = $this->input->post();
		if (isset($datos)) {
		$this->Model_empleado->deleteEmpleado($datos["idempleado"]);
		redirect(base_url('empleados'));
		}*/
	}


	/**
		* Actualiza un nuevo empleado existente.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id
		* @param nombre
		* @param apellido
		* @param rol_idrol
		* @param fecha_nacimiento
		* @param dni
		* @param direccion
		* @param celular
		* @param email
		* @param fecha_ingreso
		* @param estado
		* @param login
		* @param sexo
		* @param password
	*/

	function actualizar(){
		$datos = $this->input->post();
		if (isset($datos)) {
			$id 				= $datos["id"];
			$nombre				= $datos["nombre"];
			$apellido			= $datos["apellido"];
			$rol_idrol			= $datos["cargo"];
			$fecha_nacimiento	= date("Y-m-d",strtotime($datos["fec_nac"]));
			$dni 				= $datos["dni"];
			$direccion 			= $datos["direccion"];
			$celular			= $datos["celular"];
			$usuario			= $datos["usuario"];
			$email 				= $datos["email"];
			if ($datos["fec_in"]==null) {
				$fecha_ingreso = "0000-00-00";
			}
			else{
				$fecha_ingreso		= date("Y-m-d",strtotime($datos["fec_in"]));
			}
			$estado				= $datos["estado"];
			$sexo 				= $datos["account"];
			$password			= encriptar($datos["password"]);
			$this->Model_empleado->updateEmpleado($id,$nombre,$apellido,$rol_idrol,$fecha_nacimiento,$dni,$direccion,$celular,$usuario,$email,$fecha_ingreso,$estado,$sexo,$password);
			redirect(base_url('empleados'));
		}
	}
}