


   <div class="modal fade" id="detalle_venta">
          <div class="modal-dialog tamanoModal modal-lg">
           <!--antes tenia un class="modal-content" y lo cambié por bg-warning para que tuviera fondo blanco, deberia haber sido un color naranja claro pero me salió un color blanco de casualidad--> 
            <div class="modal-content">
              <div class="modal-header bg-info">
              <h4 class="modal-title"><i class="fa fa-user-circle" aria-hidden="true"></i> DETALLE DE VENTA</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">

                 <div class="container box">
        
        <!--column-12 -->
        <div class="table-responsive" style="text-align:center;">
          
             
                        <table id="detalle_cliente" class="table table-striped table-bordered table-condensed table-hover">

                          <thead style="background-color:#A9D0F5">
                            <tr>
                              <th>Cliente</th>
                              <th>Número Venta</th>
                              <th>Ruc Cliente</th>
                              <th>Dirección</th>
                              <th>Fecha Venta</th>
                            </tr>
                          </thead>

                          <tbody>
                            
                            <td> <h4 id="cliente"></h4><input type="hidden" name="cliente" id="cliente"></td>
                            <td><h4 id="numero_venta"></h4><input type="hidden" name="numero_venta" id="numero_venta"></td>
                            <td><h4 id="dni_cliente"></h4><input type="hidden" name="dni_cliente" id="dni_cliente"></td>
                            <td><h4 id="direccion"></h4><input type="hidden" name="direccion" id="direccion"></td>
                            <td><h4 id="fecha_venta"></h4><input type="hidden" name="fecha_venta" id="fecha_venta"></td>

                          </tbody>

                        </table>


                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                              <thead style="background-color:#A9D0F5">
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Precio Venta</th>
                                    <th>Descuento</th>
                                    <th>Importe</th>
                                </thead>
                                        
                               
                            </table>
                          </div>

                         
           
            <!-- /.box-body -->

              <!--BOTON CERRAR DE LA VENTANA MODAL-->
             <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                
              </div>
              <!--modal-footer-->
          <!--</div>-->
          <!-- /.box -->

        </div>
        <!--/.col (12) -->
      </div>
      <!-- /.row -->
       
     
              </div>
              <!--modal body-->
              </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

     

    

        
  