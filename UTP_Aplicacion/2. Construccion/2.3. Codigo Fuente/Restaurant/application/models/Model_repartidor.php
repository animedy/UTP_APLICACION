<?php
class Model_repartidor extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    function getRepartidor()
    {
        $query = $this->db->get('asignacion');
        return $query->result();
    }

    function insert($idpedidoasignado,$repartidor)
    {
        $array = array(
            'pedidos_idPedidos'         => $idpedidoasignado,
            'empleados_idEmpleados'     => $repartidor
        );
        $this->db->insert('asignacion',$array);
    }
}
?>