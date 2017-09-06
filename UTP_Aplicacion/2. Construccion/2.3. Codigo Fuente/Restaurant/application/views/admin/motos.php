<?php include 'menu.php'; ?>
		<!-- Contenido -->
<div>
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Motos</h5>
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
                                                <a href="<?php echo base_url('motos/eliminar')."/".$moto->Placa; ?>"><span class="fa fa-trash"></span></a>
                                                <a href="<?php echo base_url('EditarMoto')."/".$moto->Placa; ?>"><span class="fa fa-pencil"></span></a>
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
                                    <div class="col-sm-10"><input type="text" class="form-control" name="placa" id="placa" placeholder="Ingrese placa" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Marca</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="marca" id="marca" placeholder="Ingrese Marca" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">SOAT</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="soat" id="soat" placeholder="Ingrese SOAT" required></div>
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
        <!-- Jquery Validate -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
        <!-- Script Validación -->
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
        <!-- Fin Script Validación -->
        