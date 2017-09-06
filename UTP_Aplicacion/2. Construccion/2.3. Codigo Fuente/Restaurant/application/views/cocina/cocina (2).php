<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>COCINA</title>

	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/switchery/switchery.css" rel="stylesheet">

</head>
<body>

			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                            <div class="row border-bottom">
					            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					            <div class="navbar-header">
					                <div class="navbar-minimalize minimalize-styl-2 ">
					                	<h2>Cocina</h2> 
					                </div>
					            </div>
					                <ul class="nav navbar-top-links navbar-right">
					                    <li>
					                        <span class="m-r-sm text-muted welcome-message"><?php echo $this->session->userdata('sexo')=='M'?'Bienvenido ':'Bienvenida '; echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido');?></span>
					                    </li>
					                    <li>
					                        <a href="#" onclick="window.location='<?php echo base_url(); ?>index.php/login/salir';">
					                            <i class="fa fa-sign-out"></i> Cerrar Sesión
					                        </a>
					                    </li>
					                </ul>

					            </nav>
					        </div>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
                    <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
               
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>En Progreso</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                            <ul class="sortable-list connectList agile-list" id="inprogress">
                                <?php
                                    foreach ($progreso as $pedidoprogreso) {
                                        if ($pedidoprogreso->Estado_Administrador == 1 && $pedidoprogreso->Estado_Cocinero == 1 && $pedidoprogreso->Estado_Cajero==0) {
                                            
                                        
                                 ?>
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        Comanda N° <?php echo $pedidoprogreso->Comanda; ?>
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                        <?php
                                        foreach ($vistaenprogreso as $nuevo) {
                                            if ($pedidoprogreso->idPedidos == $nuevo->idPedidos) {  
                                         ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $nuevo->idDetallePedido ?>">
                                                        <?php
                                                        echo $nuevo->Cantidad . " " . $nuevo->Platos; 
                                                         ?>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse<?php echo $nuevo->idDetallePedido ?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <b>Observación: <i><?php echo $nuevo->Observacion;  ?></i></b>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a data-toggle="modal" href="#modal-form-progreso" class="pull-right btn btn-xs btn-warning" onclick='CambiarEstadoProgreso("<?php echo $pedidoprogreso->idPedidos; ?>");'>Ver</a>
                                        <i class="fa fa-clock-o"></i> <?php echo date('d.m.Y H:i:s', strtotime($pedidoprogreso->Fecha_y_Hora_Pedido)); ?>Hrs.
                                    </div>
                                </div>
                                <?php
                                        }
                                    } 
                                 ?>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div id="modal-form-progreso" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Cambiar de Estado el Pedido</h4>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url('cocina/actualizarestado'); ?>" method="POST">
                                <div class="modal-body">
                                    <div class="ibox-content">
                                        <div class="form-group">
                                            <input type="hidden" id="idprogreso" name="id">
                                            <label class="col-md-6 control-label">Pedido en Progreso</label>
                                            <div>
                                                <input type="hidden" name="porhacer" value="on" />
                                            </div>
                                            <div>
                                                <input type="checkbox" name="enprogreso" class="js-switch_2" checked />
                                            </div>
                                        </div>                    
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Pedido Completado</label>
                                            <div>
                                                <input type="checkbox" name="completado" class="js-switch_3" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                                    <button type="submit" class="btn btn-primary" id="add"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                </div>
                            </form>|
                        </div>
                    </div>
                </div>
        </div>
        <!-- Switchery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/switchery/switchery.js"></script>
    <script type="text/javascript">

        var elem_0 = document.querySelector('.js-switch_0');
        var switchery_0 = new Switchery(elem_0, { color: '#ED5565' });

        var elem_1 = document.querySelector('.js-switch_1');
        var switchery_1 = new Switchery(elem_1, { color: '#f8ac59' });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#f8ac59' });

        var elem_3 = document.querySelector('.js-switch_3');
        var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

        CambiarEstadoPorHacer = function(id)
        {
            $('#idporhacer').val(id);
        }

        CambiarEstadoProgreso = function (id) {
            $('#idprogreso').val(id);
        }
    </script>
    <script type="text/javascript">
    setTimeout('document.location.reload()',10000); 
    </script>
</body>
</html>