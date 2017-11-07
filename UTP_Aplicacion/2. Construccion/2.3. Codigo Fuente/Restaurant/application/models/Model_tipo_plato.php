<?php
class Model_tipo_plato extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    
    /**
        * Lista los tipos de categoria
        *
        * @author Ricardo Palacios Arce
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    */
    function get_tipoplato(){
        $query = $this->db->get('categoriaplato');
        //$this->db->order_by('idCategoriaPlato');
        return $query->result();
    }


    function get_Categoria()
    {
        $query = $this->db->get('categoriaplato');
        $this->db->order_by('id');
        return $query->result();
    }
    /**
        * Inserta una nueva categoria
        *
        * @author Carlos Sanchez
        *
        *
        * @param categoria
        *
        fecha creacion: 31/08/2017
        fecha modificacion: 31/08/2017
        *   
    */
    function insertCategoria($categoria)
    {
        $data = array(
            'Categoria'                           => $categoria,
            );
        $this->db->insert('categoriaplato',$data);        
    }

    /**
        * Elimina una categoria.
        *
        * @author Juan Jose Paz Chalco
        *
        * @param id 
        *   
        fecha creacion: 31/08/2017
        fecha modificacion: 31/08/2017          
    */
    function deleteCategoria($id)
    {
        $this->db->where('idCategoriaPlato',$id);
        $this->db->delete('categoriaplato');

        /*$estado = 'A';
        $this->db->query("CALL SP_ELIMINAR_PLATO('$id', '$estado')");*/

    }
    

    /** PLATOS **/
    /**
        * Inserta un nuevo plato.
        *
        * @author Juan Jose Paz Chalco
        *
        *
        * @param nombre             
        * @param categoria      
        * @param precio         
        * @param estado         
        * @param imagen         
        * @param cantidad       
        * @param descripcion
        *
        fecha creacion: 20/08/2017
        fecha modificacion: 23/08/2017
        *   
    */
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