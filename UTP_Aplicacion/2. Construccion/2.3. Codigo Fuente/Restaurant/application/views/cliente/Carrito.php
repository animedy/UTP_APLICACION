<?php include 'menu.php'; ?>
        <!-- Contenido -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Carrito</h2>
   </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<form action=<?php echo base_url('Pedido/Insertar'); ?> method="POST" >
<!--<form action=<?php echo base_url('Catalogo/InsertarCarrito'); ?> method="POST" >-->

<div class="row">
                <div class="col-md-9">

                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="pull-right">(<strong>5</strong>) items</span>
                            <h5>Platos agregados</h5>
                        </div>
                        <div class="ibox-content">

                        <?php $i = 1; ?>

                        <?php foreach ($this->cart->contents() as $items): ?>

        
                         <input type="hidden" name="<?php echo $i;?>[rowid]" value="<?php echo $items['rowid']; ?>"> 
                         <input type="hidden" name="idPlatos[]" value="<?php echo $items['id']; ?>">
                         
                            <div class="table-responsive">
                                

                                    <tbody>
                                    <tr>
                                        <td width="400px">
                                            
                                            <img src="<?php echo base_url().$items['imagen']; ?>" class="cart-product-imitation">
                                            
                                        </td>
                                        <td class="desc">
                                            <h3>
                                            <a href="#" class="text-navy">
                                            <?php echo $items['name']; ?>
                                            
                                            </a>
                                            </h3>
                                            <p class="small">
                                                <?php echo $items['descripcion']; ?>     

                                                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                            <p>
                                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                    <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                <?php endforeach; ?>
                                            </p>

                                                <?php endif; ?>
                                            </p>
                                             
                                             <div class="m-t-sm">
                                                <a class="text-muted">Observación</a>
                                                <td ><input type="text" placeholder=" Escriba la Observacion" name="Observacion[]" value=""></td>
                                            </div>
                                        </td>
                                      
                                        <td>

                                            <td style="text-align:start;"> S/.<?php echo $this->cart->format_number($items['price']); ?></td>
                                            <s class="small text-muted">10% descuento</s>
                                        </td>

                                        <td width="65">
                                            <input type="text" class="form-control" placeholder="<?php echo $items['qty']; ?>">
                                            
                                            <input type="hidden" name="Cantidad[]" value="<?php echo $items['qty']; ?>">
                                        </td>
                                        <td>
                                            <h4>
                                               <td style="text-align:left;">S/.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                            </h4>
                                             <div class="m-t-sm">
                                                
                                                <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remover Plato</a>
                                            </div>
                                        </td>
                                       
                                    </tr>

                                    </tbody>
                                
                            </div>
                        
                    

<?php $i++; ?>
 
<?php endforeach; ?>

<div class="ibox-content">


                   
                        <div class="ibox-title">
                            <h5>Costo Total </h5>
                        </div>
                        <div class="ibox-content">
                            <span>
                                Total
                            </span>
                            <h2 class="font-bold">
                                S/. <?php echo $this->cart->format_number($this->cart->total()); ?>
                                <input type="hidden" name="Total" value="<?php echo $this->cart->format_number($this->cart->total()); ?>">
                            </h2>

                            <hr/>
                            <span class="text-muted small">
                                *Costo de envio incluido e IGV
                            </span>
                           
                        </div>
                      

             <button class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Comprar</button>
             <button class="btn btn-white" href="Carrito"><i class="fa fa-arrow-left"></i> Seguir Comprando</button>
             <?php echo anchor ('Catalogo/VaciarCarrito', 'Vaciar Carrito');?>

 </div>

<div class="ibox">
                        <div class="ibox-title">
                            <h5>Soporte</h5>
                        </div>
                        <div class="ibox-content text-center">



                            <h3><i class="fa fa-phone"></i> +054-388453</h3>
                            <span class="small">
                                Por favor contactenos si tiene alguna duda con su pedido.
                            </span>


                        </div>
</div>

           
                          
</div>                    
</div>
</form>
</form>
<?php include 'footer.php'; ?>