<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_catalogo');
	}
	/**
		* Lista los platos y tipos de platos.
		*
		* @author Ricardo Palacios Arce
		* 	
	*/
	function listar(){
		$this->load->model('model_tipo_plato');
		$data['tipo_platos'] 	= $this->model_tipo_plato->get_tipoplato();
		$data['platos']			= $this->model_catalogo->get_catalogo();
		$this->load->view('admin/catalogo',$data);
	}


	/**
		* Inserta un nuevo plato.
		* 
		* @author Ricardo Palacios Arce
		*
		* @param nombre 			
		* @param categoria 		
		* @param precio 		
		* @param estado 		
		* @param imagen 		
		* @param cantidad 		
		* @param descripcion	
	*/
	function insertar(){
		$datos = $this->input->post();
		$config['upload_path'] = './assets/img/catalogo';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload',$config);
		if (isset($datos)) {
	        if (!$this->upload->do_upload("imagen")) { ?>
	        	<script type="text/javascript" charset="utf-8">
					alert("Error al subir la imagen");
				</script>
			<?
	        } else {
	            $file_info = $this->upload->data();
	            $nombre 			= $datos["nombre"];
				$categoria 			= $datos["categoria"];
				$precio 			= $datos["precio"];
				$estado 			= $datos["estado"];
				$imagen 			= "assets/img/catalogo/".$file_info['file_name'];
				$cantidad 			= $datos["cantidad"];
				$descripcion		= $datos["descripcion"];	            
	           $this->model_catalogo->insertPlato($nombre,$categoria,$precio,$estado,$imagen,$cantidad,$descripcion);     
	            redirect(base_url('catalogos'));
	        }
		}
	}

	/**
		* Actualiza un plato existente.
		*
		* @author Ricardo Palacios Arce
		*
		* @param id 			
		* @param nombre 			
		* @param categoria 		
		* @param precio 		
		* @param estado 				
		* @param cantidad 		
		* @param descripcion	
	*/
	function actualizar()
	{
		$datos = $this->input->post();
		if (isset($datos)) {
			$id		 			= $datos["id"];
			$nombre 			= $datos["nombre"];
			$categoria 			= $datos["categoria"];
			$precio 			= $datos["precio"];	
			$estado 			= $datos["estado"];
			$cantidad 			= $datos["cantidad"];
			$descripcion		= $datos["descripcion"];	           	           
			$this->model_catalogo->updatePlato($id,$nombre,$categoria,$precio,$estado,$cantidad,$descripcion);
			redirect(base_url('catalogos'));
		}		
	}

	/**
		* Elimina un plato existente.
		*
		* @author Ricardo Palacios Arce
		*
		* @param id 				
	*/
	function eliminar($id=NULL)
	{
		if ($id != NULL) {
			$this->model_catalogo->deletePlato($id);
			redirect(base_url('catalogos'));
		}
		
	}


	/**
		* Reporte Platos mas Vendidos.
		*
		* @author Ricardo Palacios Arce
		*
		* 	
	*/
	function PlatosMasVendidos()
	{
		$data['cantidades']			= $this->model_catalogo->get_PlatosMasVendidos();
		$this->load->view('admin/reporte_platos_mas_vendidos',$data);
		
	}
}