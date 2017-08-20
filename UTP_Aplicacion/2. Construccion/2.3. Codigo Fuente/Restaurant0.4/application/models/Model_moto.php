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
	function deleteMoto($id){
		$this->db->where('id',$id);
		$query = $this->db->delete('moto');
	}

	function updateMoto($id,$nombre,$apellido,$sueldo,$fecha_nacimiento,$dni,$direccion,$telefono,$celular,$email,$fecha_ingreso,$fecha_salida,$estado,$sexo,$password)
	{
		$array = array(
			'nombre'=> $nombre,
			'apellido'=> $apellido,
			'sueldo'=> $sueldo,
			'fecha_nacimiento'=> $fecha_nacimiento,
			'dni'=> $dni,
			'direccion'=> $direccion,
			'telefono'=> $telefono,
			'celular'=> $celular,
			'email'=> $email,
			'fecha_ingreso'=> $fecha_ingreso,
			'fecha_salida'=> $fecha_salida,
			'estado'=> $estado,
			'sexo'=> $sexo,
			'password'=> $password
		);
		$this->db->where('id',$id);
		$this->db->update('moto',$array);
	}

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
