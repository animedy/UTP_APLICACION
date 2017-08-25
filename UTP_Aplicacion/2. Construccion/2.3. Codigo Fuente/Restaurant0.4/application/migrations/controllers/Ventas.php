<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_ventas');
	}


	/**
		* Lista las ventas del Mes Actual.
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function listar(){
		$data['ventas'] = $this->model_ventas->GetVentasDelMes();
		$this->load->view('admin/ventas_del_mes',$data);
	}

	
}