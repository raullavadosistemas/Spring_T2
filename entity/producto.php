<?php

namespace app\entity;
class Producto{

public $id_producto;
public $categorias;
public $presentacion;
public $unidad_medida;
public $precio_compra;
public $precio_venta;
public $stock;
 
public function setProducto($id_producto,$categorias,$presentacion,$unidad_medida,$precio_compra,
$precio_venta,$stock){

$this-> id_producto = $id_producto;
$this-> categoria = $categoria;
$this-> presentacion = $presentacion;
$this-> unidad_medida = $unidad_medida;
$this-> precio_compra = $precio_compra;
$this-> precio_venta = $precio_venta;
$this-> stock = $stock;

}

public function getProducto(){

return $this -> id_producto . ',' . $this-> categoria . ',' . $this-> presentacion .
 ',' . $this-> unidad_medida . ',' . $this-> precio_compra . ',' . $this -> precio_venta . ',' .
 $this -> stock ; 

}

}

?>