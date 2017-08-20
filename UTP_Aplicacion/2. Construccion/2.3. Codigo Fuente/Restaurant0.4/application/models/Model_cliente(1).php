<?php
/**
* 
*/
class Model_cliente extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function getCliente()
	{
		$query = $this->db->get('clientes');
        $this->db->order_by('idCliente');
        return $query->result();
	}
	function getClienteById($id)
	{
		$this->db->limit(1);
		$this->db->where('idCliente',$id);
		$query = $this->db->get('clientes');
        return $query->result();
	}

	function insertCliente($nombre,$dni,$sexo,$direccion,$celular,$telefono,$estado,$fecha_registro,$distrito,$referencia)
	{
		$array = array(
			'Nombres'					=> $nombre,
			'Dni'						=> $dni,
			'Sexo'						=> $sexo,
			'Direccion'					=> $direccion,
			'Celular'					=> $celular,
			'Telefono'					=> $telefono,
			'Estado'					=> $estado,
			'Fecha_Registro'			=> $fecha_registro,
			'Distritos_idDistritos'		=> $distrito,
			'Referencia'				=> $referencia
		);
		$this->db->insert('clientes',$array);
		return $this->db->insert_id();
	}

	function deleteCliente($id){
		$this->db->where('idCliente',$id);
		$query = $this->db->delete('clientes');
	}

	function updateCliente($id,$nombre,$dni,$sexo,$direccion,$estado,$telefono,$celular,$distrito,$referencia)
	{
		$array = array(
			'Nombres'					=> $nombre,
			'Dni'						=> $dni,
			'Sexo'						=> $sexo,
			'Direccion'					=> $direccion,
			'Estado'					=> $estado,
			'Telefono'					=> $telefono,
			'Celular'					=> $celular,
			'Distritos_idDistritos'		=> $distrito,
			'Referencia'				=> $referencia
		);
		$this->db->where('idCliente',$id);
		$this->db->update('clientes',$array);
	}
}
