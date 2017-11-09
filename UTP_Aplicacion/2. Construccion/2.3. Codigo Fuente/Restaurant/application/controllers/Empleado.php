<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleado extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_empleado');
		//$this->load->helper('my_helper');
		//$this->load->library('recaptcha');
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