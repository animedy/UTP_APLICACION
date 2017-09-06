<?php
class Model_distrito extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
		* lista los datos de los distritos 
		*
		* @author Juan Jose Paz Chalco
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function getDistrito()
	{
		$query = $this->db->get('distritos');
//        $this->db->order_by('idDistritos');
        return $query->result();
	}
}
