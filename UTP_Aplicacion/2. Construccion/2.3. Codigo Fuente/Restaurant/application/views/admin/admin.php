

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
                        <h1 class="m-xs">S/. 
                        <?php
                            $suma_dia = 0;
                            foreach ($cantidad_dia as $cantidades_dia) {
                                $suma_dia = $suma_dia + $cantidades_dia->Total;
                            }   
                            echo number_format($suma_dia,2);
                        ?>
                        </h1>

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
