<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pepe Tiburon | Login</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                
                <img src="<?php echo base_url("assets/img/pepe.png"); ?>">

            </div>
            <h3>LOGIN</h3>
            
            <form class="m-t" role="form" data-toggle="validator" method="post" action="<?php echo base_url(); ?>">
                <div class="form-group">
                    <input type="text" id="login" name="login" class="form-control" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <input type="password"  id="password" name="password" data-minlength="6" class="form-control" placeholder="Contraseña" required="">
                </div>
                <button type="submit" class="btn btn-success block full-width m-b">Login</button>
                <? echo isset($error)?$error:''; ?>
            </form>
            <p class="m-t"> <small> &copy; <?php echo date("Y"); ?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>

</html>
