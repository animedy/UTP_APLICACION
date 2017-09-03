<?php
/**
* 
*/
class Model_pedido extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
		* Lista los pedidos
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getPedidos()
	{
		$query = $this->db->get('vista_reporte_pedidos');
        $this->db->order_by('idPedidos');
        return $query->result();
	}

	
	/**
		* Lista los pedidos por hacer
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getPedidoPorHacer()
	{
		$query = $this->db->get('pedidos');
        $this->db->where('Estado_Administrador', '1');
        $this->db->where('Estado_Cocinero', '0');
        $this->db->where('Estado_Cajero', '0');
        $this->db->order_by('idPedidos');
        return $query->result();
	}

	/**
		* Lista los pedidos en progreso
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getPedidoEnProgreso()
	{
		$query = $this->db->get('pedidos');
        $this->db->where('Estado_Administrador', '1');
        $this->db->where('Estado_Cocinero', '1');
        $this->db->where('Estado_Cajero', '0');
        $this->db->order_by('idPedidos');
        return $query->result();
	}

	/**
		* Lista los pedidos completados
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getPedidoCompletado()
	{
		$query = $this->db->get('pedidos');
        $this->db->where('Estado_Administrador', '1');
        $this->db->where('Estado_Cocinero', '1');
        $this->db->where('Estado_Cajero', '1');
        $this->db->order_by('idPedidos');
        return $query->result();
	}

	
	/**
		* Lista los pedidos en progreso
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getVistaPedidoEnProgreso()
	{
		$query = $this->db->get('vista_pedidos_en_progreso');
        $this->db->order_by('Fecha');
        return $query->result();
	}

	/**
		* Lista los pedidos completados
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getVistaPedidoCompletado()
	{
		$query = $this->db->get('vista_pedidos_completados');
        $this->db->order_by('Fecha');
        return $query->result();
	}

	/**
		* Lista los pedidos por hacer
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getVistaPedidoPorHacer()
	{
		$query = $this->db->get('vista_pedidos_por_hacer');
        $this->db->order_by('Fecha');
        return $query->result();
	}


	/**
		* Lista el pedido por parametro 
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getPedidoById($id)
	{
		$this->db->limit(1);
		$this->db->where('id',$id);
		$query = $this->db->get('pedidos');
        return $query->result();
	}

	/**
		* Elimina un pedido por parametro 
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function deletePedido($id)
	{
		$this->db->where('idPedidos',$id);
		$query = $this->db->delete('pedidos');
	}

	/**
		* Actualiza un pedido 
		*
		* @author Ricardo Palacios Arce
		*
		* @param id
		* @param Fecha
		* @param Hora_Pedido
		* @param Clientes_idCliente
		* @param Total
		* @param Estado_Administrador
		* @param Estado_Cocinero
		* @param Estado_Cajero
		* @param Comanda
		* @param ObservacionAdministrador
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function updatePedido($id,$Fecha,$Hora_Pedido,$Clientes_idCliente,$Total,$Estado_Administrador,$Estado_Cocinero,$Estado_Cajero,$Comanda,$ObservacionAdministrador)
	{
		$array = array(
			'Fecha'=> $Fecha,
			'Hora_Pedido'=> $Hora_Pedido,
			'Clientes_idCliente'=> $Clientes_idCliente,
			'Total'=> $Total,
			'Estado_Administrador'=> $Estado_Administrador,
			'Estado_Cocinero'=> $Estado_Cocinero,
			'Estado_Cajero'=> $Estado_Cajero,
			'Comanda'=> $Comanda,
			'ObservacionAdministrador'=> $ObservacionAdministrador,
			
		);
		$this->db->where('idPedidos',$id);
		$this->db->update('pedidos',$array);
	}

	/**
		* Registra un pedido.
		*
		* @author Juan Jose Paz Chalco
		*
		* @param Fecha
		* @param Hora_Pedido
		* @param Clientes_idCliente
		* @param Total
		* @param Estado_Administrador
		* @param Estado_Cocinero
		* @param Estado_Cajero
		* @param Comanda
		* @param ObservacionAdministrador
		*
		* fecha creacion: 22/08/2017
		* fecha modificacion: 25/08/2017	
	*/
	function insertPedido($Fecha,$Hora_Pedido,$Clientes_idCliente,$Total,$Estado_Administrador,$Estado_Cocinero,$Estado_Cajero,$Comanda,$ObservacionAdministrador)
	{
		$array = array(
			'Fecha'=> $Fecha,
			'Hora_Pedido'=> $Hora_Pedido,
			'Clientes_idCliente'=> $Clientes_idCliente,
			'Total'=> $Total,
			'Estado_Administrador'=> $Estado_Administrador,
			'Estado_Cocinero'=> $Estado_Cocinero,
			'Estado_Cajero'=> $Estado_Cajero,
			'Comanda'=> $Comanda,
			'ObservacionAdministrador'=> $ObservacionAdministrador	
		);
		$this->db->insert('pedidos',$array);
		return $this->db->insert_id();
	}
	
	/**
		* Actualiza los estados de los pedidos.
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

	/**
		* Lista los pedidos completados.
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getVistaReporteCompletado()
	{
		$query = $this->db->get('vista_reporte_completado');
        $this->db->order_by('Comanda');
        return $query->result();
	}

	/**
		* Lista los pedidos devueltos.
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getVistaReporteDevueltos()
	{
		$query = $this->db->get('vista_reporte_devueltos');
        $this->db->order_by('Comanda');
        return $query->result();
	}

	/**
		* Lista los pedidos Por Fechas.
		*
		* @author Ricardo Palacios Arce
		* 
		* @param $fecha_inicial
		* @param $fecha_final
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getPedidosPorFecha($fecha_inicial,$fecha_final)
	{
		
		$this->db->where('Fecha >=', $fecha_inicial);
        $this->db->where('Fecha <=', $fecha_final);
        $query = $this->db->get('vista_reporte_pedidos');
        return $query->result();
	}

	/**
		* Lista los pedidos parametros.
		*
		* @author Ricardo Palacios Arce
		* 
		* @param $comanda
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getPedidosPorComanda($comanda)
	{
		$this->db->where('Comanda', $comanda);
        $query = $this->db->get('vista_reporte_pedidos');
        return $query->result();
	}

	/**
		* Lista los pedidos segun estados.
		*
		* @author Ricardo Palacios Arce
		* 
		* @param $Estado_Administrador
		* @param $Estado_Cocinero
		* @param $Estado_Cajero
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getPedidosPorEstado($Estado_Administrador,$Estado_Cocinero,$Estado_Cajero)
	{
		$this->db->where('Estado_Administrador', $Estado_Administrador);
		$this->db->where('Estado_Cocinero', $Estado_Cocinero);
		$this->db->where('Estado_Cajero', $Estado_Cajero);
        $query = $this->db->get('vista_reporte_pedidos');
        return $query->result();
	}
}
