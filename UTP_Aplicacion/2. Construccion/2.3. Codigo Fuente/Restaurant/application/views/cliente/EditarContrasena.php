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
    


    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url(); ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/switchery/switchery.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css">

</head>
<?php 

foreach ($editar_cliente as $editar) {
	foreach ($editar_usuario as $e_u) {
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox">
					<div class="ibox-content">
						<h1>
							Escriba su nueva contraseña
						</h1>
						
						
						<form id="formeditcliente1" action="<?php echo base_url('Cliente/actualizaringreso'); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo $editar->idCliente; ?>">
							<input  name="correo" type="hidden"  value="<?php echo $e_u->CorreoElectronico;?>">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="control-label"> Password</label>
									<input id="confirm" name="confirm" type="password" class="form-control" value="" >
								</div>
								<div class="form-group">
									<label class="control-label">Confirmar Password</label>
									<input id="contrasena" name="contrasena" type="text" class="form-control" value="">
								</div>
								
							</div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						</div>
					</fieldset>

					<div class="right">
						<button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Actualizar Constraseña</button>   
						<a href="<?php echo base_url('Login_cliente/salir'); ?>" class="btn btn-success" ><i class="fa fa-ban"></i>&nbsp;Cancelar</a>
					</div> 
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
		}
	}
		include 'footer.php'; ?>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
        <!-- Jquery Validate -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script> 	
        <!-- Script Validación -->
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>

</html>