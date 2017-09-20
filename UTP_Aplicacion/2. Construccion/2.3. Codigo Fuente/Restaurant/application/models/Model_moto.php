<?php
/**
* 
*/
class Model_moto extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getMoto()
	{
		$query = $this->db->get('vista_motos');
        $this->db->order_by('Placa');
        return $query->result();
	}
	function getMotoById($id)
	{
		$this->db->limit(1);
		$this->db->where('idPlaca',$id);
		$query = $this->db->get('moto');
        return $query->result();
	}
	function deleteMoto($placa){
		$this->db->where('idPlaca',$placa);
		$query = $this->db->delete('moto');
	}

	function updateMoto($placa,$marca,$soat,$estado,$empleado)
	{
		$array = array(
			'marca_moto'				=> $marca,
			'Soat'						=> $soat,
			'Estado'					=> $estado,
			'empleados_idEmpleados'		=> $empleado
		);
		$this->db->where('idPlaca',$placa);
		$this->db->update('moto',$array);
	}

	function insertMoto($placa,$marca,$soat,$estado,$empleado)
	{
		$array = array(
			'idPlaca'					=> $placa,
			'marca_moto'				=> $marca,
			'Soat'						=> $soat,
			'Estado'					=> $estado,
			'empleados_idEmpleados'		=> $empleado
		);
		$this->db->insert('moto',$array);
	}
}
