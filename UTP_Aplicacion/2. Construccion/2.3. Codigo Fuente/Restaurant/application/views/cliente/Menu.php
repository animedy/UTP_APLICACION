<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon-16x16.png" sizes="16x16" />


    <title>Pepe Tiburón | Cevicheria</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url(); ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/switchery/switchery.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css">


    

</head>

<body class="skin-1">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <!--<img alt="image" class="img-circle" src="<?php echo base_url(); ?>assets/img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido'); ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $this->session->userdata('rol');?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="salir">Logout</a></li>
                            </ul>-->
                            <img src="<?php echo base_url("assets/img/pepe-menu.png"); ?>">
                        </div>
                        <div class="logo-element">
                            <img src="<?php echo base_url("assets/img/pepe-menu-m.png"); ?>">
                        </div>
                    </li>
                    <li class="active">
                        
                        <a href="<?php echo base_url("Carta"); ?>"><i class="fa fa-slack"></i> <span class="nav-label">Carta</span></a>                      
                        <a href="<?php echo base_url("Carrito"); ?>"><i class="fa fa-shopping-cart"></i><span class="nav-label">Carrito</span></a>
                        
                        <a href="<?php echo base_url('EditarCliente'); ?>"><i class="fa fa-user"></i><span class="nav-label">Modificar Cuenta</span></a>
                         
                       
                        
                    </li>
                    


                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message"></span>
                    </li>
                    <li>
                        <a onclick="Cerrar1();">
                            <i class="fa fa-sign-out"></i> Cerrar Sesion
                        </a>
                    </li>
                </ul>

            </nav>
        </div>

<script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    Cerrar1 = function () {
                 
                swal({
                            title: "¿Esta seguro que desea salir ?",
                            
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, salir!",
                            cancelButtonText: "No, cancelar!",
                       
                            closeOnConfirm: false,
                            closeOnCancel: false },
                        function (isConfirm) {
                            if (isConfirm) {
                                window.location='<?php echo base_url(); ?>Login_cliente/salir';
                            } else {
                                swal("Cancelado", "Usted no cerro sesion :)", "error");
                            }
                        });
                
            }
</script>
