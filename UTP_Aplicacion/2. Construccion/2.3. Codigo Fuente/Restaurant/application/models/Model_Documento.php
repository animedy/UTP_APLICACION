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
        * lista los clientes por parametro id 
        *
        * @author Juan Jose Paz Chalco
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
		* Inserta un nuevo cliente.
		* 
		* @author Ricardo Palacios Arce
		*
		* @param nombre
		* @param dni
		* @param sexo
		* @param direccion
		* @param celular
		* @param telefono
		* @param estado
		* @param fecha_registro	
		* @param distrito
		* @param referencia
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function insertBoleta($nombre,$dni,$total,$fecha,$hora,$pedido,$estado,$empleado)
	{
		/*$this->db->query("CALL SP_INSERTAR_DOCUMENTO_BOLETA('$nombre', '$dni', '$total', '$fecha', '$hora','$pedido', '$estado', '$empleado')");
		return $this->db->insert_id();*/

		$array = array(
			'Nombre'					=> $nombre,
			'Dni'						=> $dni,
			'Total'						=> $total,
			'Fecha_Emision'					=> $fecha,
			'Hora_Emision'					=> $hora,
			'Pedidos_idPedidos'					=> $pedido,
			'EstadoBoleta_idEstadoPedido'					=> $estado,
			'Empleados_idEmpleados'			=> $empleado
		);
		$this->db->insert('documentoboleta',$array);
		return $this->db->insert_id();
	}

	
	function insertBoletaDetalle($nro,$producto,$cantidad,$precio,$idboleta)
	{
		/*$this->db->query("CALL SP_INSERTAR_DETALLE_DOCUMENTO_BOLETA('$producto', '$cantidad', '$precio', '$idboleta')");*/

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
