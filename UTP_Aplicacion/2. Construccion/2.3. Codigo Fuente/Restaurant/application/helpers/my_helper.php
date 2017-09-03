<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
if ( ! function_exists('find_array')) 
{ 
    function find_in_object($array,$option,$field){
		foreach($array as $arr){
			if($arr->id == $option)
				return $arr->$field;
		}
    }
	function find_index_object($array,$value){
		foreach($array as $index => $arr){
			if($arr->id == $value)
				return $index;
		}
    }
	function find_in_reservation($array,$fecha,$habitacion){
		foreach($array as $arr){
			if($arr->habitacion==$habitacion)
				if(strtotime($fecha)>=strtotime($arr->fecha_inicio) && strtotime($fecha)<=strtotime($arr->fecha_fin))
					return $arr->id;
		}
    }
	function find_hab_in_reservation($array,$habitacion){
		foreach($array as $arr){
			if($arr->habitacion==$habitacion)
				return $arr;
		}
    }
	function find_in_tarifa($array,$option){
		foreach($array as $arr){
			if($arr->tarifas == $option)
				return $arr->precio;
		}
    }
	function find_in_array($array,$option,$field){
		foreach($array as $arr){
			if($arr['id'] == $option){
				return $arr[$field];
			}
		}
    }
	function find_in_arraySingle($array,$option){
		for($i=1;$i<count($array);$i++){
			if($array[$i] == $option){
				return true;
			}
		}
		return false;
    }
	function get_page($total,$pagina,$tabla){
		$r = "<div id='page_".$tabla."' class='paginacion'>";
		if($total>10){
			$cantidad = ceil($total / 10) - 1;
			
			$display_pages=10;//how many pages to display
			
			$r .= "<a href='0'>< < Inicio</a> ";//Start
			if ($pagina>=1) $r .= "<a href='".($pagina-1)."'> < < Anterior </a> "; //Previous
			 
			for ($i = $pagina; $i <= $cantidad && $i<=($pagina+$display_pages); $i++) {
				  if ($i == $pagina) $r .= "<strong>".($i+1)." - </strong>";//not printing the link
				  else $r .= "<a href='".$i."'>".($i+1)."</a> - ";//link
			}
			 
			if (($pagina+$display_pages)< $cantidad) $r .= "..."; //etcetera...
			if ($pagina<$cantidad) $r .= "<a href='".($pagina+1)."'> Siguiente >>  ";//Next
			$r .= "<a href='".$cantidad."'>Fin >></a>";//end
		}
		$r .= "</div>";
		return $r;
	}
	function restaFechas($dFecIni, $dFecFin){
		$dFecIni = str_replace("-","",$dFecIni);
		$dFecIni = str_replace("/","",$dFecIni);
		$dFecFin = str_replace("-","",$dFecFin);
		$dFecFin = str_replace("/","",$dFecFin);
		
		/*ereg( "([0-9]{2,4})([0-9]{1,2})([0-9]{1,2})", $dFecIni, $aFecIni);
		ereg( "([0-9]{2,4})([0-9]{1,2})([0-9]{1,2})", $dFecFin, $aFecFin);*/
        preg_match( "/([0-9]{2,4})([0-9]{1,2})([0-9]{1,2})/", $dFecIni, $aFecIni);
		preg_match( "/([0-9]{2,4})([0-9]{1,2})([0-9]{1,2})/", $dFecFin, $aFecFin);
		
		$date1 = mktime(0,0,0,$aFecIni[2], $aFecIni[3], $aFecIni[1]);
		$date2 = mktime(0,0,0,$aFecFin[2], $aFecFin[3], $aFecFin[1]);
		
		return round(($date2 - $date1) / (60 * 60 * 24));
	}
	function objToArray($object) {
		$array = array();
		foreach ($object as $key=>$value){
			if (is_object($value)){ 
				foreach ($value as $keys=>$values){
					if (is_object($values) || is_array($values)){ 
						$array[$key]=objToArray($values); 
					}else{
						$array[$key]=$values; 
					} 
				}
			}else{
				$array[$key]=$value; 
			} 
		}
		return $array;
	}
} 
?>