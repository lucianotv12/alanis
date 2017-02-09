<?php
header('Content-Type: text/xml');
header ("Expires: Fri, 14 Mar 1980 20:53:00 GMT"); //la pagina expira en fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache"); 



$sql = "SELECT * FROM localidades ";
$sql .= " WHERE idProvincia = '$id' ";

$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {

$string = '';
$string = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
$string .= "<MARCAS>\n";

while ($row = mysql_fetch_assoc($result)){

$string .= "<LINEA>\n";
$string .= "<COL1>".$row["idLocalidad"]."</COL1>\n";
$string .= "<COL2>".$row["Descripcion"]."</COL2>\n";
$string .= "</LINEA>\n";


}

$string .= "</MARCAS>\n";

echo $string;

}

?>