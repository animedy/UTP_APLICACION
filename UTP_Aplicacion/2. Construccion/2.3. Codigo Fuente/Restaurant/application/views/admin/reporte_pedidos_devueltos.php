<?php include 'menu.php'; ?>
 <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                    <div class="ibox-title">
                        <h5>Pedidos Devueltos</h5>
                    </div>
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny dataTables-example" data-page-size="15">
                                <thead>
                                <tr>

                                    <th>Comanda</th>
                                    <th data-hide="phone">Cliente</th>
                                    <th data-hide="phone">Cantidad</th>
                                    <th data-hide="phone">Fecha Pedido</th>
                                    <th data-hide="phone">Estado</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach ($reportedevueltos as $devueltos) {
                                ?>
                                <tr>
                                    <td>
                                       <? echo $devueltos->Comanda; ?>
                                    </td>
                                    <td>
                                        <? echo $devueltos->Nombre_Cliente; ?>
                                    </td>
                                    <td>
                                        <? echo "S/. ".$devueltos->Total; ?>
                                    </td>
                                    <td>
                                        <? echo $devueltos->Fecha . " " .$devueltos->Hora_Pedido; ?>
                                    </td>
                                    <td>
                                        <span class="label label-danger">Cancelado</span>
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
            </div>


        </div>
<?php include 'footer.php'; ?>

    <!-- Data picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- FooTable -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/footable/footable.all.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();

            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });

    </script>