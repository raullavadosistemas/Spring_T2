<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){

       require_once("../modelos/Categoria.php");

       $categoria = new Categoria();

       $cat = $categoria->get_categorias();
       
       
?>



<?php
 
  require_once("header.php");

?>


<?php if($_SESSION["productos"]==1)
     {

     ?>

  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>


            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                   <button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#productoModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Producto</button></h1>
                  
                 
                      
                        <h2 class="box-title">Listado de Productos</h2>

                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="box-body table-responsive" style="text-align:center;">
                          
                          <table id="producto_data" class="table table-bordered table-striped">

                            <thead>
                              
                                <tr>
                                <th width>Categoría</th>
                                <th width="5%">Producto</th>
                                <th width="text-center">Presentación</th>
                                <th width="5%">Unid. Medida</th>
                                <th width="10%">Precio Compra</th>
                                <th width="10%">Precio Venta</th>
                                <th width="5%">Stock</th>
                                <th width="10%">Estado</th>
                                <th width="10%">Editar</th>
                                <th width="10%">Eliminar</th>
                                <th>Ver Foto </th>



                                </tr>
                            </thead>

                            <tbody>
                              

                            </tbody>


                          </table>
                     
                    </div>
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
    
 <!--FORMULARIO VENTANA MODAL-->
  
<div id="productoModal" class="modal fade ">
  <div class="modal-dialog tamanoModal modal-lg">
    <form class="form-horizontal" method="post" id="producto_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Agregar Producto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">

           <section class="formulario-agregar_producto">


                 <div class="row">
       
        <!--PRIMERA COLUMNA-->
        <!--column-12 -->
        <div class="col-lg-8">
          <!-- Horizontal Form -->
          <div class="box">

              <div class="box-body">

               <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Categoría</label>

                  <div class="col-lg-9 col-lg-offset-1">
                    <!--<input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria">-->

                    <select class="form-control" name="categoria" id="categoria">

                      <option  value="0">Seleccione</option>

                        <?php

                           for($i=0; $i<sizeof($cat);$i++){
                             
                             ?>
                              <option value="<?php echo $cat[$i]["id_categoria"]?>"><?php echo $cat[$i]["categoria"];?></option>
                             <?php
                           }
                        ?>
                      
                    </select>
                  </div>
              </div>


              <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Producto</label>

                  <div class="col-lg-9 col-lg-offset-1">

    
                   <input type="text" class="form-control" id="producto" name="producto" placeholder="Descripción Producto" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
           


                  </div>
              </div>

               <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Presentación</label>

                  <div class="col-lg-9 col-lg-offset-1">

                    <select class="form-control" name="presentacion" id="presentacion">

                      <option value="0">Seleccione</option>

                          <option value="Saco">Saco</option>
                          <option value="Caja">Caja</option>
                          <option value="Caja">Libre</option>
                      
                      
                    </select>
                  </div>
              </div>

               <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Unid. Medida</label>

                  <div class="col-lg-9 col-lg-offset-1">
                  
                     <select class="selectpicker form-control" id="unidad" name="unidad" required>
                      <option value="">-- Seleccione unidad --</option>
                      <option value="kilo">Kilo</option>
                      <option value="Gramo">Gramo</option>
                      <option value="Gramo">Unidad</option>

                    </select>


                  </div>
              </div>

             
              <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Precio Compra</label>

                  <div class="col-lg-9 col-lg-offset-1">


                    <select class="selectpicker form-control" id="moneda" name="moneda" required>
                      <option value="">-- Seleccione moneda --</option>
                      <option value="S/.">S/.</option>
                      <option value="USD$">USD$</option>
                      <option value="EUR">EUR€</option>


                    </select>

                    <input type="text" class="form-control" id="precio_compra" name="precio_compra" placeholder="Precio Compra" required pattern="^\d*(\.\d{0,2})?$" >

                  </div>
              </div>

               <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Precio Venta</label>

                  <div class="col-lg-9 col-lg-offset-1">

                    <input type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder="Precio Venta" >

                  </div>
              </div>

               <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Stock</label>

                  <div class="col-lg-9 col-lg-offset-1">
                    <input type="text" class="form-control" id="stock" name="stock"  disabled>
                  </div>
              </div>

               <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Estado</label>

                  <div class="col-lg-9 col-lg-offset-1">
                          
                    <select class="form-control" id="estado" name="estado" required>
                      <option value="">-- Selecciona estado --</option>
                      <option value="1" selected>Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Fecha Vencimiento</label>

                  <div class="col-lg-9 col-lg-offset-1">
                    <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Fecha Vencimiento">
                  </div>
              </div>
               
             </div>
              <!-- /.box-body -->
          </div>
          <!--/box-->

        </div>
        <!--/.col (6) -->


        <!--SEGUNDA COLUMNA-->
        <!--column-12 -->
        <div class="col-lg-4">
         
            
               <div class="form-group">

              <div class="col-sm-7 col-lg-offset-3 col-sm-offset-3">

              <!--producto_imagen-->

     

      <input type="file" id="producto_imagen" name="producto_imagen">

 

              <span id="producto_uploaded_image"></span>

              </div>

              </div>
              <!--/form-group-->
         
              

        </div>
        <!--/.col (4) -->
      </div>
      <!-- /.row -->


      </section>
      <!--section formulario - agregar- producto -->

          
          </div>
                 <!--modal-body-->

           <div class="row">
          
               <div class="col-lg-4 col-lg-offset-3 col-sm-8"> 

          <div class="modal-footer">
   <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
          <input type="hidden" name="id_producto" id="id_producto"/>
          
          <button type="submit" name="action" id="#" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>

          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
           </div><!--modal-footer-->

        </div>
       </div><!--row-->

      </div>
      </form>
  </div>
</div>
 <!--FIN FORMULARIO VENTANA MODAL-->
  <?php  } else {

       require_once("noacceso.php");
  }
   
  ?>
<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/productos.js"></script>



<?php
   
  } else {

        header("Location:".Conectar::ruta()."vistas/index.php");

  }

  

?>

