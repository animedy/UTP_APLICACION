<?php
class Model_caja extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    function get_caja(){
        $query = $this->db->get('caja');
        $this->db->order_by('id');
        return $query->result();
    }

    function insertCaja()
    {
    	$data = array(
    		'nombre' 		=> $this->input->post('nombre'),
    		'sucursal_id'	=> $this->input->post('sucursal_id')
    	);
    	return $this->db->insert('caja',$data);	 
    }
}
?>