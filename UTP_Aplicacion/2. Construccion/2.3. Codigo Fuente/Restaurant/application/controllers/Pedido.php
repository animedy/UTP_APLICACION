<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_pedido');
	}

	/**
		* Lista los pedidos por hacer, pedidos en progreso y pedidos completados.
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function listar()
	{
		$data['porhacer'] 	= $this->model_pedido->getPedidoPorHacer();
		$data['vistaporhacer'] 	= $this->model_pedido->getVistaPedidoPorHacer();

		$data['progreso'] 	= $this->model_pedido->getPedidoEnProgreso();
		$data['vistaenprogreso'] = $this->model_pedido->getVistaPedidoEnProgreso();
		

		$data['completado'] 	= $this->model_pedido->getPedidoCompletado();
		$data['vistacompletado'] = $this->model_pedido->getVistaPedidoCompletado();
		$this->load->view('admin/pedidos',$data);
	}

	/**
		* Registra el pedido hecho por el cliente.
		*
		* @author Juan Jose Paz Chalco
		*
		* fecha creacion: 22/08/2017
		* fecha modificacion: 25/08/2017	
	*/
	function Insertar()
	{
		date_default_timezone_set('America/Lima');
		$datos = $this->input->post();
		if (isset($datos)) 
		{
			$Fecha 						= date('Y-m-d');
			$Hora_Pedido				= date('H:i:s');
			echo $Hora_Pedido;
			$Clientes_idCliente			= $this->session->userdata('id');
			$Total						= $datos["Total"];
			$Estado_Administrador		= 1;
			$Estado_Cocinero			= 0;
			$Estado_Cajero				= 0;
			$Comanda					= "0".$Clientes_idCliente.date('His').date('dmY');
			$ObservacionAdministrador	= 'null';
			$idPedidos 		= $this->model_pedido->insertPedido($Fecha,$Hora_Pedido,$Clientes_idCliente,$Total,$Estado_Administrador,$Estado_Cocinero,$Estado_Cajero,$Comanda,$ObservacionAdministrador);
			$Observaciones				= $datos["Observacion"];
			$Cantidades					= $datos["Cantidad"];
			$idPlatos					= $datos["idPlatos"];
			$this->load->model('model_DetallePedido');
			for ($i=0; $i <count($idPlatos) ; $i++) 
			{ 
				echo $idPlatos[$i] . " Observacion " . $Observaciones[$i] . "Cantidad  " . $Cantidades[$i] . "<br> ";
				$this->model_DetallePedido->insertDetallePedido($Cantidades[$i],$Observaciones[$i],$idPedidos,$idPlatos[$i]);
			}
			redirect(base_url()."Catalogo/ListarCarta");
		}
	}

	/**
		* Lista todos los pedidos (Reporte).
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function listarPedidos()
	{
		try 
		{
			$data['pedidos'] 	= $this->model_pedido->getPedidos();
			$this->load->view('admin/reporte_filtro_pedidos',$data);	
		}
		catch (ErrorException $e) 
		{
        	// este bloque no se ejecuta, no coincide el tipo de excepción
        	echo 'ErrorException' . $e->getMessage();
        	show_404();
    	}
    	catch (Exception $e) 
    	{
			echo $e->getMessage();
			echo $e->getLine();
			show_404();
		}	
	}

	/**
		* Actualiza los estados de los pedidos segun su id.
		*
		* @author Ricardo Palacios Arce
		* 	
		* @param idprogreso
		* @param porhacer
		* @param enprogreso
		* @param completado
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function actualizarestado()
	{
		$datos = $this->input->post();
		if (isset($datos)) {
			$idprogreso 	= $datos["id"];
			if ($datos["porhacer"] == "on") 
			{
				$porhacer 	= "1";
			}
			else
			{
			$porhacer 	= "0";
			}
			if ($datos["enprogreso"] == "on") 
			{
				$enprogreso 	= "1";
			}
			else
			{
			$enprogreso 	= "0";
			}
			if ($datos["completado"] == "on") 
			{
				$completado 	= "1";
			}
			else
			{
			$completado 	= "0";
			}
			$this->model_pedido->updateEstado($idprogreso,$porhacer,$enprogreso,$completado);
			//echo "por hacer " . " " .$porhacer . "<br> en progreso " . " " .$enprogreso . "<br> Completado" . " " .$completado; 
			redirect(base_url('pedidos'));
		}
	}

	/**
		* Lista los pedidos completados (Reporte).
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function listarpedidosatendidos()
	{
		$data['reportecompletados'] = $this->model_pedido->getVistaReporteCompletado();
		$this->load->view('admin/reporte_pedidos_atendidos',$data);
	}

	/**
		* Lista los pedidos devueltos (Reporte).
		*
		* @author Ricardo Palacios Arce
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function listarpedidosdevueltos()
	{
		$data['reportedevueltos'] = $this->model_pedido->getVistaReporteDevueltos();
		$this->load->view('admin/reporte_pedidos_devueltos',$data);
	}

	/**
		* Lista los pedidos Por Fechas (Reporte).
		*
		* @author Ricardo Palacios Arce
		* 
		* @param $fecha_inicial
		* @param $fecha_final
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function ListarPedidosPorFecha()
	{
		$datos = $this->input->post();
		if (isset($datos)) 
		{
			$fecha_inicial 				= $datos["fecha_inicio"];
			$fecha_final				= $datos["fecha_fin"];
			$data['pedidos'] 			= $this->model_pedido->getPedidosPorFecha($fecha_inicial,$fecha_final);
			$this->load->view('admin/reporte_filtro_pedidos',$data);
		}
	}


	/**
		* Lista los pedidos parametros(Reporte).
		*
		* @author Ricardo Palacios Arce
		* 
		* @param $comanda
		* @param $estado
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	*/
	function ListarPedidosPorParametros()
	{
		$datos = $this->input->post();
		if (isset($datos)) {
			$comanda 		= $datos["comanda"];
			$estado			= $datos["estado"];
			if (!empty($comanda) && empty($estado)) {
				$data['pedidos'] 	= $this->model_pedido->getPedidosPorComanda($comanda);
				$this->load->view('admin/reporte_filtro_pedidos',$data);
			}elseif (!empty($estado) && empty($comanda)){
				if ($estado == "P") {
					$Estado_Administrador	= 1;
					$Estado_Cocinero		= 0;
					$Estado_Cajero			= 0;
					$data['pedidos'] 	= $this->model_pedido->getPedidosPorEstado($Estado_Administrador,$Estado_Cocinero,$Estado_Cajero);
					$this->load->view('admin/reporte_filtro_pedidos',$data);
				}
				elseif ($estado == "E") {
					$Estado_Administrador	= 1;
					$Estado_Cocinero		= 1;
					$Estado_Cajero			= 0;
					$data['pedidos'] 	= $this->model_pedido->getPedidosPorEstado($Estado_Administrador,$Estado_Cocinero,$Estado_Cajero);
					$this->load->view('admin/reporte_filtro_pedidos',$data);
				}
				elseif ($estado == "C") {
					$Estado_Administrador	= 1;
					$Estado_Cocinero		= 1;
					$Estado_Cajero			= 1;
					$data['pedidos'] 	= $this->model_pedido->getPedidosPorEstado($Estado_Administrador,$Estado_Cocinero,$Estado_Cajero);
					$this->load->view('admin/reporte_filtro_pedidos',$data);
				}
				elseif ($estado == "A") {
					$Estado_Administrador	= 0;
					$Estado_Cocinero		= 0;
					$Estado_Cajero			= 0;
					$data['pedidos'] 	= $this->model_pedido->getPedidosPorEstado($Estado_Administrador,$Estado_Cocinero,$Estado_Cajero);
					$this->load->view('admin/reporte_filtro_pedidos',$data);
				}
				
			}elseif (empty($estado) && empty($comanda)){
				$data['pedidos'] 	= $this->model_pedido->getPedidos();
				$this->load->view('admin/reporte_filtro_pedidos',$data);
			}
		}
			
	}

}