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

	function getclienteLogin($login,$password)
	{
		/*$query = $this->db->get('empleado');
		$this->db->where('login',$login);
		$this->db->where('password',$password);
		return $query->result();*/
		$sql = "SELECT c.idCliente,c.Nombres, e.CorreoElectronico,e.Contrasena  FROM usuario as e INNER JOIN clientes as c ON e.Cliente_idCliente  = c.idCliente WHERE CorreoElectronico = ? AND Contrasena = ?";
		return $this->db->query($sql, array($login,$password));
		 
	}


	function getCliente()
	{
		 $this->db->where('Estado','A');
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

	function deleteCliente($id,$estado){
		echo $estado;
		$array = array(
			'Estado'	=> $estado
		);
		$this->db->where('idCliente',$id);
		$this->db->update('clientes',$array);
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
