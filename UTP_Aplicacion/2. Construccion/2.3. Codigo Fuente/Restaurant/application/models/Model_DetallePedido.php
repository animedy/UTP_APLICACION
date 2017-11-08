<?php
class Model_DetallePedido extends CI_Model
{
function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

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