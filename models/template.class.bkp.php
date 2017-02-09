<?php

class Template
{
	function draw_header()
	{
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Casa Alanis</title>
	<link rel="stylesheet" href="<?=CSS?>menu_style.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

	<script language="JavaScript" src="<?=JS?>funciones.js"></script>


</head>
<body >
	<br>
	<br>
	<div class="menu">
		<ul>
			<li><a href="<?=HOME?>" >Inicio</a></li>
			<li><a href="<?=CTRL?>usuarios/" id="current">Usuarios</a>
				<ul>
					<li><a href="<?=CTRL?>usuarios/">Listado de Usuarios</a></li>
					<li><a href="<?=CTRL?>usuarios/index.php?accion=new">Agregar Nuevo Usuario</a></li>
			   </ul>
		  </li>
			<li><a href="<?=CTRL?>productos/">Productos</a>
                <ul>
                <li><a href="<?=CTRL?>productos/">Listado de Productos</a></li>
                <li><a href="<?=CTRL?>productos/index.php?accion=new">Nuevo Producto</a></li>
                </ul>
          </li>
			<li><a href="<?=CTRL?>clientes/">Clientes</a>
                <ul>
                <li><a href="<?=CTRL?>clientes/">Listado de Clientes</a></li>
                <li><a href="<?=CTRL?>clientes/index.php?accion=new">Nuevo Cliente</a></li>
                </ul>
          </li>		</ul>
	</div>

	<?
	}


	function draw_footer()
	{
	?>

		</body>
		</html>	

	<?
	}
















}











?>