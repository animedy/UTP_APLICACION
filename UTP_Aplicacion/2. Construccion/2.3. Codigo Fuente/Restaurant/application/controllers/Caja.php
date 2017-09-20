<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caja extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_caja');
		if (!$this->session->userdata('id')) {
			redirect('Login');
		}

	}

	/**
		* Lista los pedidos y documentos para ser enviados a la vista a traves de un variable
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function ListarPedidos()
	{
		//lista los pedidos para generar documento
		$data['listapedidos'] = $this->Model_caja->getListaPedidos();
		
		//lista los documentos que aun no an sido pagados
		$data['ListarPorCancelar'] = $this->Model_caja->getListarPorCancelarDocumento();

		//lista los documentos que an sido pagados
		$data['ListarCancelados'] = $this->Model_caja->getListarCanceladoDocumento();


		$data['numemitidos'] = $this->Model_caja->conteoemitidos();

		$data['numanulados'] = $this->Model_caja->conteoanulados();

		//redireccionamos a la vista enviando un array a la variable
		$this->load->view('Cajero/cajero',$data);
	}

	/**
		* Lista los documentos que an sido anulados para ser enviados a la vista a traves de un variable
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function ListaPedidosAnulados()
	{
		//lista los documentos anulados
		$data['ListarAnulados'] = $this->Model_caja->DocumentosAnulados();

		//redireccionamos a la vista enviando un array a la variable
		$this->load->view('Cajero/anula_documento',$data);
	}
	
	/**
		*  Visualiza los datos del pedido segun el parametro id y registra la boleta
		*
		* @author Carlos Sanchez Aquino
		*
		* @param id
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function VerDocumento($id = NULL)
	{
		if ($id != NULL) 
		{
			
			//envia los datos de la cabecera segun el id 
			$edit_docu['docu'] = $this->Model_caja->getPedidoById($id);
			
			//envia los datos del detalle
			$edit_docu['deta'] = $this->Model_caja->getPedidoDetalle(); 
			
			$docu=$this->Model_caja->getPedidoById($id);
			$detadocu=$this->Model_caja->getPedidoDetalle(); 
			$sumtotal=0;
            $igv=0;
            $subtotal=0;
			
			foreach ($docu as $documento)  
			{
				date_default_timezone_set('America/Lima');
				$pedido    = $documento->idPedidos;
				$comanda   = $documento->Comanda;
				$nombre   = $documento->Nombres;
				$direccion = $documento->Direccion;
				$dni       = $documento->Dni;
				$fecha     = date('Y-m-d');
				$hora      = date('H:i:s');
				$estado    = 1;
				foreach ($detadocu as $detalle) 
				{
					if($documento->idPedidos == $detalle->Pedidos_idPedidos) 
						{
							$total=$detalle->Total;
                    		$sumtotal+=$total;
                		}
            	}
				$total     = number_format($sumtotal,2);
				$subtotal=number_format($total/1.18,2);
                $igv=number_format($total-$subtotal,2);
                $letras="";
                $letras = $this->traducir($total);  
            }
            $var = 1;
            $boletas=$this->Model_caja->obtenerultimoidboleta();
            foreach ($boletas as $idboleta) {
            	$bol= $idboleta->idBoleUltimo;
            }
            $idbol = $bol + $var;
            $idboleta = $this->number_pad($idbol,8);
            $empleado = $this->session->userdata('id');
            $cajero = $this->session->userdata('nombre')." ".$this->session->userdata('apellido');

            //para visualizar el resultado en una vista
            $edit_docu['idboleta'] =  $idbol;
            $edit_docu['boleta'] = $idboleta;
            $edit_docu['cajero'] = $cajero;
            $edit_docu['pedido'] = $pedido;
            $edit_docu['comanda'] = $comanda;
			$edit_docu['nombre'] = $nombre;
			$edit_docu['direccion'] = $direccion;
			$edit_docu['dni'] = $dni;
			$edit_docu['fecha'] = $fecha;
			$edit_docu['hora'] = $hora;
            $edit_docu['total'] = $total;
            $edit_docu['subtotal'] = $subtotal;
            $edit_docu['igv'] = $igv;
            $edit_docu['letras'] = $letras;

            $this->load->model('Model_Documento');
				$idboleta  = $this->Model_Documento->insertBoleta($nombre,$dni,$total,$fecha,$hora,$pedido,$estado,$empleado);
				$nro=0;
				foreach ($detadocu as $detalle) 
				{

					if($documento->idPedidos == $detalle->Pedidos_idPedidos) 
						{
							$nro= $nro+1;
							$producto=$detalle->Nombres;
                    		$cantidad=$detalle->Cantidad;
                    		$precio=$detalle->Precio;
                    		$this->Model_Documento->insertBoletaDetalle($nro,$producto,$cantidad,$precio,$idboleta);
                		}
            	}
            
            $edit_docu['repartidor'] = $this->Model_caja->tipoempleado();
            
			//redireccionamos a la vista enviando un array a la variable
            $this->load->view('Cajero/generar_documento', $edit_docu);
		}
	}

	/**
		*  añade ceros a la boleta
		*
		* @author Carlos Sanchez Aquino
		*
		* @param $number
		* @param $n
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function number_pad($number,$n) 
	{
		return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
	}


	/**
		*  Envia los datos del detalle pedido segun parametro id
		*
		* @author Carlos Sanchez Aquino
		*
		* @param id
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function VerDetalleDocumento($id = NULL)
	{
		if ($id != NULL) 
		{
			//envia los datos del datalle pedido segun el id 
			$data['detallepedido'] = $this->Model_caja->getPedidoDetalleById($id);
			
			//redireccionamos a la vista enviando un array a la variable
			$this->load->view('Cajero/ver_documento', $data);
		}
	}


	/**
		*  Genera la boleta e imprime la boleta segun el parametro id del pedido 
		*
		* @author Carlos Sanchez Aquino
		*
		* @param id
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function DocumentoPdf()
	{
		$datos = $this->input->post();
		if (isset($datos)) 
		{
			/**inserta asignacion**/
			$empleado = $datos["repartidor"];
			$pedido= $datos["pedido"];
			$this->Model_caja->repartidor($empleado,$pedido);

			/**imprimeboleta**/
			$id = $datos["idboleta"];
			$datos['detalle'] = $this->Model_caja->getDetalleBoleta($id);
			$this->load->library('M_pdf');
			$stylesheet = file_get_contents(base_url('assets/css/bootstrap.min.css'));
			$nombre_pdf	= "Boleta_".$this->$id. date("d_m_Y").".pdf";
			$vista = $this->load->view('Cajero/imprime_documento',$datos,TRUE);
			//$this->m_pdf->pdf->setFooter('Página {PAGENO} de {nbpg}');
			//$this->m_pdf->pdf->SetHeader('Fecha:'. date('d/m/Y') . ' Hora:' . date('H:m:s') );
			//$this->m_pdf->pdf->SetHeader('Fecha:'. date('d/m/Y').'|Pepe Tiburon - Cevicheria| Hora:' . date('H:m:s'));
			
			$this->m_pdf->pdf->AddPage('L');
			$this->m_pdf->pdf->SetDisplayMode('fullpage');

			$this->m_pdf->pdf->WriteHTML($stylesheet, 1);
			$this->m_pdf->pdf->WriteHTML($vista);
			$this->m_pdf->pdf->Output($nombre_pdf,"D");
			//$this->load->view('admin/reporte_pdf_pedidos',$datos);
			//redireciona a la vista actual 
			
		}
		//redirect(base_url('cajero'));	
	}

	/**
		* Lista los documentos que an sido anulados para ser enviados a la vista a traves de un variable
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function ListarDocuAnulados()
	{
		//lista los documentos anulados
		$data['ListarAnulados'] = $this->Model_caja->getListarAnulados();

		//redireccionamos a la vista enviando un array a la variable
		$this->load->view('Cajero/anula_documento',$data);
	}

	/**
		* Lista los documentos para ser pagados cambiando el estado 
		*
		* @param id
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function Documentocancelado($id = NULL)
	{	
		if ($id != NULL)
		{
			$estadoboleta=2;
			//actualiza el documento segun los parametros 
			$this->Model_caja->ActualizarDocumentoCancelado($id,$estadoboleta);
			
			//redireciona a la vista actual 
			redirect(base_url('cajero'));
		}
	}

	/**
		* Lista los documentos para ser anulados cambiando estado
		*
		* @author Carlos Sanchez Aquino
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function Documentoanulado($id = NULL)
	{
		if ($id != NULL)
		{
			$estadoboleta=3;
			//actualiza el documento segun los parametros 
			$this->Model_caja->ActualizarDocumentoAnulado($id,$estadoboleta);

			//redireciona a la vista actual 
			redirect(base_url('cajero'));
		}
	}

	/**
		* Actualiza el estados de los pedidos segun su id.
		*
		* @author Carlos Sanchez Aquino
		* 	
		* @param idprogreso
		* @param porhacer
		* @param enprogreso
		* @param completado
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	function actualizarestado()
	{
		$datos = $this->input->post();
		if (isset($datos)) {
			$idprogreso 	= $datos["id"];
			if ($datos["regresar"] == "on") 
			{
				$porhacer 	= "1";
				$enprogreso 	= "1";
				$completado 	= "0";
			}

			$this->Model_caja->updateEstado($idprogreso,$porhacer,$enprogreso,$completado);
			redirect(base_url('cajero'));
			//echo $idprogreso;
			//echo "por hacer " . " " .$porhacer . "<br> en progreso " . " " .$enprogreso . "<br> Completado" . " " .$completado; 
			
		}
	}



	/**
		* devuelve un numero en letras
		*
		* @author Carlos Sanchez Aquino
		* 	
		* @param idprogreso
		* @param porhacer
		* @param enprogreso
		* @param completado
		*
		* fecha creacion: 18/08/2017
		* fecha modificacion: 23/08/2017	
	**/
	public function traducir($num) 
  { 
    $partes=explode('.',$num); 
    $s=$partes[0]; 
    if (strlen($s)>12) 
      die('Hasta 12 dígitos'); 
    $entera=$this->traduccionParcial($s); 
    if (count($partes)>1) 
    { 
      $entera=$entera.' con '.$partes[1]; 
    } 
    return ucfirst($entera); 
  }      

  private function traduccionParcial($s) 
  { 
    settype($s,'string');     
    $faltan=strlen($s) % 3; 
    $cad=''; 
    if ($faltan!=0) 
      $faltan=3-$faltan; 
    for($f=1;$f<=$faltan;$f++) 
    { 
      $cad.='0'; 
    } 
    $s=$cad.$s; 
    if (strlen($s)<=3 && $s[0]==0 && $s[1]==0 && $s[2]==0) 
      $resu='cero'; 
    else 
    {   
      $cad1=substr($s,strlen($s)-3,3); 
      $resu=$this->convertir($cad1); 
    } 
    if (strlen($s)>3) 
    { 
      $resu2=''; 
      $cad2=substr($s,strlen($s)-6,3); 
      if ($cad2[0]==0 && $cad2[1]==0 && $cad2[2] ==1) 
    $resu2='mil '; 
      else      
        if ($cad2[0]!=0 || $cad2[1]!=0 || $cad2[2] !=0) 
          $resu2=$this->convertir($cad2,2).'mil '; 
      $resu=$resu2.$resu;             
    } 
    if (strlen($s)>6) 
    { 
      $resu2=''; 
      $cad3=substr($s,strlen($s)-9,3); 
      if ($cad3[0]=='0' && $cad3[1]=='0' && $cad3[2]==1) 
    $resu2='un millón '; 
      else     
      if ($cad3[0]!=0 || $cad3[1]!=0 || $cad3[2] !=0) 
          $resu2=$this->convertir($cad3,2).'millones '; 
      $resu=$resu2.$resu;        
    } 

    if (strlen($s)>9) 
    { 
      $resu2=''; 
      $cad4=substr($s,strlen($s)-12,3); 

      if ($cad4[0]=='0' && $cad4[1]=='0' && $cad4[2]==1) 
      { 
    if ($cad3[0]==0 && $cad3[1]==0 && $cad3[2]==0) 
      $resu2='mil millones '; 
    else 
      $resu2='mil '; 
      }     
      else     
    $resu2=$this->convertir($cad4,2).'mil millones ';         
      $resu=$resu2.$resu;        
    } 
    return trim($resu); 
  } 

  private function convertir($num,$ind=1) 
  { 
    $cad=''; 
    if ($num[0]==1 && $num[1]==0 && $num[2]==0) 
    { 
       return 'cien '; 
    } 
    switch ($num[0]){ 
             case 1:$cad.='ciento ';break; 
         case 2:$cad.='doscientos ';break; 
         case 3:$cad.='trescientos ';break; 
         case 4:$cad.='cuatrocientos ';break; 
         case 5:$cad.='quinientos ';break; 
         case 6:$cad.='seiscientos ';break; 
         case 7:$cad.='setecientos ';break; 
         case 8:$cad.='ochocientos ';break; 
         case 9:$cad.='novecientos ';break;     
    }   
    switch ($num[1]) { 
        case 3:$cad.='treinta ';break; 
        case 4:$cad.='cuarenta ';break; 
        case 5:$cad.='cincuenta ';break; 
        case 6:$cad.='sesenta ';break; 
        case 7:$cad.='setenta ';break; 
        case 8:$cad.='ochenta ';break; 
        case 9:$cad.='noventa ';break;         
    } 
    if ($num[2]>=0 && $num[1]==1) 
    { 
      switch ($num[1].$num[2]) { 
            case 10:$cad.='diez ';break; 
            case 11:$cad.='once ';break; 
        case 12:$cad.='doce ';break; 
        case 13:$cad.='trece ';break; 
        case 14:$cad.='catorce ';break; 
        case 15:$cad.='quince ';break; 
        case 16:$cad.='dieciseis ';break; 
        case 17:$cad.='diecisiete ';break; 
        case 18:$cad.='dieciocho ';break; 
        case 19:$cad.='diecinueve ';break; 
      } 
      return $cad; 
    } 
    if ($num[2]>=0 && $num[1]==2) 
    { 
      switch ($num[1].$num[2]) { 
        case 20:$cad.='veinte ';break;   
        case 21:if ($ind==1) $cad.='veintiuno '; else $cad.='veintiun ';break; 
        case 22:$cad.='veintidos ';break; 
        case 23:$cad.='veintitrés ';break; 
        case 24:$cad.='veinticuatro ';break; 
        case 25:$cad.='veinticinco ';break; 
        case 26:$cad.='veintiseis ';break; 
        case 27:$cad.='veintisiete ';break; 
        case 28:$cad.='veintiocho ';break; 
        case 29:$cad.='veintinueve ';break; 

      } 
      return $cad; 
    } 
    if ($num[2]!=0 && $num[1]!=0) 
    { 
      if ($num[0]>0 || $num[1]>0) 
    $cad.='y '; 
    } 
    if ($num[1]!=1) 
    { 
      switch ($num[2]) { 
            case 1:if ($ind==1) $cad.='uno ';else $cad.='un ';break; 
        case 2:$cad.='dos ';break; 
        case 3:$cad.='tres ';break; 
        case 4:$cad.='cuatro ';break; 
        case 5:$cad.='cinco ';break; 
        case 6:$cad.='seis ';break; 
        case 7:$cad.='siete ';break; 
        case 8:$cad.='ocho ';break; 
        case 9:$cad.='nueve ';break;         
      } 
    }       
    return $cad;   
  }
}

	

