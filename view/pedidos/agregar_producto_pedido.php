<?php

session_start();

include_once("../../funciones.php");


//validar_permanencia();
conectar_bd();





Pedido::agregar_producto_pedido($_GET["code"]);
 $x = "insert into pedidos_productos (idPedido_producto, idPedido, idProducto, producto, producto_relacion, cantidad, activo) values (0,'$id_retorno','$idproducto','$detalleProducto','$relacion', '$cantidad','1')";


?>