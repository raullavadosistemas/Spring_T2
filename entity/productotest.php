<?php

use app\entity;
use PHPUnit\Framework\TestCase;

class ProductoTest extends TestCase {
public function TestObtenerProducto(){

$producto = new producto();
$producto -> id_producto('10'); 
$producto -> categoria('socalos'); 
$producto -> presentacion('saco'); 
$producto -> unidad_medida('kilo'); 
$producto -> precio_compra('12.52'); 
$producto -> precio_venta('15'); 
$producto -> stock('2'); 

$this -> assertEquals($producto->getProducto(),'10,socalos,saco,kilo,12.52,15,2');




}

}


?>