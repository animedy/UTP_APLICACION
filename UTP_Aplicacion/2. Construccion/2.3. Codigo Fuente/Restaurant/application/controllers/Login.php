<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_empleado');
	}

	/**
		* Verifica si el usuario existe para darle el acceso segun el rol o de acuerdo a la session establecida.
		*
		* @author Ricardo Palacios Arce
		*
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
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function index()
	{
		if( $this->session->userdata('id') )
		{
			if($this->session->userdata('rol')=='ADMINISTRADOR')
				$this->load->view('admin/admin');
			elseif($this->session->userdata('rol')=='CAJERO')
				$this->load->view('cajero/admin');
			elseif($this->session->userdata('rol')=='COCINA')
				redirect(base_url()."cocina");
			return 0;
		}
		else
		{
			$login = $this->input->post('login');
			$password = $this->input->post('password');
		}
		if($login!='' and $password!='')
		{
			$this->load->model('Model_empleado');
			$password = md5($password);
			$empleado = $this->Model_empleado->getEmpleadoLogin($login,$password);
			if($empleado->num_rows() > 0)
			{
				$empleado = $empleado->row();
				$this->session->set_userdata('id',$empleado->idEmpleados);
				$this->session->set_userdata('login',$login);
				$this->session->set_userdata('password',$password);
				$this->session->set_userdata('nombre',$empleado->Nombres);
				$this->session->set_userdata('apellido',$empleado->Apellidos);
				$this->session->set_userdata('rol',$empleado->Rol);
				$this->session->set_userdata('sexo',$empleado->Sexo);
				$this->session->set_userdata('estado',$empleado->Estado);
				if($this->session->userdata('rol')=='ADMINISTRADOR')
					$this->load->view('admin/admin');
				elseif($this->session->userdata('rol')=='CAJERO')
					$this->load->view('cajero/admin');
				elseif($this->session->userdata('rol')=='COCINA')
					//$this->load->view('cocina/cocina');
					redirect(base_url()."cocina");
			}
			else
			{
				$data['error']="Error de contrase&ntilde;a";
				$this->load->view('login',$data);
			}
		}
		else
		{
			$data['error']="Ingrese sus datos";
			$this->load->view('login',$data);
		}
	}

	/**
		* Lista los empleados.
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function listar()
	{
		$data['empleados'] = $this->Model_empleado->getEmpleado();
		$this->load->view('admin/empleados',$data);
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
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function insertar()
	{
		$datos = $this->input->post();
		if (isset($datos)) 
		{
			$nombre				= $datos["nombre"];
			$apellido			= $datos["apellido"];
			$rol_idrol			= $datos["cargo"];
			$fecha_nacimiento	= date("Y-m-d",strtotime($datos["fec_nac"]));
			$dni 				= $datos["dni"];
			$direccion 			= $datos["direccion"];
			$celular			= $datos["celular"];
			$email 				= $datos["email"];
			$fecha_ingreso		= $datos["fec_in"];
			$estado				= $datos["estado"];
			$login				= $datos["usuario"];
			$sexo 				= $datos["account"];
			$password			= $datos["password"];
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
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function salir()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}

	/**
		* Obtiene un empleado segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function editar($id = NULL)
	{
		if ($id != NULL)
		{
			$edit_emp['a'] = $this->Model_empleado->getEmpleadoById($id);
			$this->load->view('admin/editar_empleado', $edit_emp);
		}
	}

	/**
		* Elimina un empleado segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id	
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function eliminar($id = NULL)
	{
		if ($id != NULL) 
		{
			$this->Model_empleado->deleteEmpleado($id);
			redirect(base_url('empleados'));
		}
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
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function actualizar()
	{
		$datos = $this->input->post();
		if (isset($datos)) 
		{
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
			if ($datos["fec_in"]==null) 
			{
				$fecha_ingreso = "0000-00-00";
			}
			else
			{
				$fecha_ingreso		= date("Y-m-d",strtotime($datos["fec_in"]));
			}
			$estado				= $datos["estado"];
			$sexo 				= $datos["account"];
			$password			= $datos["password"];
			$this->Model_empleado->updateEmpleado($id,$nombre,$apellido,$rol_idrol,$fecha_nacimiento,$dni,$direccion,$celular,$usuario,$email,$fecha_ingreso,$estado,$sexo,$password);
			redirect(base_url('empleados'));
		}
	}
}
