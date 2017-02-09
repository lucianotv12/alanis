<?php

session_start();

include_once("../../funciones.php");


validar_permanencia();
conectar_bd();


//$_GET["code"];
$idCategoria = $_GET["code"];

if($_GET["code"] != "-1" and $_GET["code"] != "-2"):
	
	$query = "SELECT id, nombre from productos_subcategorias where activo = 1 and idCategoria = $idCategoria order by Descripcion";
	$result_listado = mysql_query($query);
	$subcategorias = array();
	while ($row = @mysql_fetch_assoc($result_listado))
	{
	$subcategorias[] = $row;
	}
	@mysql_free_result($result_listado);
?>      <option value="0">Todas las Categorias</option><?        
	foreach($subcategorias as $subcategorias):
	?>
		<option value="<?=$subcategorias["id"];?>"><?=$subcategorias["nombre"];?></option>
	<?
	endforeach;
	?>
<?  
elseif($_GET["code"] == "-1"):
	?>
		<option value="-1">Seleccione una categoria</option>
	<?

elseif($_GET["code"] == "-2"):
	?>
		<option value="-2">Todos los Productos</option>
	<?


endif;
?>

