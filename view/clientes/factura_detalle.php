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

<script>
function foco(elemento) {
elemento.style.border = "1px solid red";
}

function no_foco(elemento) {
elemento.style.border = "";
}
</script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=850,height=800');");
}
// End -->
</script>


<BODY >
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
				<li ><a href='<?= ADMIN?>clientes/index.php?accion=nueva_factura&id=<?= $cliente->get_id() ?>' >Nueva Factura</a></li>
				<li ><a class='current' >Factura Detalle</a></li>
<!--				<li ><a href='<?= ADMIN?>clientes/index.php?accion=galeria_archivos&id=< ?= $cliente->get_id() ?>' >Galeria Archivos</a></li>-->
				</ul><br>
			</td>
		</tr>
	</table>


<div class="pageTitle">
DATOS FACTURA<br>
</div>

<TABLE width="700" cellspacing=2 cellpadding=3>
<TR>
	<TD>Cod.Cliente</TD>
	<TD>Razon social</TD>
	<TD>Fecha</TD>
</TR>
<TR bgcolor="white">
	<TD><?= $cliente->get_id();?></TD>
	<TD><?= $cliente->get_nombre();?></TD>
	<TD><?= $factura->get_fecha();?></TD>
</TR>
<TR>
	<TD>cond. Venta</TD>
	<TD>Cond. IVA</TD>
	<TD>ord.Compra</TD>
</TR>
<TR bgcolor="white" >
	<TD><?= $factura->get_condicion_venta();?></TD>
	<TD><?= $factura->get_condicion_iva();?></TD>
	<TD><?= $factura->get_orden_compra();?></TD>
</TR>
</TABLE>

<TABLE width="700">
<TR>
	<TD>Cant.</TD>
	<TD>Codigo</TD>
	<TD>Descripcion</TD>
	<TD>P.Unitario</TD>
	<TD>P.Total</TD>
</TR>
<?  foreach($productos_factura as $producto): $contador++;?>
  <TR height="10" class="<?=($contador%2==0? "fila_par":"fila_impar");?>" >
	<TD ALIGN="CENTER"><FONT SIZE="2" COLOR=""><?= $producto["cantidad"];?></FONT></TD>
	<TD ALIGN="CENTER"><FONT SIZE="2" COLOR=""><?= $producto["idProducto"];?></FONT></TD>
	<TD ALIGN="CENTER"><FONT SIZE="2" COLOR=""><?= $producto["descripcion"];?></FONT></TD>
	<TD ALIGN="CENTER" ><FONT SIZE="2" COLOR="">
	<? if($factura->get_condicion_iva() == "Responsable Inscripto")
		{
		$unitario =$producto["precio_unitario"];
		}
	else
		{
		$unitario = $producto["precio_unitario"] + $producto["precio_unitario"] *21/100 ;
		}

	echo $unitario= number_format ($unitario,2)?></FONT></TD>
	<TD ALIGN="right"><FONT SIZE="2" COLOR="">
	<?
		$total =$unitario * $producto["cantidad"] ;
	echo number_format ($total,2)?></FONT></TD>
  </TR>
<?
	$SUMA_IMPORTE = $SUMA_IMPORTE + $total;

endforeach;?>
</TABLE>


<!--
<TABLE>
	<tr>
	<td class="td_text">N REMITO:</td><td class="td_text"><input name="n_remito" size="40"  type="text" <?= $deshabilitado?> value="<?=$factura->get_n_remito();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
	<td class="td_text">N FACTURA:</td><td class="td_text"><input name="n_factura" size="40"  type="text" <?= $deshabilitado?> value="<?=$factura->get_n_factura();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
	<td class="td_text">DESCUENTO:</td><td class="td_text"><input name="descuento" size="1" maxlength="2" type="text" <?= $deshabilitado?> value="<?=$factura->get_descuento();?>" onFocus="foco(this);" onBlur="no_foco(this);">%</td>
	</tr>
	<tr>
	<td class="td_text">FECHA FACTURA:</td><td class="td_text"><input name="fecha" size="40" maxlength="10" type="text" <?= $deshabilitado?> value="<?=$factura->get_fecha();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
	<td class="td_text">COMISION VENDEDOR:</td><td class="td_text"><input name="fecha" size="40" maxlength="10" type="text" <?= $deshabilitado?> value="<?=$factura->get_comision_vendedor();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
	<td class="td_text">CONDICION IVA:</td><td class="td_text"><input name="fecha" size="40" maxlength="10" type="text" <?= $deshabilitado?> value="<?=$factura->get_condicion_venta();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
	<td class="td_text">CONDICION VENTA:</td><td class="td_text"><input name="fecha" size="40" maxlength="10" type="text" <?= $deshabilitado?> value="<?=$factura->get_condicion_iva();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
	<td class="td_text">ORDEN DE COMPRA:</td><td class="td_text"><input name="fecha" size="40" maxlength="10" type="text" <?= $deshabilitado?> value="<?=$factura->get_orden_compra();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
-->	<tr>
		<td><input name="FACTURA" type="button" value="FACTURA" onCLICK="javascript:popUp('index.php?accion=imprimir_factura&id=<?= $cliente->get_id() ?>&idfactura=<?= $_GET["idfactura"]?>')" /></td>
		<td><input name="REMITO" type="button" value="REMITO" onCLICK="javascript:popUp('index.php?accion=imprimir_remito&id=<?= $cliente->get_id() ?>&idfactura=<?= $_GET["idfactura"]?>')" /></td>
	</tr>

</TABLE>

