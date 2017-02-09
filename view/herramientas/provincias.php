
<?
session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();

?>
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
  
 $(document).ready(function () {  
 $("a.classpopup2").fancybox({  
 'width': '70%',  
 'height': '100%', 
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


Template::draw_header();
$query = mysql_query("select * from provincias order by Descripcion");
$provincias = array();
while ($row = @mysql_fetch_assoc($query))
{
$provincias[] = $row;
}
@mysql_free_result($query);

?>
<script language="JavaScript" src="<?=JS?>funciones.js"></script>



<div class="contentArea"> 


<form method="post" name="datos" enctype="multipart/form-data" >
<div class="pageTitle">
PROVINCIAS</div>
<br>
<table cellpadding=3 cellspacing=1 border=0 width="50%" align="center" >

	<tr>
		<th>id</th>
		<th>Nombre</th>
		<th>Localidades</th>
		<th>Editar</th>
	</tr>	
	<? $contador = 0;
	foreach ($provincias as $provincia):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>" width="100%">
		<td align="center" width="4%"><?= $provincia["idProvincia"] ?></td>
		<td  align="center"><?= $provincia["Descripcion"] ?></td>
		<td width="3%"><a class="classpopup2" href="localidades.php?accion=editar&id_provincia=<?= $provincia["idProvincia"]?>&nombre_provincia=<?= $provincia["Descripcion"] ?>"><img  src="<?= IMGS?>adm.gif"  border="0"></a></td>
		<td width="3%"><a class="classpopup" href="abm_provincias.php?accion=editar&id_provincia=<?= $provincia["idProvincia"]?>&nombre_provincia=<?= $provincia["Descripcion"] ?>"><img  src="<?= IMGS?>ver.gif"  border="0"></a></td>
	</tr>
<?	endforeach;?>

</table>
</form>
</div>
</div>
