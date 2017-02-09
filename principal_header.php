<?php
include_once("funciones.php");
include_once("models/productos.class.php");
#validar_permanencia();
conectar_bd();
?>
<title>Ferreteria - Casa Alanis</title>
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="MenuHeader">
<A href="usuarios/index.php">USUARIOS</a> - 
<A href="clientes/index.php">CLIENTES</a> -
<A href="proveedores/index.php">PROVEEDORES</a> -
<A href="productos/index.php">PRODUCTOS</a>-
<A href="vendedores/index.php">VENDEDORES</a>-
<A href="stock/index.php">STOCK</a>-
<A href="stock/notas_credito.php">NOTAS DE CREDITO</a>-
<A href="facturacion/index.php">FACTURACION</a>
</DIV><BR>

<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 

<div class="header">
<div class="pageTitle">
<FONT SIZE="3" COLOR=""><B><U>PRODUCTOS FALTANTES</U></B></FONT><br><br>
</div>
<? Producto::avisos_stock_bis(); ?>
<BR><BR><BR>
<div class="pageTitle">
<FONT SIZE="3" COLOR=""><B><U>LISTADO DE STOCK DE PRODUCTOS</U></B></FONT><br><br>
</div>
<? Producto::avisos_listado_stock(); ?>
</DIV>
</DIV>