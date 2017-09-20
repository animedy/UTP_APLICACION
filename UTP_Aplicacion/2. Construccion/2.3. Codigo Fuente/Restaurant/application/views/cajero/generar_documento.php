<?php 
include 'menu.php'; 
?>
<div>
    <div class="row wrapper white-bg col-sm-7 page-heading">
        <br>
        <div>
            <h2>Documento de Pago</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url("cajero"); ?>">Cajero</a>
                </li>
                <li>
                    <a href="<?php echo base_url("cajero"); ?>">Lista de Pedidos</a>  
                </li>
                <li class="active">
                    <strong>Generar Documento</strong>
                </li>
            </ol>
        </div>
    </div>  
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div id="" class="row wrapper white-bg col-sm-7 page-heading">
        <form action="<?php echo base_url('Caja/DocumentoPdf')?>" method="POST">
            <div class="form-group">
                <label class="col-lg-2 control-label">Seleccione un Repartidor: </label>
                <div class="col-sm-10">
                    <select class="form-control" name="repartidor">
                    <?php foreach ($repartidor as $repartidores) 
                    {
                    ?>
                        <option value="<?php echo $repartidores->idEmpleados; ?>"><?php echo $repartidores->Nombres." ".$repartidores->Apellidos; ?></option>
                    <?php 
                    } 
                    ?>
                    </select>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-lg-12">
                <button class="btn btn-white"><i class="btn btn-primary fa fa-print"></i> Imprimir </button>
                <br>
                <br>
            </div>
            <br>
            <div class="col-sm-12">
                <div class="col-sm-8">
                    <div class="col-sm-3" id="logo">
                        <img src="<?php echo base_url(); ?>assets/img/pp.png" height="50px">
                    </div>
                    <div class="col-sm-5 text-center">
                        <h4><strong>PEPE TIBURÓN<strong></h4>
                        <strong class="text-center">Av. SUCRE 672 LA TOMILLA - CAYMA</strong>
                    </div>
                </div>    
                <div class="col-sm-4 text-center">
                    <h3><strong>RUC : 96325874122</strong></h3> 
                    <h3><strong>BOLETA DE VENTA</strong></h3>          
                    <label class="text-center"><strong><?php echo "B001-".$boleta; ?></strong></label>
                    <input type="hidden" name="boleta" value="<?php echo "B001-".$boleta; ?>">
                    
                    <input type="hidden" name="idboleta" value="<?php echo $idboleta; ?>">
                    <input type="hidden" name="pedido" value="<?php echo $pedido; ?>">
                </div>
            </div>
            <div class="col-sm-12">  
                <br>
                <hr>
                <div class="col-sm-6">
                    <label class="text-right">Fecha:</label><label><?php echo $fecha." ".$hora; ?></label>
                    <input type="hidden" name="fecha_hora" value="<?php echo $fecha." ".$hora; ?>">
                    <br>
                    <label>Cliente :</label><label><?php echo $nombre; ?></label>
                    <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                    <br>
                    <label>Direccion :</label><label><?php echo $direccion; ?></label>
                    <input type="hidden" name="direccion" value="<?php echo $direccion; ?>">
                    <br>
                    <label>DNI :</label><label><?php echo $dni; ?></label>
                    <input type="hidden" name="dni" value="<?php echo $dni; ?>">
                </div>
                <div class="col-sm-6">
                    <br>
                    <label>Comanda :</label><label><?php echo $comanda ?></label>
                    <input type="hidden" name="comanda" value="<?php echo $comanda ?>">
                    <br>
                    <label>Cajero :</label><label><?php echo $cajero ?></label>
                    <input type="hidden" name="cajero" value="<?php echo $cajero ?>">
                    <br>
                    <label>Repartidor :</label><label><?php echo $cajero ?></label>
                    <input type="hidden" name="cajero" value="<?php echo $cajero ?>">
                </div>
            </div>
            <div class="col-sm-12 table-responsive m-t">
                <table class="table invoice-table">
                    <thead>
                    <tr>
                        <th>DESCRIPCION</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO UNIT.</th>
                        <th>TOTAL</th>
                    </tr>
                    </thead>
                    <?php
                    foreach ($docu as $documento) 
                    {
                        foreach ($deta as $detalle) 
                        {
                            if($documento->idPedidos == $detalle->Pedidos_idPedidos) 
                            {
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <strong><?php echo $detalle->Nombres; ?></strong>
                                <input type="hidden" name="nombres[]" value="<? echo $detalle->Nombres; ?>">
                            </td>
                            <td>
                                <strong><?php echo $detalle->Cantidad; ?></strong>
                                <input type="hidden" name="cantidad[]" value="<? echo  $detalle->Cantidad; ?>">
                            </td>
                            <td>
                                <strong><?php echo $detalle->Precio; ?></strong>
                                <input type="hidden" name="precio[]" value="<? echo  $detalle->Precio; ?>">
                            </td>
                            <td>
                                <strong><?php echo number_format($detalle->Total,2); ?></strong>
                                <input type="hidden" name="total[]" value="<? echo  number_format($detalle->Total,2); ?>">
                            </td>
                        </tr>
                    </tbody>
                    <?php
                            }
                        }
                    }
                    ?>     
                </table>
                <table class="table invoice-total">                            
                    <tbody>
                        <tr>
                            <td>
                                <strong>Sub Total :</strong>
                            </td>
                            <td>
                                <strong><?php echo "S/. ".number_format($subtotal,2); ?><strong>
                                <input type="hidden" name="subtotal" value="<?php echo "S/. ".number_format($subtotal,2); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>IGV :</strong>
                            </td>
                            <td>
                                <strong><?php echo "S/. ".number_format($igv,2); ?><strong>
                                <input type="hidden" name="igv" value="<?php echo "S/. ".number_format($igv,2); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>TOTAL :</strong>
                            </td>
                            <td>
                                <strong><?php echo "S/. ".number_format($total,2); ?><strong>
                                <input type="hidden" name="totaltotal" value="<?php echo "S/. ".number_format($total,2); ?>">        
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <label><?php echo "SON:"." ".$letras." "."/Nuevos Soles"; ?></label>
                    <input type="hidden" name="letras" value="<?php echo "SON:"." ".$letras." "."/Nuevos Soles"; ?>">
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<?php 
    include 'footer.php';
?>

<script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    Revisar = function () {
                swal({
                            title: "ALERTA",
                            text: "Revisar los item del pedido segun Comanda",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Si, Revise!",
                            cancelButtonText: "No, cancelar!",
                            closeOnConfirm: false,
                            closeOnCancel: false },
                        function (isConfirm) {
                            if (isConfirm) {
                            <?php foreach ($listapedidos as $listapedido): ?>
                            window.location='<?php echo base_url('Documento')."/".$listapedido->idPedidos;?>';
                            <?php endforeach ?>
                            } else {
                                swal("Cancelado", "Usted no cerro sesion :)", "error");
                            }
                        });
            }
</script>


