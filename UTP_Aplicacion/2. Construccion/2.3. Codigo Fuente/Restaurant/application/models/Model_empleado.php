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

	/**
		* loguearse con un usuario empleado 
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param login
		* @param password
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function getEmpleadoLogin($login,$password)
	{
		$sql = "SELECT e.idEmpleados,e.dni,e.Nombres,e.Apellidos,t.Rol,e.Fecha_Registro,e.Estado,e.Sexo FROM empleados as e INNER JOIN tipoempleado as t ON e.TipoEmpleado_idTipoEmpleado = t.idTipoEmpleado WHERE usuario = ? AND contrasena = ?";
		return $this->db->query($sql, array($login,$password));
		 
	}

	/**
		* loguearse con un usuario cliente
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param login
		* @param password
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function getclienteLogin($login,$password)
	{

		$sql = "SELECT e.idEmpleados,e.dni,e.Nombres,e.Apellidos,t.Rol,e.Fecha_Registro,e.Estado,e.Sexo FROM empleados as e INNER JOIN tipoempleado as t ON e.TipoEmpleado_idTipoEmpleado = t.idTipoEmpleado WHERE usuario = ? AND contrasena = ?";
		return $this->db->query($sql, array($login,$password));
		 
	}

	/**
		* Lista los empleados.
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function getEmpleado()
	{
		$query = $this->db->get('vista_listar_empleados');

        return $query->result();
	}

	/**
		* Obtiene un empleado segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function getEmpleadoById($id)
	{

		$this->db->where('idEmpleados',$id);
		$query = $this->db->get('empleados');
        return $query->result();
	}

	/**
		* Inserta empleado.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param nombre
		* @param apellido
		* @param rol_idrol
		* @param fecha_nacimiento
		* @param dni
		* @param direccion
		* @param celular
		* @param email
		* @param fecha_ingreso
		* @param estado
		* @param login
		* @param sexo
		* @param password
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
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

		/*$this->db->query("CALL SP_INSERTAR_EMPLEADO('$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$direccion','$celular', '$sexo', '$fecha_ingreso', '$estado', '$email', '$login', '$password', '$rol_idrol')");*/
	}

	/**
		* Elimina un empleado.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id	
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
	function deleteEmpleado($id){
		$this->db->where('idEmpleados',$id);
		$query = $this->db->delete('empleados');
	}

	/**
		* Actualiza un nuevo empleado existente.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param id
		* @param nombre
		* @param apellido
		* @param rol_idrol
		* @param fecha_nacimiento
		* @param dni
		* @param direccion
		* @param celular
		* @param usuario
		* @param email
		* @param fecha_ingreso
		* @param estado
		* @param sexo
		* @param password
		*
		* fecha creacion: 16/08/2017
		* fecha modificacion: 20/08/2017	
	*/
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

		/*$this->db->query("CALL SP_ACTUALIZAR_EMPLEADO('$id', '$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$direccion','$celular', '$sexo', '$fecha_ingreso', '$estado', '$email', '$login', '$password', '$rol_idrol')");*/
	}
}
