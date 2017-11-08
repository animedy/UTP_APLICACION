<?php include 'menu.php'; ?>
		<!-- Contenido -->

	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Asignación de Pedido</h5>
                    </div>
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Pedidos sin Asignar</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Pedidos Asignados</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Comanda</th>
                                                        <th>Cliente</th>
                                                        <th>Precio</th>
                                                        <th>Fecha Pedido</th>
                                                        <th>Estado</th>
                                                        
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    foreach ($reportecompletados as $completado) {
                                                        foreach ($asignaciones as $asignacion) {
                                                            if ($completado->idPedidos != $asignacion->pedidos_idPedidos) {
                                                            
                                                        
                                                ?>
                                                <tr>
                                                    <td>
                                                       <? echo $completado->Comanda; ?>
                                                    </td>
                                                    <td>
                                                        <? echo $completado->Nombre_Cliente; ?>
                                                    </td>
                                                    <td>
                                                        <? echo "S/. ".$completado->Total; ?>
                                                    </td>
                                                    <td>
                                                        <? echo  date("d-m-Y",strtotime($completado->Fecha)); ?>

                                                    </td>
                                                    <td>
                                                        <span class="label label-danger">Sin Asignar</span>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#modal-form" class="btn btn-white btn-xs" onclick='Asignar("<?php echo $completado->idPedidos; ?>");' ><i class="fa fa-bicycle"></i>&nbsp;Asignar</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                            }
                                                        } 
                                                    } 
                                                 ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Comanda</th>
                                                        <th>Cliente</th>
                                                        <th>Precio</th>
                                                        <th>Fecha Pedido</th>
                                                        <th>Estado</th>
                                                        
                                                        <th>Acción</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                              <div class="panel-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                      <div class="ibox">
                                          <div class="ibox-content">
                                              <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Comanda</th>
                                                        <th>Cliente</th>
                                                        <th>Precio</th>
                                                        <th>Fecha Pedido</th>
                                                        <th>Estado</th>
                                                        <th>Repartidor</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    foreach ($reportecompletados as $completado) {
                                                        foreach ($asignaciones as $asignacion) {
                                                            if ($completado->idPedidos == $asignacion->pedidos_idPedidos) {
                                                            
                                                        
                                                ?>
                                                <tr>
                                                    <td>
                                                       <? echo $completado->Comanda; ?>
                                                    </td>
                                                    <td>
                                                        <? echo $completado->Nombre_Cliente; ?>
                                                    </td>
                                                    <td>
                                                        <? echo "S/. ".$completado->Total; ?>
                                                    </td>
                                                    <td>
                                                        <? echo  date("d-m-Y",strtotime($completado->Fecha)); ?>

                                                    </td>
                                                    <td>
                                                        <span class="label label-primary">Asignado</span>
                                                    </td>
                                                    <td>
                                                        <?php   foreach ($empleados as $empleado){ 

                                                                        if ($empleado->idEmpleados == $asignacion->empleados_idEmpleados) {
                                                                            echo $empleado->Nombres . " " . $empleado->Apellidos;
                                                                        }
                                                                    
                                                                }?>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#modal-form-reasignar" class="btn btn-white btn-xs" onclick='Reasignar("<?php echo $asignacion->idasignacion; ?>");' ><i class="fa fa-bicycle"></i>&nbsp;Resignar</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                            }
                                                        } 
                                                    } 
                                                 ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Comanda</th>
                                                        <th>Cliente</th>
                                                        <th>Precio</th>
                                                        <th>Fecha Pedido</th>
                                                        <th>Estado</th>
                                                        <th>Repartidor</th>
                                                        <th>Acción</th>
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
        </div>
    </div>
        <!-- Fin Contenido -->
        <!-- Formulario Asignacion Contenido -->
        <div id="modal-form" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
        
            <div class="modal-dialog modal-m">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Asignación de Repartidor</h4>
                        <small class="font-bold">Seleccione los datos del repartidor.</small>
                    </div>
                    <form id="formasignacion" action="<?php echo base_url('pedido/InsertarAsignacion'); ?>" class="form-horizontal"  method="POST" >
                        <div class="modal-body">                   
                            <div class="ibox-content">                    
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Empleado Asignado</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="repartidor" required>
                                            <option value="" selected>-- Seleccione Repartidor --</option>
                                        <?php 
                                        foreach ($empleados as $empleado) {
                                            foreach ($repartidores as $repartidor) {
                                                if ($repartidor->idTipoEmpleado == $empleado->TipoEmpleado_idTipoEmpleado ) {
                                        ?>
                                                    <option value="<?php echo  $empleado->idEmpleados; ?>"><?php echo $empleado->Nombres . " " . $empleado->Apellidos;  ?></option>
                                        <?php  } 
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="idpedidoasignado" id="idpedidoasignado">
                                </div>                               
                            </div>

                        </div>
                        
                        <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                                <button type="submit" class="btn btn-success" id="add"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                        </div>
                    </form>                 
                </div>                    
            </div>
                           
        </div>
                                  
		<!-- Fin Formulario Asignacion Contenido -->

                <!-- Formulario Reasignacion Contenido -->
        <div id="modal-form-reasignar" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
        
            <div class="modal-dialog modal-m">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Reasignación de Repartidor</h4>
                        <small class="font-bold">Seleccione los datos del repartidor.</small>
                    </div>
                    <form id="formasignacion" action="<?php echo base_url('pedido/ActualizarAsignacion'); ?>" class="form-horizontal"  method="POST" >
                        <div class="modal-body">                   
                            <div class="ibox-content">                    
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Empleado Asignado</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="repartidor" required>
                                            <option value="" selected>-- Seleccione Repartidor --</option>
                                        <?php 
                                        foreach ($empleados as $empleado) {
                                            foreach ($repartidores as $repartidor) {
                                                if ($repartidor->idTipoEmpleado == $empleado->TipoEmpleado_idTipoEmpleado ) {
                                        ?>
                                                    <option value="<?php echo  $empleado->idEmpleados; ?>"><?php echo $empleado->Nombres . " " . $empleado->Apellidos;  ?></option>
                                        <?php  } 
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <input type="text" name="idasignacion" id="idasignacion">
                                </div>                               
                            </div>

                        </div>
                        
                        <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                                <button type="submit" class="btn btn-success" id="add"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                        </div>
                    </form>                 
                </div>                    
            </div>
                           
        </div>
                                  
        <!-- Fin Formulario Reasignacion Contenido -->


        
        
<?php include 'footer.php'; ?>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
        <!-- Jquery Validate -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
        <!-- Script Validación -->
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
        
        <script type="text/javascript">
        $( document ).ready(function() {
            Asignar = function (id) 
            {
                $('#idpedidoasignado').val(id);
            }
            

            Reasignar = function (id) 
            {
                $('#idasignacion').val(id);
            }
            });
        </script>