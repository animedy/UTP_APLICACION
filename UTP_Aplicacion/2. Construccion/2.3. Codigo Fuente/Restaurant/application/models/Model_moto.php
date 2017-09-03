<?php

class Model_moto extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
		* Lista las motos
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 19/08/2017	
	*/
	function getMoto()
	{
		$query = $this->db->get('vista_listar_motos');
        $this->db->order_by('Placa');
        return $query->result();
	}

	/**
		* muestra los empleados asginados a una moto segun parametro.
		*
		* @author Carlos Sanchez Aquino
		*	
		* @param id	
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 19/08/2017	
	*/
	function getMotoById($id)
	{
		$this->db->limit(1);
		$this->db->where('idPlaca',$id);
		$query = $this->db->get('moto');
        return $query->result();
	}

	/**
		* Elimina un empleado segun parametro.
		*
		* @author Carlos Sanchez Aquino
		*	
		* @param id	
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 19/08/2017	
	*/
	function deleteMoto($id){
		$this->db->where('id',$id);
		$query = $this->db->delete('moto');
	}

	/**
		* Actualiza moto.
		*
		* @author Carlos Sanchez Aquino
		* 	
		* @param placa
		* @param marca
		* @param soat
		* @param estado
		* @param empleado
		* fecha creacion: 18/08/2017
		* fecha modificacion: 19/08/2017	
	*/
	function updateMoto($placa,$marca,$soat,$empleado)
	{
		$array = array(
			'idPlaca'					=> $placa,
			'marca_moto'				=> $marca,
			'Soat'						=> $soat,
			'empleados_idEmpleados'		=> $empleado
		);
		$this->db->where('idPlaca',$id);
		$this->db->update('moto',$array);
	}

	/**
		* Inserta moto.
		*
		* @author Carlos Sanchez Aquino
		* 	
		* @param placa
		* @param marca
		* @param soat
		* @param estado
		* @param empleado
		* fecha creacion: 18/08/2017
		* fecha modificacion: 19/08/2017	
	*/
	function insertMoto($placa,$marca,$soat,$empleado)
	{
		$array = array(
			'idPlaca'					=> $placa,
			'marca_moto'				=> $marca,
			'Soat'						=> $soat,
			'empleados_idEmpleados'		=> $empleado
		);
		$this->db->insert('moto',$array);
	}
}
