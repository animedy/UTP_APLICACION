<?php
/**
* 
*/
class Model_empleado extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getEmpleadoLogin($login,$password)
	{
		/*$query = $this->db->get('empleado');
		$this->db->where('login',$login);
		$this->db->where('password',$password);
		return $query->result();*/
		$sql = "SELECT e.idEmpleados,e.dni,e.Nombres,e.Apellidos,t.Rol,e.Fecha_Registro,e.Estado,e.Sexo FROM empleados as e INNER JOIN tipoempleado as t ON e.TipoEmpleado_idTipoEmpleado = t.idTipoEmpleado WHERE usuario = ? AND contrasena = ?";
		return $this->db->query($sql, array($login,$password));
		 
	}
	
	function getclienteLogin($login,$password)
	{
		/*$query = $this->db->get('empleado');
		$this->db->where('login',$login);
		$this->db->where('password',$password);
		return $query->result();*/
		$sql = "SELECT e.idEmpleados,e.dni,e.Nombres,e.Apellidos,t.Rol,e.Fecha_Registro,e.Estado,e.Sexo FROM empleados as e INNER JOIN tipoempleado as t ON e.TipoEmpleado_idTipoEmpleado = t.idTipoEmpleado WHERE usuario = ? AND contrasena = ?";
		return $this->db->query($sql, array($login,$password));
		 
	}

	function getEmpleado()
	{
		$query = $this->db->get('vista_empleados');

        return $query->result();
	}
	function getEmpleadoById($id)
	{
		$this->db->limit(1);
		$this->db->where('idEmpleados',$id);
		$query = $this->db->get('empleados');
        return $query->result();
	}
	function insertEmpleado($nombre,$apellido,$rol_idrol,$fecha_nacimiento,$dni,$direccion,$celular,$email,$fecha_ingreso,$estado,$login,$sexo,$password)
	{
		$array = array(
			'Nombres'						=> $nombre,
			'Apellidos'						=> $apellido,
			'TipoEmpleado_idTipoEmpleado'	=> $rol_idrol,
			'Fecha_Nacimiento'				=> $fecha_nacimiento,
			'Dni'							=> $dni,
			'Direccion'						=> $direccion,
			'Celular'						=> $celular,
			'Usuario' 						=> $login,
			'Correo_Electronico'			=> $email,
			'Fecha_Registro'				=> $fecha_ingreso,
			'Estado'						=> $estado,
			'Sexo'							=> $sexo,
			'Contrasena'					=> $password
		);
		$this->db->insert('empleados',$array);
	}

	function deleteEmpleado($id){
		$this->db->where('idEmpleados',$id);
		$query = $this->db->delete('empleados');
	}

	function updateEmpleado($id,$nombre,$apellido,$rol_idrol,$fecha_nacimiento,$dni,$direccion,$celular,$usuario,$email,$fecha_ingreso,$estado,$sexo,$password)
	{
		$array = array(
			'Nombres'						=> $nombre,
			'Apellidos'						=> $apellido,
			'TipoEmpleado_idTipoEmpleado'	=> $rol_idrol,
			'Fecha_Nacimiento'				=> $fecha_nacimiento,
			'Dni'							=> $dni,
			'Direccion'						=> $direccion,
			'Celular'						=> $celular,
			'Usuario' 						=> $usuario,
			'Correo_Electronico'			=> $email,
			'Fecha_Registro'				=> $fecha_ingreso,
			'Estado'						=> $estado,
			'Sexo'							=> $sexo,
			'Contrasena'					=> $password
		);
		$this->db->where('idEmpleados',$id);
		$this->db->update('empleados',$array);
	}
}
