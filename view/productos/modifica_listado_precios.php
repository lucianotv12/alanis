<?php

session_start();

include_once("../../funciones.php");


validar_permanencia();
conectar_bd();


//$_GET["code"];
/*$_GET["idProducto"];
$_GET["precio_nombre"];
$_GET["desc1_nombre"];
$_GET["desc2_nombre"];
$_GET["desc3_nombre"];
$_GET["utilidad_nombre"];
$_GET["iva_nombre"];
$_GET["referencia_nombre"];
$_GET["bulto_nombre"];
$_GET["usuario"];*/

Producto::modificar_importe($_GET["idProducto"],$_GET["precio_nombre"],$_GET["desc1_nombre"],$_GET["desc2_nombre"],$_GET["desc3_nombre"],$_GET["utilidad_nombre"],$_GET["iva_nombre"],$_GET["referencia_nombre"],$_GET["bulto_nombre"],$_GET["usuario"]);            

$simbolo = new Producto($_GET["idProducto"]);

$simbolo = $simbolo->get_idMoneda();

$simbolo = Producto::get_moneda_producto($simbolo);

if($simbolo == 'u$s'):
 //   echo $simbolo . redondear_dos_decimal(Producto::get_precio_lista_dolar($_GET["idProducto"]));    
    echo redondear_dos_decimal(Producto::get_precio_lista_dolar($_GET["idProducto"])) . " (" . redondear_dos_decimal(Producto::get_precio_lista($_GET["idProducto"])) . ")" ;
else:
    echo  redondear_dos_decimal(Producto::get_precio_lista_dolar($_GET["idProducto"]));    
endif;



?>

