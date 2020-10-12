<?php

 require_once("../config/conexion.php");

     

     if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){

       require_once("../modelos/Usuarios.php");

       $usuario = new Usuarios();

       $usuario->login();

   }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Proyecto</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../public/plugins/iCheck/square/blue.css">
 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  
        <link rel="stylesheet" type="text/css" href="../css/css/all.min.css">


</head>
<body class="hold-transition login-page bg-white">
<div class="contenedor">
<div class="img">
        </div>
        


<img class="wave"src="../public/img/wave.png" alt="">

<div class="login-box">
  <div class="login-logo">
  <img src="../public/img/logo.jpg"  alt=""   width="180"height="180">

    <a  href="../../index2.html"><h2 class="text-center ">FERRETERIA M&N </h2>
</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

 <!--INICIO MENSAJES DE ALERTA-->
   <div class="container-fluid">
      
      <div class="row">
         <div class="col-lg-12">
        
        <div class="box-body">
            
            <?php


            if(isset($_GET["m"])) {
               
           switch($_GET["m"]){


               case "1";
               ?>

               <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> El correo y/o password es incorrecto o no tienes permiso!</h4>
                     
                </div>

                <?php
                break;


                case "2";
                ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Los campos estan vacios</h4>
                     
                </div>
                <?php
                break;



             }

         }


            ?>

             
        </div>
    

        </div>
      </div>
  </div>
  <!--/container-fluid-->
<!-- FIN MENSAJES DE ALERTA-->

<!--login-box-msg-->


    <form action="" method="POST">



          <div class="form-group has-feedback" >
            <input type="correo" name="correo" id="correo" class="form-control" placeholder="correo" required="required" >
            <span class="glyphicon glyphicon-envelope form-control-feedback " ></span>
          </div>
    
    
          

      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

       <div class="form-group">
        <input type="hidden" name="enviar" class="form-control" value="si">
       
      </div>
      
        
        <input type="submit" class="btn" value="Iniciar Sesion">
        </div>
        <!-- /.col -->


    </form>

    </div>

    <!--<a href="#">I forgot my password</a><br>-->
  </div>
  <!-- /.login-box-body -->

</div>

<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="../public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../public/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
<script src="../vistas/js/login.js"></script>

</html>

