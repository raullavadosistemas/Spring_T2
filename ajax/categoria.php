<?php


 //llamo a la conexion de la base de datos 
  require_once("../config/conexion.php");
  //llamo al modelo Categoría
  require_once("../modelos/Categoria.php");
    //llamo al modelo Categoría
    require_once("../modelos/Productos.php");
   
    $productos = new Producto();


  $categorias = new Categoria();


  //declaramos las variables de los valores que se envian por el formulario y que recibimos por ajax y decimos que si existe el parametro que estamos recibiendo
   
   //los valores vienen del atributo name de los campos del formulario
   /*el valor id_usuario y id_categoria se carga en el campo hidden cuando se edita un registro*/
   //se copian los campos de la tabla categoria
   $id_categoria=isset($_POST["id_categoria"]);
   $id_usuario=isset($_POST["id_usuario"]);
   $categoria=isset($_POST["categoria"]);
   $estado=isset($_POST["estado"]);

    
      switch($_GET["op"]){

          
                case "guardaryeditar":

            /*verificamos si existe la categoria en la base de datos, si ya existe un registro con la categoria entonces no se registra la categoria*/
            
            //importante: se debe poner el $_POST sino no funciona
            $datos = $categorias->get_nombre_categoria($_POST["categoria"]);

            
                    /*si el id no existe entonces lo registra
                    importante: se debe poner el $_POST sino no funciona*/
                    if(empty($_POST["id_categoria"])){

                    /*verificamos si existe la categoria en la base de datos, si ya existe un registro con la categoria entonces no se registra*/

                            if(is_array($datos)==true and count($datos)==0){

                                //no existe la categoria por lo tanto hacemos el registros

                $categorias->registrar_categoria($categoria,$estado,$id_usuario);



                                $messages[]="La categoría se registró correctamente";

                            } //cierre de validacion de $datos 


                                /*si ya existes la categoria entonces aparece el mensaje*/
                                    else {

                                        $errors[]="La categoría ya existe";
                                    }

                        }//cierre de empty

                        else {


                            /*si ya existe entonces editamos la categoria*/


                        $categorias->editar_categoria($id_categoria,$categoria,$estado,$id_usuario);


                            $messages[]="La categoría se editó correctamente";

                            
                        }

            
            
            //mensaje success
            if (isset($messages)){
                        
                        ?>
                        <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>¡Bien hecho!</strong>
                                <?php
                                    foreach ($messages as $message) {
                                            echo $message;
                                        }
                                    ?>
                        </div>
                        <?php
                    }
            //fin success

            //mensaje error
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

            //fin mensaje error


            break;

          /*---------------------------------------------------------------------------------*/

            case 'mostrar':

            //selecciona el id de la categoria
            
            //el parametro id_categoria se envia por AJAX cuando se edita la categoria
            $datos=$categorias->get_categoria_por_id($_POST["id_categoria"]);


                // si existe el id de la categoria entonces recorre el array
                if(is_array($datos)==true and count($datos)>0){


                            foreach($datos as $row)
                            {
                                $output["categoria"] = $row["categoria"];
                                $output["estado"] = $row["estado"];
                    $output["id_usuario"] = $row["id_usuario"];

                            }


                        echo json_encode($output);


                    } else {
                        
                        //si no existe la categoria entonces no recorre el array
                        $errors[]="La categoría no existe";

                    }


                    //inicio de mensaje de error

                        if(isset($errors)){
                    
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
          /*---------------------------------------------------------------------------------*/

                case "activarydesactivar":
            
            //los parametros id_categoria y est vienen por via ajax
            $datos=$categorias->get_categoria_por_id($_POST["id_categoria"]);

                // si existe el id de la categoria entonces recorre el array
                if(is_array($datos)==true and count($datos)>0){

                    //edita el estado de la categoria
                    $categorias->editar_estado($_POST["id_categoria"],$_POST["est"]);
                
                    //edita el estado de la categoria
                    $productos->editar_estado_producto_por_categoria($_POST["id_categoria"],$_POST["est"]);

                    } 

            break;

          /*---------------------------------------------------------------------------------*/
                case "listar":

            $datos=$categorias->get_categorias();

            //Vamos a declarar un array
            $data= Array();

            foreach($datos as $row)
            {
                $sub_array = array();
                
                //ESTADO
                $est = '';
            
                $atrib = "btn btn-success btn-md estado";
                if($row["estado"] == 0){
                $est = 'INACTIVO';
                $atrib = "btn btn-warning btn-md estado";
                }
                else{
                if($row["estado"] == 1){
                    $est = 'ACTIVO';
                    
                } 
                }
                
                
                $sub_array[] = $row["categoria"];
                
                

                        $sub_array[] = '<button type="button" onClick="cambiarEstado('.$row["id_categoria"].','.$row["estado"].');" name="estado" id="'.$row["id_categoria"].'" class="'.$atrib.'">'.$est.'</button>';
                        
                        

                        
                        $sub_array[] = '<button type="button" onClick="mostrar('.$row["id_categoria"].');"  id="'.$row["id_categoria"].'" class="btn btn-warning btn-md update"><i class="glyphicon glyphicon-edit fa fa-edit"></i> Editar</button>';

                        $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_categoria"].');"  id="'.$row["id_categoria"].'" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-edit fa fa-trash"></i> Eliminar</button>';
                        
                $data[] = $sub_array;
            }

            $results = array(
                    "sEcho"=>1, //Información para el datatables
                    "iTotalRecords"=>count($data), //enviamos el total registros al datatable
                    "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
                    "aaData"=>$data);
                echo json_encode($results);


            break;


     }



?>