<?php

  require_once("../config/conexion.php");

   class Categoria extends Conectar{

       //método para seleccionar registros

   	   public function get_categorias(){

   	   	  $conectar=parent::conexion();
   	   	//  parent::set_names();

   	   	  $sql="select * from categoria";

   	   	  $sql=$conectar->prepare($sql);
   	   	  $sql->execute();

   	   	  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
   	   }

   	    //método para mostrar los datos de un registro a modificar
        public function get_categoria_por_id($id_categoria){

            
            $conectar= parent::conexion();
            //parent::set_names();

            $sql="select * from categoria where id_categoria=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $id_categoria);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        } 


        //método para insertar registros

        public function registrar_categoria($categoria,$estado,$id_usuario){


           $conectar= parent::conexion();
           //parent::set_names();

           $sql="insert into categoria
           values(null,?,?,?);";

           $sql=$conectar->prepare($sql);

		      $sql->bindValue(1,$_POST["categoria"]);
		      $sql->bindValue(2,$_POST["estado"]);
		      $sql->bindValue(3,$_POST["id_usuario"]);
		      $sql->execute();
      


        }

        public function editar_categoria($id_categoria,$categoria,$estado,$id_usuario){

        	$conectar=parent::conexion();
        	//parent::set_names();

        	$sql="update categoria set 

            categoria=?,
            estado=?,
            id_usuario=?
            where 
            id_categoria=?

        	";
            
           //echo $sql; exit();

        	  $sql=$conectar->prepare($sql);

		          $sql->bindValue(1,$_POST["categoria"]);
		          $sql->bindValue(2,$_POST["estado"]);
		          $sql->bindValue(3,$_POST["id_usuario"]);
		          $sql->bindValue(4,$_POST["id_categoria"]);
		          $sql->execute();
 
               //impriendo el envio de los datos
               //print_r($nombre);

        }


         //método para activar Y/0 desactivar el estado de la categoria

        public function editar_estado($id_categoria,$estado){

        	 $conectar=parent::conexion();

        	 //si el estado es igual a 0 entonces el estado cambia a 1
        	 //el parametro est se envia por via ajax
        	 if($_POST["est"]=="0"){

        	   $estado=1;

        	 } else {

        	 	 $estado=0;
        	 }

        	 $sql="update categoria set 
              
              estado=?
              where 
              id_categoria=?

        	 ";

        	 $sql=$conectar->prepare($sql);

        	 $sql->bindValue(1,$estado);
        	 $sql->bindValue(2,$id_categoria);
        	 $sql->execute();
        }


        //método si la categoria existe en la base de datos

        public function get_nombre_categoria($categoria){

           $conectar=parent::conexion();

          $sql="select * from categoria where categoria=?";

           //echo $sql; exit();

           $sql=$conectar->prepare($sql);

           $sql->bindValue(1,$categoria);
           $sql->execute();

           //print_r($email); exit();

           return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }


   }


?>