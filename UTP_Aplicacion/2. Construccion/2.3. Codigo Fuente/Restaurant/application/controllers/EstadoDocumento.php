<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EstadoDocumento extends CI_Controller 
{

	function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Caja');
		if (!$this->session->userdata('id')) 
		{
			redirect('Login');
		}
	}


	/**
		* Lista los documentos para ser pagados cambiando el estado 
		*
		* @param id
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function Documentocancelado()
	{	
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post("idDocumentoBoleta");
			$estadoboleta=2;
			$this->Model_Caja->ActualizarDocumentoCancelado($id,$estadoboleta);
			redirect(base_url('cajero'));
		}
	}


	/**
		* Lista los documentos para ser anulados cambiando estado
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function Documentoanulado()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post("idDocumentoBoleta");
			$estadoboleta=3;
			$this->Model_Caja->ActualizarDocumentoAnulado($id,$estadoboleta);
			redirect(base_url('cajero'));
		}
	}

}