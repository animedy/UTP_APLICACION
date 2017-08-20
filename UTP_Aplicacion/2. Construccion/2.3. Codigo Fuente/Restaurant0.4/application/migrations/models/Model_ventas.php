<?php
class Model_ventas extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }


    /*
    */


    function GetVentasDelMes(){
        $query = $this->db->get('vista_ventas_mes');
        $this->db->order_by('Fecha_Emision');
        return $query->result();
    }

}
?>