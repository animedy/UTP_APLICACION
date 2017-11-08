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

	function getPedidosDelDia(){
		$query = $this->db->get('vista_pedidos');
		$this->db->order_by('idPedidos');
        return $query->result();
	}



	function getPedidosReporte()
	{
		$query = $this->db->get('vista_reporte_pedidos');
        $this->db->order_by('idPedidos');
        return $query->result();
	}

	function getPedidoPorHacer()
	{
		$query = $this->db->get('pedidos');
        $this->db->where('Estado_Administrador', '1');
        $this->db->where('Estado_Cocinero', '0');
        $this->db->where('Estado_Cajero', '0');
        $this->db->order_by('idPedidos');
        return $query->result();
	}

	function getPedidoEnProgreso()
	{
		$query = $this->db->get('pedidos');
        $this->db->where('Estado_Administrador', '1');
        $this->db->where('Estado_Cocinero', '1');
        $this->db->where('Estado_Cajero', '0');
        $this->db->order_by('idPedidos');
        return $query->result();
	}

	function getPedidoCompletado()
	{
		$query = $this->db->get('pedidos');
        $this->db->where('Estado_Administrador', '1');
        $this->db->where('Estado_Cocinero', '1');
        $this->db->where('Estado_Cajero', '1');
        $this->db->order_by('idPedidos');
        return $query->result();
	}

	function getVistaPedidoEnProgreso()
	{
		$query = $this->db->get('vista_pedidos_en_progreso');
        $this->db->order_by('Fecha');
        return $query->result();
	}

	function getVistaPedidoCompletado()
	{
		$query = $this->db->get('vista_pedidos_completados');
        $this->db->order_by('Fecha');
        return $query->result();
	}

	function getVistaPedidoPorHacer()
	{
		$query = $this->db->get('vista_pedidos_por_hacer');
        $this->db->order_by('Fecha');
        return $query->result();
	}



	function getPedidoById($id)
	{
		$this->db->limit(1);
		$this->db->where('id',$id);
		$query = $this->db->get('pedidos');
        return $query->result();
	}
	function deletePedido($id){
		$this->db->where('idPedidos',$id);
		$query = $this->db->delete('pedidos');
	}

	function updatePedido($id,$nombre,$apellido,$sueldo,$fecha_nacimiento,$dni,$direccion,$telefono,$celular,$email,$fecha_ingreso,$fecha_salida,$estado,$sexo,$password)
	{
		$array = array(
			'nombre'=> $nombre,
			'apellido'=> $apellido,
			'sueldo'=> $sueldo,
			'fecha_nacimiento'=> $fecha_nacimiento,
			'dni'=> $dni,
			'direccion'=> $direccion,
			'telefono'=> $telefono,
			'celular'=> $celular,
			'email'=> $email,
			'fecha_ingreso'=> $fecha_ingreso,
			'fecha_salida'=> $fecha_salida,
			'estado'=> $estado,
			'sexo'=> $sexo,
			'password'=> $password
		);
		$this->db->where('idPedidos',$id);
		$this->db->update('pedidos',$array);
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


	/* Reportes de Pedidos*/
	function getVistaReporteCompletado()
	{
		$query = $this->db->get('vista_reporte_completado');
        $this->db->order_by('Comanda');
        return $query->result();
	}

	function getVistaReporteDevueltos()
	{
		$query = $this->db->get('vista_reporte_devueltos');
        $this->db->order_by('Comanda');
        return $query->result();
	}

	function getPedidosPorFecha($fecha_inicial,$fecha_final)
	{
		
		$this->db->where('Fecha >=', $fecha_inicial);
        $this->db->where('Fecha <=', $fecha_final);
        $query = $this->db->get('vista_reporte_pedidos');
        return $query->result();
	}

	function getPedidosPorComanda($comanda)
	{
		$this->db->where('Comanda', $comanda);
        $query = $this->db->get('vista_reporte_pedidos');
        return $query->result();
	}

	function getPedidosPorEstado($Estado_Administrador,$Estado_Cocinero,$Estado_Cajero)
	{
		$this->db->where('Estado_Administrador', $Estado_Administrador);
		$this->db->where('Estado_Cocinero', $Estado_Cocinero);
		$this->db->where('Estado_Cajero', $Estado_Cajero);
        $query = $this->db->get('vista_reporte_pedidos');
        return $query->result();
	}

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

}
