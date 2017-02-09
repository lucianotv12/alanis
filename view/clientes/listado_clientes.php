<script language="JavaScript" src="<?=JS?>funciones.js"></script>
<script src="<?=JS?>shortcut.js" type="text/javascript"></script>

<script language="JavaScript">
<!--
shortcut.add("Enter", function () { busqueda('listado_productos','<?= $_POST['buscador'] ?>');});
shortcut.add("Esc", function () { window.close(); });

function busqueda(buscador)
{
	document.datos.action="index.php?accion=listado_clientes&buscador=" + buscador ;
	document.datos.submit();
}
//-->
</script>
<script> 
function devolver_valor(id,nombre,descuento,condicion_iva){ 
    opener.document.datos._idcliente.value = id 
    opener.document.datos.descripcion.value = nombre 
    opener.document.datos.descuento.value = descuento 
    opener.document.datos.condicion_iva.value = condicion_iva 
    opener.document.datos.buscador.focus()
	window.close() 
} 
</script> 

<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 

<form method="post" name="datos">
<!--<div class="pageTitle">
LISTADO DE CLIENTES 
</div>
-->
<br>
<table cellpadding=0 cellspacing=0 border=1 width="90%" align="center" >
		<tr><td colspan=5 align="left">
		Ingrese datos del Cliente <input type="text" size="70" name="buscador" value="<?= $_POST["buscador"]?>">
		<a href="javaScript:busqueda('<?= $_POST['buscador'] ?>')">BUSCAR</A>
		<a href="javaScript:busqueda('TODOS')">TODOS</A>
		</td></tr>
	<tr>
		<th>id</th>
		<th>Razon Social</th>
		<th>Estado</th>
		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($clientes as $cliente):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>" ondblclick='devolver_valor("<?= $cliente->get_id() ?>","<?= mysql_real_escape_string( $cliente->get_nombre()) ?>","<?= $cliente->get_descuento() ?>","<?= $cliente->get_condicion_iva() ?>")' onMouseOver="this.style.background='black';this.style.color='white'"  onmouseout="this.style.background='white';this.style.color='black';this.style.cursor='pointer'">
		<td><?= $cliente->get_id() ?></td>
		<td><?= $cliente->get_nombre() ?></td>
		<td><?= $cliente_deudor = Factura::get_cliente_deudor($cliente->get_id()); ?></td>

	</tr>
	<? endforeach ?>

	</table>
</form>
</div>
</div>
