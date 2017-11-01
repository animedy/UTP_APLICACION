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
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		* 	fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/
	function listar(){
		$this->load->model('model_tipo_plato');
		$data['tipo_platos'] 	= $this->model_tipo_plato->get_tipoplato();
		$data['platos']			= $this->model_catalogo->get_catalogo();
		$this->load->view('admin/catalogo',$data);
	}
	/**
		* Lista los platos y tipos de platos.
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		* 	fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/

	function buscar(){
		$this->load->model('model_tipo_plato');
		$data['tipo_platos'] 	= $this->model_tipo_plato->get_tipoplato();
		$datos 					= $this->input->post("categoria_buscar");
		$data['platos']			= $this->model_catalogo->search_catalogo($datos);
		$this->load->view('admin/catalogo',$data);
	}

	/**
		* Lista los platos y tipos de platos.
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		* 	fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/
	function ListarCarta(){
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
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
	*/
	function MostrarCarrito(){
		if($this->cart->contents() !=null)
		{
			$this->load->view('cliente/Carrito');
		}
		else{
		
			
			//echo "compra algo";
			$this->load->view('cliente/Carrito');
	}
	}





	function MostrarSeguimiento(){
		
			$this->load->view('cliente/Mensaje');
	
	}



	function InsertarCarrito(){
		$data= array (
			'id'=>$this->input->post('idPlatos'),
			'qty'=>$this->input->post('Cantidad'),
			'price'=>$this->input->post('Precio'),
			'name'=>$this->input->post('Nombres'),
			'imagen'=>$this->input->post('Imagen'),
			'descripcion'=>$this->input->post('Descripcion'),
			'stock'=>$this->input->post('Stock')
			);
		$this->cart->insert($data);

		redirect('Carta');
	}
	/**
		* Limpia la lista de los productos agregados en el carrito 
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	
	function VaciarCarrito(){
		$this->cart->destroy();

		redirect('Carrito');
	}
	/**
		* Elimina un producto en el carrito 
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	function remove($rowid) {

    $this ->cart-> update(array('rowid' => $rowid, 'qty' => 0));

    redirect('Carrito');

}
/**
		* Actualiza la cantidad del producto agregado al carrito 
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/	
	function update_cart($row) {

    $row = explode('-', $row);
    $this -> cart -> update(array('rowid' => $row[0], 'qty' => $row[1]));

    redirect('Carrito');

}
/**
		* Actualiza la lista de los productos agregados en el carrito 
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017
		* 	
	*/
	
	function ActualizarCarrito(){
		$data=$this->input->post();
		$this->cart->update($data);
		redirect('Carrito');
	}

	/**
		* Inserta un nuevo plato.
		* 
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		*
		* @param nombre 			
		* @param categoria 		
		* @param precio 		
		* @param estado 		
		* @param imagen 		
		* @param cantidad 		
		* @param descripcion
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017	
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
			<?php
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
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		*
		* @param id 			
		* @param nombre 			
		* @param categoria 		
		* @param precio 		
		* @param estado 				
		* @param cantidad 		
		* @param descripcion
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017	
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
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		*
		* @param id 	
		fecha creacion: 20/08/2017
		fecha modificacion: 23/08/2017			
	*/
	function eliminar()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post("idplato");
			$this->model_catalogo->deletePlato($id);
			
			//header("location:catalogos");
		}
		
	}


	/**
		* Reporte Platos mas Vendidos.
		*
		* @author Juan Jose Paz Chalco
		* @author Ricardo Palacios Arce
		* @author Carlos Sanchez Aquino
		*
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