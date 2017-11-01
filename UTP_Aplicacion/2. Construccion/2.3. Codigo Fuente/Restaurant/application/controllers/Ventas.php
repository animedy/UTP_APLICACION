<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_ventas');
	}


	/**
		* Lista las ventas del día Actual.
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function listar(){
		$data['ventas'] = $this->model_ventas->GetVentasDelDia();
		$this->load->view('admin/ventas_del_dia',$data);
	}

	/**
		* Lista las ventas del Mes Actual.
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function ListarVentasDelMes(){
		$fecha = date('Y-m');
		$data['ventas'] = $this->model_ventas->GetVentasDelMes($fecha);
		$this->load->view('admin/ventas_del_mes',$data);
	}

	
}