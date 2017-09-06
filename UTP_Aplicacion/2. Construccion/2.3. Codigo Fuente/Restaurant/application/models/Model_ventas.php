<?php
class Model_ventas extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    /**
        * lista las ventas del mes 
        *
        * @author Ricardo Palacios Arce
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    */
    function GetVentasDelMes(){
        $query = $this->db->get('vista_ventas_mes');
        $this->db->order_by('Fecha_Emision');
        return $query->result();
    }

}
?>