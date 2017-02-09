<?php

class Template
{
	function draw_header($_variable=0,$_id=0)
	{
	$_usuario = unserialize($_SESSION["usuario"]);
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Casa Alanis</title>
	<link rel="stylesheet" href="<?=CSS?>pro_drop_1.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

	<script language="JavaScript" src="<?=JS?>funciones.js"></script>
	<script src="<?=JS?>stuHover.js" type="text/javascript"></script>
	<script src="<?=JS?>shortcut.js" type="text/javascript"></script>



<script>

shortcut.add("F8", function () { window.location="<?= CTRL ?>productos/"; });
//shortcut.add("Esc", function () { window.close(); });
shortcut.add("F12", function () { btnBuscar_onclick(); });

</script>


</head>

<?
 if($_SERVER['PHP_SELF']== '/ctrl/facturacion/index.php' and $_variable == true):

$_evento = "javascript:popUp('../../pdf/presupuesto.php?idFactura= ". $_id . " ')";
 elseif($_SERVER['PHP_SELF']== '/ctrl/productos/index.php' and $_variable == true):
$_evento = 'document.datos.edit_'. $_id.'.focus()';
 else: 
$_evento = 'document.datos.buscador.focus();';

 endif; ?>
<body onKeyPress="return acceptNav(event)" onLoad="<?= $_evento?>">


<?
if($_usuario->gerarquia == 1) $gerarquia = "Administrador"; else $gerarquia = "Vendedor";	
echo "Usuario Logueado : " . $_usuario->user . " - Nombre :". $_usuario->nombre ." ". $_usuario->apellido . " - Categoria :". $gerarquia  ;  ?>
<span class="preload1"></span>
<span class="preload2"></span>

<ul id="nav">
	<li class="top"><a href="<?=HOME?>" class="top_link"><span>Inicio</span></a></li>
	<li class="top"><a href="<?=CTRL?>productos/" class="top_link"><span class="down">Productos</span></a>
		<ul class="sub">
			<li><a href="#" class="fly">Productos</a>
					<ul >
						<li><a href="<?=CTRL?>productos/">Listado</a></li>
						<li><a href="<?=CTRL?>productos/index.php?accion=listado_precios">Lista Precios</a></li>
						<li><a href="<?=CTRL?>productos/index.php?accion=new">Nuevo</a></li>
						<li ><a href="<?=CTRL?>stock/" >Stock</a></li>
					</ul>
			</li>
			<li><a href="<?=CTRL?>productos/" class="fly">Categorias</a>
					<ul >
						<li><a href="<?=CTRL?>productos/index.php?accion=list_categorias">Listado</a></li>
						<li><a href="<?=CTRL?>productos/index.php?accion=new_categoria">Nueva</a></li>
					</ul>
			</li>
		</ul>
	</li>
	<li class="top"><a href="<?=CTRL?>clientes/" class="top_link"><span class="down">Clientes</span></a>
		<ul class="sub">
			<li><a href="<?=CTRL?>clientes/" >listado Clientes</a></li>
			<li><a href="<?=CTRL?>clientes/index.php?accion=new" >Nuevo Cliente</a></li>
		</ul>
	</li>
	</li>
	<li class="top"><a href="<?=CTRL?>facturacion/" class="top_link"><span class="down">Facturacion</span></a>
		<ul class="sub">
	<? if($_usuario->gerarquia == 1):?>
			<li><a href="<?=CTRL?>facturacion/index.php?accion=balance_iva" >Balance IVA</a></li>
	<? endif; ?>
			<li><a href="<?=CTRL?>facturacion/" >Presupuestos</a></li>
			<li><a href="<?=CTRL?>facturacion/index.php?accion=list&tipo_factura=5" >Facturas</a></li>
			<li><a href="<?=CTRL?>facturacion/index.php?accion=nueva_factura" >Nueva</a></li>
			<li><a href="<?=CTRL?>compras/index.php?accion=cheques" >Cheques</a></li>
                        
		</ul>
	</li>
	<li class="top"><a href="<?=CTRL?>cobranzas/" class="top_link"><span class="down">Cobranzas</span></a>
	<? if($_usuario->gerarquia == 1):?>
	</li>
	<li class="top"><a href="<?=CTRL?>proveedores/" class="top_link"><span class="down">Proveedores</span></a>
		<ul class="sub">
			<li><a href="<?=CTRL?>proveedores/" >Listado</a></li>
			<li><a href="<?=CTRL?>proveedores/index.php?accion=new" >Nuevo</a></li>
			<li><a href="<?=CTRL?>compras/" >Facturas</a></li>
			<li><a href="<?=CTRL?>compras/index.php?tipo=remito" >Remitos</a></li>
                </ul>
	</li>
<!--	<li class="top"><a href="< ?=CTRL?>compras/" class="top_link"><span class="down">Compras</span></a>
		<ul class="sub">
			<li><a href="< ?=CTRL?>compras/" >listado facturas</a></li>
		</ul>
	</li>-->
		
		<li class="top"><a href="<?=CTRL?>cobranzas/" class="top_link"><span class="down">Herramientas</span></a>
		<ul class="sub">
			<li><a href="<?=VIEW?>productos/gestion_precios.php" >Gestion de precios</a></li>
			<li><a href="<?=VIEW?>herramientas/precios_movimientos.php" >Historial de Precios</a></li>
			<li><a href="<?=VIEW?>productos/dolar.php" >Precio Dolar</a></li>
			<li><a href="<?=VIEW?>herramientas/provincias.php" >Provincias</a></li>
			<li><a href="<?=HOME?>backup/dump.php">Backup del Sistema</a></li>
		</ul>

	</li>
	<li class="top"><a href="<?=CTRL?>usuarios/" class="top_link"><span class="down">Usuarios</span></a>
		<ul class="sub">
			<li><a href="<?=CTRL?>usuarios/" >listado Usuarios</a></li>
			<li><a href="<?=CTRL?>usuarios/index.php?accion=new" >Nuevo Usuario</a></li>
		</ul>
	</li>
	<? endif; ?>
	<li class="top"><a href="<?=HOME?>" class="top_link"><span class="down">Salir</span></a>
	</li>


</ul>

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