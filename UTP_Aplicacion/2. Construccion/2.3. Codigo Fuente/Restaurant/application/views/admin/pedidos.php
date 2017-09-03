<?php include 'menu.php'; ?>
		<!-- Contenido -->
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Por Hacer</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                            <ul class="sortable-list connectList agile-list" id="todo">
                                <?php
                                    foreach ($porhacer as $pedidoporhacer) {
                                        if ($pedidoporhacer->Estado_Administrador == 1 && $pedidoporhacer->Estado_Cocinero == 0) {
                                 ?>
                                <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            Comanda N° <?php echo $pedidoporhacer->Comanda; ?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="panel-group" id="accordion">
                                            <?php
                                            foreach ($vistaporhacer as $nuevo) {
                                                if ($pedidoporhacer->idPedidos == $nuevo->idPedidos) {  
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
                                            <a  data-toggle="modal" data-target="#modal-form-porhacer"  class="pull-right btn btn-xs btn-danger" onClick='CambiarEstadoPorHacer("<?php echo $pedidoporhacer->idPedidos; ?>");'>Ver</a>
                                            <i class="fa fa-clock-o"></i> <?php echo date('d.m.Y', strtotime($pedidoporhacer->Fecha)) . " " .$pedidoporhacer->Hora_Pedido; ?>Hrs.
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
                <div class="col-lg-4">
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
                                        <i class="fa fa-clock-o"></i> <?php echo date('d.m.Y', strtotime($pedidoprogreso->Fecha)) . " " .$pedidoprogreso->Hora_Pedido; ?>Hrs.
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
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Completado</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                            <ul class="sortable-list connectList agile-list" id="completed">
                                <?php
                                    foreach ($completado as $pedidocompletado) {
                                        if ($pedidocompletado->Estado_Administrador == 1 && $pedidocompletado->Estado_Cocinero == 1  && $pedidocompletado->Estado_Cajero==1) {
                                            
                                        
                                 ?>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Comanda N° <?php echo $pedidocompletado->Comanda; ?>
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                        <?php
                                        foreach ($vistacompletado as $nuevo) {
                                            if ($pedidocompletado->idPedidos == $nuevo->idPedidos) {  
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
                                        <i class="fa fa-clock-o"></i> <?php echo date('d.m.Y', strtotime($pedidocompletado->Fecha)) . " " .$pedidocompletado->Hora_Pedido; ?>Hrs.
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
                <div id="modal-form-porhacer" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Cambiar de Estado el Pedido</h4>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url('pedido/actualizarestado'); ?>" method="POST">
                                <div class="modal-body">
                                    <div class="ibox-content">
                                        <div class="form-group">
                                        <input type="hidden" id="idporhacer" name="id">
                                            <label class="col-md-6 control-label">Pedido Por Hacer</label>
                                            <div>
                                                <input type="checkbox" name="porhacer" class="js-switch_0" checked />
                                            </div>
                                        </div>                    
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Pedido en Progreso</label>
                                            <div>
                                                <input type="checkbox" name="enprogreso" class="js-switch_1" />
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
                </div>
                <div id="modal-form-progreso" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Cambiar de Estado el Pedido</h4>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url('pedido/actualizarestado'); ?>" method="POST">
                                <div class="modal-body">
                                    <div class="ibox-content">
                                        <div class="form-group">
                                            <input type="hidden" id="idprogreso" name="id">
                                            <label class="col-md-6 control-label">Pedido en Progreso</label>
                                            <div>
                                                <input type="hidden" name="porhacer" value="on" />
                                            </div>
                                            <div>
                                                <input type="hidden" name="enprogreso" value="on" />
                                            </div>
                                            <div>
                                                <input type="checkbox" class="js-switch_2" checked disabled="" />
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

<?php include 'footer.php'; ?>
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

        CambiarEstadoPorHacer = function(id)
        {
            $('#idporhacer').val(id);
        }

        CambiarEstadoProgreso = function (id) {
            $('#idprogreso').val(id);
        }
   </script>
   <script type="text/javascript">
    setTimeout('document.location.reload()',75000); 
    </script>