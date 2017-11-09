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
}