<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caja extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_caja');
	}

	/**
		* Lista las areas del hotel.
		*
		* @author Ricardo Palacios Arce
		* @param integer $pagina página		
	*/
		
	function listar(){
		$this->load->model('model_sucursal');
		$data['sucursal'] = $this->model_sucursal->get_sucursal();
		$data['cajas'] = $this->model_caja->get_caja();
		$this->load->view('admin/cajas',$data);
	}


	function grabar(){
		$this->model_caja->insertCaja();
	}
}