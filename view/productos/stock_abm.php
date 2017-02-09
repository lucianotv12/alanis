
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">
<script type="text/javascript" src="<?=JS?>prototype.js"></script>




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
				<li ><a href="<?= ADMIN?>productos/index.php?accion=detail&id=<?=$_GET['idProducto']?>" >Producto</a></li>
				<li ><a href="<?= ADMIN?>productos/index.php?accion=stock&id=<?=$_GET['idProducto']?>" >Stock</a></li>
					<ul id='menu'>
					<li ><a href="<?= ADMIN?>productos/index.php?accion=stock&id=<?=$_GET['id']?>" ><U>Listado</U></a></li>
					<li ><a class="current" href="<?= ADMIN?>productos/index.php?accion=detail_stock&id=<?=$_GET['id']?>&idProducto=<?= $_GET['idProducto']?>" ><U>Movimiento</U></a></li>
					<li ><a href="<?= ADMIN?>productos/index.php?accion=stock&id=<?=$_GET['id']?>" ><U>Stock</U></a></li>
					</ul>
				</li>
				</ul><br>
			</td>
		</tr>
	</table>
</div>


<? if($cambio == "nuevo") {
$comentario = "";
$idproveedor = "";
$cantidad = "";
$precio = "";	
	?>

<form name="producto" method="post" enctype="multipart/form-data" action="index.php?accion=insert_stock&idProducto=<?=$_GET['idProducto']?>">
<? }else{ ?>
<?foreach($movimientos as $movimiento):
$comentario = $movimiento['comentario'];
$idproveedor = $movimiento['idproveedor'];
$cantidad = $movimiento['cantidad'];
$precio = $movimiento['precio'];
$idcolor = $movimiento['idcolor'];
$idtalle = $movimiento['idtalle'];
endforeach;
?>
<form name="producto" method="post" enctype="multipart/form-data" action="index.php?accion=update_stock&id=<?= $_GET["id"]?>">
<? } ?>
<div class="pageTitle">
<?= $mensaje_cabezera?><br>
</div>
<table class="tabla_list" cellpadding=3 cellspacing=3  border="10">

	<tr>
		<td class="td_text">Comentario:</td><td class="td_area"><textarea name="comentario" rows="4" cols="80"  <?= $deshabilitado?>> <?=$comentario?></textarea></td>
	</tr>
	<tr>
		<td class="td_text">Cantidad:</td><td class="td_text"><input name="cantidad"  type="text" <?= $deshabilitado?> value="<?=$cantidad?>"></td>
	</tr>
	<tr>
		<td class="td_text">precio:</td><td class="td_text"><input name="precio"  type="text" <?= $deshabilitado?> value="<?=$precio?>"></td>
	</tr>
<tr>
		<td class="td_text">Talles:</td>
		<td colspan="2" class="td_text">
			<select name="idtalle">
		<option value="0">-Seleccione-</option>-->
		
      <?php
		  foreach($talles as $talle){ ?>
			<option value="<?=$talle['id'];?>" 
		<? if(!empty($_POST["idtalle"])){
			  if(@$_POST["idtalle"] == $talle['id']) echo "selected"; 
			}else{ 
			  if(@$idtalle == $talle['id']) echo "selected";
			 }?>
			><?=$talle['nombre'];?></option>
	  <? } ?>	
			</select>
	</tr>

	<tr>
		<td class="td_text">Colores:</td>
		<td colspan="2" class="td_text">
			<select name="idcolor">
		<option value="0">-Seleccione-</option>-->
		
      <?php
		  foreach($colores as $color){ ?>
			<option value="<?=$color['id'];?>" 
		<? if(!empty($_POST["idcolor"])){
			  if(@$_POST["idcolor"] == $color['id']) echo "selected"; 
			}else{ 
			  if(@$idcolor == $color['id']) echo "selected";
			 }?>
			><?=$color['nombre'];?></option>
	  <? } ?>	
			</select>
	</tr>

	<tr>
	<td class="submit" align="center" colspan="10" ><?if($boton== true){?><input type="submit" name="submit" value="GUARDAR" ><? } ?></td>
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

<script src="../../view/js/models/gen_validatorv2.js" language="javascript" type="text/javascript"></script>
<script src="../../view/js/validaciones/productos/modificacion.js" language="javascript" type="text/javascript"></script>

