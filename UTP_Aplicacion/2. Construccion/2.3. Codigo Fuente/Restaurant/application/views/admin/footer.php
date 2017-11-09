 <!-- Mainly ts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


    

    <!-- Peity -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>


    <!-- Toastr -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/toastr/toastr.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/datatables.min.js"></script>


    <script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
        <!-- Jquery Validate -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
        <!-- Script Validación -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/plugins/datetimepicker/moment.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js"></script>
       <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>


    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   /* { extend: 'copy'},
                    {extend: 'csv'},*/
                    {
                        extend: 'excel',
                        title: '<?php echo date("d-m-Y"); ?>'
                    }
                    /*{extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print', 
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                     }
                    }*/
                ],
                language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }

            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#fec_nac').datetimepicker({
                format: 'DD-MM-YYYY',
                locale: 'es'
            });

            $('#fec_in').datetimepicker({
                format: 'DD-MM-YYYY',
                locale: 'es'
            });

        });

    </script>

    <script type="text/javascript">
            $(document).ready(function() {

                            EliminarEmpleado = function (id) {
                                var url = "<?php echo base_url('Empleado/eliminar'); ?>";
                                debugger;
                                var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
                                swal({
                                    title: "¿Esta seguro que desea eliminar?",
                                    text: "Usted no podra recuperar esta información una vez eliminada",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Si, eliminar!",
                                    cancelButtonText: "No, cancelar!",
                                    closeOnConfirm: false,
                                    closeOnCancel: false },
                                function (isConfirm) {
                                    if (isConfirm) {
                                        swal("Eliminado!", "El plato a sido eliminado.", "success");
                                        $.ajax({
                                            url: url,                        
                                            type: "POST",                      
                                            data:{'csrf_test_name': csrf_token, "idempleado":id},
                                        success: function(data) {
                                            swal("Se Elimino Correctamente", "Registro Eliminado", "success");
                                        },
                                        error: function(e) {
                                            swal("No se Elimino", "Ocurrio un error", "error");
                                        }
                                       });
                                    } else {
                                        swal("Cancelado", "El plato esta a salvo :)", "error");
                                    }     
                                });
                            };
             });  
            
        </script>

    
   