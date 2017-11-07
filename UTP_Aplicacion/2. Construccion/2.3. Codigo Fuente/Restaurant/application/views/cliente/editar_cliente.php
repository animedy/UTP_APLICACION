<?php 
	include 'Menu.php';
	foreach ($editar_cliente as $editar) {
		foreach ($editar_usuario as $e_u) {
 ?>
 					<div class="row">
			                <div class="col-lg-12">
			                    <div class="ibox">
			                        <div class="ibox-content">
			                            <h2>
			                                Edite sus datos
			                            </h2>
			                           <label class="control-label">Usuario</label>
			                           <h1><?php echo $editar->Nombres;?></h1>
			                            <form id="formeditcliente" action="<?php echo base_url('cliente/actualizar'); ?>" method="post">
			                             
			                                
			                                	<fieldset>
				                                    <div class="row">
	                                                    <div class="col-lg-6">
					                                        <div class="form-group">
					                                           	<input type="hidden" name="id" value="<?php echo $editar->idCliente; ?>">
					                                            
					                                            <input name="nombre" type="hidden" class="form-control" value="<?php echo $editar->Nombres;?>" >
					                                        </div>
					                                        <div class="form-group">
						                                        <label class="control-label">Sexo</label>
						                                        <select class="form-control m-b" name="sexo" >
						                                        	<option value="">-- Seleccione --</option>
						                                            <?php 
								                                        if ($editar->Sexo == "Masculino") {
								                                    ?>
										                                <option value="Masculino" selected>Masculino</option>
										                                <option value="Femenino">Femenino</option>
										                                    <?php } else {?>
										                                <option value="Masculino" >Masculino</option>
										                                <option value="Femenino" selected>Femenino</option>
								                                    <?php } ?>
								                                    </select>
					                                        </div>
					                                    </div>
	                                                    <div class="col-lg-6">
	                                                    	<div class="form-group">
					                                            <label class="control-label">DNI</label>
					                                            <input id="dni" name="dni" type="number" minlength="8" maxlength="8" class="form-control" value="<?php echo $editar->Dni;?>" readonly>
					                                        </div>
					                                    </div>
					                                </div>
					                            </fieldset>
			                                
			                                	<fieldset>
				                                    <div class="row">
				                                    	<div class="col-lg-6">
					                                        <div class="form-group">
					                                            <label class="control-label">Dirección</label>
					                                            <input id="direccion" name="direccion" type="text" class="form-control" value="<?php echo $editar->Direccion;?>">
					                                        </div>
					                                        <div class="form-group">
					                                            <label class="control-label">Distrito</label>
					                                            <select class="form-control" name="distrito">
									                                    <?php foreach ($distritos as $distrito) {
									                                    			if ($editar->Distritos_idDistritos == $distrito->idDistritos) {
									                                    ?>
									                                    		<option value="<?php echo $distrito->idDistritos; ?>" selected><?php echo $distrito->Distrito; ?></option>
									                                    <?php
									                                    			} else {
									                                    ?>
									                                    		<option value="<?php echo $distrito->idDistritos; ?>"><?php echo $distrito->Distrito; ?></option>
									                                    <?php 
									                                    			}
									                                    	  } 
									                                    ?>
								                                </select>
					                                        </div>
				                                            <div class="form-group">
				                                                <label class="control-label">Teléfono</label>
				                                                <input type="text" name="telefono" class="form-control required" placeholder="" value="<?php echo $editar->Telefono;?>">
				                                            </div>
				                                        </div>
				                                        <div class="col-lg-6">
				                                            <div class="form-group">
				                                                <label class="control-label">Celular</label>
				                                                <input type="text" name="celular" class="form-control required" placeholder="" value="<?php echo $editar->Celular;?>">
				                                            </div>
				                                            <div class="form-group">
				                                                <label class="control-label">Referencia </label>
				                                                <input id="referencia" name="referencia" type="text" class="form-control" value="<?php echo $editar->Referencia;?>">
				                                            </div>
				                                        </div>
			                                        </div>
			                                    </fieldset>
			                                <h2>Cuenta</h2>
			                                	<fieldset>
				                                    <div class="row">
				                                    	<div class="col-lg-6">
				                                            <div class="form-group">
				                                                <label class="control-label">Correo</label>
				                                                <input id="correo" name="correo" type="text" class="form-control" value="<?php echo $e_u->CorreoElectronico;?>" readonly>
				                                            </div>
				                                            

				                                        </div>
				                                        <div class="col-lg-6">
				                                            <div class="form-group">
				                                                <label class="control-label">Password</label>
				                                                <input id="contrasena" name="contrasena" type="password" class="form-control" value="<?php echo desencriptar($e_u->Contrasena);?>">
				                                            </div>
				                                            <div class="form-group">
				                                                <label class="control-label">Confirmar Password</label>
				                                                <input id="confirm" name="confirm" type="password" class="form-control" value="<?php echo desencriptar($e_u->Contrasena);?>" >
				                                            </div>
				                                        </div>
				                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			                                        </div>
			                                    </fieldset>
			                                        
			                                        <div class="right">
			                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Actualizar Cliente</button>   
			                                <a href="<?php echo base_url('Carrito'); ?>" class="btn btn-success" ><i class="fa fa-ban"></i>&nbsp;Cancelar</a>
			                            </div> 
			                            </form>
			                        </div>
			                    </div>
			                </div>
			        </div>
<?php 
		}
	}
	include 'footer.php'; ?>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
        <!-- Jquery Validate -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script> 	
        <!-- Script Validación -->
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
