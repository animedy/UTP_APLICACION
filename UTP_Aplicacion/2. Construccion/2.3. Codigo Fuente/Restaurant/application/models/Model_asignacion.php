<?php
class Model_asignacion extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    function getAsignacion()
    {
        $query = $this->db->get('asignacion');
        return $query->result();
    }

    function insertAsignacion($idpedidoasignado,$repartidor)
    {
        $array = array(
            'pedidos_idPedidos'         => $idpedidoasignado,
            'empleados_idEmpleados'     => $repartidor
        );
        $this->db->insert('asignacion',$array);
    }

    function updateAsignacion($repartidor,$idasignacion)
    {
        $array = array(
            'empleados_idEmpleados'     => $repartidor
        );
        $this->db->where('idasignacion',$asignacion);
        $this->db->update('asignacion',$array);
    }

    
}
?>