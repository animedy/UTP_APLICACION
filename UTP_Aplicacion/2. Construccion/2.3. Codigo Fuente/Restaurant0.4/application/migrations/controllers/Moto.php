<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moto extends CI_Controller {

	function __construct()
	{
		parent::__construct();
			$this->load->model('model_moto');
	}

	/**
		* Lista las motos, repartidores y empleados asignados.
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function listar(){
		$this->load->model('model_tipo_empleado');
		$this->load->model('model_empleado');
		$data['repartidores']	= $this->model_tipo_empleado->getTipoEmpleadoRepartidor();
		$data['empleados']	= $this->model_empleado->getEmpleado();
		$data['motos'] 		= $this->model_moto->getMoto();
		$this->load->view('admin/motos',$data);
	}

	/**
		* Edita los empleados asginados auna moto segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id	
	*/


	function editar($id = NULL){
		if ($id != NULL) {
			$this->load->model('model_tipo_empleado');
			$this->load->model('model_empleado');
			$data['repartidores']	= $this->model_tipo_empleado->getTipoEmpleadoRepartidor();
			$data['empleados']	= $this->model_empleado->getEmpleado();
			$data['a'] = $this->model_moto->getMotoById($id);
			$this->load->view('admin/editar_moto', $data);
		}
	}

	/**
		* Elimina los empleados asginados auna moto segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id	
	*/

	function eliminar($id = NULL){
		if ($id != NULL) {
		$this->model_moto->deleteMoto($id);
		redirect(base_url('motos'));
		}
	}



	/**
		* Actualiza los empleados asginados auna moto segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id	
		* @param placa
		* @param marca
		* @param soat
		* @param estado
		* @param empleado
	*/
	function actualizar(){
		$datos = $this->input->post();
		if (isset($datos)) {
			$id 				= $datos["id"];
			$placa				= $datos["placa"];
			$marca				= $datos["marca"];
			$soat				= $datos["soat"];
			$estado				= $datos["estado"];
			$empleado			= $datos["empleado"];
			$this->model_moto->updateMoto($id,$placa,$marca,$soat,$estado,$empleado);
			redirect(base_url('motos'));
		}
	}
	/**
		* Actualiza los empleados asginados auna moto segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param placa
		* @param marca
		* @param soat
		* @param estado
		* @param empleado
	*/
	function insertar(){
		$datos = $this->input->post();
		if (isset($datos)) {
			$placa				= $datos["placa"];
			$marca				= $datos["marca"];
			$soat				= $datos["soat"];
			$empleado			= $datos["empleado"];
			$this->model_moto->insertMoto($placa,$marca,$soat,$empleado);
			redirect(base_url('motos'));
		}
	}
}