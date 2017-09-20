<?php include 'menu.php'; ?>

        <!--<div class="wrapper wrapper-content animated fadeInRight ecommerce">-->
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="col-lg-3">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span><b> EMITIDOS</b></span>
                                <h2 class="font-bold"><?php echo $numemitidos?></h2>
                            </div>
                            <p class="font-bold">Mas Información <i class="fa fa-arrow-circle-right"></i></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span><b> ANULADOS </b></span>
                                <h2 class="font-bold"><?php echo $numanulados?></h2>
                            </div>
                            <p class="font-bold">Mas Información <i class="fa fa-arrow-circle-right"></i></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="tabs-container">
                                <h2>GENERAR COMPROBANTE DE PAGO</h2>                         
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-file-o"></i>GENERAR COMPROBANTE</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-file"></i>POR PAGAR</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-file-text"></i>PAGADOS</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="panel-body">  
                                            <div class="ibox-content">
                                                <!--<div class="full-height-scroll">-->
                                                <div class="table-responsive">
                                                    <!--<form id="formCAJERO" method="POST" href="<?php echo base_url('VerDocumento');?>">-->
                                                    <!--<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">-->
                                                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table">
                                                        <thead>
                                                            <tr>
                                                                <th>OBSERVACION</th>
                                                                <th>PEDIDO</th>
                                                                <th data-hide="phone">FECHA</th>
                                                                <th data-hide="phone">CLIENTE</th>
                                                                <th data-hide="phone">DNI</th>
                                                                <th data-hide="phone,tablet" >DIRECCION</th>
                                                                <!--<th data-hide="phone,tablet" >REPARTIDOR</th>-->
                                                                <th data-hide="phone">TOTAL</th>
                                                                <th class="text-right">ACCION</th>
                                                                <th data-hide="phone">ESTADO</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                foreach($listapedidos as $listapedido) 
                                                                {          
                                                            ?>  
                                                            <tr>
                                                                <td>
                                                                    <a  data-toggle="modal" data-target="#modal-form-estado"  class="pull-center btn btn-xs btn-danger" onClick='CambiarEstado("<?php echo $listapedido->idPedidos; ?>");'>Ver</a>
                                                                </td>

                                                                <td><?php echo $listapedido->Comanda;?></td>
                                                                <td><?php echo date("d-m-Y",strtotime($listapedido->Fecha_Pedido));?></td>
                                                                <td><?php echo $listapedido->Nombres;?></td>
                                                                <td><?php echo $listapedido->Dni;?></td>
                                                                <td><?php echo $listapedido->Direccion;?></td>
                                                                <!--<td>
                                                                <input type="hidden" name="pedido" value="<?php echo $listapedido->idPedidos; ?>">
                                                                <select class="form-control" name="repartidor">
                                                                <?php foreach ($repartidor as $repartidores) 
                                                                {
                                                                ?>
                                                                    <option nombre="empleado" value="<?php echo $repartidores->idEmpleados; ?>"><?php echo $repartidores->Nombres." ".$repartidores->Apellidos; ?></option>
                                                                    
                                                                <?php 
                                                                } 
                                                                ?>
                                                                </select>
                                                                </td>-->
                                                                <td><?php echo "S/.".$listapedido->Total;?></td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">                      
                                                                        <a  href="<?php echo base_url('VerDocumento')."/".$listapedido->idPedidos;?>" id='boton' class="btn btn-blue btn-sm"><i height="100px" class="fa fa-save fa-2x"></i> </a>    
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span class="label label-primary">Pendiente</span>
                                                                </td>
                                                            </tr>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="7">
                                                                    <ul class="pagination pull-right"></ul>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <!--</form>-->   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                        <div class="panel-body">
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <!--<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">-->
                                                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table">
                                                        <thead>
                                                            <tr>
                                                                <th>DOCUMENTO</th>
                                                                <th data-hide="phone">FECHA</th>
                                                                <th data-hide="phone">NOMBRE</th>
                                                                <th data-hide="phone">DNI</th>
                                                                <th data-hide="phone,tablet" >TOTAL</th>
                                                                <!--<th data-hide="phone">TOTAL</th>-->
                                                                <th data-hide="phone">ESTADO</th>
                                                                <th class="text">ACCION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                foreach ($ListarPorCancelar as $ListarPorCancelar) {         
                                                            ?>  
                                                            <tr>
                                                                <!--id pedido-->
                                                                 <td><?php echo $ListarPorCancelar->idDocumentoBoleta;?></td>
                                                                <!--fecha pedido-->
                                                                <td><?php echo date("d-m-Y",strtotime($ListarPorCancelar->Fecha_Emision));?></td>
                                                                <!--cliente pedido-->
                                                                <td><?php echo $ListarPorCancelar->Nombre;?></td>
                                                                <!--cliente dni pedido-->
                                                                <td><?php echo $ListarPorCancelar->Dni;?></td>
                                                                <!--cliente direccion pedido-->
                                                                <td><?php echo "S/.".$ListarPorCancelar->Total;?></td>
                                                                <!--total pedido-->
                                                                <!--<td><?php echo $ListarPorCancelar->Total;?></td>-->
                                                                <!--accion pedido-->
                                                                <td>
                                                                    <?php if($ListarPorCancelar->Estado_Boleta='Por Cancelar'){
                                                                    ?>
                                                                        <span class="label label-success">Enviado</span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td class="text">
                                                                    <div class="btn-group">
                                                                     <a class="btn btn-white btn-sm" href="<?php echo base_url('caja/Documentocancelado')."/".$ListarPorCancelar->idDocumentoBoleta; ?>"><i class="fa fa-pencil"></i>CANCELAR</a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                     <a class="btn btn-white btn-sm" href="<?php echo base_url('caja/Documentoanulado')."/".$ListarPorCancelar->idDocumentoBoleta; ?>"><i class="fa fa-pencil"></i>ANULAR</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="7">
                                                                    <ul class="pagination pull-right"></ul>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>      
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-3" class="tab-pane">
                                        <div class="panel-body">
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <!--<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">-->
                                                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table">
                                                        <thead>
                                                            <tr>
                                                                <th>DOCUMENTO</th>
                                                                <th data-hide="phone">FECHA</th>
                                                                <th data-hide="phone">NOMBRE</th>
                                                                <th data-hide="phone">DNI</th>
                                                                <th data-hide="phone,tablet" >TOTAL</th>
                                                                <!--<th data-hide="phone">TOTAL</th>-->
                                                                <th data-hide="phone">ESTADO</th>
                                                                <!--<th class="text-right">ACCION</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                foreach ($ListarCancelados as $ListarCancelados) {          
                                                            ?>  
                                                            <tr>
                                                                <!--id pedido-->
                                                                 <td><?php echo $ListarCancelados->idDocumentoBoleta;?></td>
                                                                <!--fecha pedido-->
                                                                <td><?php echo date("d-m-Y",strtotime($ListarCancelados->Fecha_Emision));?></td>
                                                                <!--cliente pedido-->
                                                                <td><?php echo $ListarCancelados->Nombre;?></td>
                                                                <!--cliente dni pedido-->
                                                                <td><?php echo $ListarCancelados->Dni;?></td>
                                                                <!--cliente direccion pedido-->
                                                                <td><?php echo "S/.".$ListarCancelados->Total;?></td>
                                                                <td>
                                                                    <span class="label label-warning">Cancelado</span>
                                                                </td>
                                                            </tr>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="7">
                                                                    <ul class="pagination pull-right"></ul>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>      
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="modal-form-estado" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Cambio de Estado</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('Caja/actualizarestado'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="ibox-content">                  
                                <div class="form-group">
                                    <input type="hidden" id="regresarcocina" name="id">
                                    <label class="col-md-6 control-label">Regresar a Cocina</label>
                                    <div>
                                        <input type="checkbox" name="regresar" class="js-switch_1" value="on" />
                                    </div>
                                    <div>
                                        <input type="hidden" name="completado" value="0" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="add"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        <!--</div>-->

        <?php include 'footer.php'; ?>

        <script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
        <!-- Jquery Validate -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
        <!-- Script Validación -->
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
        <!-- Fin Script Validación -->
        <!-- Data picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

        <!-- Switchery -->
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
            CambiarEstado = function(id)
            {
                $('#regresarcocina').val(id);
            }
        </script>
        <script type="text/javascript">
            setTimeout('document.location.reload()',15000); 
        </script>




