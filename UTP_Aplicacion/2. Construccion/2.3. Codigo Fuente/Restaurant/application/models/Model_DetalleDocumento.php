<?php
class model_DetalleDocumento extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	/**
		* Inserta el detalle del documento
		* 
		* @author Carlos Sanchez Aquino
		*
		* @param nro
		* @param producto
		* @param cantidad
		* @param precio
		* @param idboleta	
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/	
	function insertBoletaDetalle($nro,$producto,$cantidad,$precio,$idboleta)
	{
		$array = array(
			'Nro'					=> $nro,
			'Producto'					=> $producto,
			'Cantidad'						=> $cantidad,
			'Precio'						=> $precio,
			'DocumentoBoleta_idDocumentoBoleta'				=> $idboleta	
		);
		$this->db->insert('detalledocumentoboleta',$array);
	}
}