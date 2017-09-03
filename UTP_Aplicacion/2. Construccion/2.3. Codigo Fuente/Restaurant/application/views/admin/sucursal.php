<?php include 'menu.php'; ?>
		<!-- Contenido -->
<div id="sucursalcontent">
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sucursales</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                        <div class="ibox-content">
                        <a data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="fa fa-plus"></i>&nbsp;Nuevo</a>
                        </br>
                        </br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sucursal</th>
                                            <th>Provincia</th>
                                            <th>Dirección</th>
                                            <th>Observación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    	foreach ($sucursales as $sucursal) {
                                    	
                                     ?>
                                    <tr class="gradeX">
                                        <td><?php echo $sucursal->nombre;?></td>
                                        <td><?php echo $sucursal->provincia;?></td>
                                        <td><?php echo $sucursal->direccion;?></td>
                                        <td class="center"><?php echo $sucursal->observacion;?></td>
                                    </tr>
                                    <?php 
                                    	}
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sucursal</th>
                                            <th>Provincia</th>
                                            <th>Dirección</th>
                                            <th>Observación</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Fin Contenido -->
        <!-- Formulario Nuevo Contenido -->
        <div id="modal-form" class="modal inmodal fade" aria-hidden="true" tabindex="-1">
        
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Nueva Sucursal</h4>
                        <small class="font-bold">Registre los datos de la nueva sucursal.</small>
                    </div>
                    <form role="form" id="form" class="form-horizontal"  method="POST">
                        <div class="modal-body">                   
                            <div class="ibox-content">                    
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nombre</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Departamento</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="departamento" id="departamento" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Provincia</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="provincia" id="provincia" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Distrito</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="distrito" id="distrito" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Dirección</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="direccion" id="direccion" required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Observación</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="observacion" id="observacion" placeholder="Ingrese su Observación"></div>
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
</div>                                    
		<!-- Fin Formulario Nuevo Contenido -->
        
        
<?php include 'footer.php'; ?>
        
        <!-- Script Validación -->
        <script>
         $(function(){
             $("#form").validate({
                 rules: {
                     nombre: {
                         required: true,
                         minlength: 3,
                     },
                     departamento: {
                         required: true,
                         minlength: 3
                     },
                     provincia: {
                         required: true,
                         minlength: 3
                     },
                     distrito: {
                         required: true,
                         minlength: 3
                     },
                     direccion: {
                         required: true,
                         minlength: 3
                     }
                 }
             });
        });
        </script>
        <!-- Fin Script Validación -->
        <script>
           $(document).ready(function(){
             $("#add").click(function(){ 
                nombre=$("#nombre").val();
                departamento=$("#departamento").val();
                provincia=$("#provincia").val();
                distrito=$("#distrito").val();
                direccion=$("#direccion").val();
                observacion=$("#observacion").val();
                if(nombre!="" && departamento!="" && provincia!="" && distrito!="" && direccion!=""){
                    $.ajax({url:"<?php echo base_url().'index.php/sucursal/grabar'; ?>",type:'POST',data:{nombre:nombre,departamento:departamento,provincia:provincia,distrito:distrito,direccion:direccion,observacion:observacion}});
                    $("#sucursalcontent").load('index.php/sucursal/listar');
                }else{
                    alert("Ingrese los datos en los campos especificados.");

                }
             });
           });
        </script>