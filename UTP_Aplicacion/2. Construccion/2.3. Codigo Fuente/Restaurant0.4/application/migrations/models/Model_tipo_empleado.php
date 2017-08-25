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

	function getTipoEmpleadoRepartidor()
	{
		$this->db->where('Rol','REPARTIDOR');
		$query = $this->db->get('tipoempleado');
        return $query->result();
	}
}
