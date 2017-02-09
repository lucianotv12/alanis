<link type="text/css" rel="stylesheet" href="<?=CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />
<script type="text/javascript" src="<?= JS?>jquery-1.7.1.min.js"></script>
<script type='text/javascript' src="<?= JS?>jquery-ui-1.8.17.custom.min.js"></script>
<script language="JavaScript" src="<?=JS?>funciones.js"></script>
<script src="<?=JS?>shortcut.js" type="text/javascript"></script>

<script language="JavaScript">

shortcut.add("Enter", function () { busqueda('listado_productos','<?= $_POST['buscador'] ?>');});
shortcut.add("Esc", function () { window.close(); });




function devolver_valor(id,detalle_producto,precio_producto){ 
    opener.document.datos.idproducto.value = id 
    opener.document.datos.detalle_producto.value = detalle_producto 
    opener.document.datos.precio_producto.value = precio_producto 
    opener.document.datos.cantidad.focus() 
	window.close();
} 
</script>
<script type="text/javascript">
	$(function(){
		$('#buscar_usuarios').autocomplete({
		source:"ajax.php"
				
		});
		
	});

</script> 
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<body onLoad="document.datos.buscador.focus();">

<div class="contentArea"> 


<form method="post" name="datos">
<div class="pageTitle">
LISTADO DE PRODUCTOS 
</div>
<br>
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><td colspan=20 align="left">
		<font color="#FFFFFF"><b>Ingrese datos del Producto</b></font>
         <input type="text" size="70"  name="buscador" id="buscar_usuarios" value="<?= $_POST["buscador"]?>" onFocus="foco(this);" onBlur="no_foco(this);">
		<b><!-- onKeyPress="return event.keyCode!=13" -->
		<a href="javaScript:busqueda('listado_productos','<?= $_POST['buscador'] ?>')"><font color="#FFFFFF">BUSCAR</font></A>
		<a href="javaScript:busqueda('listado_productos','TODOS')"><font color="#FFFFFF">TODOS</font></A>
		</b>
		<br>
		<FONT SIZE="2" COLOR="red">Buscar por : id, descripcion, categoria, subcategoria</FONT>
	</td></tr>

	<tr>
		<th>id</th>
		<th>Descripcion</th>
		<th>Categoria</th>
		<th>Subcategoria</th>
		<th>Precio</th>
		<th>Stock</th>

		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($productos as $producto):
	$contador++;
	?>
	<tr tabindex="<?=$contador?>" class="fila_impar" width="100%"  alt="seleccionar" ondblclick='devolver_valor("<?= $producto["id"] ?>","<?= mysql_real_escape_string($producto["descripcion"]) ?>","<?= redondear_dos_decimal(Producto::get_precio_lista($producto["id"])) ?>")' onMouseOver="this.style.background='black';this.style.color='white'"  onmouseout="this.style.background='white';this.style.color='black';this.style.cursor='pointer'">
		<td align="center" width="4%"><?= $producto["id"] ?></td>
		<td  width="63%" align="left"><?= $producto["descripcion"] ?></td>
		<td  width="10%" ><?= $producto["categoria_nombre"]; ?></td>
		<td width="10%"><?= $producto["subcategoria_nombre"]; ?></td>
		<td align="center" width="7%">$<?= redondear_dos_decimal(Producto::get_precio_lista($producto["id"])) ?></td>
		<td align="center" width="3%"><?= Producto::aviso_stock_cantidad($producto["id"]) ?></td>


	<? endforeach ?>


	</table>
</form>
</div>
</div>