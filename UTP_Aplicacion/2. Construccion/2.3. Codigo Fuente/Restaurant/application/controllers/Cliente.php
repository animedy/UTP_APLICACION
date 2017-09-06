<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_cliente');
	}

	/**
		* lista los datos de los distritos 
		*
		* @author Juan Jose Paz Chalco
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function Registrar()
	{
		$this->load->model('model_distrito');
		$data['distritos'] = $this->model_distrito->getDistrito();
		$this->load->view('cliente/registrarse',$data);
	}

	/**
		* Lista los Clientes y los distritos.
		*
		* @author Juan Jose Paz Chalco
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function listar()
	{
		$this->load->model('model_distrito');
		$data['distritos'] = $this->model_distrito->getDistrito();
		$data['clientes'] = $this->model_cliente->getCliente();
		$this->load->view('admin/clientes',$data);
	}

	/**
		* Inserta un nuevo cliente.
		* 
		*  @author Juan Jose Paz Chalco
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
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function insertar()
	{
		$datos = $this->input->post();
		if (isset($datos))
		{
			$nombre 			= $datos["nombre"];
			$dni				= $datos["dni"];
			$sexo				= $datos["sexo"];
			$direccion			= $datos["direccion"];
			$celular			= $datos["celular"];
			$telefono			= $datos["telefono"];
			$correo				= $datos["correo"];
			$contrasena			= $datos["contrasena"];
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

	/**
		* Inserta un nuevo cliente por el administrador
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
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function InsertarCliente()
	{
		$datos = $this->input->post();
		if (isset($datos)) 
		{
			$nombre 			= $datos["nombre"];
			$dni				= $datos["dni"];
			$sexo				= $datos["sexo"];
			$direccion			= $datos["direccion"];
			$celular			= $datos["celular"];
			$telefono			= $datos["telefono"];
			$correo				= $datos["correo"];
			$contrasena			= $datos["contrasena"];
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
		* Muesra la informacion del cliente por su id para ser editado 
		* 
		* @author Ricardo Palacios Arce
		*
		* @param id
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function editar($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->load->model('model_usuario');
			$this->load->model('model_distrito');
			$edit_cli['distritos'] 		= $this->model_distrito->getDistrito();
			$edit_cli['editar_usuario'] = $this->model_usuario->getUsuarioById($id);
			$edit_cli['editar_cliente'] = $this->model_cliente->getClienteById($id);
			$this->load->view('admin/editar_cliente', $edit_cli);
		}
	}

	/**
		* Elimina un cliente existente.
		* 
		* @author Ricardo Palacios Arce
		*
		* @param id
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function eliminar($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->load->model('model_usuario');
			$this->model_usuario->deleteUsuario($id);
			$this->model_cliente->deleteCliente($id);
			redirect(base_url('clientes'));
		}
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
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function actualizar()
	{
		$datos = $this->input->post();
		if (isset($datos)) 
		{
			$id 				= $datos["id"];
			$nombre				= $datos["nombre"];
			$dni 				= $datos["dni"];
			$sexo 				= $datos["sexo"];
			$direccion 			= $datos["direccion"];
			$correo 			= $datos["correo"];
			$contrasena			= $datos["contrasena"];
			$estado				= $datos["estado"];
			$telefono			= $datos["telefono"];
			$celular			= $datos["celular"];
			$distrito			= $datos["distrito"];
			$referencia			= $datos["referencia"];
			$this->model_cliente->updateCliente($id,$nombre,$dni,$sexo,$direccion,$estado,$telefono,$celular,$distrito,$referencia);
			$this->load->model('model_usuario');
			$this->model_usuario->updateUsuario($id,$correo,$contrasena);
			redirect(base_url('clientes'));
		}
	}
}