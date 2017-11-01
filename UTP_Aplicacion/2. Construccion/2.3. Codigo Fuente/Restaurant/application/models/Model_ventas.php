<?php
class Model_ventas extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }


    /*
    */


    function GetVentasDelDia(){
        $query = $this->db->get('vista_ventas_dia');
        $this->db->order_by('Fecha_Emision');
        return $query->result();
    }


    function GetVentasDelMes($fecha){
        $this->db->like('Fecha_Emision',$fecha);
        $this->db->order_by('Fecha_Emision');
        $query = $this->db->get('vista_ventas_mes');
        return $query->result();
    }

}
?>