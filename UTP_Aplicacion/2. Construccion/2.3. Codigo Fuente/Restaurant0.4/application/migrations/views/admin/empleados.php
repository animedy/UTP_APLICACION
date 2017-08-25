<?php include 'menu.php'; ?>
		<!-- Contenido -->
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Empleados</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Nuevo Empleado</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                              <div class="panel-body">
                                  <div class="ibox-content">
                                          <div class="table-responsive">
                                              <table class="table table-striped table-bordered table-hover dataTables-example" id="table">
                                                  <thead>
                                                      <tr>
                                                          <th>ID</th>
                                                          <th>DNI</th>
                                                          <th>Empleado</th>
                                                          <th>Cargo</th>
                                                          <th>Fecha Ingreso</th>
                                                          <th>Acciones</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                  <?php 
                                                    foreach ($empleados as $empleado) {
                                                    
                                                   ?>
                                                  <tr class="gradeX">
                                                      <td><?php echo $empleado->idEmpleados;?></td>
                                                      <td><?php echo $empleado->dni;?></td>
                                                      <td><?php echo $empleado->Nombres . ' ' . $empleado->Apellidos;?></td>
                                                      <td><?php echo $empleado->Rol;?></td>
                                                      <td><?php echo date("d-m-Y",strtotime($empleado->Fecha_Registro));?></td>
                                                      <td>
                                                        <center>
                                                          <a href="<?php echo base_url('login/eliminar')."/".$empleado->idEmpleados; ?>"><span class="fa fa-trash"></span></a>
                                                          <a href="<?php echo base_url()."/EditarEmpleado/".$empleado->idEmpleados; ?>"><span class="fa fa-pencil"></span></a>
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
                                                         <th>DNI</th>
                                                          <th>Empleado</th>
                                                          <th>Cargo</th>
                                                          <th>Fecha Ingreso</th>
                                                          <th>Acciones</th>
                                                      </tr>
                                                  </tfoot>
                                              </table>
                                          </div>
                                    </div>
                              </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                              <div class="panel-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                      <div class="ibox">
                                          <div class="ibox-content">
                                              <h2>
                                                  Registre los datos del nuevo empleado.
                                              </h2>
                                              <form id="formempleado" action="<?php echo base_url('login/insertar'); ?>" method="post">
                                              <div>
                                                <button class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                              </div>
                                                  <h1>Datos Personales</h1>
                                                  <fieldset>
                                                      <h2>Datos Personales</h2>
                                                      <div class="row">
                                                          <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label>Nombres *</label>
                                                                  <input id="nombre" name="nombre" type="text" class="form-control required">
                                                              </div>
                                                              <div class="form-group">
                                                                  <label>Apellidos *</label>
                                                                  <input id="apellido" name="apellido" type="text" class="form-control required">
                                                              </div>
                                                          </div>
                                                          <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label>DNI *</label>
                                                                  <input id="dni" name="dni" type="number" minlength="8" maxlength="8" class="form-control required">
                                                              </div>
                                                              <div class="form-group">
                                                                <label>Sexo *</label>
                                                              <select class="form-control m-b" name="account">
                                                                <option value="M">Masculino</option>
                                                                <option value="F">Femenino</option>
                                                            </select>
                                                          </div>
                                                      </div>
                                                  </fieldset>

                                                  <h1>Información Complementaria</h1>
                                                  <fieldset>
                                                      <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label>Fecha Nacimiento *</label>
                                                                  <div class="input-group date">
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fec_nac" type="text" class="form-control" value="<?php echo date('d-m-Y') ?>" name="fec_nac">
                                                                  </div>
                                                                  <!--<input type="text" id="fec_nac" name="fec_nac" class="form-control" data-mask="99/99/9999" placeholder=""  required="">-->
                                                                  <span class="help-block">dd/mm/yyyy</span>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label>Dirección *</label>
                                                                  <input id="direccion" name="direccion" type="text" class="form-control" required>
                                                              </div>
                                                      </div>
                                                      <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label>Celular *</label>
                                                                  <input id="celular" name="celular" type="text" class="form-control" data-mask="999999999" required>
                                                              </div>
                                                          </div>
                                                  </fieldset>

                                                  <h1>Cuenta</h1>
                                                  <fieldset>
                                                      <h2>Infomación de Cuenta</h2>
                                                      <div class="row">
                                                          <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label>Usuario *</label>
                                                                  <input id="usuario" name="usuario" type="text" class="form-control required">
                                                              </div>
                                                              <div class="form-group">
                                                                  <label>Email *</label>
                                                                  <input id="email" name="email" type="text" class="form-control required email">
                                                              </div>
                                                          
                                                          </div>
                                                          <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label>Password *</label>
                                                                  <input id="password" name="password" type="text" class="form-control required">
                                                              </div>
                                                              <div class="form-group">
                                                                  <label>Confirmar Password *</label>
                                                                  <input id="confirm" name="confirm" type="text" class="form-control required">
                                                              </div>
                                                          </div>
                                                      </div>

                                                  </fieldset>
                                                  
                                                  <h1>Información Administrativa</h1>
                                                  <fieldset>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                              <label>Cargo *</label>
                                                            <select name="cargo" class="form-control">
                                                              <option value="1">Administrador</option>
                                                              <option value="2">Cajero</option>
                                                              <option value="3">Cocina</option>
                                                              <option value="4">Moto</option>
                                                            </select>
                                                          </div>
                                                      </div>
                                                      <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Estado *</label>
                                                            <select name="estado" class="form-control">
                                                              <option value="A">Activado</option>
                                                              <option value="X">Desactivado</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Fecha Ingreso *</label>
                                                            <div class="input-group date">
                                                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fec_in" type="text" class="form-control" value="<?php echo date('d-m-Y') ?>" name="fec_nac">
                                                            </div>
                                                            <!--<input type="text" id="fec_in" class="form-control" data-mask="99/99/9999" placeholder="" name="fec_in" required="">
                                                            <span class="help-block">dd/mm/yyyy</span>-->
                                                        </div>
                                                      </div>
                                                  </fieldset>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                              </div>
                            </div>
                          </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Fin Contenido -->
        <!-- Formulario Nuevo Contenido -->               
		<!-- Fin Formulario Nuevo Contenido -->
		<!-- Formulario Editar Empleado -->
		<!-- Fin Formulario Editar Empleado -->
        
        
      <?php include 'footer.php'; ?>
        <!-- Jquery Validate -->
    	<script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    		<!-- Input Mask-->
    	<script src="<?php echo base_url(); ?>assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>
        <!-- Script Validación -->
      <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
        <!-- Fin Script Validación -->
        <!-- Data picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function() {

            $('#fec_nac').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'dd-mm-yyyy'
            });

            $('#fec_in').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'dd-mm-yyyy'
            });

        });

    </script>