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

	/**
		* Lista los usuarios 
		*
		* @author Juan Jose Paz Chalco
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function getUsuario()
	{
		$query = $this->db->get('usuario');
        $this->db->order_by('idUsuario');
        return $query->result();
	}

	/**
		* Lista los usuarios 
		*
		* @author Carlos Sanchez Aquino
		*
        * @param id                  
 		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function getUsuarioById($id)
	{
		$this->db->limit(1);
		$this->db->where('Cliente_idCliente',$id);
		$query = $this->db->get('usuario');
        return $query->result();
	}

	/**
		* inserta usuario 
		*
		* @author Juan Jose Paz Chalco
		*
        * @param correo 
        * @param contrasena  
        * @param id_cliente                  
 		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function insertUsuario($correo,$contrasena,$id_cliente)
	{
		$array = array(
			'CorreoElectronico'	=> $correo,
			'Contrasena'		=> $contrasena,
			'Cliente_idCliente'	=> $id_cliente
		);
		$this->db->insert('usuario',$array);
	}

	/**
		* actualiza usuario 
		*
		* @author Carlos Sanchez Aquino
		*
        * @param id 
        * @param correo  
        * @param contrasena                   
 		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function updateUsuario($id,$correo,$contrasena)
	{
		$array = array(
			'CorreoElectronico'	=> $correo,
			'Contrasena'		=> $contrasena
		);
		$this->db->where('Cliente_idCliente',$id);
		$this->db->update('usuario',$array);
	}

	/**
		* elimina usuario 
		*
		* @author Juan Jose Paz Chalco
		*
        * @param id                  
 		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function deleteUsuario($id){
		$this->db->where('Cliente_idCliente',$id);
		$query = $this->db->delete('usuario');
	}
}
