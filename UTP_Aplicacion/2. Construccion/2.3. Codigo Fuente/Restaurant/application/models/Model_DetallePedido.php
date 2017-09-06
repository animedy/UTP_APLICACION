<?php
class Model_DetallePedido extends CI_Model
{
function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
		* Inserta un nuevo detalle pedido.
		* 
		*  @author Juan Jose Paz Chalco
		*
		* @param Cantidad
		* @param Observacion
		* @param idPedidos
		* @param idPlatos
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function insertDetallePedido($Cantidad,$Observacion,$idPedidos,$idPlatos)
	{
		$array = array(
			'Cantidad'=> $Cantidad,
			'Observacion'=> $Observacion,
			'Pedidos_idPedidos'=> $idPedidos,
			'Platos_idPlatos'=> $idPlatos
		);
		$this->db->insert('detallepedido',$array);
		return $this->db->insert_id();
	}
}