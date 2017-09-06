<?php include 'cabecera.php'; ?>
		<!-- Contenido -->
		<!-- Formulario Nuevo Contenido -->
        
                    
                    <form id="formcliente" action="<?php echo base_url('cliente/InsertarCliente'); ?>" class="form-horizontal"  method="POST" >
                        <div class="modal-body">                   
                            <div class="ibox-content">                    
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nombre</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre" required></div>
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
               
                                  
		<!-- Fin Formulario Nuevo Contenido -->
        
        
<?php include 'footer.php'; ?>
        
        <!-- Jquery Validate -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
        <!-- Script Validación -->
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
        