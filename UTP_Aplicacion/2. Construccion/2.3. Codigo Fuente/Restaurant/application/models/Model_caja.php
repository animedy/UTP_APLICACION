<?php
class Model_caja extends CI_Model {

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
    */
    function getListaPedidos()
    {
        $query = $this->db->get('vista_ver_pedidos');
        return $query->result();
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
    */
    function getPedidoById($id)
    {
        $this->db->where('idPedidos',$id);
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
    */
     function getPedidoDetalle()
    {
        $query = $this->db->get('vista_pedidosdetalle');
        return $query->result();
    }

    /**
        * lista documento que esta a la espera de ser pagados 
        *
        * @author Carlos Sanchez Aquino
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    */
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
    */
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
    */
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
    */
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
    */
     function  ActualizarDocumentoAnulado($id,$estadoboleta)
     {
        $array2 = array('EstadoBoleta_idEstadoPedido' => $estadoboleta);
        $this->db->where('idDocumentoBoleta',$id);
        $this->db->update('documentoboleta', $array2);

     }



    /*function insertCaja()
    {
    	$data = array(
    		'nombre' 		=> $this->input->post('nombre'),
    		'sucursal_id'	=> $this->input->post('sucursal_id')
    	);
    	return $this->db->insert('caja',$data);	 
    }

    function getVistaPedidoCompletado()
    {
        $query = $this->db->get('vista_pedidos_completados');
        $this->db->order_by('Fecha_y_hora_pedido');
        return $query->result();
    }

        function getListarAnulados()
    {
        $query = $this->db->get('vista_ver_pedidos');
        $this->db->order_by('Fecha_y_hora_pedido');
        return $query->result();
    }*/
}
?>