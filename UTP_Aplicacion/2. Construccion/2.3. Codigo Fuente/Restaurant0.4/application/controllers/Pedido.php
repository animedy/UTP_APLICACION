<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_pedido');
	}

	/**
		* Lista los pedidos por hacer, pedidos en progreso y pedidos completados.
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function listar(){
		$data['porhacer'] 	= $this->model_pedido->getPedidoPorHacer();
		$data['vistaporhacer'] 	= $this->model_pedido->getVistaPedidoPorHacer();

		$data['progreso'] 	= $this->model_pedido->getPedidoEnProgreso();
		$data['vistaenprogreso'] = $this->model_pedido->getVistaPedidoEnProgreso();
		

		$data['completado'] 	= $this->model_pedido->getPedidoCompletado();
		$data['vistacompletado'] = $this->model_pedido->getVistaPedidoCompletado();
		$this->load->view('admin/pedidos',$data);
	}

	/**
		* Lista los pedidos completados (Reporte).
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function listarpedidosatendidos(){
		$data['reportecompletados'] = $this->model_pedido->getVistaReporteCompletado();
		$this->load->view('admin/reporte_pedidos_atendidos',$data);
	}

	/**
		* Lista los pedidos devueltos (Reporte).
		*
		* @author Ricardo Palacios Arce
		* 	
	*/

	function listarpedidosdevueltos(){
		$data['reportedevueltos'] = $this->model_pedido->getVistaReporteDevueltos();
		$this->load->view('admin/reporte_pedidos_devueltos',$data);
	}

	/**
		* Actualiza los estados de los pedidos segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param idprogreso
		* @param porhacer
		* @param enprogreso
		* @param completado
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
			$this->model_pedido->updateEstado($idprogreso,$porhacer,$enprogreso,$completado);
			//echo "por hacer " . " " .$porhacer . "<br> en progreso " . " " .$enprogreso . "<br> Completado" . " " .$completado; 
			redirect(base_url('pedidos'));
		}
		
	}
}