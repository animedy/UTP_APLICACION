<?php
class Model_catalogo extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    function get_catalogo(){
        $query = $this->db->get('platos');
        $this->db->order_by('id');
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

    function deletePlato($id)
    {
        $this->db->where('idPlatos',$id);
        $this->db->delete('platos');
    }
}
?>