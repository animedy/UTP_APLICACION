<?php include 'menu.php'; ?>
        <!-- Contenido -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Catalogo de Platos</h2>
        <a data-toggle="modal" class="btn btn-success" href="#modal-form"><i class="fa fa-plus"></i>&nbsp;Nuevo Plato</a>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <?php 
            $contar =0;
                foreach ($platos as $plato) {
            ?>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <img src="<?php echo base_url().$plato->Imagen; ?>" class="img-responsive">
                            <div class="product-desc">
                                <span class="product-price">
                                    S/. <?php echo $plato->Precio; ?>
                                </span>
                                <small class="text-muted">
                                    <?php 
                                        $enviar_plato;
                                        foreach ($tipo_platos as $tipo_plato) {
                                            if ($plato->CategoriaPlato_idCategoriaPlato == $tipo_plato->idCategoriaPlato) {
                                               echo $enviar_plato = $tipo_plato->Categoria;
                                            }
                                            
                                        }
                                     ?>
                                </small>
                                <a href="#" class="product-name suc"><?php echo $plato->Nombres; ?></a>
                                <div class="small m-t-xs">
                                <?php echo $plato->Descripcion; ?>
                                </div>
                                <div class="m-t text-righ">
                                    <a data-toggle="modal" href="#modal-form-edit" class="btn btn-xs btn-outline btn-success" onclick='Editar("<?php echo $plato->idPlatos?>","<?php echo $plato->Nombres?>", "<?php echo $plato->Imagen;?>", "<?php echo $enviar_plato;?>" ,"<?php echo $plato->Precio?>","<?php echo $plato->Estado?>", "<?php echo $plato->Cantidad?>", "<?php echo $plato->Descripcion?>");'>Editar <i class="fa fa-long-arrow-right"></i> </a>
                                    <?php
                                        if($plato->Cantidad >= 4) {
                                    ?>
                                        <div class="btn btn-xs btn-outline btn-success"><?php echo  $plato->Cantidad;?> </div>
                                    <?php         
                                        }
                                        elseif ($plato->Cantidad == 0) {
                                    ?>
                                        <div class="btn btn-xs btn-outline btn-danger">Agotado <i class="fa fa-exclamation-triangle"></i></div>
                                        <div class="btn btn-xs btn-outline btn-danger"> <?php echo  $plato->Cantidad;?></div>
                                    <?php 
                                        }
                                        elseif ($plato->Cantidad <= 3) {
                                    ?>
                                        <div class="btn btn-xs btn-outline btn-warning">Stock <i class="fa fa-sort-amount-desc"></i> 
                                        </div>
                                        <div class="btn btn-xs btn-outline btn-warning"> <?php echo  $plato->Cantidad;?></div>
                                    <?php
                                        }
                                    ?>
                                    <!--<div class="btn btn-xs btn-outline btn-primary eliminar"><i class="fa fa-times"></i></div>-->
                                    <button type="submit" class="btn btn-xs btn-outline btn-primary eliminar" onclick='Eliminar("<?php echo $plato->idPlatos;?>");'><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
                    $contar=$contar+1;
                    if ($contar == 4) {
                        echo "</div>  <div class='row'>";
                        $contar =0;
                    }
                }
             ?>
        </div>       
 
                                                            <!-- Nuevo -->
        <div id="modal-form" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
        
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Nuevo Plato</h4>
                        <small class="font-bold">Registre los datos del nuevo plato.</small>
                    </div>
                    <form role="form" id="form" class="form-horizontal" action="<?php echo base_url('catalogo/insertar'); ?>"   method="POST" enctype="multipart/form-data">
                        <div class="modal-body">                   
                            <div class="ibox-content">                    
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nombre</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Categoria</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="categoria" id="categoria" required>
                                            <?php
                                                foreach ($tipo_platos as $key => $tipo_plato) {
                                            ?>
                                                     <option value="<?php echo $tipo_plato->idCategoriaPlato; ?>"><?php echo $tipo_plato->Categoria; ?></option>
                                            <?php
                                                }
                                             ?>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Precio</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="precio" id="precio" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Estado</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="estado" id="estado" required></div>
                                </div>
                                <div class="form-group">
                                <label class="col-lg-2 control-label">Imagen</label>
                                    <div class="col-sm-10">
                                    <input type="file" class="form-control" name="imagen">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Cantidad</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="cantidad" id="Cantidad" placeholder="Ingrese su Observación"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Descripción</label>
                                    <div class="col-sm-10"><textarea type="text" class="form-control" name="descripcion" id="descripcion" required></textarea></div>
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
<!-- Fin Nuevo -->

<!-- Editar -->
       <div id="modal-form-edit" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
        
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Editar Plato</h4>
                        <small class="font-bold">Edite los datos del  plato.</small>
                    </div>
                    <form role="form" id="form" class="form-horizontal"   action="<?php echo base_url('catalogo/actualizar'); ?>" method="POST">
                        <div class="modal-body">                   
                            <div class="ibox-content">
                                <div class="form-group">
                                    <center>
                                        <img id="imagen_edit" class="img-responsive" width="50%">
                                    </center>
                                </div>
                                <input type="hidden" name="id" id="id_edit">                    
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nombre</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nombre" id="nombre_edit" placeholder="Ingrese su nombre" required ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Categoria</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="categoria" id="categoria_edit" required>
                                            <?php
                                                foreach ($tipo_platos as $key => $tipo_plato) {
                                            ?>
                                                     <option value="<?php echo $tipo_plato->idCategoriaPlato; ?>"><?php echo $tipo_plato->Categoria; ?></option>
                                            <?php
                                                }
                                             ?>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Precio</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="precio" id="precio_edit" required ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Estado</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="estado" id="estado_edit" required ></div>
                                </div>
                                <!--<div class="form-group">
                                <label class="col-lg-2 control-label">Imagen</label>
                                    <div class="col-sm-10">
                                        <div class="btn-group">
                                            <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                                  <input type="file" accept="image/*" name="imagen" id="imagen_edit" >
                                                Subir nueva imagen
                                            </label>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Cantidad</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="cantidad" id="cantidad_edit" placeholder="Ingrese su Observación" required ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Descripción</label>
                                    <div class="col-sm-10"><textarea type="text" class="form-control" name="descripcion" id="descripcion_edit" required></textarea></div>
                                </div>                                   
                            </div>

                        </div>
                        
                        <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="add"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                        </div>
                    </form>                 
                </div>                    
            </div>
                           
        </div>
<!-- Fin Editar -->
<?php include 'footer.php'; ?>
    <!-- Sweet alert -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
        Editar = function (id,nombre,imagen,categoria,precio,estado,cantidad,descripcion) 
        {
            $("#imagen_edit").attr("src","./"+imagen);
            $('#id_edit').val(id);
            $('#nombre_edit').val(nombre);
            $("#categoria_edit").find('option:contains("'+categoria+'")').prop('selected', true);
            $('#precio_edit').val(precio);
            $('#estado_edit').val(estado);
            $('#cantidad_edit').val(cantidad);
            $('#descripcion_edit').val(descripcion);
        }

        Eliminar = function (id) {
                swal({
                            title: "¿Esta seguro que desea eliminar?",
                            text: "Usted no podra recuperar esta información una vez eliminada",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Si, eliminar!",
                            cancelButtonText: "No, cancelar!",
                            closeOnConfirm: false,
                            closeOnCancel: false },
                        function (isConfirm) {
                            if (isConfirm) {
                                swal("Eliminado!", "El plato a sido eliminado.", "success");
                                jQuery.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>" + "/catalogo/eliminar/"+id,
                                    dataType: 'json'
                                });
                                location.reload();
                            } else {
                                swal("Cancelado", "El plato esta a salvo :)", "error");
                            }
                        });
            }
    </script>