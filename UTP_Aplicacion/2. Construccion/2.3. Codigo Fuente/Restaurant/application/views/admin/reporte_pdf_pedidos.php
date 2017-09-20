<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <style type="text/css">
        
    h4 {
       
        color: #000;
        font-weight: bolder;
        line-height: 1.4em;
        margin: 0 0 20px;
        text-align: center;
    }
    #fecha {
    float: right;
    text-align: right;
    }
    #logo{
        float: left;
    }
    table tr:nth-child(2n-1) td {
      background: #F5F5F5;
    }

    table th,
    table td {
      text-align: center;
    }

    table th {
      padding: 5px 20px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      white-space: nowrap;        
      font-weight: bolder;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table .service,
    table .desc {
      text-align: left;
    }

    table td {
      padding: 20px;
      text-align: right;
    }

    table td.service,
    table td.desc {
      vertical-align: top;
    }



    table td.grand {
      border-top: 1px solid #5D6975;;
    }

    </style>
   
</head>
<body>
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <div id="logo">
                                <img src="<?php echo base_url(); ?>assets/img/pp.png" height="100px">
                            </div>
                            <!--<div id="fecha">
                                Fecha: <?php echo date('d/m/Y') ; ?>
                                <br>
                                Hora: <?php echo date('H:m:s'); ?>
                            </div>-->
                            <h4>Pedidos Atendidos</h4>
                        </div>
                        <div class="ibox-content">
                                <table class="table table-stripped toggle-arrow-tiny" data-page-size="15">
                                    <thead>
                                        <tr>
                                            <th>Comanda</th>
                                            <th>Cliente</th>
                                            <th>Precio</th>
                                            <th>Fecha Pedido</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        for ($i=0; $i <count($comanda) ; $i++) {         
                                    ?>
                                    <tr>
                                        <td class="service"><?php echo $comanda[$i]; ?></td>
                                        <td class="desc"><?php echo ucwords(strtolower($nombre[$i])); ?></td>
                                        <td class="unit">S/. <?php echo $total[$i]; ?></td>
                                        <td class="qty"><?php echo $fecha[$i]; ?></td>
                                        <td class="total">
                                            <div class="label label-primary">Completado</div>
                                        </td>
                                    </tr>
                                    <?php 
                                        } 
                                     ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
</body>
</html>