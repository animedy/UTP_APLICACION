<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sucursal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_sucursal');
	}

	function listar(){
		$data['sucursales'] = $this->model_sucursal->get_sucursal();
		$this->load->view('admin/sucursal',$data);
	}

	function grabar(){
		$this->model_sucursal->insertSucursal();
	}
}