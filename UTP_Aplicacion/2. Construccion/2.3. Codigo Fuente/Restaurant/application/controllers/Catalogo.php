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
		* @author Juan Jose Paz Chalco
		*
		* 	fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/
	function listar()
	{
		$this->load->model('model_tipo_plato');
		$data['tipo_platos'] 	= $this->model_tipo_plato->get_tipoplato();
		$data['platos']			= $this->model_catalogo->get_catalogo();
		$this->load->view('admin/catalogo',$data);
	}

	/**
		* Lista los platos y tipos de platos.
		*
		* @author Juan Jose Paz Chalco
		*
		* 	fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/
	function ListarCarta()
	{
		$this->load->model('model_tipo_plato');
		$data['tipo_platos'] 	= $this->model_tipo_plato->get_tipoplato();
		$data['platos']			= $this->model_catalogo->get_catalogo();
		$this->load->view('cliente/Carta',$data);
	}
	
	/**
		* Muestra el carrito 
		*
		* Verifica si el usuario existe para darle el acceso .
		*
		* @author Juan Jose Paz Chalco
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/
	function MostrarCarrito()
	{
		$this->load->view('cliente/Carrito');
	}

	/**
		* Inserta el datalle al pedidp 
		*
		* @author Juan Jose Paz Chalco
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/
	function InsertarCarrito()
	{
		$data= array (
			'id'=>$this->input->post('idPlatos'),
			'qty'=>$this->input->post('Cantidad'),
			'price'=>$this->input->post('Precio'),
			'name'=>$this->input->post('Nombres'),
			'imagen'=>$this->input->post('Imagen'),
			'descripcion'=>$this->input->post('Descripcion')
			);
		$this->cart->insert($data);
		redirect('Carrito');
	}

	/**
		* Limpia la lista de los productos agregados en el carrito 
		*
		* @author Juan Jose Paz Chalco
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function VaciarCarrito()
	{
		$this->cart->destroy();
		redirect('Carrito');
	}

	/**
		* Actualiza la lista de los productos agregados en el carrito 
		*
		* @author Juan Jose Paz Chalco
		*
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function ActualizarCarrito()
	{
		$data=$this->input->post();
		$this->cart->update($data);
		redirect('Carrito');
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
	*/
	function insertar()
	{
		$datos = $this->input->post();
		$config['upload_path'] = './assets/img/catalogo';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload',$config);
		if (isset($datos)) 
		{
	        if (!$this->upload->do_upload("imagen")) 
	        { ?>
	        	<script type="text/javascript" charset="utf-8">
					alert("Error al subir la imagen");
				</script>
			<?php
	        } 
	        else 
	        {
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
	*/
	function actualizar()
	{
		$datos = $this->input->post();
		if (isset($datos)) 
		{
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
		* @author Juan Jose Paz Chalco
		*
		* @param id 
		*	
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017			
	*/
	function eliminar($id=NULL)
	{
		if ($id != NULL) 
		{
			$this->model_catalogo->deletePlato($id);
			redirect(base_url('catalogos'));
		}
	}


	/**
		* Reporte Platos mas Vendidos.
		*
		* @author Juan Jose Paz Chalco
		* 
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017	
	*/
	function PlatosMasVendidos()
	{
		$data['cantidades']			= $this->model_catalogo->get_PlatosMasVendidos();
		$this->load->view('admin/reporte_platos_mas_vendidos',$data);	
	}
}