<?php include 'menu.php'; ?>
		<!-- Contenido -->

	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Clientes</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
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
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>DNI</th>
                                            <th>Sexo</th>
                                            <th>Dirección</th>
                                            <th>Estado</th>
                                            <th>Celular</th>
                                            <th>Referencia</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    	foreach ($clientes as $cliente) {
                                    	
                                     ?>
                                    <tr class="gradeX">
                                        <td><?php echo $cliente->idCliente;?></td>
                                        <td><?php echo $cliente->Nombres;?></td>
                                        <td><?php echo $cliente->Dni;?></td>
                                        <td><?php
                                                if ($cliente->Sexo == "M") {
                                                     echo "Masculino";
                                                 } else {
                                                     echo "Femenino";
                                                 }
                                                  
                                                
                                            ?>
                                        </td>
                                        <td><?php echo $cliente->Direccion;?></td>
                                        <td><?php echo $cliente->Estado;?></td>
                                        <td><?php echo $cliente->Celular;?></td>
                                        <td><?php echo $cliente->Referencia;?></td>
                                        <td>
                                            <center>
                                                <a href="<?php echo base_url('cliente/eliminar')."/".$cliente->idCliente; ?>"><span class="fa fa-trash"></span></a>
                                                <a href="<?php echo base_url('EditarCliente'). "/".$cliente->idCliente; ?>"><span class="fa fa-pencil"></span></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php 
                                    	}
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>DNI</th>
                                            <th>Sexo</th>
                                            <th>Dirección</th>
                                            <th>Estado</th>
                                            <th>Celular</th>
                                            <th>Referencia</th>
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
                        <h4 class="modal-title">Nuevo Cliente</h4>
                        <small class="font-bold">Registre los datos del nuevo cliente.</small>
                    </div>
                    <form id="formcliente" action="<?php echo base_url('cliente/insertar'); ?>" class="form-horizontal"  method="POST" >
                        <div class="modal-body">                   
                            <div class="ibox-content">                    
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nombre</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="nombre" name="nombre" id="nombre" placeholder="Ingrese nombre" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">DNI</label>
                                    <div class="col-sm-10"><input type="number" class="form-control" name="dni" id="dni" placeholder="Ingrese DNI" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Sexo</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="sexo">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Dirección</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese Dirección" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Celular</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="celular" id="celular" placeholder="Ingrese celular" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Teléfono</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese telefono" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Correo</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="correo" id="email" placeholder="Ingrese Correo" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Contraseña</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Distrito</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="distrito">
                                    <?php foreach ($distritos as $distrito) {
                                    ?>
                                            <option value="<?php echo $distrito->idDistritos; ?>"><?php echo $distrito->Distrito; ?></option>
                                    <?php 
                                    } 
                                     ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Referencia</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="referencia" id="referencia" placeholder="Ingrese Referencia"></div>
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
                                  
		<!-- Fin Formulario Nuevo Contenido -->
        
        
<?php include 'footer.php'; ?>
        
        <!-- Jquery Validate -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
        <!-- Script Validación -->
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
        