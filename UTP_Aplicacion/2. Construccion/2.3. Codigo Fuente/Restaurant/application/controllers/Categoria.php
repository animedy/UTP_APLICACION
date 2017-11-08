<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_tipo_plato');
	}


	/**
		* Lista categorias de plato.
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		* 	fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/
	function listar(){
		$data['categoria'] 	= $this->Model_tipo_plato->get_Categoria();
		$this->load->view('admin/categoria',$data);
	}
	

	/**
		* Inserta una nueva categoria.
		*
		* @author Carlos Sanchez Aquino
		* 	
		* @param nombre
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
			$this->Model_tipo_plato->insertCategoria($nombre);
			redirect(base_url('categoria'));
		}
	}


	/**
		* Elimina un plato existente.
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		*
		* @param id 	
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017			
	*/
	function eliminar($id=NULL)
	{
		if ($id != NULL) {
			$this->Model_tipo_plato->deleteCategoria($id);
			redirect(base_url('categoria'));
		}
		
	}
}