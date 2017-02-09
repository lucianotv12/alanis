<script language="JavaScript">
<!--
function pregunta(idproducto)  // ABRE POPUP, DONDE PREGUNTA SI SE ABRIRAN LOS ARCHIVOS ANTIGUOS
{

var update=window.confirm("Se procederá a borrar el producto " + idproducto + " desea continuar?");



if (update){
document.datos.action="index.php?accion=delete&id=" + idproducto ;
document.datos.submit();
}else

document.datos.action="";
}
//-->
</script>

<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 

<div class="header">

	<div class="logo">
	</div>
<div>
	<table width="100%" border=0 cellpadding=0 cellspacing=0>
		<tr>
			<td colspan="10">
				<ul id='menu'>
				<li ><a href='<?= ADMIN?>productos/index.php' >Listado</a></li>
				<li ><a href="<?= ADMIN?>productos/index.php?accion=detail&id=<?=$_GET['id']?>" >Producto</a></li>
				<li ><a  href="<?= ADMIN?>productos/index.php?accion=codigo_barras&id=<?=$_GET['id']?>" >Codigo de Barras</a></li>
				<li ><a class="current" href="<?= ADMIN?>productos/index.php?accion=stock&id=<?=$_GET['id']?>&idProducto=<?= $_GET['id']?>" >Stock</a></li>
					<ul id='menu'>
					<li ><a href="<?= ADMIN?>productos/index.php?accion=stock&id=<?=$_GET['id']?>" ><U>Listado</U></a></li>
					</ul>

				</li>
				</ul><br>
			</td>
		</tr>
	</table>
</div>



<form method="post" name="datos">
<div class="pageTitle">
LISTADO DE MOVIMIENTOS DE STOCK  Producto:<?=$codigo?>
</div>
<br>
<table cellpadding=5 cellspacing=0 border=5 >

	<tr>
		<th>Cod Mov.</th>
		<th>Movimiento</th>
		<th>cantidad</th>
		<th>precio</th>
		<th>color</th>
		<th>talle</th>
	<!--	<th>Ver</th>-->
		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($movimientos as $movimiento):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
		<td><?= $movimiento['id'] ?></td>
		<td><?= $movimiento['movimiento']?></td>
		<td><?= $movimiento['cantidad']?></td>
		<td><?= $movimiento['precio']?></td>
		<td><?= $movimiento['color']?></td>
		<td><?= $movimiento['talle']?></td>

	<!--<td><a href="index.php?accion=detail_stock&id=<?= $movimiento['id'] ?>&idProducto=<?= $_GET['id']?>">
		<img style="display:block;" src="<?= IMGS?>lupa.gif"  border="0" height ="20px" width="20px" >
		</a></td>-->

	</tr>
	<? endforeach ?>
	<tr>
		<td align="right" colspan="10"><a href="index.php?accion=new_stock&idProducto=<?= $_GET['id']?>">
		<img style="display:block;" src="<?= IMGS?>add.gif"  border="0" >
		</a></td>
	</tr>	

	</table>
</form>
</div>
</div>
