<?php include 'menu.php'; ?>

                                        <!-- Contenido-->
<div id="contenido">
    <div class="row">
        <h1 align="center">CAJA - PEPE TIBURON</h1>
        <div class="col-lg-3">
            <div class="widget style1 navy-bg">
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
        </div>
    </div>
</div>

        
                
<?php include 'footer.php'; ?>
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

        });
    </script>

</body>
</html>