<?php
class ModelCaja extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    /**
        * lista pedidos por generar documento
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function getListaPedidos()
    {
        $query = $this->db->get('vista_pedidos');
        return $query->result();
    }

    /**
        * lista los detalles del pedidos por generar documento
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
     function getPedidoDetalle()
    {
        $query = $this->db->get('vista_pedidosdetalle');
        return $query->result();
    }

    /**
        * conteo de documentos emitidos.
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function conteoemitidos()
    {
        $this->db->where('EstadoBoleta_idEstadoPedido',2);
        $this->db->from("documentoboleta");
        return  $this->db->count_all_results();
    }

    /**
        * conteo de documentos anulados.
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function conteoanulados()
    {
        $this->db->where('EstadoBoleta_idEstadoPedido',3);
        $this->db->from("documentoboleta");
        return $this->db->count_all_results();
    }

    /**
        *  lista los datos del pedido segun el parametro id 
        *
        * @author Carlos Sanchez Aquino
        *
        * @param id
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function getPedidoById($id)
    {
        $this->db->where('idPedidos',$id);
        $query = $this->db->get('vista_pedidos');
        return $query->result();
    }

    /***********NUEVO***************
        * lista los detalles del pedidos por generar documento
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function getPedidoDetalleById($id)
    {
        $this->db->where('idPedidos',$id);
        $query = $this->db->get('vista_pedidosdetalle');
        return $query->result();
    }

    /**
        * lista los detalles de la boleta
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
     function getDetalleBoleta($id)
    {
        $this->db->where('DocumentoBoleta_idDocumentoBoleta',$id);
        $query = $this->db->get('detalledocumentoboleta');
        return $query->result();
    }


    /**
        * lista documento que esta a la espera de ser pagados 
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function getListarPorCancelarDocumento()
    {
        $query = $this->db->get('vista_por_cancelar_documento');
        return $query->result();
    }

    /**
        * lista documento que estan pagados 
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function getListarCanceladoDocumento()
    {
        $query = $this->db->get('vista_documento_cancelado');
        return $query->result();
    }


    /**
        * lista documento que no han sido pagados y estan anulados 
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function DocumentosAnulados()
    {
        $query = $this->db->get('vista_documento_anulados');
        return $query->result();
    }

    /**
        * Lista los documentos para ser pagados cambiando el estado 
        *
        * @param id
        * @param estadoboleta
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function ActualizarDocumentoCancelado($id,$estadoboleta)
    {
        $array = array('EstadoBoleta_idEstadoPedido' => $estadoboleta);
        $this->db->where('idDocumentoBoleta',$id);
        $this->db->update('documentoboleta', $array);

    }

    /**
        * Lista los documentos para ser anulados cambiando el estado 
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
     function  ActualizarDocumentoAnulado($id,$estadoboleta)
     {
        $array2 = array('EstadoBoleta_idEstadoPedido' => $estadoboleta);
        $this->db->where('idDocumentoBoleta',$id);
        $this->db->update('documentoboleta', $array2);

     }

     /**
        * Actualiza los estados de los pedidos.
        *
        * @author Carlos Sanchez Aquino
        *   
        * @param idprogreso
        * @param porhacer
        * @param enprogreso
        * @param completado
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function updateEstado($idprogreso,$porhacer,$enprogreso,$completado,$observacion)
    {
        $array = array(
            'Estado_Administrador'  => $porhacer,
            'Estado_Cocinero'       => $enprogreso,
            'Estado_Cajero'         => $completado,
            'ObservacionAdministrador'      =>$observacion
        );
        $this->db->where('idPedidos',$idprogreso);
        $this->db->update('pedidos',$array);
    }

    /**
        * lista todos los empleados asignados a una moto.
        *
        * @author Carlos Sanchez Aquino
        *   
        * @param idprogreso
        * @param porhacer
        * @param enprogreso
        * @param completado
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function tipoempleado()
    {
        
         $query = $this->db->get('vista_listar_moto_empleado');
        return $query->result();
    }

    /**
        * obtiene el ultimo id de la tabla boleta .
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function obtenerultimoidboleta()
    {        
        $rs = $this->db->query("SELECT MAX(idDocumentoBoleta) AS idBoleUltimo FROM documentoboleta");
        return $rs->result();
    }


    /**
        * inserta el empleado repartidor asignado a un pedido.
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/
    function repartidor($empleado ,$pedido)
    {
         $data = array(
            'empleados_idEmpleados' => $empleado,
            'pedidos_idPedidos'   => $pedido,
            );
        $this->db->insert('asignacion',$data);
    }


    /**
        * actualiza el pedido segun el id.
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    **/    
    function updatePedido($pedido,$emitido)
    {
        $array = array(
            'emitido' => $emitido
        );
        $this->db->where('idPedidos',$pedido);
        $this->db->update('pedidos',$array);
    }
}
?>