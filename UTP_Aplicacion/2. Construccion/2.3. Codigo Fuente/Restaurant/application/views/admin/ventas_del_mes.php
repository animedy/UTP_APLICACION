<?php include 'menu.php'; ?>
 <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                    <div class="ibox-title">
                        <h5>Ventas del Mes </h5>
                    </div>
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny dataTables-example ventasmes" data-page-size="15" >
                                <thead>
                                <tr>

                                    <th>Numero de Boleta</th>
                                    <th>Nombre Cliente</th>
                                    <th>Fecha Emisión</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                 <form>
                                <?php 
                                    foreach ($ventas as $venta) {

                                ?>
	                               
		                                <tr>
		                                    <td>
		                                       <? echo $venta->idDocumentoBoleta; ?>
		                                    </td>
		                                    <td>
		                                       <? echo $venta->Nombre; ?>
		                                    </td>
		                                    <td>
		                                        <? echo $venta->Fecha_Emision; ?>
		                                    </td>
		                                    <td>
		                                        <? echo "S/. " .$venta->Total; ?>
		                                        <input type="hidden" class="total" value="<? echo $venta->Total; ?>">
		                                    </td>
		                                </tr>
		                                <?php 
		                                    } 
		                                 ?>
                                </tbody>
                                <tfoot>
	                                <tr>
		                                <th colspan=""></th>
		                                <th colspan=""></th>
		                                <th colspan=""><i>Total del Mes</i></th>
		                                <th><i><p id="totalmes"></p></i></th>
	                                   
	                                </tr>
                                </tfoot>
                                	</form>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


        </div>
<?php include 'footer.php'; ?>

    <!-- Data picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>


    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
        	var add = 0;
                $(".total").each(function() {
                    add += parseFloat($(this).val());
                });
                $("#totalmes").text("S/. "+add.toFixed(2));
				
        });

    </script>