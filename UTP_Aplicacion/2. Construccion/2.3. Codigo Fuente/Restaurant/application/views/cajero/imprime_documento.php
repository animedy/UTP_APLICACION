<!DOCTYPE html>
<html>

<head>
   <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-size: 62.5%;
        } 
        /*div{
            width: 100%;
            margin: 0;
        }*/
        .principal {
            overflow:hidden; 
        }
        .logo {
            float: left;
        }
        img.pequeña {
            width: 50px; height: 50px;
        } 
        .centro {
            display:inline-block;
            float: center;
            text-align: center;
        }
        .numero {
            float:right;    /*tambien puede poner float:right, para que se alineé a la derecha */
            text-align: right;
        }
        #cuerpo1 {
            float: left;
            text-align: left;
        }
        #cuerpo2 {
            float: right;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="table-responsive">
        <table  class="" align="center">
            <thead>
                <tr>
                    <th><img class="pequeña text-align:center" src="<?php echo base_url(); ?>assets/img/pp.png"></th>
                    <br>
                    <th>    <p align="center">PEPE TIBURÓN<br>
                            Av. SUCRE 672 LA TOMILLA - CAYMA</p></th>
                    <th> 
                        <p align="center"><h7>RUC : 96325874122</h7>
                         <br>
                         <h7>BOLETA DE VENTA</h7>         
                         <br>
                         <h7><?php echo $boleta;?></h7></p>
                    </th>
                </tr>
            </thead>
        </table>
        <br>
        <p align="right">FECHA:</label><label><?php echo $fecha_hora ?></p>
        <table  class="">
            <thead>
                <tr>
                    <td>
                        <label>CLIENTE :  </label><label><?php echo $nombre; ?></label>
                        <br>
                        <label>DIRECCION :  </label><label><?php echo $direccion; ?></label>
                        <br>
                        <label>CAJERO :  </label><label><?php echo $cajero ?></label> 
                    </td>
                    <td>
                        <label>DNI :  </label><label><?php echo $dni; ?></label> 
                        <br>
                        <label>COMANDA :  </label><label><?php echo $comanda; ?></label>
                        <br>
                    </td>
                </tr>
            </thead>
        </table>
        <br>
        <table  class="table table-stripped toggle-arrow-tiny">
            <thead>
                <tr>
                    <th align="left">NRO.</th>
                    <th align="left">DESCRIPCION</th>
                    <th align="right">CANTIDAD</th>
                    <th align="right">PRECIO UNIT.</th>
                    <th align="right">TOTAL</th>
                </tr>
            </thead>
            <?php
                foreach ($detalle as $detalles) 
            {
            ?>
            <tbody>
                <tr>
                    <td align="left"><?php echo $detalles->Nro; ?></td>
                    <td align="left"><?php echo $detalles->Producto; ?></td>
                    <td align="right"><?php echo $detalles->Cantidad; ?></td>
                    <td align="right"><?php echo $detalles->Precio; ?></td>
                    <td align="right"><?php echo $detalles->Cantidad*$detalles->Precio; ?></td>
                </tr>
            </tbody>
            <?php
            }
            ?>     
        </table>
        <br>
        <table class="" align="right">                            
            <tbody>
                <tr>
                    <td><label>SUB TOTAL : </label></td>
                    <td><label><?php echo $subtotal; ?><label></td>
                </tr>
                <tr>
                    <td><label>IGV    :    </label></td>
                    <td><label><?php echo $igv; ?><label></td>
                    </tr>
                    <tr>
                        <td><label>TOTAL  :  </label></td>
                        <td><label><?php echo $totaltotal; ?><label></td>
                    </tr>
                </tbody>
            </table>
        <p align="left"><?php echo $letras; ?></p>
    </div>





    <!--<div class="wrapper wrapper-content animated fadeInRight">
        <div class="principal">
            <div class="logo">
                <img class="pequeña text-align:center" src="<?php echo base_url(); ?>assets/img/pp.png">
            </div>
            <div class="centro">
                PEPE TIBURÓN
                <br>
                Av. SUCRE 672 LA TOMILLA - CAYMA
            </div> 
            <div class="numero">
                RUC : 96325874122
                <br>
                BOLETA DE VENTA         
                <br>
                <?php echo $boleta; ?>
            </div>                  
        </div>
        <div id="principal2">
            <div id="cuerpo1">
                <label class="">Fecha:</label><label><?php echo $fecha_hora ?></label>
                <br>
                <label>Cliente :</label><label><?php echo $nombre; ?></label>
                <br>
                <label>Direccion :</label><label><?php echo $direccion; ?></label>
                <br>
                <label>DNI :</label><label><?php echo $dni; ?></label>  
            </div>
            <div id="cuerpo2">
                <label>Comanda :</label><label><?php echo $comanda; ?></label>
                <br>
                <label>Cajero :</label><label><?php echo $cajero ?></label>
            </div>
        </div>

        <div class="table-responsive">
            <table  class="table table-stripped toggle-arrow-tiny">
                <thead>
                    <tr>
                        <th>DESCRIPCION</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO UNIT.</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <?php
                foreach ($detalle as $detalles) 
                {
                ?>
                <tbody>
                    <tr>
                        <td><label><?php echo $detalles->Producto; ?></label></td>
                        <td><label><?php echo $detalles->Cantidad; ?></label></td>
                        <td><label><?php echo $detalles->Precio; ?></label></td>
                        <td><label><?php echo $detalles->Cantidad*$detalles->Precio; ?></label></td>
                    </tr>
                </tbody>
                <?php
                }
                ?>     
            </table>
        </div>
        <div class="table-responsive ">
            <table class="table invoice-total">                            
                <tbody>
                    <tr>
                        <td><label>Sub Total :</label></td>
                        <td><label><?php echo $subtotal; ?><label></td>
                    </tr>
                    <tr>
                        <td><label>IGV :</label></td>
                        <td><label><?php echo $igv; ?><label></td>
                    </tr>
                    <tr>
                        <td><label>TOTAL :</label></td>
                        <td><label><?php echo $totaltotal; ?><label></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="letras">
            <label><?php echo $letras; ?></label>
        </div>
    </div>-->


</body>
</html>

