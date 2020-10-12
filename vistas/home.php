
<?php

require_once("../config/conexion.php");

 if(isset($_SESSION["correo"])){


?>


<?php require_once("header.php");?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel Principal
      </h1>
      
    </section>

 <!-- Main content -->
 <section class="content">

<div class="row panel_modulos">

       <div class="col-lg-3 col-xs-6">
   <!-- small box -->
   <div class="small-box bg-green-gradient">
     <div class="inner">

   


 
 </div><!--ROW-->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once("footer.php");?>



<?php
 
 } else {

    header("Location:".Conectar::ruta()."vistas/index.php");
    exit();
 }
?>



