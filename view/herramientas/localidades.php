
<?
session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();

?>
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

$id_provincia = $_GET["id_provincia"];

$query = mysql_query("select * from localidades where idProvincia = $id_provincia order by idProvincia, Descripcion");
$localidades = array();
while ($row = @mysql_fetch_assoc($query))
{
$localidades[] = $row;
}
@mysql_free_result($query);

?>
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">
<script language="JavaScript" src="<?=JS?>funciones.js"></script>



<div class="contentArea"> 


<form method="post" name="datos" enctype="multipart/form-data" >
<div class="pageTitle">
Localidades de <?=$_GET["nombre_provincia"] ?></div>
<br>
<table cellpadding=3 cellspacing=1 border=0 width="80%" align="center" >
	<tr>
		<td align="left" colspan="10"><a href="abm_localidades.php?accion=new">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>
	</tr>	
	<tr>
		<th>id</th>
		<th>Nombre</th>
		<th>Editar</th>
<!--		<th>Borrar</th>-->
	</tr>	
	<? $contador = 0;
	foreach ($localidades as $localidad):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>" width="100%">
		<td align="center" width="4%"><?= $localidad["idLocalidad"] ?></td>
		<td  align="center"><?= $localidad["Descripcion"] ?></td>
		<td width="3%"><a class="classpopup" href="abm_localidades.php?accion=editar&id_localidad=<?= $localidad["idLocalidad"]?>&nombre_localidad=<?= $localidad["Descripcion"] ?>"><img  src="<?= IMGS?>ver.gif"  border="0"></a></td>
<!--		<td align="center" width="2%"><a href="javaScript:pregunta('<?= $producto["id"]?>','la Localidad', 'delete')"><img  src="<?= IMGS?>del.gif"  border="0"></a></td>-->
	</tr>
<?	endforeach;?>

	<tr>
		<td align="left" colspan="10"><a class="classpopup" href="abm_localidades.php?accion=nuevo&id_provincia=<?=$id_provincia;?>">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>
	</tr>	
</table>
</form>
</div>
</div>
