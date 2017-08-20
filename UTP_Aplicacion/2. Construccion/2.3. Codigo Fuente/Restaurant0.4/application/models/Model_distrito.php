<?php
/**
* 
*/
class Model_distrito extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function getDistrito()
	{
		$query = $this->db->get('distritos');
//        $this->db->order_by('idDistritos');
        return $query->result();
	}
}
