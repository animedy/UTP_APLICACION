<?php
class Model_tipo_plato extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    function get_tipoplato(){
        $query = $this->db->get('categoriaplato');
        //$this->db->order_by('idCategoriaPlato');
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
            return $this->db->insert('platos',$data);
    }
}
?>