<?php include 'menu.php'; ?>

                                        <!-- Contenido-->
<div id="contenido">
    <div class="row">
           
           <!-- <div class="col-lg-3">
                <div class="widget style1 blue-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><b> Ventas </b></span>
                            <h2 class="font-bold">0</h2>
                        </div>
                        <p class="font-bold">Mas Información <i class="fa fa-arrow-circle-right"></i></p>
                    </div>
                </div>
            </div>-->
            <!--<div class="col-lg-3">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-cutlery fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><b> Productos </b></span>
                            <h2 class="font-bold">0</h2>
                        </div>
                        <p class="font-bold">Mas Información <i class="fa fa-arrow-circle-right"></i></p>
                    </div>
                </div>
            </div>-->
            <div class="col-lg-6">
                <div class="widget lazur-bg no-padding">
                    <div class="p-m">
                        <h1 class="m-xs">S/. 
                        <?php
                            $suma = 0;
                            foreach ($cantidad as $total) {
                                $suma = $suma + $total->Total;
                            }   
                            echo number_format($suma,2);
                        ?>
                        </h1>

                        <h3 class="font-bold no-margins">
                            Ingreso Mensual
                        </h3>
                        <small>Ingreso de las ventas del Mes.</small>
                    </div>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-chart-anual"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget lazur-bg no-padding">
                    <div class="p-m">
                        <h1 class="m-xs">S/. 0.00</h1>

                        <h3 class="font-bold no-margins">
                            Ingreso Díario
                        </h3>
                        <small>Ingreso de las ventas del Día.</small>
                    </div>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-chart-mensual"></div>
                    </div>
                </div>
            </div>
            <!--<div class="col-lg-3">
                <div class="widget style1 red-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-cloud-download fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span><b> Stock Minimo </b></span>
                            <h2 class="font-bold">0</h2>
                        </div>
                        <p class="font-bold">Mas Información <i class="fa fa-arrow-circle-right"></i></p>
                    </div>
                </div>
            </div>-->
    </div>
</div>

        
                
<?php include 'footer.php'; ?>
        <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
<script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success(null, 'Bienvenido');

            }, 1300);
        //Ingreso Mensual
            var d1 = [<?php foreach ($cantidad as $cantidades) {
                echo '['.$cantidades->Fecha.','. $cantidades->Total.'],';
            }?>];
            
            var d2 = [<?php foreach ($cantidad_dia as $cantidades_dia) {
                echo '['.$cantidades_dia->Fecha.','. $cantidades_dia->Total.'],';
            }?>];

            var data2 = [
                { label: "Data 1", data: d1, color: '#19a0a1'}
            ];
            var data3 = [
                { label: "Data 1", data: d2, color: '#19a0a1'}
            ];
            $.plot($("#flot-chart-anual"), data2, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        }
                    },
                    points: {
                        width: 0.1,
                        show: false
                    }
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false
                }
            });
            $.plot($("#flot-chart-mensual"), data3, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        }
                    },
                    points: {
                        width: 0.1,
                        show: false
                    }
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false
                }
            });

        });
</script>

</body>
</html>