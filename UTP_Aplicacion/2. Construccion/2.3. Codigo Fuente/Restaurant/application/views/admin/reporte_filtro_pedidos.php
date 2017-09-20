<?php include 'menu.php' ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Reporte de Pedidos</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


        <div class="ibox-content m-b-sm border-bottom">
            <form action="<?php echo base_url('pedido/ListarPedidosPorParametros'); ?>" method="post">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Comanda</label>
                            <input type="number" id="order_id" name="comanda" value="" placeholder="Por ejem: 0117082017" class="form-control" minlength="10">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Estado Orden</label>
                            <select name="estado" class="form-control">
                                <option value="">-- Seleccione --</option>
                                <option value="P">Por Hacer</option>
                                <option value="E">En Progreso</option>
                                <option value="C">Completado</option>
                                <option value="A">Anulado</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Filtro</label>
                            <div class="input-group date">
                                <button class="btn btn-success">Por Parametro</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="<?php echo base_url('pedido/ListarPedidosPorFecha'); ?>" method="post">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Fecha Inicial</label>
                            <div class="input-group date" id="date_added">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input  type="text" class="form-control" value="<?php echo date('Y-m-d') ?>" name="fecha_inicio">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Fecha Final</label>
                            <div class="input-group date" id="date_modified">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="<?php echo date('Y-m-d') ?>" name="fecha_fin">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Filtro</label>
                            <div class="input-group date">
                                <button type="submit" class="btn btn-success">Por Fechas</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class=" table table-stripped toggle-arrow-tiny dataTables-example" data-page-size="15">
                                <thead>
                                <tr>

                                    <th>Comanda</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha Pedido</th>
                                    <th>Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($pedidos as $pedido) {
                                     ?>
                                    <tr>
                                        <td>
                                           <? echo $pedido->Comanda; ?>
                                        </td>
                                        <td>
                                             <? echo $pedido->Nombre_Cliente; ?>
                                        </td>
                                        <td>
                                             <? echo "S/. ".$pedido->Total; ?>
                                        </td>
                                        <td>
                                             <? echo  date("d/m/Y",strtotime($pedido->Fecha)); ?>
                                        </td>
                                        <td>
                                            <? if ($pedido->Estado_Administrador == 0) {
                                            ?>
                                            <span class="label label-danger">Cancelado</span>

                                            <? } elseif ($pedido->Estado_Administrador == 1 && $pedido->Estado_Cocinero == 0) {
                                            ?>
                                            <span class="label label-success">Por hacer</span>
                                            <? } elseif ($pedido->Estado_Administrador == 1 && $pedido->Estado_Cocinero == 1 && $pedido->Estado_Cajero == 0){ 
                                            ?>
                                            <span class="label label-warning">En Progreso</span>
                                            <? } elseif ($pedido->Estado_Administrador == 1 && $pedido->Estado_Cocinero == 1 && $pedido->Estado_Cajero == 1){ 
                                            ?>
                                            <span class="label label-primary">Completado</span>
                                            <? }?>
                                        </td>
                                    </tr>
                                    <?  } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

<?php include 'footer.php' ?>
<!-- Data picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function() {

            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

        });

    </script>