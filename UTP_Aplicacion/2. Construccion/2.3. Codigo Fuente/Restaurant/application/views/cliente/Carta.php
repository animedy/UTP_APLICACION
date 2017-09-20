<?php include 'Menu.php'; ?>
        <!-- Contenido -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Catalogo de Platos</h2>
        <?php $j = 0; ?>
      <?php foreach ($this->cart->contents() as $items): ?>

                            
          <?php $j++; ?>
 
           <?php endforeach; ?>
        <h1>
        <span class="pull-right"> <a href="<?php echo base_url("Carrito"); ?>"><i class="fa fa-shopping-cart"> <?php echo $j; ?></i></a></span>
        </h1>
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
                                <input type="hidden" name="Cantidad" value="<?php echo $plato->Cantidad;?>">
                                <input type="hidden"  name="Stock" value="<?php echo $plato->Cantidad;?>">
                                <div class="m-t text-righ">

                                 
                                <?php

                                        if($plato->Cantidad >=1) {
                                    ?>
                                        <button class="btn btn-xs btn-outline btn-success" type="submit">Agregar <i class="fa fa-long-arrow-right"></i></button>
                                        <br>
                                    <label>Cantidad:</label>
                                    <input type="number"  min="1" name="Cantidad" value="1">
                                    <?php         
                                        }
                                        elseif ($plato->Cantidad == 0) {
                                    ?>
                                        <div class="btn btn-xs btn-outline btn-danger">Agotado <i class="fa fa-exclamation-triangle"></i></div>

                                        
                                    <?php 
                                        }
                                        elseif ($plato->Cantidad<0) {
                                    ?>
                                        <div class="btn btn-xs btn-outline btn-danger">Agotado <i class="fa fa-exclamation-triangle"></i></div>
                                        
                                    <?php
                                        }
                                    ?>
                                  
                                   
                                    
                                     
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
 



<?php include 'footer.php'; ?>
    <!-- Sweet alert -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
