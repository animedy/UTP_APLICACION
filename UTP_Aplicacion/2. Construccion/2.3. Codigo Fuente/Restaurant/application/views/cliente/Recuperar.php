<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            
            <h3>RECUPERA TU CONTRASEÑA</h3>
            
            <form id="FormLogin" class="m-t" role="form" data-toggle="validator" method="post" action="<?php echo base_url('Cliente/Contrasena'); ?>">
                <div class="form-group">
						<h3>Ingrese su correo</h3>
                    <input  type="text" name="login" class="form-control" placeholder="Correo" >
                </div>
                <div class="form-group">
               		 <h3>Ingrese su DNI</h3>	
                    <input type="number"  name="Dni" class="form-control" placeholder="Dni" >
                </div>
                <button type="submit" class="btn btn-success block full-width m-b">Aceptar</button>
               
     
                
                   
                  <? echo isset($error)?$error:''; ?>
                  <div>
                  <a type="button" class="btn btn-white" data-dismiss="modal" href="<?php echo base_url ('Login_cliente');?>" class="fa fa-times">Cerrar</a>
                  </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            </form>
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- Bootstrap Validator -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validator.js"></script>

</body>

</html>