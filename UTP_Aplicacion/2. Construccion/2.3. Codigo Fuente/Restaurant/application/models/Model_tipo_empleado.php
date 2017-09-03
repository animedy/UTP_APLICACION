<?php
/**
* 
*/
class Model_tipo_empleado extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/**
		* Lista los empleados que son repartidores 
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function getTipoEmpleadoRepartidor()
	{
		$this->db->where('Rol','REPARTIDOR');
		$query = $this->db->get('tipoempleado');
        return $query->result();
	}
}
