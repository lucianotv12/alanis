<?php


//fijo el date de hoy
$date_month = date('m');
$date_year = date('Y');
$date_day = date('d');
$Date = "$date_year-$date_month-$date_day";

//Archivo
$filename = "mydb_$Date.sql";

//Datos BD
$usuario = "root";
$passwd = "";
$bd = "control_alanis";

header("Pragma: no-cache");
header("Expires: 0");
header("Content-Transfer-Encoding: binary");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=$filename");

// Utilización del script para windows o unix. Activar las lineas depende de cada caso

//windows
//$executa = "c:\\xampp\\mysql\\bin\\mysqldump.exe -u $usuario --password=$passwd --opt $bd";
//system($executa, $resultado);

//para Unix
//$executa = "mysqldump -u $usuario --password=$passwd --opt $bd";
// /opt/lampp/bin/mysqldump
$executa = "/opt/lampp/bin/mysqldump -u $usuario --password=$passwd --opt $bd";
system($executa, $resultado);


if ($resultado) { echo "<H1>Error ejecutando comando: $executa</H1>\n"; }

?>
