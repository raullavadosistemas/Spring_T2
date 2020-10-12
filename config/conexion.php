<?php
 session_start(); 
class Conectar{
    protected $dbh; /*este atributo va ser para utilizar la conexcion a la base de datos */
    public function conexion(){
  
            try {
            
                $conectar = $this->dbh= new PDO("mysql:dbname=dbproyecto;host=localhost;port=3306;charset=utf8","root","");
                $conectar->query("SET NAMES 'utf8'");
               
                return $conectar;
                
            } catch (Exception $e) {
                    print "¡Error!: " .$e->getMessage() . "<br/>"; 
                    die();
            }


    }


    public function ruta(){

        return "http://localhost/FERRETEIASAC01/";

    }

}


?>

