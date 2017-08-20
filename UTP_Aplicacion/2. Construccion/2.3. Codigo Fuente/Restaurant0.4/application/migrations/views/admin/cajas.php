
		<!-- Contenido -->
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Caja</h5>
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
                        <a data-toggle="modal" class="btn btn-primary" href="#modal-form-caja"><i class="fa fa-plus"></i>&nbsp;Nuevo</a>
                        </br>
                        </br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sucursal</th>
                                            <th>Caja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    	foreach ($cajas as $caja) {
                                    	
                                     ?>
                                    <tr class="gradeX">
                                        <td><?php echo find_in_object($sucursal,$caja->sucursal_id,'nombre')?></td>
                                        <td><?php echo $caja->nombre;?></td>

                                    </tr>
                                    <?php 
                                    	}
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sucursal</th>
                                            <th>Caja</th>
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
        <div id="modal-form-caja" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
        
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Nueva Caja</h4>
                        <small class="font-bold">Registre los datos de la nueva sucursal.</small>
                    </div>
                    <form role="form" id="form" class="form-horizontal">
                        <div class="modal-body">                   
                            <div class="ibox-content">                    
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Sucursal</label>
                                    <div class="col-sm-10">
                                    	<select class="form-control m-b" name="account">
	                                        <?php foreach ($sucursal as $sucur) {

	                                         ?>
	                                        <option value="<?php echo $sucur->id; ?>"><?php echo $sucur->nombre; ?></option>
	                                      	<?php 
	                                        	}
	                                        ?>
                                    	</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Caja</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="caja" id="departamento" required></div>
                                </div>                           
                            </div>

                        </div>
                        
                        <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="add"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                        </div>
                    </form>                 
                </div>                    
            </div>
                           
        </div>                                    
		<!-- Fin Formulario Nuevo Contenido -->
        
        
<?php include 'footer.php'; ?>

    </body>
</html>