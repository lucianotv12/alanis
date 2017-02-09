<?php

include_once("../../funciones.php");
include_once("../../models/pago.class.php");
conectar_bd();
//echo "holaaaaa";

$_pago = new Pago();

echo json_encode($_pago->buscarChequeAjax($_GET['term']));

//echo "['luciano','tomas','verni']";

//print_r($productos = $_producto->buscarProductoAjax('TALADRO'));

/*foreach($productos as $producto):
//echo 'ENTRO';


echo $producto['descripcion'];

endforeach;
*/
?>