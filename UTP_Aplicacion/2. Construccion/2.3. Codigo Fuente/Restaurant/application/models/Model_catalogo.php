<?php
class Model_catalogo extends CI_Model {

    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    /**
        * lista los platos para la carta virtual 
        *
        * @author Juan Jose Paz Chalco
        *
        fecha creacion: 20/08/2017
        fecha modificacion: 23/08/2017
        *   
    */
    function get_catalogo()
    {
        $query = $this->db->get('platos');
        $this->db->order_by('id');
        return $query->result();
    }

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
        $this->db->insert('platos',$data);

        /* $this->db->query("CALL SP_INSERTAR_PLATO('$nombre', '$descripcion', '$imagen', '$precio', '$cantidad','$estado', '$categoria')");*/
        
    }

    /**
        * Actualiza un plato.
        *
        * @author Juan Jose Paz Chalco
        *
        * @param id             
        * @param nombre             
        * @param categoria      
        * @param precio         
        * @param estado                 
        * @param cantidad       
        * @param descripcion
        *
        fecha creacion: 20/08/2017
        fecha modificacion: 23/08/2017
        *   
    */
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


        /*$this->db->query("CALL SP_ACTUALIZAR_PLATO('$id', '$nombre', '$descripcion', '$imagen', '$precio', '$cantidad','$estado', '$categoria')");*/

    }

    /**
        * Elimina un plato.
        *
        * @author Juan Jose Paz Chalco
        *
        * @param id 
        *   
        fecha creacion: 20/08/2017
        fecha modificacion: 23/08/2017          
    */
    function deletePlato($id)
    {
        $this->db->where('idPlatos',$id);
        $this->db->delete('platos');

        /*$estado = 'A';
        $this->db->query("CALL SP_ELIMINAR_PLATO('$id', '$estado')");*/

    }
    
    /**
        * lista Reporte Platos mas Vendidos
        *
        * @author Juan Jose Paz Chalco
        *
        * fecha creacion: 18/08/2017
        * fecha modificacion: 23/08/2017    
    */
    function get_PlatosMasVendidos()
    {
        $query = $this->db->get('vista_reporte_platos_mas_vendidos');
        $this->db->order_by('Cantidad');
        return $query->result();
    }

}
?>