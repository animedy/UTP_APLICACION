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
                                                        <div class="col-md-1">
                                                          <form method="post" action="<?php echo base_url('EditarEmpleado'); ?>">
                                                            <button type="submit" class="btn btn-success btn-xs"><span class="fa fa-pencil"></span></button>
                                                            <input type="hidden" name="idempleado" value="<? echo $empleado->idEmpleados; ?>">
                                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                          </form>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button type="submit" class=" btn btn-success btn-xs" onclick='EliminarEmpleado("<? echo $empleado->idEmpleados?>");'><span class="fa fa-trash"></span></button>
                                                        </div>
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
                                                <button type="submit" class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                              </div>
                                                  <h1>Datos Personales</h1>
                                                  <fieldset>
                                                      <h2>Datos Personales</h2>
                                                      <div class="row">
                                                          <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label class="control-label">Nombres *</label>
                                                                  <input id="nombre" name="nombre" type="text" class="form-control required">
                                                              </div>
                                                              <div class="form-group">
                                                                  <label class="control-label">Apellidos *</label>
                                                                  <input id="apellido" name="apellido" type="text" class="form-control required">
                                                              </div>
                                                          </div>
                                                          <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label class="control-label">DNI *</label>
                                                                  <input id="dni" name="dni" type="number" minlength="8" maxlength="8" class="form-control required">
                                                              </div>
                                                              <div class="form-group">
                                                                <label class="control-label">Sexo *</label>
                                                                  <select class="form-control" name="account" required>
                                                                    <option value="">-- Seleccione un Sexo --</option>
                                                                    <option value="M">Masculino</option>
                                                                    <option value="F">Femenino</option>
                                                                  </select>
                                                          </div>
                                                      </div>
                                                  </fieldset>

                                                  <h1>Información Complementaria</h1>
                                                  <fieldset>
                                                      <div class="row">
                                                        <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Fecha Nacimiento *</label>
                                                                    <div class="input-group date" id="fec_nac">
                                                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input  type="text" class="form-control" value="<?php echo date('d-m-Y'); ?>" name="fec_nac">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Dirección *</label>
                                                                    <input id="direccion" name="direccion" type="text" class="form-control" required>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Celular *</label>
                                                                    <input id="celular" name="celular" type="text" class="form-control" data-mask="999999999" required>
                                                                </div>
                                                        </div>
                                                      </div>
                                                  </fieldset>

                                                  <h1>Cuenta</h1>
                                                  <fieldset>
                                                      <h2>Infomación de Cuenta</h2>
                                                      <div class="row">
                                                          <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label class="control-label">Usuario *</label>
                                                                  <input id="usuario" name="usuario" type="text" class="form-control required">
                                                              </div>
                                                              <div class="form-group">
                                                                  <label class="control-label">Email *</label>
                                                                  <input id="email" name="email" type="text" class="form-control required email">
                                                              </div>
                                                          
                                                          </div>
                                                          <div class="col-lg-6">
                                                              <div class="form-group">
                                                                  <label class="control-label">Password *</label>
                                                                  <input id="password" name="password" type="password" class="form-control required">
                                                              </div>
                                                              <div class="form-group">
                                                                  <label class="control-label">Confirmar Password *</label>
                                                                  <input id="confirm" name="confirm" type="password" class="form-control required">
                                                              </div>
                                                          </div>
                                                      </div>

                                                  </fieldset>
                                                  
                                                  <h1>Información Administrativa</h1>
                                                  <fieldset>
                                                      <div class="row">
                                                        <div class="col-lg-6">
                                                          <div class="form-group">
                                                                <label class="control-label">Cargo *</label>
                                                              <select name="cargo" class="form-control">
                                                                <option value="">-- Seleccionar --</option>
                                                                <option value="1">Administrador</option>
                                                                <option value="2">Cajero</option>
                                                                <option value="3">Cocina</option>
                                                                <option value="4">Repartidor</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                          <div class="form-group">
                                                              <label class="control-label">Estado *</label>
                                                              <select name="estado" class="form-control">
                                                                <option value="">-- Seleccionar --</option>
                                                                <option value="A">Activado</option>
                                                                <option value="X">Desactivado</option>
                                                              </select>
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="control-label">Fecha Ingreso *</label>
                                                              <div class="input-group date" id="fec_in">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="<?php echo date('d-m-Y') ?>" name="fec_in">
                                                              </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                  </fieldset>
                                                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
        <!-- Fin Contenido -->
    
    