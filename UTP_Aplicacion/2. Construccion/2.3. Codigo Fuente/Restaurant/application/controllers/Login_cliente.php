<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_cliente extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_cliente');
		$this->load->helper('my_helper');
	}

	/**
		* Verifica si el usuario existe para darle el acceso .
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		* @param login
		* @param password
		* @param idclientes
		* @param Dni
		* @param sexo
		* @param direccion
		* @param referencia
		* @param celular
		* @param telefono
		* @param Estado
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/

	function index()
	{
		
		if ($this->session->userdata('id'))
		{
			

			//$this->load->view('cliente/Carta');
			redirect(base_url()."Catalogo/ListarCarta");
		}	
		else
		{
			$login = $this->input->post('login');
			$password = $this->input->post('password');
		}
		if($login!='' and $password!='')
		{

			$this->load->model('Model_cliente');
			$password = encriptar($password);
			$cliente = $this->Model_cliente->getclienteLogin($login,$password);
			
			if($cliente->num_rows() > 0)
				{
				$cliente = $cliente->row();
				$this->session->set_userdata('id',$cliente->idCliente);
				$this->load->model('model_tipo_plato');
				$data['tipo_platos'] 	= $this->model_tipo_plato->get_tipoplato();
				$this->load->model('model_catalogo');
				$data['platos']			= $this->model_catalogo->get_catalogo();

				$this->load->view('cliente/Carta',$data);
		
				}else {
					$data['error']="error de contraseña";
					 $this->load->view('cliente/Login_Cliente',$data);
					 }
		}
		else    {
			 $data['error']="Ingrese sus datos";
			 $this->load->view('cliente/Login_Cliente',$data);
			
		 		}
		

	}

	function salir(){
		$this->session->sess_destroy();
		$this->load->view('cliente/Login_Cliente');
	}

	
}