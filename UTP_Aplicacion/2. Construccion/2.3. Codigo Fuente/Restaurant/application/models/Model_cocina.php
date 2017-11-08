<?php
/**
* 
*/
class Model_cocina extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPedido()
	{
		$query = $this->db->get('pedidos');
        $this->db->where('Estado_Administrador', '1');
        $this->db->where('Estado_Cocinero', '1');
        $this->db->where('Estado_Cajero', '0');
        $this->db->order_by('idPedidos');
        return $query->result();
	}


	function getVistaPedido()
	{
		$query = $this->db->get('vista_pedidos_en_progreso');
        $this->db->order_by('Fecha_y_hora_pedido');
        return $query->result();
	}

	function updateEstado($idprogreso,$porhacer,$enprogreso,$completado)
	{
		$array = array(
			'Estado_Administrador'	=> $porhacer,
			'Estado_Cocinero'		=> $enprogreso,
			'Estado_Cajero'			=> $completado
		);
		$this->db->where('idPedidos',$idprogreso);
		$this->db->update('pedidos',$array);
	}
}
