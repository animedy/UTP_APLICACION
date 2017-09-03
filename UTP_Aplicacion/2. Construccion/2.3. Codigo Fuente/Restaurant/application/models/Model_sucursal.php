<?php
class Model_sucursal extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    /**
        * Lista las sucursales
        *
        * @author Ricardo Palacios Arce
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    */
    function get_sucursal(){
        $query = $this->db->get('sucursal');
        $this->db->order_by('id');
        return $query->result();
    }

    /*function insertSucursal()
    {
    	$data = array(
    		'nombre' 		=> $this->input->post('nombre'), 
    		'departamento' 	=> $this->input->post('departamento'), 
    		'provincia' 	=> $this->input->post('provincia'), 
    		'distrito' 		=> $this->input->post('distrito'), 
    		'direccion'		=> $this->input->post('direccion'), 
    		'observacion' 	=> $this->input->post('observacion')
    	);
    	return $this->db->insert('sucursal',$data);
		 
    }*/
}
?>