<?php 
include 'menu.php';
foreach ($impri as $key) {
  ?>
                <div class="wrapper wrapper-content p-xl">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h5>De:</h5>
                                    <address>
                                        <strong>Pepe Tiburon</strong><br>
                                        Av. Sucre 672 La Tomilla<br>
                                        Cayma<br>
                                        <abbr title="Phone">Cel:</abbr> 921604860
                                    </address>
                                </div>

                                <div class="col-sm-4 text-right">
                                    <h4>No. Boleta</h4>
                                    <h4 class="text-navy"><?php echo $key->idPedidos; ?></h4>
                                    <span>Cliente:</span>
                                    <address>
                                        <strong><?php echo $key->Nombres; ?></strong><br>
                                        <?php echo $key->Direccion; ?><br>
                                        <abbr title="Phone">DNI:</abbr><?php echo $key->Dni; ?>
                                    </address>
                                    <p>
                                        <span><strong>Fecha:</strong><?php echo $key->Fecha; ?></span><br/>
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
                                        if($key->idPedidos == $detalle->Pedidos_idPedidos) {
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
                            <!--<div class="well m-t"><strong>Comments</strong>
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                            </div>-->
                        </div>

    </div>
<?php 
}
 ?>
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>

