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
			                                            <label>Nombres *</label>
			                                            <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo $editar->Nombres;?>" required>
			                                        </div>
			                                        <div class="form-group">
				                                        <label>Sexo *</label>
				                                        <select class="form-control m-b" name="sexo" required>
						                                    <?php 
						                                        if ($editar->Sexo == "M") {
						                                    ?>
						                                <option value="M" selected>Masculino</option>
						                                <option value="F">Femenino</option>
						                                    <?php } else {?>
						                                <option value="M" >Masculino</option>
						                                <option value="F" selected>Femenino</option>
						                                    <?php } ?>
						                                    </select>
			                                        </div>
			                                        

			                                            <div class="form-group">
			                                                <label>DNI *</label>
			                                                <input id="dni" name="dni" type="number" minlength="8" maxlength="8" class="form-control" value="<?php echo $editar->Dni;?>" required>
			                                            </div>
			                                <h1>Información Complementaria</h1>
			                                            <div class="form-group">
			                                                <label>Dirección *</label>
			                                                <input id="direccion" name="direccion" type="text" class="form-control" value="<?php echo $editar->Direccion;?>">
			                                            </div>
			                                            <div class="form-group">
			                                                <label>Distrito *</label>
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
                                        					<span class="help-block">(054) 123-456</span>
			                                            </div>
			                                            <div class="form-group">
			                                                <label class="control-label">Celular *</label>
			                                                <input type="text" name="celular" class="form-control required" placeholder="" value="<?php echo $editar->Celular;?>">
			                                            </div>
			                                            <div class="form-group">
			                                                <label>Referencia </label>
			                                                <input id="referencia" name="referencia" type="text" class="form-control" value="<?php echo $editar->Referencia;?>">
			                                            </div>
			                                <h1>Cuenta</h1>
			                                            <div class="form-group">
			                                                <label>Correo *</label>
			                                                <input id="correo" name="correo" type="text" class="form-control" value="<?php echo $e_u->CorreoElectronico;?>" required>
			                                            </div>
			                                            <div class="form-group">
			                                                <label>Password *</label>
			                                                <input id="contrasena" name="contrasena" type="text" class="form-control" value="<?php echo $e_u->Contrasena;?>">
			                                            </div>
			                                            <div class="form-group">
			                                                <label>Confirmar Password *</label>
			                                                <input id="confirm" name="confirm" type="text" class="form-control" value="<?php echo "$e_u->Contrasena";?>" required>
			                                            </div>
			                                            <div class="form-group">
			                                                <label>Estado de Cuenta *</label>
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
		<!-- Jquery Validate -->
    	<script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    	<!-- Input Mask-->
    	<script src="<?php echo base_url(); ?>assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>   	
        <!-- Script Validación -->
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>