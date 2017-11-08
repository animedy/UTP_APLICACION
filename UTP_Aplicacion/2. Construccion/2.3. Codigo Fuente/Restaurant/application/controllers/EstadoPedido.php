<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EstadoPedido extends CI_Controller 
{

	function __construct() 
	{
		parent::__construct();
		
	}



	/**
		* Actualiza el estados de los pedidos segun su id.
		*
		* @author Carlos Sanchez Aquino
		* 	
		* @param idprogreso
		* @param porhacer
		* @param enprogreso
		* @param completado
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function actualizarestadocaja()
	{
		$datos = $this->input->post();
		if (isset($datos)) {
			$idprogreso 	= $datos["id"];
			$observacion = $datos["descripcion"];
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
				$completado 	= "0";
			}
			$this->load->model('Model_Caja');
			$this->Model_Caja->updateEstado($idprogreso,$porhacer,$enprogreso,$completado,$observacion);
			redirect(base_url('cajero'));
		}
	}
}