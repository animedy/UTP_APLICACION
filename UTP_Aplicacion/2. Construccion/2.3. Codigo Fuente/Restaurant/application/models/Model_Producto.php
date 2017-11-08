<?php
class Model_Producto extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    function get_catalogo(){
        $query = $this->db->get('platos');
        $this->db->order_by('id');
        return $query->result();
    }

    function search_catalogo($datos){

        $this->db->where('CategoriaPlato_idCategoriaPlato',$datos);
        $query = $this->db->get('platos');
        return $query->result();
    }

    function insertPlato($nombre,$categoria,$precio,$estado,$imagen,$cantidad,$descripcion)
    {
        $data = array(
            'Nombres'                           => $nombre,
            'CategoriaPlato_idCategoriaPlato'   => $categoria,
            'Precio'                            => $precio,
            'Estado'                            => $estado,
            'Imagen'                            => $imagen,
            'Cantidad'                          => $cantidad,
            'Descripcion'                       => $descripcion
            );
        $this->db->insert('platos',$data);
    }

    function updatePlato($id,$nombre,$categoria,$precio,$estado,$cantidad,$descripcion)
    {
       $data = array(
            'Nombres'                           => $nombre,
            'CategoriaPlato_idCategoriaPlato'   => $categoria,
            'Precio'                            => $precio,
            'Estado'                            => $estado,
            'Cantidad'                          => $cantidad,
            'Descripcion'                       => $descripcion
            );

        $this->db->where('idPlatos',$id);
        $this->db->update('platos',$data);
    }

    function Set_cantidad($id,$cantidad)
    {
       $data = array(
            'Cantidad'                          => $cantidad
            );

        $this->db->where('idPlatos',$id);
        $this->db->update('platos',$data);
    }

    function deletePlato($id)
    {
        $this->db->where('idPlatos',$id);
        $this->db->delete('platos');
    }

    /*Reporte Platos mas Vendidos*/
    function get_PlatosMasVendidos()
    {
        $query = $this->db->get('vista_reporte_platos_mas_vendidos');
        $this->db->order_by('Cantidad');
        return $query->result();
    }

}
?>