<?php

   require_once("../config/conexion.php");

    if(isset($_SESSION["id_usuario"])){
       
       
?>



<?php
 
  require_once("header.php");

?>
 <?php if($_SESSION["proveedores"]==1)
     {

     ?>

  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <h2>Listado de Proveedores</h2>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">
                            <button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#proveedorModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Proveedor</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" style="text-align:center;">
                          
                          <table id="proveedor_data" class="table table-bordered table-striped">

                            <thead>
                              
                                <tr>
                                  
                                <th width="5  %">RUC</th>
                                <th width="5  %">Razón Social</th>
                                <th width="5  %">Teléfono</th>
                                <th width="5  %">Correo</th>
                                <th width="20%">Dirección</th>
                                <th width="5  %">Fecha</th>
                                <th width="5  %">Estado</th>
                                <th width="5  %">Editar</th>
                                <th width="5  %">Eliminar</th>



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
  <div id="proveedorModal" class="modal fade">
  <div class="modal-dialog">
    <form class="form-horizontal" method="post" id="proveedor_form">
      <div class="modal-content">
      
        <div class="modal-header">
          <h4 class="modal-title">Agregar Proveedor</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">

           <div class="form-group">
                  <label for="inputText1" class="col-lg-1 control-label">Razón Social</label>

                  <div class="col-lg-9 col-lg-offset-1">
                    <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Razón Social" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputText3" class="col-lg-1 control-label">Dni</label>

                  <div class="col-lg-9 col-lg-offset-1">
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Cédula" required pattern="[0-9]{0,15}">
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputText4" class="col-lg-1 control-label">Teléfono</label>

                  <div class="col-lg-9 col-lg-offset-1">
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required pattern="[0-9]{0,15}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputText4" class="col-lg-1 control-label">Correo</label>

                  <div class="col-lg-9 col-lg-offset-1">
                    <input type="correo" class="form-control" id="correo" name="correo" placeholder="Correo" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputText5" class="col-lg-1 control-label">Dirección</label>
                 
                 <div class="col-lg-9 col-lg-offset-1">
                 <textarea class="form-control  col-lg-5" rows="3" id="direccion" name="direccion"  placeholder="Direccion ..." required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$"></textarea>
                 </div>
                 
              </div>

                
               

               <div class="form-group">
                  <label for="inputText4" class="col-lg-1 control-label">Estado</label>

                  <div class="col-lg-9 col-lg-offset-1">

                      <select class="form-control" id="estado" name="estado" required>
                      <option value="">-- Selecciona estado --</option>
                      <option value="1" selected>Activo</option>
                      <option value="0">Inactivo</option>
                    </select>

                  </div>
                </div>

          
          </div>
                 <!--modal-body-->

        <div class="modal-footer">
          <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>

          <input type="hidden" name="dni_proveedor" id="dni_proveedor"/>
          
          <button type="submit" name="action" id="#" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>

          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
 <!--FIN FORMULARIO VENTANA MODAL-->

 <?php  } else {

require("noacceso.php");
}

?>
<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="../vistas/js/proveedores.js"></script>



<?php
   
  } else {

        header("Location:".Conectar::ruta()."../vistas/index.php");

  }

  

?>