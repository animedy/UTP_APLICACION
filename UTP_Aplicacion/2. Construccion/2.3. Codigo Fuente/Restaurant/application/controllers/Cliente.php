<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_cliente');
		$this->load->model('Model_cliente');
		$this->load->helper('my_helper');
	}

	
	/**
		* autentica el Dni del usuario para recuperar su contraseña.
		*
		* @author Juan Jose Paz Chalco
		* 	
	*/

function Contrasena(){
$login = $this->input->post('login');
$Dni = $this->input->post('Dni');
	if($login!='' and $Dni!='')
		{

			$this->load->model('model_cliente');
			
			$cliente = $this->Model_cliente->getrestartLogin($login,$Dni);
			
			if($cliente->num_rows() > 0)
				{
				$cliente = $cliente->row();
				$this->session->set_userdata('id',$cliente->idCliente);
				
				redirect(base_url('Cliente/ActualizarContrasena'));
		
				}else {
					$data['error']="error de contraseña";
					 $this->load->view('cliente/Recuperar',$data);
					 }
		}
		else    {
			 $data['error']="Ingrese sus datos";
			 $this->load->view('cliente/Recuperar',$data);
			
		 		}
}
	/**
		* registra los Clientes y los distritos.
		*
		* @author Juan Jose Paz Chalco
		* 	
	*/
	function Registrar(){
		$this->load->model('model_distrito');
		$data['distritos'] = $this->model_distrito->getDistrito();
		
		$this->load->view('cliente/NuevoCliente',$data);
	}


	/**
		* Lista los Clientes y los distritos.
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function listar(){
		$this->load->model('model_distrito');
		$data['distritos'] = $this->model_distrito->getDistrito();
		$data['clientes'] = $this->model_cliente->getCliente();
		$this->load->view('admin/clientes',$data);
	}

	/**
		* Inserta un nuevo cliente.
		* 
		* @author Ricardo Palacios Arce
		*
		* @param nombre
		* @param dni
		* @param sexo
		* @param direccion
		* @param celular
		* @param telefono
		* @param correo
		* @param contrasena	
		* @param estado
		* @param fecha_registro
		* @param distrito
		* @param referencia
		* @param id_cliente
	*/

	function insertar(){
		$datos = $this->input->post();
		if (isset($datos)) {
			$nombre 			= $datos["nombre"];
			$dni				= $datos["dni"];
			$sexo				= $datos["sexo"];
			$direccion			= $datos["direccion"];
			$celular			= $datos["celular"];
			$telefono			= $datos["telefono"];
			$correo				= $datos["correo"];
			$contrasena			= encriptar($datos["contrasena"]);
			$estado				= 'A';
			$fecha_registro		= date('Y-m-d');
			$distrito			= $datos["distrito"];
			$referencia			= $datos["referencia"];
			$id_cliente 		= $this->model_cliente->insertCliente($nombre,$dni,$sexo,$direccion,$celular,$telefono,$estado,$fecha_registro,$distrito,$referencia);
			$this->load->model('model_usuario');
			$this->model_usuario->insertUsuario($correo,$contrasena,$id_cliente);
			redirect(base_url('clientes'));
		}
	}

	function InsertarCliente(){
		$datos = $this->input->post();
		if (isset($datos)) {
			$nombre 			= $datos["nombre"];
			$dni				= $datos["dni"];
			$sexo				= $datos["sexo"];
			$direccion			= $datos["direccion"];
			$celular			= $datos["celular"];
			$telefono			= $datos["telefono"];
			$correo				= $datos["correo"];
			$contrasena			= encriptar($datos["contrasena"]);
			$estado				= 'A';
			$fecha_registro		= date('Y-m-d');
			$distrito			= $datos["distrito"];
			$referencia			= $datos["referencia"];
			$id_cliente 		= $this->model_cliente->insertCliente($nombre,$dni,$sexo,$direccion,$celular,$telefono,$estado,$fecha_registro,$distrito,$referencia);
			$this->load->model('model_usuario');
			$this->model_usuario->insertUsuario($correo,$contrasena,$id_cliente);
			redirect(base_url('login_cliente'));
		}
	}

	/**
		* Edita un cliente existente por su id.
		* 
		* @author Ricardo Palacios Arce
		* @author Juan Jose Paz Chalco
		*
		* @param id
	*/

	function editar(){
		$datos = $this->input->post();
		if (isset($datos)) {

			$this->load->model('model_usuario');
			$this->load->model('model_distrito');

			$edit_cli['distritos'] 		= $this->model_distrito->getDistrito();
			$edit_cli['editar_usuario'] = $this->model_usuario->getUsuarioById($this->session->userdata('id'));
			/*$edit_cli['editar_cliente'] = $this->model_cliente->getClienteById($datos["idcliente"]);*/
			$edit_cli['editar_cliente']	= $this->model_cliente->getClienteById($this->session->userdata('id'));
			$this->load->view('cliente/editar_cliente', $edit_cli);
		}
	}
	function ActualizarContrasena(){
		$datos = $this->input->post();
		if (isset($datos)) {

			$this->load->model('model_usuario');
			$this->load->model('model_distrito');

			$edit_cli['distritos'] 		= $this->model_distrito->getDistrito();
			$edit_cli['editar_usuario'] = $this->model_usuario->getUsuarioById($this->session->userdata('id'));
			/*$edit_cli['editar_cliente'] = $this->model_cliente->getClienteById($datos["idcliente"]);*/
			$edit_cli['editar_cliente']	= $this->model_cliente->getClienteById($this->session->userdata('id'));
			$this->load->view('cliente/EditarContrasena', $edit_cli);
		}
	}

	/**
		* Elimina un cliente existente.
		* 
		* @author Ricardo Palacios Arce
		*
		* @param id

	*/

	function eliminar(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post("idcliente");
			$estado = "X";
			$this->model_cliente->deleteCliente($id,$estado);
		}
		/*$datos = $this->input->post();
		if (isset($datos)) {
			$this->load->model('model_usuario');
			$this->model_usuario->deleteUsuario($datos["idcliente"]);
			$this->model_cliente->deleteCliente($datos["idcliente"]);
		redirect(base_url('clientes'));
		}*/
	}

	/**
		* Actualiza un cliente existente.
		* 
		* @author Ricardo Palacios Arce
		*
		* @param id
		* @param nombre
		* @param dni
		* @param sexo
		* @param direccion
		* @param celular
		* @param telefono
		* @param correo
		* @param contrasena	
		* @param estado
		* @param fecha_registro
		* @param distrito
		* @param referencia
		* @param id_cliente
	*/

	function actualizar(){
		$datos = $this->input->post();
		if (isset($datos)) {
			$id 				= $datos["id"];
			$nombre				= $datos["nombre"];
			$dni 				= $datos["dni"];
			$sexo 				= $datos["sexo"];
			$direccion 			= $datos["direccion"];
			$correo 			= $datos["correo"];
			$contrasena			= encriptar($datos["contrasena"]);
			
			$telefono			= $datos["telefono"];
			$celular			= $datos["celular"];
			$distrito			= $datos["distrito"];
			$referencia			= $datos["referencia"];
			$this->model_cliente->updateCliente($id,$nombre,$dni,$sexo,$direccion,$telefono,$celular,$distrito,$referencia);
			$this->load->model('model_usuario');
			$this->model_usuario->updateUsuario($id,$correo,$contrasena);
			redirect(base_url('Carta'));
		}
	}
		/**
		* Actualiza la contraseña del usuario
		* 
		* @author Juan Jose Paz Chalco
		*
		* @param id
		* @param correo
		* @param contrasena	
	*/
	function actualizaringreso(){
		$datos = $this->input->post();
		if (isset($datos)) {
			$id 				= $datos["id"];
			$correo 			= $datos["correo"];
			$contrasena			= encriptar($datos["contrasena"]);
			$this->load->model('model_usuario');
			$this->model_usuario->updateUsuario($id,$correo,$contrasena);
			$this->session->sess_destroy();
			$this->load->view('cliente/Login_Cliente');

		}
	}
}