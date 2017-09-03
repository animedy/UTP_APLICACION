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

	/**
		* Lista los platos listos para ser cocinados.
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getPedido()
	{
		$query = $this->db->get('pedidos');
        $this->db->where('Estado_Administrador', '1');
        $this->db->where('Estado_Cocinero', '1');
        $this->db->where('Estado_Cajero', '0');
        $this->db->order_by('idPedidos');
        return $query->result();
	}

	/**
		* Lista los platos listos para ser cocinados.
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getVistaPedido()
	{
		$query = $this->db->get('vista_pedidos_en_progreso');
        $this->db->order_by('Fecha_y_hora_pedido');
        return $query->result();
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
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
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
