<?php
 require_once("../config/conexion.php");
 if(isset($_SESSION["id_usuario"])){



?>

<?php
  
  require_once("header.php");

?>

<?php if($_SESSION["usuarios"]==1)
     {

     ?>



  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <h2>Listado de Usuarios</h2>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">
                            <button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" 
                            data-target="#usuarioModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Usuario</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" style="text-align:center;">
                          
                          <table id="usuario_data" class="table table-bordered table-striped">

                            <thead>
                              
                                <tr>
                                  
                                <th>Dni</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                                <th>Cargo</th>
                                <th>Teléfono</th>
                                <th>email</th>
                                <th>Dirección</th>
                                <th>Fecha Ingreso</th>
                                <th width="5%">Estado</th>
                                <th width="5%">Editar</th>
                                <th width="10%">Eliminar</th>



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

    <div id="usuarioModal" class="modal fade">
      
      <div class="modal-dialog">
        
         <form method="post" id="usuario_form">

            <div class="modal-content">
              
               <div class="modal-header">


               <h4 class="modal-title">Agregar Usuario</h4>


                 <button type="button" class="close" data-dismiss="modal">&times;</button>

                 

               </div>


               <div class="modal-body">

                 <label>DNI</label>
                 <input type="text" name="dni" id="dni" class="form-control" placeholder="Dni" required pattern="[0-9]{0,15}"/>
                
                <br />

                    <label>Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
          <br />
          
          <label>Apellido</label>
          <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
          <br />
          
          <label>Cargo</label>
           <select class="form-control" id="cargo" name="cargo" required>
              <option value="">-- Selecciona cargo --</option>
              <option value="1" selected>Administrador</option>
              <option value="0">Empleado</option>
           </select>
           <br />
          
          <label>Usuario</label>
          <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
          <br />
          
          <label>Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
          <br />
         
          <label>Repita Password</label>
          <input type="password" name="password2" id="password2" class="form-control" placeholder="Repita password" required/>
          <br />
          
          <label>Teléfono</label>
          <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" required pattern="[0-9]{0,15}"/>
          <br />
          
          <label>email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="email" required="required"/>
          <br />
          
          <label>Dirección</label>
          <textarea cols="50" rows="3" id="direccion" name="direccion"  placeholder="Direccion ..." required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
          </textarea>
          <br />
          
          <label>Estado</label>
           <select class="form-control" id="estado" name="estado" required>
              <option value="">-- Selecciona estado --</option>
              <option value="1" selected>ACTIVO</option>
              <option value="0">INACTIVO</option>
           </select>
           <br/><br/>


      
         <!--LISTA DE PERMISOS-->

         <div class="form-group">
                  <label for="" class="col-lg-1 control-label">Permisos</label>

                    <div class="col-lg-6">

                      <ul style="list-style:none;" id="permisos">
                   
                  
                      </ul>
                      
                    </div>

               </div>

           <!--FIN LISTA DE PERMISOS-->

           </div>

               <div class="modal-footer">

                 <input type="hidden" name="id_usuario" id="id_usuario"/>

                 <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
         
          <button type="button" onclick="limpiar()" class="btn btn-danger pull-right  " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
            
                 

               </div>



            </div>
           

         </form>


      </div>

    </div>

        
    <?php  } else {

require("noacceso.php");
}

?>
  
          <?php

            require_once("footer.php");
          ?>

            <script type="text/javascript" src="js/usuarios.js"></script>

<?php

 }else{
      header("Location:".Conectar::ruta()."vistas/index.php"); 

 }


?>