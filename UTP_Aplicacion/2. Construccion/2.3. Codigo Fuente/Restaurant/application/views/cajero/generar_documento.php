<?php 
include 'menu.php'; 
?>
    <div id="" class="wrapper wrapper-content">
		<div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>Documento de Pago</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Cajero</a>
                    </li>
                    <li>
                        Lista de Pedidos
                    </li>
                    <li class="active">
                        <strong>Generar Documento</strong>
                    </li>
                 </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <!--<a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Editar </a>-->
                    <?php
                    foreach ($docu as $documento) {
                    ?>
                    <a href="" class="btn btn-white"><i class="fa fa-check "></i> Guardar </a>
                    
                    <a href="<?php echo base_url('Documento')."/".$documento->idPedidos;?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>De:</h5>
                                <address>
                                    <strong>Pepe Tiburon</strong><br>
                                    Av. Sucre 672 La Tomilla<br>
                                    Cayma<br>
                                    <abbr title="Phone">Cel:</abbr> 921604860
                                </address>
                            </div>
                            <div class="col-sm-6 text-right">
                                <h4>No. Boleta</h4>
                                <h4 class="text-navy"><?php echo $documento->idPedidos; ?></h4>
                                <span>Cliente:</span>
                                <address>
                                    <strong><?php echo $documento->Nombres; ?></strong><br>
                                    <?php echo $documento->Direccion; ?><br>
                                    <abbr title="Phone">DNI:</abbr><?php echo $documento->Dni; ?>
                                </address>
                                <p>
                                    <span><strong>Fecha:</strong><?php echo $documento->Fecha; ?></span><br/>
                                    <!--<span><strong>Due Date:</strong> March 24, 2014</span>-->
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive m-t">
                            <table class="table invoice-table">
                                <thead>
                                    <tr>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <!--<th>IGV</th>-->
                                        <th>TotaL</th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($deta as $detalle) {
                                    if($documento->idPedidos == $detalle->Pedidos_idPedidos) {
                                ?>
                                
                                <tbody>
                                    <tr>
                                        <td><div><strong><?php echo $detalle->Nombres; ?></strong></div>
                                        <td><?php echo $detalle->Cantidad; ?></td>
                                        <td><?php echo $detalle->Precio; ?></td>
                                        <!--<td>$5.98</td>-->
                                        <td><?php echo $detalle->Precio; ?></td>
                                    </tr>
                                </tbody>
                                <?php
                                    }
                                }
                                ?> 
                            </table>
                        </div><!-- /table-responsive -->
                        <table class="table invoice-total">
                            <tbody>
                                <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td>S/.45.34</td>
                                </tr>
                                <tr>
                                    <td><strong>IGV :</strong></td>
                                    <td>S/.8.16</td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>S/.53.50</td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                        }
                        ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    include 'footer.php';
?>
