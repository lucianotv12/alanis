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

<script type="text/javascript" src="<?=JS?>jquery-1.3.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
<script type="text/javascript" src="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript"> $(document).ready(function () {  
 $("a.classpopup").fancybox({  
 'width': '50%',  
 'height': '50%', 
 //'centerOnScroll':true, 
'autoScale'			: false,
'transitionIn'		: 'none',
'transitionOut'		: 'none',
'type': 'iframe',
/*'content':'<div>asdasdasdasdasdasdasdasdas</div>',*/
 'onClosed': function () {
				            parent.location.reload(true); ;}
	
 });  
 });  
  
 </script>
<!-- FANCYBOX -->
<?
if($_POST["editar"]):
	
$nombre_provincia = $_POST["nombre"];
$id_provincia = $_POST["id_provincia"];

	$query = mysql_query("UPDATE Provincias SET Descripcion = '$nombre_provincia' where idProvincia = $id_provincia") or die(mysql_error()); 
//		Producto::admin_subcategoria($_POST);
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
Administrador de Provincias<br>
</div>

<?if($_GET["accion"] == "editar"){ ?>

<form name="producto" method="post" enctype="multipart/form-data" >
<table cellpadding=3 cellspacing=1 border=0 width="80%" align="center" >
<input type="hidden" name="id_provincia" value="<?= $_GET["id_provincia"]?>">
<input type="hidden" name="nombre_provincia" value="<?= $_GET["nombre_provincia"]?>">

	<tr>
		<td class="td_text">Nombre :</td><td class="td_text"><input name="nombre" size="100px"  type="text" <?= $deshabilitado?> value="<?= $_GET["nombre_provincia"]?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

<!--	<tr>
		<td class="td_text">Activo :</td><td class="td_text">
		<select name="activo"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<option value="1" <? if($activo == 1) echo"selected";?>>Activo</option>
		<option value="0"  <? if($activo == 0) echo"selected";?>>No Activo</option>
		</select>
		</td>
	</tr>-->
	<tr>
	<td class="submit" align="center" colspan="10" ><input type="submit" name="editar" value="GUARDAR" ></td>
	</tr>
	</table>
</form>


<? } ?>
</div>
</div>

