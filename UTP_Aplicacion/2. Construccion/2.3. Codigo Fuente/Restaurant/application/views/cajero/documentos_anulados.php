<?php include 'menu.php'; ?>
        <!-- Contenido -->

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>DOCUMENTOS ANULADOS</h5>
                        <!--<div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>-->
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" id="table">
                               <thead>
                                    <tr>
                                        <th>DOCUMENTO</th>
                                        <th>PEDIDO</th>
                                        <th>FECHA</th>
                                        <th>NOMBRE</th>
                                        <th>DNI</th>
                                        <th>TOTAL</th>
                                        <th>ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                foreach ($DocumentoAnulados as $ListarAnulado) {          
                                ?>  
                                     <tr>
                                        <!--id pedido-->
                                        <td><?php echo $ListarAnulado->idDocumentoBoleta;?></td>
                                        <td><?php echo $ListarAnulado->Pedidos_idPedidos;?></td>
                                        <!--fecha pedido-->
                                        <td><?php echo $ListarAnulado->Fecha_Emision;?></td>
                                        <!--cliente pedido-->
                                        <td><?php echo $ListarAnulado->Nombre;?></td>
                                        <!--cliente dni pedido-->
                                        <td><?php echo $ListarAnulado->Dni;?></td>
                                        <!--cliente direccion pedido-->
                                        <td><?php echo $ListarAnulado->Total;?></td>
                                        <!--total pedido-->
                                        <td>
                                            <?php IF($ListarAnulado->Estado_Boleta='Anulado'){
                                            ?>
                                            <span class="label label-danger">ANULADO</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>DOCUMENTO</th>
                                        <th>PEDIDO</th>
                                        <th>FECHA</th>
                                        <th>NOMBRE</th>
                                        <th>DNI</th>
                                        <th>TOTAL</th>
                                        <th>ESTADO</th>
                                    </tr>
                                </tfoot>
                            </table>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
                        
<?php include 'footer.php'; ?>
        
        <!-- Jquery Validate 
        <script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
        Script Validación 
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>-->

