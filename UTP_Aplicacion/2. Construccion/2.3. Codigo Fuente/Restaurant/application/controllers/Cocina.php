<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cocina extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_cocina');
	}

	/**
		* Lista los platos listos para ser cocinados.
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function listar(){
		$this->load->model('model_pedido');
		//$data['progreso'] 		= $this->model_cocina->getPedido();
		$data['progreso'] 		=	$this->model_pedido->getPedidosDelDia();
		$data['vistaenprogreso'] = 	$this->model_cocina->getVistaPedido();
		$this->load->view('cocina/cocina',$data);
	}

	/**
		* Actualiza el estado de la comanda.
		*
		* @author Ricardo Palacios Arce
		*
		* @param idprogreso
		* @param porhacer
		* @param enprogreso
		* @param completado
		* 	
		* 	
	*/

	function actualizarestado()
	{
		$datos = $this->input->post();
		if (isset($datos)) {
			$idprogreso 	= $datos["id"];
			if ($datos["porhacer"] == "on") {
				$porhacer 	= "1";
			}else{
			$porhacer 	= "0";
			}
			if ($datos["enprogreso"] == "on") {
				$enprogreso 	= "1";
			}else{
			$enprogreso 	= "0";
			}
			if ($datos["completado"] == "on") {
				$completado 	= "1";
			}
			else{
			$completado 	= "0";
			}
			$this->model_cocina->updateEstado($idprogreso,$porhacer,$enprogreso,$completado);
			//echo "por hacer " . " " .$porhacer . "<br> en progreso " . " " .$enprogreso . "<br> Completado" . " " .$completado; 
			redirect(base_url('cocina/listar'));
		}
		
	}
}