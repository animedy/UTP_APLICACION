<?php include 'menu.php'; ?>
		<!-- Contenido -->
<div>
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Motos</h5>
                    </div>
                        <div class="ibox-content">
                        <a data-toggle="modal" class="btn btn-success" href="#modal-form"><i class="fa fa-plus"></i>&nbsp;Nuevo</a>
                        </br>
                        </br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Placa</th>
                                            <th>Marca</th>
                                            <th>SOAT</th>
                                            <th>Empleado Asignado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    	foreach ($motos as $moto) {
                                    	
                                     ?>
                                    <tr class="gradeX">
                                        <td><?php echo $moto->Placa;?></td>
                                        <td><?php echo $moto->Moto;?></td>
                                        <td><?php echo $moto->Soat;?></td>
                                        <td><?php echo $moto->Nombres . " " . $moto->Apellidos;?></td>
                                        <td>
                                            <center>
                                                <div class="col-md-1">
                                                        <button type="submit" class="btn btn-success btn-xs" onclick='Eliminar("<? echo $moto->Placa?>");'><span class="fa fa-trash"></span></button>
                                                </div>
                                                <div class="col-md-1">
                                                    <form  method="post" action="<?php echo base_url('EditarMoto'); ?>">
                                                        <button type="submit" class="btn btn-success btn-xs"><span class="fa fa-pencil"></span></button>
                                                        <input type="hidden" name="idmoto" value="<? echo $moto->Placa; ?>">
                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    </form>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php 
                                    	}
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Placa</th>
                                            <th>Marca</th>
                                            <th>SOAT</th>
                                            <th>Empleado Asignado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Fin Contenido -->
        <!-- Formulario Nuevo Contenido -->
        <div id="modal-form" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
        
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Nueva Moto</h4>
                        <small class="font-bold">Registre los datos de la nueva moto.</small>
                    </div>
                    <form id="formmoto" class="form-horizontal" action="<?php echo base_url('moto/insertar'); ?>"  method="POST">
                        <div class="modal-body">                   
                            <div class="ibox-content">                    
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Placa</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="placa" placeholder="AB-1234"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Marca</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="marca" id="marca" placeholder="Ingrese Marca" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">SOAT</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="soat" id="soat" placeholder="Ingrese SOAT" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Empleado Asignado</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="empleado">
                                    <?php 
                                    foreach ($empleados as $empleado) {
                                        foreach ($repartidores as $repartidor) {
                                            if ($repartidor->idTipoEmpleado == $empleado->TipoEmpleado_idTipoEmpleado ) {
                                    ?>
                                                <option value="<?php echo  $empleado->idEmpleados; ?>" selected><?php echo $empleado->Nombres . " " . $empleado->Apellidos;  ?></option>
                                    <?php  } 
                                        }
                                    }
                                    ?>
                                    </select>
                                    </div>
                                </div>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                                   
                            </div>

                        </div>
                        
                        <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                                <button type="submit" class="btn btn-success" id="add"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                        </div>
                    </form>                 
                </div>                    
            </div>
                           
        </div>
</div>                                    
		<!-- Fin Formulario Nuevo Contenido -->
        
        
<?php include 'footer.php'; ?>

     <script type="text/javascript">
            $(document).ready(function() {

                            Eliminar = function (id) {
                                
                                var datos = 'idmoto='+ id;
                                var url = "<?php echo base_url('moto/eliminar'); ?>";
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
                                        swal("Eliminado!", "La asignación a sido eliminado.", "success");
                                         $.ajax({
                                            url: url,                        
                                            type: "POST",                       
                                            data:{'csrf_test_name': csrf_token,"idmoto":id},
                                        success: function(data) {
                                            
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