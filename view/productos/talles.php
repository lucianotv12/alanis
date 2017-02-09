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
<script language="JavaScript">
<!--
function busqueda(buscador)
{

document.datos.action="index.php?accion=list&buscador=" + buscador ;
document.datos.submit();

}
//-->
</script>
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 
	<div class="logo">
	</div>
<div>
	<table width="100%" border=0 cellpadding=0 cellspacing=0>
		<tr>
			<td colspan="10">
				<ul id='menu'>
				<li ><a href='<?= ADMIN?>productos/index.php' >Listado de Productos</a></li>
				<li ><a  href="<?= ADMIN?>productos/index.php?accion=colores" >Colores</a></li>
				<li ><a class='current' href="<?= ADMIN?>productos/index.php?accion=talles" >Talles</a></li>
				</ul><br>
			</td>
		</tr>
	</table>
</div>


<form method="post" name="datos">
<div class="pageTitle">
LISTADO DE TALLES
</div>
<br>
<table cellpadding=5 cellspacing=0 border=1 width="90%" align="center" >

	<tr>
		<th>N°</th>
		<th>Nombre</th>
		<th>activo</th>
		<th>Ver</th>

		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($talles as $talle):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
		<td><?= $talle['id'] ?></td>
		<td><?= $talle['nombre'] ?></td>

		<td >
		<? if($talle['activo'] == 1) echo"Activo";else echo "No Activo";?>
		</select>
		</td>

		<td><a href="index.php?accion=talles&id=<?= $talle['id'] ?>">
		<img style="display:block;" src="<?= IMGS?>lupa.gif"  border="0" height ="20px" width="20px" >
		</a></td>

	</tr>
	<? endforeach ?>
	<tr>
		<td align="right" colspan="10"><a href="index.php?accion=talles&id=0">
		<img style="display:block;" src="<?= IMGS?>add.gif"  border="0" >
		</a></td>
	</tr>	
	</table>
</form>


<? if(!@$_GET["id"]){
	$id_talle = 0;	
	$msj_1 = "INGRESE NUEVO TALLE";
	}else{
	$msj_1 = "MODIFICAR TALLE SELECCIONADO";
	$id_talle = @$_GET["id"];		
	$talle = @Producto::get_talle_by_id($_GET["id"]);
	$nombre = $talle["nombre"];
	$activo = $talle["activo"];
	}	
	
	?>
<div class="pageTitle">
<tr><td><br></td></tr>

<?

?>
<?=$msj_1?><br>
</div>
<form name="disco" method="post" enctype="multipart/form-data" action="index.php?accion=talles_admin">
<table class="tabla_list" cellpadding=2 cellspacing=0 border=0 >
<input type="hidden" name="talle_id" value="<?=$_GET["id"] ?>">
<tr><td><br></td></tr>
	<tr>
		<td class="td_text">Nombre :</td><td class="td_text"><input name="nombre" size="35" type="text" <?= $deshabilitado?> value="<?=@$nombre?>"></td>
	</tr>

	<tr>
		<td class="td_text">Activo :</td>
		<td class="td_text">
		<select name="activo"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<option value="1" <? if($talle['activo'] == 1) echo"selected";?>>Activado</option>
		<option value="0"  <? if($talle['activo'] == 0) echo"selected";?>>Desactivado</option>
		</select>
		</td>
	</tr>


	<tr>
	<td class="submit" align="center" colspan="5" ><input type="submit" name="submit" value="GUARDAR"></td>
	</tr>
	</table>
	</form>
	</div>
	</div>
</form>


</div>
</div>
