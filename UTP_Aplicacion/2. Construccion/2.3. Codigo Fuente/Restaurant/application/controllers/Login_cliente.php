<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_cliente extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_cliente');
	}

	/**
		* Verifica si el usuario existe para darle el acceso .
		*
		* @author Juan Jose Paz Chalco
		* @author Carlos Sanchez Aquino
		*
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
		*
		fecha creacion: 23/08/2017
		fecha modificacion: 24/08/2017
	*/

	function index()
	{
		
		if ($this->session->userdata('id'))
		{
			redirect(base_url()."Catalogo/ListarCarta");
		}	
		else
		{
			$login = $this->input->post('login1');
			$password = $this->input->post('password');
		}
		if($login!='' and $password!='')
		{
			$this->load->model('Model_cliente');
			$password = $password;
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
			}
			else 
			{
				$data['error']="error de contraseña";
				$this->load->view('cliente/Login_cliente',$data);
			}
		}
		else    
		{
			 $data['error']="Ingrese sus datos";
			 $this->load->view('cliente/Login_cliente',$data);
		}
	}

	/**
		* Destruye la sesion.
		*
		* @author Juan Jose Paz Chalco
		* @author Carlos Sanchez Aquino
		*	
		* @param id	
		*
		fecha creacion: 23/08/2017
		fecha modificacion: 24/08/2017
	*/
	function salir()
	{
		$this->session->sess_destroy();
		$this->load->view('cliente/Login_cliente');
	}

	
}