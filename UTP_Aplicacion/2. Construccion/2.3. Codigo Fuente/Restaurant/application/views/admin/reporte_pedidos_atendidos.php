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
                            <form action="<?php echo base_url('pedido/ExportarPedidosAtendidos'); ?>" method="POST">
                                <button class="btn btn-white"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                </br>
                                </br>
                                <table class="footable table table-stripped toggle-arrow-tiny dataTables-example" data-page-size="15">
                                    <thead>
                                        <tr>

                                            <th>Comanda</th>
                                            <th data-hide="phone">Cliente</th>
                                            <th data-hide="phone">Precio</th>
                                            <th data-hide="phone">Fecha Pedido</th>
                                            <th data-hide="phone">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($reportecompletados as $completado) {
                                    ?>
                                    <tr>
                                        <td>
                                           <? echo $completado->Comanda; ?>
                                           <input type="hidden" name="comanda[]" value="<? echo $completado->Comanda; ?>">
                                        </td>
                                        <td>
                                            <? echo $completado->Nombre_Cliente; ?>
                                           <input type="hidden" name="nombre[]" value="<? echo $completado->Nombre_Cliente; ?>">

                                        </td>
                                        <td>
                                            <? echo "S/. ".$completado->Total; ?>
                                           <input type="hidden" name="total[]" value="<? echo $completado->Total; ?>">
                                        </td>
                                        <td>
                                            <? echo  date("d-m-Y",strtotime($completado->Fecha)); ?>
                                           <input type="hidden" name="fecha[]" value="<? echo date("d-m-Y",strtotime($completado->Fecha)); ?>">

                                        </td>
                                        <td>
                                            <span class="label label-primary">Completado</span>
                                           <input type="hidden" name="estado[]" value="Completado">
                                        </td>
                                    </tr>
                                    <?php 
                                        } 
                                     ?>
                                    </tbody>
                                    <tfoot>
                                    
                                    </tfoot>
                                </table>
                            </form>

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