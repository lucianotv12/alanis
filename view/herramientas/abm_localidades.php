<?
session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();

?>
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">
<script language="JavaScript" src="<?=JS?>funciones.js"></script>
<script type="text/javascript" src="<?=JS?>jquery-1.3.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
<script type="text/javascript" src="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>


<?
if($_POST["editar"]):
	
$nombre_localidad = $_POST["nombre"];
$id_localidad = $_POST["id_localidad"];

	$query = mysql_query("UPDATE Localidades SET Descripcion = '$nombre_localidad' where idLocalidad = $id_localidad") or die(mysql_error()); 
//		Producto::admin_subcategoria($_POST);
		?>
		<script language="javascript">
		parent.jQuery.fancybox.close();

		</script>
		<?

endif;
if($_POST["nuevo"]):
echo "entro al nuevo";
$nombre_localidad = $_POST["nombre"];
$id_provincia = $_POST["id_provincia"];

	$query = mysql_query("INSERT INTO Localidades VALUES (null, $id_provincia ,'$nombre_localidad',1)") or die(mysql_error()); 
//die();//		Producto::admin_subcategoria($_POST);
		?>
		<script language="javascript">
		parent.jQuery.fancybox.close();

		</script>
		<?

endif;


?>
<div class="contentArea"> 



<div class="header">

<div class="pageTitle">
Administrador de Localidades<br>
</div>

<? if($_GET["accion"] == "nuevo") {?>
<form name="producto" method="post" enctype="multipart/form-data" >
<table cellpadding=3 cellspacing=1 border=0 width="100%" align="center" >
<input type="hidden" name="id_provincia" value="<?= $_GET["id_provincia"]?>">

	<tr>
		<td class="td_text">Nombre :</td><td class="td_text"><input name="nombre"  type="text" <?= $deshabilitado?>  onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

	<tr>
		<td class="td_text">Activo :</td><td class="td_text">
		<select name="activo"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<option value="1" <? if($activo == 1) echo"selected";?>>Activo</option>
		<option value="0"  <? if($activo == 0) echo"selected";?>>No Activo</option>
		</select>
		</td>
	</tr>
	<tr>
	<td class="submit" align="center" colspan="10" ><input type="submit" name="nuevo" value="GUARDAR" ></td>
	</tr>
	</table>
</form>

<? }elseif($_GET["accion"] == "editar"){ ?>

<form name="producto" method="post" enctype="multipart/form-data" >
<table cellpadding=3 cellspacing=1 border=0 width="100%" align="center" >
<input type="hidden" name="id_localidad" value="<?= $_GET["id_localidad"]?>">
<input type="hidden" name="nombre_localidad" value="<?= $_GET["nombre_localidad"]?>">

	<tr>
		<td class="td_text">Nombre :</td><td class="td_text"><input name="nombre"  type="text" size="50px" <?= $deshabilitado?> value="<?= $_GET["nombre_localidad"]?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

<!--	<tr>
		<td class="td_text">Activo :</td><td class="td_text">
		<select name="activo"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<option value="1" <? if($activo == 1) echo"selected";?>>Activo</option>
		<option value="0"  <? if($activo == 0) echo"selected";?>>No Activo</option>
		</select>
		</td>
	</tr> -->
	<tr>
	<td class="submit" align="center" colspan="10" ><input type="submit" name="editar" value="GUARDAR" ></td>
	</tr>
	</table>
</form>


<? } ?>
</div>
</div>

