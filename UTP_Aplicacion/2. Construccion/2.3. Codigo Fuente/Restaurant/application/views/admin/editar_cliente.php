<?php 
	include 'menu.php';
	foreach ($editar_cliente as $editar) {
		foreach ($editar_usuario as $e_u) {
 ?>
 					<div class="row">
			                <div class="col-lg-12">
			                    <div class="ibox">
			                        <div class="ibox-content">
			                            <h2>
			                                Edite los datos del cliente.
			                            </h2>
			                           
			                            <form id="formeditcliente" action="<?php echo base_url('cliente/actualizar'); ?>" method="post">
			                             <div class="right">
			                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Actualizar Cliente</button>
			                                <a href="<?php echo base_url('clientes'); ?>" class="btn btn-success" ><i class="fa fa-ban"></i>&nbsp;Cancelar</a>
			                            </div>
			                                <h1>Datos Personales</h1>
			                                    <div class="row">
			                                        <div class="form-group">
			                                           	<input type="hidden" name="id" value="<?php echo $editar->idCliente; ?>">
			                                            <label class="control-label">Nombres *</label>
			                                            <input name="nombre" type="text" class="form-control" value="<?php echo $editar->Nombres;?>" >
			                                        </div>
			                                        <div class="form-group">
				                                        <label class="control-label">Sexo *</label>
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
			                                            <div class="form-group">
			                                                <label class="control-label">DNI *</label>
			                                                <input id="dni" name="dni" type="number" minlength="8" maxlength="8" class="form-control" value="<?php echo $editar->Dni;?>" >
			                                            </div>
			                                <h1>Información Complementaria</h1>
			                                            <div class="form-group">
			                                                <label class="control-label">Dirección *</label>
			                                                <input id="direccion" name="direccion" type="text" class="form-control" value="<?php echo $editar->Direccion;?>">
			                                            </div>
			                                            <div class="form-group">
			                                                <label class="control-label">Distrito *</label>
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
			                                                <label class="control-label">Teléfono *</label>
			                                                <input type="text" name="telefono" class="form-control required" placeholder="" value="<?php echo $editar->Telefono;?>">
			                                            </div>
			                                            <div class="form-group">
			                                                <label class="control-label">Celular *</label>
			                                                <input type="text" name="celular" class="form-control required" placeholder="" value="<?php echo $editar->Celular;?>">
			                                            </div>
			                                            <div class="form-group">
			                                                <label class="control-label">Referencia </label>
			                                                <input id="referencia" name="referencia" type="text" class="form-control" value="<?php echo $editar->Referencia;?>">
			                                            </div>
			                                <h1>Cuenta</h1>
			                                            <div class="form-group">
			                                                <label class="control-label">Correo *</label>
			                                                <input id="correo" name="correo" type="text" class="form-control" value="<?php echo $e_u->CorreoElectronico;?>" >
			                                            </div>
			                                            <div class="form-group">
			                                                <label class="control-label">Password *</label>
			                                                <input id="contrasena" name="contrasena" type="text" class="form-control" value="<?php echo $e_u->Contrasena;?>">
			                                            </div>
			                                            <div class="form-group">
			                                                <label class="control-label">Confirmar Password *</label>
			                                                <input id="confirm" name="confirm" type="text" class="form-control" value="<?php echo "$e_u->Contrasena";?>" >
			                                            </div>
			                                            <div class="form-group">
			                                                <label class="control-label">Estado de Cuenta *</label>
			                                                <select name="estado" class="form-control">
			                                                <?php if ($editar->Estado == "A") {
			                                                ?>
			                                                	<option value="A" selected>Activado</option>
			                                                	<option value="X">Desactivado</option>
			                                                <?php
			                                                } else {
			                                                ?>	
			                                                	<option value="A">Activado</option>
			                                                	<option value="X" selected>Desactivado</option>
			                                                <?php 
			                                                }
			                                                 ?>
			                                                	
			                                                </select>
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