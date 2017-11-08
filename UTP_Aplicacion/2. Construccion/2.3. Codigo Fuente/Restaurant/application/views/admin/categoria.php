<?php include 'menu.php'; ?>
		<!-- Contenido -->
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="tabs-container">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab-1">Categoria Plato</a></li>
              <li class=""><a data-toggle="tab" href="#tab-2">Nuevo Categoria</a></li>
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
                            <th>Categoria</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          foreach ($categoria as $categoria) {
                        ?>
                          <tr class="gradeX">
                            <td><?php echo $categoria->idCategoriaPlato;?></td>
                            <td><?php echo $categoria->Categoria;?></td>
                            <td>
                              <center>
                                <a href="<?php echo base_url('Categoria/eliminar')."/".$categoria->idCategoriaPlato; ?>"><span class="fa fa-trash"></span></a>
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
                            <th>Categoria</th>
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
                            Registre los datos de la nueva Categoria.
                          </h2>
                          <form id="formcategoria" action="<?php echo base_url('Categoria/insertar'); ?>" method="post">
                            <a onclick="Cerrar1();">
                              <button type="submit" class="btn btn-success" id="Cerrar1"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                            </a>
                            <fieldset>
                              <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="col-lg-4 control-label">Nombre de Categoria *</label>
                                      <div class="col-sm-10"><input   type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre" required></div>
                                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    </div>
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
        
  <?php include 'footer.php'; ?>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
  <!-- Jquery Validate -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
  <!-- Script Validación -->
  <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
  <!-- Fin Script Validación -->
  <!-- Data picker -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
  
  <script type="text/javascript">
  Cerrar1 = function () 
    {
        expresion= /[a-z]/;
      $('#nombre').val();

      if( $('#nombre').val()==="")
      {
        swal({
            title: 'El campo esta vacio',
            html: $('<div>')
         } );
            }
      }
    else {
      swal({
            title: 'REGISTRADO EXITOSAMENTE',
            html: $('<div>')
            .addClass('some-class'),
            
            animation: false,
            customClass: 'animated tada'
         } );
            }
       
    }
</script>