<?php include 'menu.php'; ?>
 <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                    <div class="ibox-title">
                        <h5>Pedidos Atendidos</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
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
                                    <th class="text-right">Acción</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach ($reportecompletados as $completado) {
                                ?>
                                <tr>
                                    <td>
                                       <? echo $completado->Comanda; ?>
                                    </td>
                                    <td>
                                        <? echo $completado->Nombre_Cliente; ?>
                                    </td>
                                    <td>
                                        <? echo "S/. ".$completado->Total; ?>
                                    </td>
                                    <td>
                                        <? echo $completado->Fecha_y_hora_Pedido; ?>
                                    </td>
                                    <td>
                                        <span class="label label-primary">Completado</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">Ver</button>
                                        </div>
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