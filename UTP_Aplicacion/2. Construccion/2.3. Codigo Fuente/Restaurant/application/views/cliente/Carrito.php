<?php include 'Menu.php'; ?>
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


  <div class="row">
   <div class="col-md-9">
    <?php $j = 0; ?>
    <div class="ibox">
     <div class="ibox-title">
      <?php foreach ($this->cart->contents() as $items): ?>


       <?php $j++; ?>

     <?php endforeach; ?>
     <span class="pull-right">(<?php echo $j; ?>) Productos</span>
     <h5>Platos agregados</h5>
   </div>
   <div class="ibox-content">


    <?php $i = 1; 

    $c =1;
    $c_c =1;
    ?>
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

   <td width="70">
     <!-- Cantidad -->

     <input type="hidden"  name="stock" min="1" class="form-control" placeholder="<?php echo $items['stock']; ?>">


     <input type="hidden"  name="Stock[]"  value= "<?php echo ($items['stock']-$items['qty']); ?>">
     <!-- <input type="number"  name="stock" min="1" class="form-control" placeholder="<?php echo ($items['stock']); ?>"> -->
     <?php $c_c++; ?>

     <input id="cantidad_plato_e_<?php echo $c_c;?>" type="hidden"  name="Cantidad[]" value="<?php echo $items['qty']; ?>">
     <?php $c++; ?>
     <input id="cantidad_plato_<?php echo $c;?>" type="number"  name="qty1" min="1" class="form-control" value="<?php echo $items['qty']; ?>">


     <p>
       <h1> 
        <?php 
        $row = $items['rowid']."-".($items['qty']+1); 
        echo anchor ('Catalogo/update_cart/'.$row, '+');
        ?> 



        <?php 
        $row = $items['rowid']."-".($items['qty']-1); 
        echo anchor ('Catalogo/update_cart/'.$row, '-');
        ?> 
      </h1>
     <!-- <input type="button" onclick="Sumar(<?php echo $c; ?>)" class="btn btn-success" value="+">
      <input type="button" onclick="Restar(<?php echo $c; ?>)" class="btn btn-success" value="-">-->
    </p>
  </td>
  <td>
    <h4>
     <td style="text-align:left;">S/.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
   </h4>
   <div class="m-t-sm">


    <!--<a href="#" class="text-muted"><?php echo anchor('Catalogo/remove/'.$items['rowid'],'Eliminar plato');?></a>-->
    <a href="<?php echo base_url('Catalogo/remove/').$items['rowid']; ?>" class="pull-right"><i class="glyphicon glyphicon-trash "></i>Eliminar </a>


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



<a class="btn btn-danger" href="<?php echo base_url ('Catalogo/VaciarCarrito');?>">Vaciar Carrito</a>
<a class="btn btn-white" href="<?php echo base_url("Catalogo/ListarCarta"); ?>"><i class="fa fa-arrow-left"></i> Seguir Comprando</a>

<div class="ibox-title">
 <?php         

 if ($this->cart->format_number($this->cart->total())==0.00){

  ?>

  <?php
}
else {
  ?>
  <button class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Comprar</button>
  <?php
}

?>
</div>
</div>
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
 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</div>

</form>                          
</div>                    
</div>


<?php include 'footer.php'; ?>
<script type="text/javascript">
 function Sumar(a){
  var Cantidad = document.getElementById('cantidad_plato_'+a).value;
  var resultado = parseInt(Cantidad) + 1;
  document.getElementById('cantidad_plato_'+a).value = resultado;
  document.getElementById('cantidad_plato_e_'+a).value = resultado;

}
function Restar(a){

  var Cantidad = document.getElementById('cantidad_plato_'+a).value;
  var resultado = parseInt(Cantidad) - 1;
  if (resultado <1) {
   alert('Ingrese un numero mayor a 0');
 }
 else{
   document.getElementById('cantidad_plato_'+a).value = resultado;
 }

}
</script>