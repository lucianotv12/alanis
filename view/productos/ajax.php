<?php

include_once("../../funciones.php");
include_once("../../models/producto.class.php");
conectar_bd();
//echo "holaaaaa";

$_producto = new Producto();

echo json_encode($_producto->buscarProductoAjax($_GET['term']));

//echo "['luciano','tomas','verni']";

//print_r($productos = $_producto->buscarProductoAjax('TALADRO'));

/*foreach($productos as $producto):
//echo 'ENTRO';


echo $producto['descripcion'];

endforeach;
*/
?>
