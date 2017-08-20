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
        $this->db->order_by('Fecha_y_hora_pedido');
        return $query->result();
	}

	function getVistaPedidoCompletado()
	{
		$query = $this->db->get('vista_pedidos_completados');
        $this->db->order_by('Fecha_y_hora_pedido');
        return $query->result();
	}

	function getVistaPedidoPorHacer()
	{
		$query = $this->db->get('vista_pedidos_por_hacer');
        $this->db->order_by('Fecha_y_hora_pedido');
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

}
