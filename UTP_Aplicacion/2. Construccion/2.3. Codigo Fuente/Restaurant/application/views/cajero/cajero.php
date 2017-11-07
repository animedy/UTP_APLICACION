<?php include 'menu.php'; ?>

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
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="tabs-container">
                                <h2>GENERAR COMPROBANTE DE PAGO</h2>                         
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-file-o"></i>LISTA PEDIDOS</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-file"></i>DOCUMENTOS GENERADOS</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="panel-body">
                                            <div class="ibox-content">
                                                <div class="table-responsive">  
                                                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table">
                                                        <thead>
                                                            <tr>
                                                                <th>PEDIDO</th>
                                                                <th>FECHA</th>
                                                                <th>CLIENTE</th>
                                                                <th>DNI</th>
                                                                <th>DIRECCION</th>
                                                                <th>DETALLE PEDIDO</th>
                                                                <th>TOTAL</th>
                                                                <th>ESTADO</th>
                                                                <th>CAMBIAR</th>
                                                                <th>ACCION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            foreach($listapedidos as $listapedido) 
                                                            {  
                                                                if ($listapedido->Estado_Administrador == 1 && $listapedido->Estado_Cocinero == 1 && $listapedido->Estado_Cajero==1 && $listapedido->emitido<>"emitido") 
                                                                {    
                                                            ?>  
                                                            <tr>
                                                                <td><?php echo $listapedido->Comanda;?></td>
                                                                <td><?php echo date("d-m-Y",strtotime($listapedido->Fecha));?></td>
                                                                <td><?php echo $listapedido->Nombres;?></td>
                                                                <td><?php echo $listapedido->Dni;?></td>
                                                                <td><?php echo $listapedido->Direccion;?></td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button class="btn-xs dropdown-toggle" type="button" data-toggle="dropdown">VER DETALLE
                                                                        <span class="caret"></span></button>
                                                                        
                                                                        <ul class="dropdown-menu">
                                                                            <?php
                                                                            foreach ($listapedidosdetalle as $detalle) 
                                                                            { 
                                                                                if ($listapedido->idPedidos == $detalle->Pedidos_idPedidos) 
                                                                                {  
                                                                            ?>
                                                                            <li><a><?php echo $detalle->Cantidad." "."----"." ".$detalle->Nombres;  ?></a></li>
                                                                            <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </ul> 
                                                                    </div>
                                                                </td>
                                                                <td><?php echo "S/.".$listapedido->Total;?></td>
                                                                <td>
                                                                    <span class="text-center label label-primary">Pendiente</span>
                                                                </td>
                                                                <td>
                                                                    <a  data-toggle="modal" data-target="#modal-form-estado"  class="text-center pull-center btn btn-sm btn-danger" onClick='CambiarEstado("<?php echo $listapedido->idPedidos; ?>");'>Ver</a>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="btn-group">                      
                                                                        <a  href="<?php echo base_url('VerDocumento')."/".$listapedido->idPedidos;?>" id='boton' class="btn btn-blue btn-md"><i height="100px"  class="fa fa-save fa-2x"></i> </a>    
                                                                    </div>
                                                                </td> 
                                                            </tr>
                                                            <?php 
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>PEDIDO</th>
                                                                <th>FECHA</th>
                                                                <th>CLIENTE</th>
                                                                <th>DNI</th>
                                                                <th>DIRECCION</th>
                                                                <th>DETALLE PEDIDO</th>
                                                                <th>TOTAL</th>
                                                                <th>ESTADO</th>
                                                                <th>CAMBIAR</th>
                                                                <th>ACCION</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                        <div class="panel-body">
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-example" id="table">
                                                        <thead>
                                                            <tr>
                                                                <th>DOCUMENTO</th>
                                                                <th>FECHA</th>
                                                                <th>NOMBRE</th>
                                                                <th>DNI</th>
                                                                <th>TOTAL</th>
                                                                <th>ESTADO</th>
                                                                <th>ACCION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                foreach ($ListarPorCancelar as $ListarPorCancelar) {         
                                                            ?>  
                                                            <tr>
                                                                 <td><?php echo $ListarPorCancelar->idDocumentoBoleta;?></td>
                                                                <td><?php echo date("d-m-Y",strtotime($ListarPorCancelar->Fecha_Emision));?></td>
                                                                <td><?php echo $ListarPorCancelar->Nombre;?></td>
                                                                <td><?php echo $ListarPorCancelar->Dni;?></td>
                                                                <td><?php echo "S/.".$ListarPorCancelar->Total;?></td>
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
                                                                    <button type="submit" class="btn btn-sm btn-info"  onclick='Pagar("<?php echo $ListarPorCancelar->idDocumentoBoleta;?>");'><i class="fa fa-pencil"></i>PAGAR</button>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                    <button type="submit" class="btn btn-sm btn-danger"  onclick='Anular("<?php echo $ListarPorCancelar->idDocumentoBoleta;?>");'><i class="fa fa-pencil"></i>ANULAR</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>DOCUMENTO</th>
                                                                <th>FECHA</th>
                                                                <th>NOMBRE</th>
                                                                <th>DNI</th>
                                                                <th>TOTAL</th>
                                                                <th>ESTADO</th>
                                                                <th>ACCION</th>
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

            <div id="modal-form-estado" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Cambiar de Estado el Pedido</h4>
                        </div>
                        <form class="form-horizontal" name="formulario" action="<?php echo base_url('EstadoPedido/actualizarestadocaja'); ?>" method="POST">
                            <div class="modal-body">
                                <div class="ibox-content">
                                    <div class="form-group">
                                        <input type="hidden" id="idprogreso" name="id">
                                        <label class="col-md-6 control-label">Regresar a Cocina</label>
                                        <div>
                                            <input type="hidden" name="porhacer" value="on" />
                                        </div>
                                        <div>
                                            <input type="hidden" name="enprogreso" value="on" />
                                        </div>
                                        <div>
                                            <!--<input type="checkbox" name="completado" id="completado" value="off" onclick="javascript:validar(this);" class="js-switch_3" />-->
                                            <input type="checkbox" name="completado" id="completado"  onclick="boton.disabled=!this.checked">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Observacion: </label>
                                        <input id="descripcion" name="descripcion" type="text" class="form-control required">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                                
                                <button type="submit" class="btn btn-primary"  name="boton" id="add" disabled><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                 
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                               
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
                $('#idprogreso').val(id);
            }
        </script>

        <script type="text/javascript">
            setTimeout('document.location.reload()',21000); 
        </script>

        <script type="text/javascript">
            $(document).ready(function() 
            {
                Anular = function (id) 
                {               
                    var datos = 'idDocumentoBoleta='+ id;
                    var url = "<?php echo base_url('EstadoDocumento/Documentoanulado'); ?>";           
                    var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';            
                    swal
                    (
                        {
                            title: "¿Esta seguro que desea Anular la Boleta?",
                            text: "Usted anulara la Boleta",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Si, Anular!",
                            cancelButtonText: "No, cancelar!",
                            closeOnConfirm: false,
                            closeOnCancel: false 
                        },
                        function (isConfirm) 
                        {
                            if (isConfirm) 
                            {
                                swal("Anulando!", "La Boleta se esta anulando.", "success");
                                $.ajax(
                                {
                                    url: url,                        
                                    type: "POST",                       
                                    data:{'csrf_test_name':csrf_token,'idDocumentoBoleta':id},
                                    success: function(data) 
                                    {    },
                                    error: function(e) 
                                    {
                                        swal("No se Anulo", "Ocurrio un error", "error");
                                    }
                                });            
                            } 
                            else 
                            {
                                swal("Cancelado", "La Boleta esta a salvo", "error");
                            }                
                        }
                    );
                };            
            });    
        </script>

        <script type="text/javascript">
            $(document).ready(function() 
            {
                Pagar = function (id) 
                {               
                    var datos = 'idDocumentoBoleta='+ id;
                    var url = "<?php echo base_url('EstadoDocumento/Documentocancelado'); ?>";           
                    var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';            
                    swal
                    (
                        {
                            title: "¿Esta seguro que desea Pagar la Boleta?",
                            text: "Se va Pagar la Boleta",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Si, Pagar!",
                            cancelButtonText: "No, cancelar!",
                            closeOnConfirm: false,
                            closeOnCancel: false 
                        },
                        function (isConfirm) 
                        {
                            if (isConfirm) 
                            {
                                swal("Pagado!", "La Boleta ha sido pagado.", "success");
                                $.ajax(
                                {
                                    url: url,                        
                                    type: "POST",                       
                                    data:{'csrf_test_name':csrf_token,'idDocumentoBoleta':id},
                                    success: function(data) 
                                    {    },
                                    error: function(e) 
                                    {
                                        swal("No se Pago", "Ocurrio un error", "error");
                                    }
                                }); 
                                location.reload();           
                            } 
                            else 
                            {
                                swal("Cancelado", "La Boleta esta a salvo", "error");
                            }                
                        }
                    );
                };            
            });    
        </script>

         
       
        



