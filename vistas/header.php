
<?php


if(strlen(session_id()) < 1)

  session_start();

require_once("../config/conexion.php");

 if(isset($_SESSION['id_usuario']))
 {
  require_once("../modelos/Productos.php");
  require_once("../modelos/Proveedores.php");
  require_once("../modelos/Usuarios.php");
  require_once("../modelos/Clientes.php");


   $producto = new Producto();
   $proveedor = new Proveedor();
   $cliente = new Cliente();
   $usuario = new Usuarios();

?>


      <!DOCTYPE html>
      <html>

      <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Ferreteria | Ferreteria M&N</title>
          <!-- Tell the browser to be responsive to screen width -->
            <!-- Bootstrap 3.3.7 -->
          <link rel="stylesheet" href="../public/dist/css/bootstrap.min.css">  
          <!-- Font Awesome -->
          <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
          <!-- Ionicons -->
          <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

          <!--DATATABLES-->
          <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
          <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
          <link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>


          <!-- Theme style -->
          <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">

        <!-- AdminLTE Skins. Choose a skin from the css/skins
                folder instead of downloading all of them to reduce the load. -->
          <link rel="stylesheet" href="../public/dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="../public/bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../public/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="../public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

          <!-- Google Font: Source Sans Pro -->
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
       
                 <!-- ESTILOS -->

    
      </head>
      <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top">
          
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">

              <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">







                  
                  <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                  <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                  <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="hidden-xs"> <?php echo $_SESSION["nombre"]?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->

                      <i class="fa fa-user" aria-hidden="true"></i>

                      <p>
                        <?php echo $_SESSION['nombre']?> - Web Developer
                        <small>Administrador desde Noviembre 2020</small>
                      </p>
                    </li>
        
                          <li class="user-footer">
                      <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat" onclick="mostrar_perfil('<?php echo $_SESSION['usuario']?>')" 
                      data-toggle="modal" data-target="#perfilModal"> Perfil</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Cerrar</a>
                      </div>
                    </li>
                  </ul>
                </li>
            
              </ul>
            </div>
          </nav>
        </header>

                  <!-- Brand Logo -->
                  <aside class="main-sidebar sidebar-dark-primary elevation-4">

                  <a href="index3.html" class="brand-link">
                      <img src="../public/img/Sin título.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                      <span class="brand-text font-weight-light">FERRETERIA M&N</span>
                  </a>

                  <!-- Sidebar -->
                <!-- Sidebar -->
          <div class="sidebar">
          
          

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    
                    <li class="nav-header">MENU </li>

                      <li class="nav-item">
                        <a href="home.php" class="nav-link">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <p> 
                          Panel Principal
                        </p>
                        </a>
                      </li>

                      <?php if($_SESSION['clientes']==1)
                      {

                        echo "<li class='nav-item'>
                        <a href='clientes.php' class='nav-link'>
                          <i class='fa fa-list' aria-hidden='true'></i>
                              <p>
                              Clientes
                              </p> 
                          </a>
                        </li>";

                      }

                    ?>

                    
                    <?php if($_SESSION['productos']==1)
                      {

                        echo "<li class='nav-item'>
                        <a href='producto.php' class='nav-link'>
                          <i class='fa fa-list' aria-hidden='true'></i>
                              <p>
                             Productos
                              </p> 
                          </a>
                        </li>";

                      }

                    ?>
                      
                      <?php if($_SESSION['proveedores']==1)
                      {

                        echo "<li class='nav-item'>
                        <a href='proveedores.php' class='nav-link'>
                          <i class='fa fa-list' aria-hidden='true'></i>
                              <p>
                           Proveedor
                              </p> 
                          </a>
                        </li>";

                      }

                    ?>
                      
                      <?php if($_SESSION['usuarios']==1)
                      {

                        echo "<li class='nav-item'>
                        <a href='usuarios.php' class='nav-link'>
                          <i class='fa fa-list' aria-hidden='true'></i>
                              <p>
                             Usuarios
                              </p> 
                          </a>
                        </li>";

                      }

                    ?>
            
                        
     

                          
       
          
 
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
                  <!-- /.sidebar -->
      </aside>
      <div id="resultados_ajax" class="text-center"></div>


      <!--FORMULARIO PERFIL USUARIO MODAL-->

      <div id="perfilModal" class="modal fade">
      <div class="modal-dialog">
        <form action="" class="form-horizontal" method="post" id="perfil_form">
          <div class="modal-content">
          
            <div class="modal-header">
            <h4 class="modal-title">Editar Perfil</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">


                    <div class="form-group">
                      <label for="inputText3" class="col-lg-1 control-label">Dni</label>

                      <div class="col-lg-9 col-lg-offset-1">
                        <input type="text" class="form-control" id="dni_perfil" name="dni_perfil" placeholder="Dni" required pattern="[0-9]{0,15}">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="inputText1" class="col-lg-1 control-label">Nombres</label>

                      <div class="col-lg-9 col-lg-offset-1">
                        <input type="text" class="form-control" id="nombre_perfil" name="nombre_perfil" placeholder="Nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
                      </div>
                  </div>

                    <div class="form-group">
                      <label for="inputText1" class="col-lg-1 control-label">Apellidos</label>

                      <div class="col-lg-9 col-lg-offset-1">
                        <input type="text" class="form-control" id="apellido_perfil" name="apellido_perfil" placeholder="Apellido" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
                      </div>
                  </div>

                  

                    <div class="form-group">
                      <label for="inputText1" class="col-lg-1 control-label">Usuario</label>

                      <div class="col-lg-9 col-lg-offset-1">
                        <input type="text" class="form-control" id="usuario_perfil" name="usuario_perfil" placeholder="Nombres" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
                      </div>
                  </div>


                    <div class="form-group">
                      <label for="inputText3" class="col-lg-1 control-label">Password</label>

                      <div class="col-lg-9 col-lg-offset-1">
                        <input type="password" class="form-control" id="password_perfil" name="password_perfil" placeholder="Password" required>
                      </div>
                  </div>

                    
                    <div class="form-group">
                      <label for="inputText3" class="col-lg-1 control-label">Repita Password</label>

                      <div class="col-lg-9 col-lg-offset-1">
                        <input type="password" class="form-control" id="password2_perfil" name="password2_perfil" placeholder="Repita Password" required>
                      </div>
                  </div>



                    <div class="form-group">
                      <label for="inputText4" class="col-lg-1 control-label">Teléfono</label>

                      <div class="col-lg-9 col-lg-offset-1">
                        <input type="text" class="form-control" id="telefono_perfil" name="telefono_perfil" placeholder="Teléfono" required pattern="[0-9]{0,15}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputText4" class="col-lg-1 control-label">Correo</label>

                      <div class="col-lg-9 col-lg-offset-1">
                        <input type="email" class="form-control" id="correo_perfil" name="correo_perfil" placeholder="Correo" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputText5" class="col-lg-1 control-label">Dirección</label>
                      
                      <div class="col-lg-9 col-lg-offset-1">
                      <textarea cols="50" class="form-control  col-lg-5" rows="3" id="direccion_perfil" name="direccion_perfil"  placeholder="Direccion ..." required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$"></textarea>
                      </div>
                      
                    </div>



              
              </div>
                      <!--modal-body-->

            <div class="modal-footer">
            <input type="hidden" name="id_usuario_perfil" id="id_usuario_perfil"/>
              <!--<input type="hidden" name="operation" id="operation"/>-->

              <button type="submit" name="action" id="" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>

              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
            </div>
          </div>
        </form>
      </div>
      </div>



      <!--FIN FORMULARIO PERFIL USUARIO MODAL-->
      <script src="../public/bower_components/jquery/dist/jquery.min.js"></script>

      
      <script type="text/javascript" src="../vistas/js/perfil.js"></script> 



<?php
 } else {

        header("Location:".Conectar::ruta()."vistas/index.php");
        exit();
     }
  ?>