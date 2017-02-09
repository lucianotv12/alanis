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

function pon_prefijo(descripcion,precio) {
	parent.document.datos.detalle_producto.value=descripcion;
	parent.document.datos.precio_producto.value=precio;

}

function limpiar() {
	parent.document.datos.detalle_producto.value="";
	parent.document.datos.precio_producto.value="";
	parent.document.datos.idproducto.value="";
	patent.document.datos.idproducto.focus();
}

</script>
<body>
<?
	if($_GET["idproducto"]):
	
		$idproducto=$_GET["idproducto"];	
		$consulta="SELECT * FROM productos WHERE id='$idproducto'";
		$rs_tabla = mysql_query($consulta);
		if (mysql_num_rows($rs_tabla)>0) {
			?>
			<script languaje="javascript">
			pon_prefijo("<? echo mysql_real_escape_string(mysql_result($rs_tabla,0,descripcion)) ?>","<? echo redondear_dos_decimal(Producto::get_precio_lista(mysql_result($rs_tabla,0,id)))  ?>");
			</script>
			<? 
		} else { ?>
		<script>
		alert ("No existe ningun producto con ese codigo");
		limpiar();
		</script>
		<? }
	endif;//idproducto
?>
</div>
</body>
</html>
