<?php include 'menu.php'; ?>
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
            <div class="col-lg-12">
            	<div class="ibox float-e-margins">
            		<div class="ibox-title">
                		<h5>Documentos Anulados</h5>
                		<!--<div class="ibox-tools">
                    		<a class="collapse-link">
                        		<i class="fa fa-chevron-up"></i>
                    		</a>
                    		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        		<i class="fa fa-wrench"></i>
                    		</a>
                    		<ul class="dropdown-menu dropdown-user">
                        		<li><a href="#">Config option 1</a></li>
                        		<li><a href="#">Config option 2</a></li>
                    		</ul>
                    		<a class="close-link">
                        		<i class="fa fa-times"></i>
                    		</a>
                		</div>-->
            		</div>
            		<div class="ibox-content">
            			<!--<div class="">
            				<a onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Add a new row</a>
            			</div>-->
            				<table class="table table-striped table-bordered table-hover " id="editable" >
                                <thead>
                                    <tr>
                                        <th>DOCUMENTO</th>
                                        <th data-hide="phone">FECHA</th>
                                        <th data-hide="phone">NOMBRE</th>
                                        <th data-hide="phone">DNI</th>
                                        <th data-hide="phone">TOTAL</th>
                                        <th data-hide="phone">ESTADO</th>
									</tr>
                                </thead>
                                <tbody>
                                <?php 
                                foreach ($ListarAnulados as $ListarAnulado) {          
                                ?>  
                                     <tr>
                                        <!--id pedido-->
                                        <td><?php echo $ListarAnulado->idDocumentoBoleta;?></td>
                                        <!--fecha pedido-->
                                        <td><?php echo date("d-m-Y",strtotime($ListarAnulado->Fecha_Emision));?></td>
                                        <!--cliente pedido-->
                                        <td><?php echo $ListarAnulado->Nombre;?></td>
                                        <!--cliente dni pedido-->
                                        <td><?php echo $ListarAnulado->Dni;?></td>
                                        <!--cliente direccion pedido-->
                                        <td><?php echo $ListarAnulado->Total;?></td>
                                        <!--total pedido-->
                                        <td>
                                            <?php IF($ListarAnulado->Estado_Boleta='Anulado'){
                                            ?>
                                            <span class="label label-warning">Anulado</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
							        <tr>
							            <th>DOCUMENTO</th>
                                        <th data-hide="phone">FECHA</th>
                                        <th data-hide="phone">NOMBRE</th>
                                        <th data-hide="phone">DNI</th>
										<th data-hide="phone">TOTAL</th>
                                        <th data-hide="phone">ESTADO</th>
							        </tr>
            					</tfoot>
            				</table>
            		</div>
            	</div>
            </div>
        </div>
    </div>



        <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */

            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>



    </body>
</html>