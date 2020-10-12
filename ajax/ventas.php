<?php
  
  //llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
 
 
  require_once("../modelos/Ventas.php");

  $ventas = new Ventas();


  switch($_GET["op"]){


    case "buscar_ventas":

		$datos=$ventas->get_ventas();
   
		//Vamos a declarar un array
		 $data= Array();
   
			foreach($datos as $row)
			   {
				   $sub_array = array();
   
				   $est = '';
				   //$atrib = 'activo';
					$atrib = "btn btn-danger btn-md estado";
				   if($row["estado"] == 1){
					   $est = 'PAGADO';
					   $atrib = "btn btn-success btn-md estado";
				   }
				   else{
					   if($row["estado"] == 0){
						   $est = 'ANULADO';
						   //$atrib = '';
					   }	
				   }
   
				   
   
					$sub_array[] = '<button class="btn btn-warning detalle" id="'.$row["numero_venta"].'"  data-toggle="modal" data-target="#detalle_venta"><i class="fa fa-eye"></i></button>';
					$sub_array[] = date("d-m-Y",strtotime($row["fecha_venta"]));
					$sub_array[] = $row["numero_venta"];
					$sub_array[] = $row["cliente"];
					$sub_array[] = $row["dni_cliente"];
					$sub_array[] = $row["vendedor"];
					$sub_array[] = $row["tipo_pago"];
					$sub_array[] = $row["moneda"]." ".$row["total"];
   
				   
			  /*IMPORTANTE: poner \' cuando no sea numero, sino no imprime*/
					$sub_array[] = '<button type="button" onClick="cambiarEstado('.$row["id_ventas"].',\''.$row["numero_venta"].'\','.$row["estado"].');" name="estado" id="'.$row["id_ventas"].'" class="'.$atrib.'">'.$est.'</button>';
				   
				   $data[] = $sub_array;
			   }
   
   
   
		 $results = array(
				"sEcho"=>1, //Información para el datatables
				"iTotalRecords"=>count($data), //enviamos el total registros al datatable
				"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
				"aaData"=>$data);
			echo json_encode($results);
   
   
		break;

 case "consulta_cantidad_venta":

         //selecciona el id del registro

    require_once("../modelos/Productos.php");

	$producto= new Producto();

	$datos=$producto->get_producto_por_id($_POST["id_producto"]);

          // si existe el id del producto entonces recorre el array
	      if(is_array($datos)==true and count($datos)>0){

				foreach($datos as $row)
				{
					
					$stock = $s["stock"] = $row["stock"];
                 
                 //consultamos si la cantidad que se va a querer vender es mayor a la cantidad de stock entonces que solo se refleje la cantidad maxima que se encuentre en el stock y que me devuelva ese valor en el campo

					$result = null;

					$stock_vender=$_POST["cantidad_vender"];

					//importante:tuve que poner esta condicional para que me funcionara la condicional
					if($stock_vender>$stock and $stock_vender!=0){


                        $result="<h4 class='text-danger'>La cantidad seleccionada es mayor al stock</h4>";
					
					}  

					else {

						if($stock_vender==0){

						$result="<h4 class='text-danger'>El campo está vacío</h4>";

						 }

				      }
					
					}//cierre del foreach
		
		      
		          echo json_encode($result);


	        } else {
                 
                 //si no existe el registro entonces no recorre el array
                $errors[]="El producto no existe";

	        }


	         //inicio de mensaje de error

				if (isset($errors)){
			
					?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach ($errors as $error) {
										echo $error;
									}
								?>
					</div>
					<?php
			      }

	        //fin de mensaje de error



     break;


}