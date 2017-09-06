<?php
class Model_cliente extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/**
        * loguearse.
        *
        * @author Juan Jose Paz Chalco
        *
        * @param login             
        * @param password      
 		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function getclienteLogin($login,$password)
	{
		$sql = "SELECT c.idCliente,c.Nombres, e.CorreoElectronico,e.Contrasena  FROM usuario as e INNER JOIN clientes as c ON e.Cliente_idCliente  = c.idCliente WHERE CorreoElectronico = ? AND Contrasena = ?";
		return $this->db->query($sql, array($login,$password));	 
	}

	/**
        * lista los clientes 
        *
        * @author Juan Jose Paz Chalco
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    */
	function getCliente()
	{
		$query = $this->db->get('clientes');
        $this->db->order_by('idCliente');
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
	function getClienteById($id)
	{
		$this->db->limit(1);
		$this->db->where('idCliente',$id);
		$query = $this->db->get('clientes');
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

	/**
		* Elimina un cliente.
		* 
		* @author Ricardo Palacios Arce
		*
		* @param id
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
	function deleteCliente($id){
		$this->db->where('idCliente',$id);
		$query = $this->db->delete('clientes');
	}

	/**
		* Actualiza un cliente.
		* 
		* @author Ricardo Palacios Arce
		*
		* @param id
		* @param nombre
		* @param dni
		* @param sexo
		* @param direccion
		* @param estado
		* @param telefono
		* @param celular
		* @param distrito	
		* @param referencia
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 
	*/
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
