<?php
class Model_Documento extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	
	/**
        * lista los documentos 
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    */
	function getDocumento()
	{
		$query = $this->db->get('documentoboleta');
        $this->db->order_by('idDocumentoBoleta');
        return $query->result();
	}

	/**
        * lista los documentos por parametro id 
        *
        * @author Carlos Sanchez Aquino
        *
        * @param id
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    */
	function getBoletaById($id)
	{
		$this->db->limit(1);
		$this->db->where('idDocumentoBoleta',$id);
		$query = $this->db->get('documentoboleta');
        return $query->result();
	}

	/**
		* Inserta un nuevo documento.
		* 
		* @author Carlos Sanchez Aquino
		*
		* @param nombre
		* @param dni
		* @param total
		* @param fecha
		* @param hora
		* @param pedido
		* @param estado
		* @param empleado	
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function insertBoleta($nombre,$dni,$fecha,$hora,$pedido,$estado,$empleado)
	{
		$array = array(
			'Nombre'					=> $nombre,
			'Dni'						=> $dni,
			'Total'						=> 0,
			'Fecha_Emision'					=> $fecha,
			'Hora_Emision'					=> $hora,
			'Pedidos_idPedidos'					=> $pedido,
			'EstadoBoleta_idEstadoPedido'					=> $estado,
			'Empleados_idEmpleados'			=> $empleado
		);
		$this->db->insert('documentoboleta',$array);
		return $this->db->insert_id();
	}

	/**
		* Actualiza un documento segun id.
		* 
		* @author Carlos Sanchez Aquino
		*
		* @param idboleta
		* @param total
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function updateBoleta($idboleta,$total)
	{
		$array = array(
			'Total'						=> $total
		);
		$this->db->where('idDocumentoBoleta',$idboleta);
		$this->db->update('documentoboleta',$array);
	}
	
}
