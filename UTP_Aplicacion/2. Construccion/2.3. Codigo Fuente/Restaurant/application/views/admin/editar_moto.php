<?php 
include 'menu.php';
foreach ($a as $key) {
	
?>
			        <div class="row">
			                <div class="col-lg-12">
			                    <div class="ibox">
			                        <div class="ibox-content">
			                            <h2>
			                                Edite los datos de la moto.
			                            </h2>
			                           
			                            <form id="formeditempleado" action="<?php echo base_url('moto/actualizar'); ?>" method="post">
			                             <div class="right">
			                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Actualizar Moto</button>
			                                <a href="<?php echo base_url('motos'); ?>" class="btn btn-success" ><i class="fa fa-ban"></i>&nbsp;Cancelar</a>
			                            </div>
			                                <br>

			                                <fieldset>
			                                    <div class="row">
			                                        <div class="col-lg-12">
			                                            <div class="form-group">
			                                            	<input type="hidden" name="id" value="<?php echo $key->idPlaca; ?>">
			                                                <label>Placa *</label>
			                                                <input id="placa" name="placa" type="text" class="form-control" value="<?php echo $key->idPlaca;?>" required>
			                                            </div>
			                                            <div class="form-group">
			                                                <label>Marca *</label>
			                                                <input id="marca" name="marca" type="text" class="form-control" value="<?php echo $key->Marca_Moto;?>" required>
			                                            </div>
			                                            <div class="form-group">
			                                                <label>SOAT *</label>
			                                                <input id="soat" name="soat" type="number" minlength="8" maxlength="8" class="form-control" value="<?php echo $key->Soat;?>" required>
			                                            </div>
			                                            <div class="form-group">
				                                            <label>Estado *</label>
				                                        	<select class="form-control m-b" name="estado" required>
						                                        <?php 
						                                        if ($key->Estado == "A") {
						                                        ?>
						                                        <option value="A" selected>Habilitado</option>
						                                        <option value="X">Deshabilitado</option>
						                                       <?php } else {?>
						                                        <option value="A" >Habilitado</option>
						                                        <option value="X" selected>Deshabilitado</option>
						                                    <?php } ?>
						                                    </select>
			                                        	</div>
			                                        	<div class="form-group">
			                                                <label>Empleado *</label>
			                                                <select class="form-control" name="empleado">
			                                                <?php 
						                                    foreach ($empleados as $empleado) {
						                                        foreach ($repartidores as $repartidor) {
						                                            if ($repartidor->idTipoEmpleado == $empleado->TipoEmpleado_idTipoEmpleado ) {
						                                            	if ($empleado->idEmpleados == $key->empleados_idEmpleados) {
						                                    ?>
						                                            		<option value="<?php echo  $empleado->idEmpleados; ?>" selected><?php echo $empleado->Nombres . " " . $empleado->Apellidos;  ?></option>
						                                    <?php     	} else {
						                                    ?>
						                                            		<option value="<?php echo  $empleado->idEmpleados; ?>" ><?php echo $empleado->Nombres . " " . $empleado->Apellidos;  ?></option>
						                                    <?php      	}  	
						                                    ?>
						                                                
						                                    <?php  } 
						                                        }
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