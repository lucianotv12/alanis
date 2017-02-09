<script language="JavaScript">
<!--
function pregunta(idcliente,idprod)  // ABRE POPUP, DONDE PREGUNTA SI SE ABRIRAN LOS ARCHIVOS ANTIGUOS
{

var update=window.confirm("Esta a punto de borrar el producto " + idcliente + " de su factura, desea continuar?");


if (update){
document.datos.action="index.php?accion=delete_factura_producto&id=" + idcliente + "&idfactura_producto=" + idprod ;
document.datos.submit();
}else

document.datos.action="";
}
//-->
</script>

<script language="JavaScript">
function foco(elemento) {
elemento.style.border = "1px solid red";
}

function no_foco(elemento) {
elemento.style.border = "";
}
</script>



<body onLoad="document.stock.codigo_barras.focus();">
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 

<div class="header">
	<table width="100%" border=0 cellpadding=0 cellspacing=0>
		<tr>
			<td colspan="10">
				<ul id='menu'>
				<li ><a href='<?= ADMIN?>clientes/index.php'>Listado</a></li>
				<li ><a href='<?= ADMIN?>clientes/index.php?accion=detail&id=<?= $cliente->get_id() ?>' >cliente</a></li>
				<li ><a href='<?= ADMIN?>clientes/index.php?accion=facturas&id=<?= $cliente->get_id() ?>' >Facturas</a></li>
				<li ><a class='current' href='<?= ADMIN?>clientes/index.php?accion=nueva_factura&id=<?= $cliente->get_id() ?>' >Nueva Factura</a></li>
<!--				<li ><a href='<?= ADMIN?>clientes/index.php?accion=galeria_archivos&id=< ?= $cliente->get_id() ?>' >Galeria Archivos</a></li>-->
				</ul><br>
			</td>
		</tr>
	</table>


<?
if($mensaje_producto){
jsCommand("alert('{$mensaje_producto}');");
}
?>
<form name="stock" method="post" enctype="multipart/form-data" action="index.php?accion=insert_factura_producto&id=<?=$_GET['id']?>">


<div class="pageTitle">
<?= $mensaje_cabezera?>  Cliente : <?= $nombre?><br>
</div>
<table class="tabla_list" cellpadding=2 cellspacing=2  border="5">

	<tr>
		<td class="td_text">Codigo de Barras:</td><td class="td_text"><input name="codigo_barras" size="40"  type="text" <?= $deshabilitado?> value="<?=$codigo_barras?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
		<td class="td_text">Cantidad:</td><td class="td_text"><input name="cantidad"  type="text" <?= $deshabilitado?> value="<?=$cantidad?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
		<td class="td_text">Precio Producto:</td><td class="td_text"><input name="precio_producto"  type="text" <?= $deshabilitado?> value="<?=$precio_producto?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

	<tr>
	<td class="submit" align="center" colspan="10" ><?if($boton== true){?><input type="submit" name="submit" value="AGREGAR" ><? } ?></td>
	</tr>
	</table>
	</form>

<br><br>
<? if($productos_virtuales) {?>

	<form method="post" name="datos">
	<TABLE border= 10>

	<TR>
		<TD>ARTICULO</TD>
		<TD>CANTIDAD</TD>
		<TD>DETALLE</TD>
		<TD>P/UNITARIO</TD>
		<TD>IMPORTE</TD>
		<TD></TD>
	</TR>

	<?
	$contador=0;
	foreach($productos_virtuales as $producto_virtual):
	$contador++;
?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
		<TD><?= $producto_virtual['codigo'];  ?></TD>
		<TD><?= $producto_virtual['cantidad'];  ?></TD>
		<TD><?= $producto_virtual['descripcion'];  ?></TD>
		<TD><?= $producto_virtual['precio_unitario'];  ?></TD>
		<TD><?= $producto_virtual['precio_total'];  ?></TD>
		<td><a href="javaScript:pregunta('<?= $_GET['id']?>','<?= $producto_virtual['id'];?>')">
			<img style="display:block;" src="<?= IMGS?>eliminar.png"  border="0">
			</a></td>
	</TR>

	<?
	endforeach;
	?>
	</TABLE>
	</FORM>
<? } ?>
<form name="stock1" method="post" enctype="multipart/form-data" action="index.php?accion=generar_factura&id=<?=$_GET['id']?>">

<TABLE>
	<tr>
	<td class="td_text">N REMITO:</td><td class="td_text"><input name="n_remito" size="40"  type="text" <?= $deshabilitado?> value="<?=$n_remito?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
	<td class="td_text">N FACTURA:</td><td class="td_text"><input name="n_factura" size="40"  type="text" <?= $deshabilitado?> value="<?=$n_factura?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
	<td class="td_text">DESCUENTO:</td><td class="td_text"><input name="descuento" size="1" maxlength="2" type="text" <?= $deshabilitado?> value="<?= $cliente->get_descuento() ?>" onFocus="foco(this);" onBlur="no_foco(this);">%</td>
	</tr>
	<tr>
	<td class="td_text">CONDICION IVA:</td><td class="td_text"><?= $cliente->get_condicion_iva() ?></td>
	</tr>
	<tr>
	<td class="td_text">CONDICION VENTA:</td><td class="td_text"><input name="condicion_venta" size="40"  type="text" <?= $deshabilitado?> value="<?=$condicion_venta?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>	
	<tr>
	<td class="td_text">ORDEN DE COMPRA:</td><td class="td_text"><input name="orden_compra" size="40"  type="text" <?= $deshabilitado?> value="<?=$orden_compra?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
	<td class="submit" align="center" colspan="10" ><input type="submit" name="submit" value="GENERAR FACTURA" ></td>
	</tr>
</TABLE>
</form>
<script src="<?=JS?>models/gen_validatorv2.js" language="javascript" type="text/javascript"></script>
<script src="<?=JS?>validaciones/stock/new.js" language="javascript" type="text/javascript"></script>