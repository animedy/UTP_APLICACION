<?php include 'menu.php'; ?>
        <!-- Contenido -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Catalogo de Platos</h2>

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
                    <form action=<?php echo base_url('Catalogo/InsertarCarrito'); ?> method="POST">
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
                                <input type="hidden" name="idPlatos" value="<?php echo $plato->idPlatos;?>">
                                <input type="hidden" name="Nombres" value="<?php echo $plato->Nombres;?>">
                                <input type="hidden" name="Imagen" value="<?php echo $plato->Imagen;?>">
                                <input type="hidden" name="Precio" value="<?php echo $plato->Precio;?>">
                                <input type="hidden" name="Descripcion" value="<?php echo $plato->Descripcion;?>">
                                <div class="m-t text-righ">
                                  <button class="btn btn-xs btn-outline btn-success" type="submit">Agregar <i class="fa fa-long-arrow-right"></i></button>
                                   
                                    <br>
                                    <label>Cantidad:</label>
                                    <input type="number" name="Cantidad" value="1"> 
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            <?php
                    $contar=$contar+1;
                    if ($contar == 4) {
                        echo "</div>  <div class='row'>";
                        $contar =0;
                    }
                }
             ?>        </div>       
 
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


<?php include 'footer.php'; ?>
    <!-- Sweet alert -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
        Agregar = function (id,nombre,imagen,categoria,precio,estado,cantidad,descripcion) 
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