<?php 
include 'menu.php';
foreach ($a as $key) {
	
?>
			        <div class="row">
			                <div class="col-lg-12">
			                    <div class="ibox">
			                        <div class="ibox-content">
			                            <h2>
			                                Edite los datos del nuevo empleado.
			                            </h2>
			                           
			                            <form id="formeditempleado" action="<?php echo base_url('login/actualizar'); ?>" method="post">
			                             <div class="right">
			                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Actualizar Empleado</button>
			                                <a href="<?php echo base_url('empleados'); ?>" class="btn btn-success" ><i class="fa fa-ban"></i>&nbsp;Cancelar</a>
			                            </div>
			                                <h1>Datos Personales</h1>

			                                <fieldset>
			                                    <div class="row">
			                                        <div class="col-lg-6">
			                                            <div class="form-group">
			                                            	<input type="hidden" name="id" value="<?php echo $key->idEmpleados; ?>">
			                                                <label>Nombres *</label>
			                                                <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo $key->Nombres;?>" required>
			                                            </div>
			                                            <div class="form-group">
			                                                <label>Apellidos *</label>
			                                                <input id="apellido" name="apellido" type="text" class="form-control" value="<?php echo $key->Apellidos;?>" required>
			                                            </div>
			                                        </div>
			                                        <div class="col-lg-6">
			                                            <div class="form-group">
			                                                <label>DNI *</label>
			                                                <input id="dni" name="dni" type="number" minlength="8" maxlength="8" class="form-control" value="<?php echo $key->Dni;?>" required>
			                                            </div>
			                                            <div class="form-group">
				                                            <label>Sexo *</label>
				                                        	<select class="form-control m-b" name="account" required>
						                                        <?php 
						                                        if ($key->Sexo == "M") {
						                                        ?>
						                                        <option value="M" selected>Masculino</option>
						                                        <option value="F">Femenino</option>
						                                       <?php } else {?>
						                                        <option value="M" >Masculino</option>
						                                        <option value="F" selected>Femenino</option>
						                                    <?php } ?>
						                                    </select>
			                                        </div>
			                                    </div>
			                                </fieldset>

			                                <h1>Información Complementaria</h1>
			                                <fieldset>
			                                    <div class="col-lg-6">
			                                        <div class="form-group">
			                                           	<label>Dirección *</label>
			                                            <input id="direccion" name="direccion" type="text" class="form-control" value="<?php echo $key->Direccion;?>">
			                                        </div>
			                                        <div class="form-group">
			                                            <label>Fecha Nacimiento *</label>
			                                            <input id="fec_nac" name="fec_nac" type="text" class="form-control" data-mask="99/99/9999" value="<?php echo date("d-m-Y",strtotime($key->Fecha_Nacimiento));?>" required>
			                                        </div>
			                                    </div>
			                                    <div class="col-lg-6">
			                                            <div class="form-group">
			                                                <label>Celular *</label>
			                                                <input id="celular" name="celular" type="text" class="form-control" data-mask="999999999" value="<?php echo $key->Celular;?>">
			                                            </div>
			                                        </div>
			                                </fieldset>

			                                <h1>Cuenta</h1>
			                                <fieldset>
			                                    <div class="row">
			                                        <div class="col-lg-6">
			                                            <div class="form-group">
			                                                <label>Usuario *</label>
			                                                <input id="usuario" name="usuario" type="text" class="form-control" value="<?php echo $key->Usuario;?>" required>
			                                            </div>
			                                            <div class="form-group">
			                                                <label>Email *</label>
			                                                <input id="email" name="email" type="text" class="form-control" value="<?php echo $key->Correo_Electronico;?>" required="required">
			                                            </div>
				                                    	
			                                        </div>
			                                        <div class="col-lg-6">
			                                            <div class="form-group">
			                                                <label>Password *</label>
			                                                <input id="password" name="password" type="text" class="form-control" value="<?php echo $key->Contrasena;?>">
			                                            </div>
			                                            <div class="form-group">
			                                                <label>Confirmar Password *</label>
			                                                <input id="confirm" name="confirm" type="text" class="form-control" value="<?php echo "$key->Contrasena";?>" required>
			                                            </div>
			                                        </div>
			                                    </div>

			                                </fieldset>
			                                
			                                <h1>Información Administrativa</h1>
			                                <fieldset>
			                                	<div class="col-lg-6">
			                                    	<div class="form-group">
			                                            <label>Cargo *</label>
			                                            <select class="form-control" name="cargo">
			                                            <?php 
			                                            if ($key->TipoEmpleado_idTipoEmpleado=="1") {
			                                            	?>
			                                           		<option value="">--Selecione--</option>
			                                            	<option value="1" selected>Administrador</option>
                                                            <option value="2">Cajero</option>
                                                            <option value="3">Cocina</option>
                                                            <option value="4">Moto</option>
			                                            <?php
			                                            }
			                                            elseif($key->TipoEmpleado_idTipoEmpleado=="2") {
			                                            	?>
			                                           		<option value="">--Selecione--</option>
			                                            	<option value="1">Administrador</option>
                                                            <option value="2" selected>Cajero</option>
                                                            <option value="3">Cocina</option>
                                                            <option value="4">Moto</option>
			                                            <?php
			                                            }
			                                            elseif($key->TipoEmpleado_idTipoEmpleado=="3") {
			                                            ?>
			                                           		<option value="">--Selecione--</option>
			                                            	<option value="1">Administrador</option>
                                                            <option value="2">Cajero</option>
                                                            <option value="3" selected>Cocina</option>
                                                            <option value="4">Moto</option>
			                                            <?php
			                                            }
			                                            elseif($key->TipoEmpleado_idTipoEmpleado=="4") {
			                                            ?>
			                                           		<option value="">--Selecione--</option>
			                                            	<option value="1">Administrador</option>
                                                            <option value="2">Cajero</option>
                                                            <option value="3">Cocina</option>
                                                            <option value="4" selected>Moto</option>
			                                            <?php
			                                            }else{
			                                           	?>
			                                           		<option value="">--Selecione--</option>
			                                           		<option value="1">Administrador</option>
                                                            <option value="2">Cajero</option>
                                                            <option value="3">Cocina</option>
                                                            <option value="4" selected>Moto</option>
			                                           	<?php
			                                            }
			                                             ?>
			                                            }
			                                            	
			                                            </select>
			                                        </div>
			                                    </div>
			                                    <div class="col-lg-6">
			                                    	<div class="form-group">
			                                            <label>Fecha Registro *</label>
			                                        	<input id="fec_in" name="fec_in" type="text" data-mask="99/99/9999" class="form-control required" value="<?php echo date("d/m/Y",strtotime($key->Fecha_Registro));?>">
			                                        </div>
			                                        <div class="form-group">
			                                            <label>Estado *</label>
			                                            <select name="estado" class="form-control">
			                                            <?php
			                                            if ($key->Estado == "A") {
			                                            ?>
			                                             	<option value="A" selected="">Habilitado</option>
			                                            	<option value="X">Deshabilitado</option>
			                                            <?php 
			                                             } else {
			                                             ?>
			                                             	<option value="A">Habilitado</option>
			                                            	<option value="X" selected="">Deshabilitado</option>
			                                            <?php
			                                             }
			                                              
			                                            ?>
			                                            </select>
			                                        </div>
			                                    </div>
			                                </fieldset>
			                            </form>
			                        </div>
			                    </div>
			                </div>
			        </div>



<?php 
}  
	include 'footer.php'; ?>
        <!-- Jquery Validate -->
    	<script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    	<!-- Input Mask-->
    	<script src="<?php echo base_url(); ?>assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>   	
        <!-- Script Validación -->
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>