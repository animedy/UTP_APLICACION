<?php include 'Menu.php'; ?>
        <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>SU PEDIDO ESTA SIENDO PROCESADO GRACIAS POR SU COMPRA</h2>
   </div>
    <div class="col-lg-2">
    </div>
</div>
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content" id="ibox-content">

                        <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-briefcase"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>EN RECEPCIÓN</h2>
                                    <p>Su pedido esta siendo recepcionado en la empresa Pepe Tiburon.
                                    </p>
                                    <a href="#" class="btn btn-sm btn-primary"> En espera</a>
                                    <span class="vertical-date">
                                        HOY DIA <br/>
                                        <small> <?php echo date('H:i:s'); ?></small>
                                    </span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="fa fa-file-text"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>EN PREPARACIÓN</h2>
                                    <p>Su pedido ya esta siendo preparado.</p>
                                    <a href="#" class="btn btn-sm btn-success"> En espera </a>
                                    <span class="vertical-date">
                                        Today <br/>
                                        <small>Dec 24</small>
                                    </span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-coffee"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>SALIENDO PARA ENVIAR</h2>
                                    <p>Su pedido esta siendo asignado a un repartidor para enviar su producto a su direccion. </p>
                                    <a href="#" class="btn btn-sm btn-info">En espera</a>
                                    <span class="vertical-date"> Yesterday <br/><small>Dec 23</small></span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon yellow-bg">
                                    <i class="fa fa-phone"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>EN CAMINO PARA SU DOMICILIO</h2>
                                    <p>El repartidor esta en camino por favor sea pasiente mientras llegue a su direcion. El tiempo de llegada dependerandel disttito en que vive.</p>
                                            <a href="#" class="btn btn-sm btn-info">En espera</a>
                                    <span class="vertical-date">Yesterday <br/><small>Dec 23</small></span>
                                </div>
                            </div>

                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon lazur-bg">
                                    <i class="fa fa-user-md"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <h2>ACEPTADO</h2>
                                    <p>Gracias por comprar de la cevicheria Pepe Tiburon </p>
                                           <a href="#" class="btn btn-sm btn-info">En espera</a>
                                    <span class="vertical-date">Yesterday <br/><small>Dec 23</small></span>
                                </div>
                            </div>
                        </div>
<a class="btn btn-white" href="<?php echo base_url("Catalogo/ListarCarta"); ?>"><i class="fa fa-arrow-left"></i> Seguir Comprando</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer">
            <div>
                <strong>Pepe Tiburon</strong> 2017
            </div>
        </div>

        </div>
        </div>

<?php include 'footer.php'; ?>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Peity -->
    <script src="js/demo/peity-demo.js"></script>


    <script>
        $(document).ready(function(){

            // Local script for demo purpose only
            $('#lightVersion').click(function(event) {
                event.preventDefault()
                $('#ibox-content').removeClass('ibox-content');
                $('#vertical-timeline').removeClass('dark-timeline');
                $('#vertical-timeline').addClass('light-timeline');
            });

            $('#darkVersion').click(function(event) {
                event.preventDefault()
                $('#ibox-content').addClass('ibox-content');
                $('#vertical-timeline').removeClass('light-timeline');
                $('#vertical-timeline').addClass('dark-timeline');
            });

            $('#leftVersion').click(function(event) {
                event.preventDefault()
                $('#vertical-timeline').toggleClass('center-orientation');
            });


        });
    </script>

</body>


