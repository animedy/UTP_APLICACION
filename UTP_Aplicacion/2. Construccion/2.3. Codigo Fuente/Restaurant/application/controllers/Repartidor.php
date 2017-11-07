<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Repartidor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_repartidor');
	}

	function insertar()
	{
		$datos = $this->input->post();
		if (isset($datos)) {
			$idpedidoasignado 	= 	$datos['idrepartidor'];
			$repartidor 		= 	$datos['asignacion_repartidor'];
			$this->model_repartidor->insert($idpedidoasignado,$repartidor);
			redirect(base_url('pedidos'));
		}
	}
}