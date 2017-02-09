<script>
function foco(elemento) {
elemento.style.border = "1px solid red";
}

function no_foco(elemento) {
elemento.style.border = "";
}
</script>
<body onload="document.stock.codigo_barras.focus();">
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 

<div class="header">

<? if($_GET["respuesta"]){
$respuesta = $_GET["respuesta"];
jsCommand("alert('{$respuesta}');");
} ?>

<? if($cambio == "nuevo") {
$comentario = "";
$idproveedor = "";
$cantidad = "";

	?>

<form name="stock" method="post" enctype="multipart/form-data" action="index.php?accion=insert_stock&idProducto=<?=$_GET['idProducto']?>">
<? } ?>

<div class="pageTitle">
<?= $mensaje_cabezera?><br>
</div>
<table class="tabla_list" cellpadding=3 cellspacing=3  border="10">

	<tr>
		<td class="td_text">Codigo de Barras:</td><td class="td_text"><input name="codigo_barras" size="80"  type="text" <?= $deshabilitado?> value="<?=$codigo_barras?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
		<td class="td_text">Comentario:</td><td class="td_area"><textarea name="comentario" rows="4" cols="80"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);"><?=$comentario?></textarea></td>
	</tr>
	<tr>
		<td class="td_text">Cantidad:</td><td class="td_text"><input name="cantidad"  type="text" <?= $deshabilitado?> value="<?=$cantidad?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

	<tr>
	<td class="submit" align="center" colspan="10" ><?if($boton== true){?><input type="submit" name="submit" value="AGREGAR" ><? } ?></td>
	</tr>
	</table>
<?// if($gerarquia == true) {?>
<? if($detalle == true) {?>
<table class="tabla_list">
<tr>
	<td><a href="index.php?accion=modify_stock&id=<?= $movimiento['id'] ?>&idProducto=<?= $_GET['idProducto']?>"><img style="display:block;" src="<?= IMGS?>lupa.gif"  border="0"></a></td>
	<td><a href="index.php?accion=modify_stock&id=<?= $movimiento['id'] ?>&idProducto=<?= $_GET['idProducto']?>">Editar</a></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
<!--	< ?if($producto->get_id_tipo() != 1){ ?> -->
<!--	< ? } ?> -->
</tr>

</table>
<? }?>
<?// }?>
	</form>
	</div>
	</div>

<script src="<?=JS?>models/gen_validatorv2.js" language="javascript" type="text/javascript"></script>
<script src="<?=JS?>validaciones/stock/new.js" language="javascript" type="text/javascript"></script>

