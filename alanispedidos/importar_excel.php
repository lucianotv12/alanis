
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>:: Importar de Excel a la Base de Datos ::</title>

</head>

<body>

<!– FORMULARIO PARA SOICITAR LA CARGA DEL EXCEL –>

Selecciona el archivo a importar:

<form name="importa" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >

<input type="file" name="excel" />

<input type='submit' name='enviar'  value="Importar"  />

<input type="hidden" value="upload" name="action" />

</form>

<!– CARGA LA MISMA PAGINA MANDANDO LA VARIABLE upload –>

<?php

extract($_POST);

if ($action == "upload"){
//    echo "aca entro"; die();

//cargamos el archivo al servidor con el mismo nombre

//solo le agregue el sufijo bak_

$archivo = $_FILES['excel']['name'];

$tipo = $_FILES['excel']['type'];

$destino = "bak_".$archivo;

if (copy($_FILES['excel']['tmp_name'],$destino)) echo "Archivo Cargado Con Éxito";

else echo "Error Al Cargar el Archivo";

////////////////////////////////////////////////////////

if (file_exists ("bak_".$archivo)){

/** Clases necesarias */

require_once("Classes/PHPExcel.php");

require_once("Classes/PHPExcel/Reader/Excel2007.php");

// Cargando la hoja de cálculo

$objReader = new PHPExcel_Reader_Excel2007();

$objPHPExcel = $objReader->load("bak_".$archivo);

$objFecha = new PHPExcel_Shared_Date();

// Asignar hoja de excel activa

$objPHPExcel->setActiveSheetIndex(0);

//conectamos con la base de datos

$cn = mysql_connect ("localhost","root","") or die ("ERROR EN LA CONEXION");

$db = mysql_select_db ("control_alanis",$cn) or die ("ERROR AL CONECTAR A LA BD");

// Llenamos el arreglo con los datos  del archivo xlsx

for ($i=1;$i<=2500;$i++){

$_DATOS_EXCEL[$i]['descripcion'] = mysql_real_escape_string($objPHPExcel->getActiveSheet()->getCell("A".$i)->getCalculatedValue());

$_DATOS_EXCEL[$i]['referencia'] = mysql_real_escape_string($objPHPExcel->getActiveSheet()->getCell("B".$i)->getCalculatedValue());

//$_DATOS_EXCEL[$i]['precio']= mysql_real_escape_string($objPHPExcel->getActiveSheet()->getCell("C".$i)->getCalculatedValue());


}
//id, idMoneda, idCategoria, idSubCategoria, descripcion, fechaCarga, idUsuario, activo, aviso_stock, precio, desc1, desc2, desc3, utilidad, iva, referencia
}

//si por algo no cargo el archivo bak_

else{echo "Necesitas primero importar el archivo";}

$errores=0;

//recorremos el arreglo multidimensional

//para ir recuperando los datos obtenidos

//del excel e ir insertandolos en la BD
$contador = 0;
foreach($_DATOS_EXCEL as $campo => $valor){

//$sql = "INSERT INTO productos (id, idMoneda,idCategoria,idSubcategoria,fechaCarga,idUsuario,activo,iva,utilidad,descripcion, precio, referencia) VALUES (NULL, '1', '24', '666', CURDATE(),'1','1','21','40', '";

// echo "campo : " . $campo . "  VALOR : " . $valor;
//echo "campo : " . $campo . "  VALOR : ";
//print_r($valor); echo "<br>";   
 $descripcion = $valor["descripcion"]; 
 $referencia = $valor["referencia"];
 
 if($descripcion != "" or $referencia != "" ):
        $query_consulta = "select * FROM productos where descripcion = '$descripcion'";    
        $result_consulta =  mysql_num_rows(mysql_query($query_consulta));

       if($result_consulta > 0):
            $sql = mysql_query("Update productos set referencia = '$referencia' where descripcion like '%$descripcion%'");
         //   echo $descripcion; die();
            $contador ++;    
       endif;
endif;       
//foreach ($valor as $campo2 => $valor2){

//die();    
//$campo2 == "referencia" ? $sql.= $valor2."');" : $sql.= $valor2."','";
//echo "campox : " . $campo2 . "  VALORx : " . $valor2 . "<br>";
//$sql = "Update productos set referencia = '$valor2' where descripcion like '%' ";
//$descripcion = $valor2;

//die();
//}

//$result = mysql_query($sql);
//if (!$result){ echo "Error al insertar registro ".$campo;$errores+=1;}

}

/////////////////////////////////////////////////////////////////////////

echo "<strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campo REGISTROS Y $contador CAMBIOS</center></strong>";

//una vez terminado el proceso borramos el

//archivo que esta en el servidor el bak_

unlink($destino);

}

?>

</body>

</html>



?>
