<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caja extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_caja');
	}

	/**
		* Lista los pedidos y documentos para ser enviados a la vista a traves de un variable
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function ListarPedidos()
	{
		//lista los pedidos para generar documento
		$data['listapedidos'] = $this->Model_caja->getListaPedidos();
		
		//lista los documentos que aun no an sido pagados
		$data['ListarPorCancelar'] = $this->Model_caja->getListarPorCancelarDocumento();

		//lista los documentos que an sido pagados
		$data['ListarCancelados'] = $this->Model_caja->getListarCanceladoDocumento();

		//redireccionamos a la vista enviando un array a la variable
		$this->load->view('cajero/cajero',$data);
	}

	/**
		* Lista los documentos que an sido anulados para ser enviados a la vista a traves de un variable
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function ListaPedidosAnulados()
	{
		//lista los documentos anulados
		$data['ListarAnulados'] = $this->Model_caja->DocumentosAnulados();

		//redireccionamos a la vista enviando un array a la variable
		$this->load->view('cajero/anula_documento',$data);
	}
	
	/**
		*  Envia los datos del pedido segun el parametro id 
		*
		* @author Carlos Sanchez Aquino
		*
		* @param id
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function VerDocumento($id = NULL)
	{
		if ($id != NULL) 
		{
			//envia los datos de la cabecera segun el id 
			$edit_docu['docu'] = $this->Model_caja->getPedidoById($id);
			
			//envia los datos del detalle
			$edit_docu['deta'] = $this->Model_caja->getPedidoDetalle(); 
			
			//redireccionamos a la vista enviando un array a la variable
			$this->load->view('cajero/generar_documento', $edit_docu);
		}
	}

	/**
		*  Envia los datos del detalle pedido segun parametro id
		*
		* @author Carlos Sanchez Aquino
		*
		* @param id
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function VerDetalleDocumento($id = NULL)
	{
		if ($id != NULL) 
		{
			//envia los datos del datalle pedido segun el id 
			$data['detallepedido'] = $this->Model_caja->getPedidoDetalleById($id);
			
			//redireccionamos a la vista enviando un array a la variable
			$this->load->view('cajero/ver_documento', $data);
		}
	}

	/**
		*  Envia los datos del documento para ser impresos segun el parametro id 
		*
		* @author Carlos Sanchez Aquino
		*
		* @param id
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function Documento($id = NULL)
	{
		if ($id != NULL) 
		{
			//envia los datos del documento segun el id 
			$edit_docu['impri'] = $this->Model_caja->getPedidoById($id);
			
			//envia los datos del detalle
			$edit_docu['deta'] = $this->Model_caja->getPedidoDetalle(); 

			//redirecciona a la vista enviando un variable 
			$this->load->view('cajero/imprime_documento', $edit_docu);
		}
	}

	/**
		* Lista los documentos que an sido anulados para ser enviados a la vista a traves de un variable
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function ListarDocuAnulados()
	{
		//lista los documentos anulados
		$data['ListarAnulados'] = $this->Model_caja->getListarAnulados();

		//redireccionamos a la vista enviando un array a la variable
		$this->load->view('cajero/anula_documento',$data);
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
	*/
	function Documentocancelado($id = NULL)
	{	
		if ($id != NULL)
		{
			$estadoboleta=2;
			//actualiza el documento segun los parametros 
			$this->Model_caja->ActualizarDocumentoCancelado($id,$estadoboleta);
			
			//redireciona a la vista actual 
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
	*/
	function Documentoanulado($id = NULL)
	{
		if ($id != NULL)
		{
			$estadoboleta=3;
			//actualiza el documento segun los parametros 
			$this->Model_caja->ActualizarDocumentoAnulado($id,$estadoboleta);

			//redireciona a la vista actual 
			redirect(base_url('cajero'));
		}
	}


	function insertardocumento()
	{
		$this->model_caja->insertCaja();
	}
}