<?php
/**
* 
*/
class Model_usuario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function getUsuario()
	{
		$query = $this->db->get('usuario');
        $this->db->order_by('idUsuario');
        return $query->result();
	}
	function getUsuarioById($id)
	{
		$this->db->limit(1);
		$this->db->where('Cliente_idCliente',$id);
		$query = $this->db->get('usuario');
        return $query->result();
	}
	function insertUsuario($correo,$contrasena,$id_cliente)
	{
		$array = array(
			'CorreoElectronico'	=> $correo,
			'Contrasena'		=> $contrasena,
			'Cliente_idCliente'	=> $id_cliente
		);
		$this->db->insert('usuario',$array);
	}
	function updateUsuario($id,$correo,$contrasena)
	{
		$array = array(
			'CorreoElectronico'	=> $correo,
			'Contrasena'		=> $contrasena
		);
		$this->db->where('Cliente_idCliente',$id);
		$this->db->update('usuario',$array);
	}

	function deleteUsuario($id){
		$this->db->where('Cliente_idCliente',$id);
		$query = $this->db->delete('usuario');
	}
}
