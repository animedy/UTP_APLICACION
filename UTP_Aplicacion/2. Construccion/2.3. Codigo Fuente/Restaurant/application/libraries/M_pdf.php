<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	include_once APPPATH.'libraries/third_party/mpdf/mpdf.php';

/**
* 
*/
class M_pdf 
{
	
	function __construct()
	{
		$this->pdf = new mPDF('c', 'A4');
	}
}


 ?>