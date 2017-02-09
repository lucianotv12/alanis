<?php

session_start();

include_once("../../funciones.php");


//validar_permanencia();
conectar_bd();



$datos = explode("_", $_GET["code"]);
$idPedido = $datos[0];
$idEstado = $datos[1];

//$idCategoria = $_GET["code"];

Pedido::actualiza_estado($idPedido,$idEstado);


?>