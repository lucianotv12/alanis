<?php

session_start();

include_once("../../funciones.php");


//validar_permanencia();
conectar_bd();




Pedido::borrar_producto_pedido($_GET["code"]);


?>