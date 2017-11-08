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
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css" rel="stylesheet">


</head>

<body class="white-bg" background="" >

    <div >
        <div class="row">
            <div class="col-lg-8">
                <div>
                    <img width="100%" src="<?php echo base_url("assets/img/2.jpg"); ?>">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox-content">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <center>
                        <div>
                            <img width="300px" src="<?php echo base_url("assets/img/pp.png"); ?>">
                        </div>
                        <h3>INICIO DE SESIÓN</h3>
                    </center>
                    
                    <br>
                    <br>

                    <form id="FormLogin" class="m-t" role="form" data-toggle="validator" method="post" action="<?php echo base_url(); ?>">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-user"></i></button>
                                </span>
                                <input type="text" name="login" class="form-control" placeholder="Usuario" tabindex="1">
                                
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                </span> 
                                <input type="password"  name="password" class="form-control pwd" placeholder="Contraseña" tabindex="2">
                                
                            </div>  
                        </div>
                        <div class="form-group">
                            <center><?php echo $this->recaptcha->render(); ?></center>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        </div>
                        <button type="submit" class="btn btn-success block full-width m-b" tabindex="3">Login</button>
                        <center>
                                <? echo isset($error)?$error:''; ?>    
                        </center>
                    </form>
                <!--<p class="m-t"> <small> &copy; <?php echo date("Y"); ?></small> </p>-->
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- Bootstrap Validator -->

    <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>

    <script type="text/javascript">
        $(".reveal").on('click',function() {
            var $pwd = $(".pwd");
            if ($pwd.attr('type') === 'password') {
                $pwd.attr('type', 'text');
            } else {
                $pwd.attr('type', 'password');
            }
        });
    </script>

</body>

</html>