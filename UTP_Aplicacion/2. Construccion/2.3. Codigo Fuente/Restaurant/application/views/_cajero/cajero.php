<?php include 'menu.php'; ?>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ibox">
                            <div class="ibox-content">
                                <!--<span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>-->
                                <h2>PEDIDOS PARA GENERAR COMPROBANTE DE PAGO</h2>
                                <p>
                                    Todos los pedidos se les generar su respectivo comprobante de pago
                                </p>
                                <div class="input-group">
                                    <input type="text" placeholder="pedido" class="input form-control">
                                    <span class="input-group-btn">
                                            <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
                                    </span>
                                </div>
                                

                                <div class="clients-list">
                                    <ul class="nav nav-tabs">
                                        <!--<span class="pull-right small text-muted">1406 Elements</span>-->
                                        <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-file-o"></i> PENDIENTES DE GENERAR</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-file"></i> POR CANCELAR</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-file-text"></i> CANCELADOS</a></li>
                                        <!--<li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-clipboard"></i> ANULADOS</a></li>-->
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="full-height-scroll">
                                                <div class="table-responsive">
                                                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                                        <thead>
                                                            <tr>
                                                                <th>PEDIDO</th>
                                                                <th data-hide="phone">FECHA</th>
                                                                <th data-hide="phone">CLIENTE</th>
                                                                <th data-hide="phone">DNI</th>
                                                                <th data-hide="phone,tablet" >DIRECCION</th>
                                                                <th data-hide="phone">TOTAL</th>
                                                                <th class="text-right">ACCION</th>
                                                                <th data-hide="phone">ESTADO</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                foreach ($listapedidos as $listapedido) {          
                                                            ?>  
                                                            <tr>
                                                                <!--id pedido-->
                                                                 <td><?php echo $listapedido->idPedidos;?></td>
                                                                <!--fecha pedido-->
                                                                <td><?php echo date("d-m-Y",strtotime($listapedido->Fecha_Pedido));?></td>
                                                                <!--cliente pedido-->
                                                                <td><?php echo $listapedido->Nombres;?></td>
                                                                <!--cliente dni pedido-->
                                                                <td><?php echo $listapedido->Dni;?></td>
                                                                <!--cliente direccion pedido-->
                                                                <td><?php echo $listapedido->Direccion;?></td>
                                                                <!--total pedido-->
                                                                <td><?php echo $listapedido->Total;?></td>
                                                                <!--estado pedido-->
                                                                <!--accion pedido-->
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                                                            
                                                                        <a href="<?php echo base_url('VerDocumento')."/".$listapedido->idPedidos;?>" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> VER </a>
                                                                        

                                                                        <!--<a href="<?php echo base_url('Documento');?>" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> VER </a>-->
                                                                        
                                                                        <!--<a href="<?php echo base_url('EditarEmpleado')."/".$empleado->idEmpleados; ?>"><span class="fa fa-pencil"></span></a>-->

                                                                        <!--<a data-toggle="modal" data-target="#modal-documento" class="btn btn-white btn-sm"  action="<?php echo base_url('caja/actualizarestado')."/".$listapedido->idPedidos; ?> <i class="fa fa-pencil"></i> Cambiar Estado </a>-->
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
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="full-height-scroll">
                                                <div class="table-responsive">
                                                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                                        <thead>
                                                            <tr>
                                                                <th>DOCUMENTO</th>
                                                                <th data-hide="phone">FECHA</th>
                                                                <th data-hide="phone">NOMBRE</th>
                                                                <th data-hide="phone">DNI</th>
                                                                <th data-hide="phone,tablet" >TOTAL</th>
                                                                <!--<th data-hide="phone">TOTAL</th>-->
                                                                <th data-hide="phone">ESTADO</th>
                                                                <th class="text-right">ACCION</th>
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
                                                                <td><?php echo $ListarPorCancelar->Total;?></td>
                                                                <!--total pedido-->
                                                                <!--<td><?php echo $ListarPorCancelar->Total;?></td>-->
                                                                <!--accion pedido-->
                                                                <td>
                                                                    <?php IF($ListarPorCancelar->Estado_Boleta='Por Cancelar'){
                                                                    ?>
                                                                        <span class="label label-success">Enviado</span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                     <a class="btn btn-white btn-sm" href="<?php echo base_url('caja/Documentocancelado')."/".$ListarPorCancelar->idDocumentoBoleta; ?>"><i class="fa fa-pencil"></i> Cambiar a Cancelado</a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                     <a class="btn btn-white btn-sm" href="<?php echo base_url('caja/Documentoanulado')."/".$ListarPorCancelar->idDocumentoBoleta; ?>"><i class="fa fa-pencil"></i> Cambiar a Anulado</a>
                                                                    </div>
                                                                    <!--<a href="<?php echo base_url('login/eliminar')."/".$empleado->idEmpleados; ?>"><span class="fa fa-trash"></span></a>
                                                                    <a href="<?php echo base_url('EditarEmpleado')."/".$empleado->idEmpleados; ?>"><span class="fa fa-pencil"></span></a>-->
                                                                    
                                                                    <!--<div class="btn-group">
                                                                        <a data-toggle="modal" data-target="#modal-documento" class="btn btn-white btn-sm"  onClick='CambiarEstadoDocumento("<?php echo $ListarPorCancelar->idDocumentoBoleta; ?>");'><i class="fa fa-pencil"></i> Cambiar Estado </a>
                                                                    </div>-->
                                                                </td>
                                                                 <!--estado pedido-->
                                                                
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
                                        <div id="tab-3" class="tab-pane">
                                            <div class="full-height-scroll">
                                                <div class="table-responsive">
                                                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
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
                                                                <td><?php echo $ListarCancelados->Total;?></td>
                                                                <!--total pedido-->
                                                                <!--<td><?php echo $ListarCancelados->Total;?></td>-->
                                                                <!--accion pedido-->
                                                                <!--<td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="<?php echo base_url('VerDocumento')."/".$pedido->idPedidos;?>" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> VER </a>
                                                                        <a data-toggle="modal" data-target="#modal-documento" class="btn btn-white btn-sm"  onClick='CambiarEstadoPorHacer("<?php echo $pedidoporhacer->idPedidos; ?>");'><i class="fa fa-pencil"></i> Cambiar Estado </a>
                                                                    </div>
                                                                </td>-->
                                                                <!--estado pedido-->
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
                                        <!--<div id="tab-4" class="tab-pane">
                                            <div class="full-height-scroll">
                                                <div class="table-responsive">
                                                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                                        <thead>
                                                            <tr>
                                                                <th>PEDIDO</th>
                                                                <th data-hide="phone">FECHA</th>
                                                                <th data-hide="phone">CLIENTE</th>
                                                                <th data-hide="phone">DNI</th>
                                                                <th data-hide="phone,tablet" >DIRECCION</th>
                                                                <th data-hide="phone">TOTAL</th>
                                                                <th data-hide="phone">ESTADO</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           <?php 
                                                                foreach ($ListarAnulados as $ListarAnulados) {          
                                                            ?>  
                                                            <tr>
                                                                 <td><?php echo $ListarAnulados->idPedidos;?></td>
                                                                <td><?php echo date("d-m-Y",strtotime($ListarAnulados->Fecha_y_Hora_Pedido));?></td>
                                                                <td><?php echo $ListarAnulados->Nombres;?></td>
                                                                <td><?php echo $ListarAnulados->Dni;?></td>
                                                                <td><?php echo $ListarAnulados->Direccion;?></td>
                                                                <td><?php echo $ListarAnulados->Total;?></td>
                                                                <td>
                                                                    <span class="label label-danger">Anulado</span>
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
                                        </div>-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="modal-documento" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                                <h4 class="modal-title">Cambiar de Estado al Documento</h4>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url('caja/actualizarestadodoumento'); ?>" method="POST">
                                <div class="modal-body">
                                    <div class="ibox-content">
                                        <div class="form-group">
                                            <input type="hidden" id="idcancelado" name="id">
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




                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>

    </body>
</html>


