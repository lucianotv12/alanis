<?php

@mysql_connect("localhost","root","");
@mysql_select_db("control_alanis");

//$_GET["code"];
$idProvincia = $_GET["code"];
$query = "SELECT idLocalidad, descripcion from localidades where Activo = 1 and idProvincia = $idProvincia order by Descripcion";
$result_listado = mysql_query($query);
$localidades = array();
while ($row = @mysql_fetch_assoc($result_listado))
{
$localidades[] = $row;
}
@mysql_free_result($result_listado);
	
foreach($localidades as $localidad)
{
?>
	<option value="<?=$localidad["idLocalidad"];?>"><?=$localidad["descripcion"];?></option>
<?
}
?>