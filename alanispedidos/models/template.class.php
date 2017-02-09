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
	<link rel="stylesheet" href="<?php echo CSS?>pro_drop_1.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo  CSS?>style.css">

	<script language="JavaScript" src="<?php echo JS?>funciones.js"></script>
	<script src="<?php echo JS?>stuHover.js" type="text/javascript"></script>
	<script src="<?php echo JS?>shortcut.js" type="text/javascript"></script>



<script>

shortcut.add("F8", function () { window.location="<?php echo  CTRL ?>productos/"; });
//shortcut.add("Esc", function () { window.close(); });
shortcut.add("F12", function () { btnBuscar_onclick(); });

</script>


</head>

<?php
 if($_SERVER['PHP_SELF']== '/ctrl/facturacion/index.php' and $_variable == true):

$_evento = "javascript:popUp('../../pdf/presupuesto.php?idFactura= ". $_id . " ')";
 elseif($_SERVER['PHP_SELF']== '/ctrl/productos/index.php' and $_variable == true):
$_evento = 'document.datos.edit_'. $_id.'.focus()';
 else: 
$_evento = 'document.datos.buscador.focus();';

 endif; ?>
<body onKeyPress="return acceptNav(event)" onLoad="<?php echo  $_evento?>">


<?php
if($_usuario->gerarquia == 1) $gerarquia = "Administrador"; else $gerarquia = "Vendedor";	
echo "Usuario Logueado : " . $_usuario->user . " - Nombre :". $_usuario->nombre ." ". $_usuario->apellido . " - Categoria :". $gerarquia  ;  ?>
<span class="preload1"></span>
<span class="preload2"></span>

<div>
<SPAN style="width:80px; height:80px; background-color:#00F; border:1px; font-size: 22px;">
pedido 1</SPAN>
<span style="width:50px; height:50px; background-color:red; border:1px; font-size: 22px;">
pedido 2</span>
<span style="width:50px; height:50px; background-color:green; border:1px; font-size: 22px;">
pedido 3</span>
</div>

	<?php
	}


	function draw_footer()
	{
	?>

		</body>
		</html>	

	<?php
	}
















}











?>