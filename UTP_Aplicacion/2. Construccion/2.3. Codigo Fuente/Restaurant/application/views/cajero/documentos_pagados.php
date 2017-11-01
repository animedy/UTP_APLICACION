<?php include 'menu.php'; ?>
		<!-- Contenido -->

	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>DOCUMENTOS PAGADOS</h5>
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
                                        <!--<th data-hide="phone">TOTAL</th>-->
                                        <th>ESTADO</th>
                                        <!--<th class="text-right">ACCION</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($DcumentoPagados as $ListarCancelados) {          
                                    ?>  
                                    <tr>
                                        <td><?php echo $ListarCancelados->idDocumentoBoleta;?></td>
                                        <td><?php echo $ListarCancelados->Pedidos_idPedidos;?></td>
                                        <td><?php echo date("d-m-Y",strtotime($ListarCancelados->Fecha_Emision));?></td>
                                        <td><?php echo $ListarCancelados->Nombre;?></td>
                                        <td><?php echo $ListarCancelados->Dni;?></td>
                                        <td><?php echo "S/.".$ListarCancelados->Total;?></td>
                                        <td>
                                            <span class="label label-success">PAGADO</span>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                        <th>DOCUMENTO</th>
                                        <th>PEDIDO</th>
                                        <th>FECHA</th>
                                        <th>NOMBRE</th>
                                        <th>DNI</th>
                                        <th>TOTAL</th>
                                        <!--<th data-hide="phone">TOTAL</th>-->
                                        <th>ESTADO</th>
                                        <!--<th class="text-right">ACCION</th>-->
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
        