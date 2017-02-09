<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();


?>
<html>
<head>
<!--<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">-->
</head>
<script language="javascript">

function pon_prefijo(nombre,descuento,condicion_iva) {
	parent.document.datos.descripcion.value=nombre;
	parent.document.datos.descuento.value=descuento;
	parent.document.datos.condicion_iva.value=condicion_iva;
	
}

function limpiar() {
	parent.document.datos.descripcion.value="";
	parent.document.datos.descuento.value="";
	parent.document.datos.condicion_iva.value="";	
	parent.document.datos.idcliente.value="";
}

</script>
<body>
<?
	if($_GET["idcliente"]):
	
		$idcliente=$_GET["idcliente"];
		 $consulta="SELECT * FROM clientes WHERE id='$idcliente'";
		$rs_tabla = mysql_query($consulta);
		if (mysql_num_rows($rs_tabla)>0) {
			?>
			<script languaje="javascript">
			pon_prefijo("<? echo mysql_result($rs_tabla,0,nombre) ?>","<? echo mysql_result($rs_tabla,0,descuento) ?>","<? echo mysql_result($rs_tabla,0,condicion_iva) ?>");
			</script>
			<? 
		} else { ?>
		<script>
		alert ("No existe ningun cliente con ese codigo");
		limpiar();
		</script>
		<? }
	endif;
?>
</div>
</body>
</html>
