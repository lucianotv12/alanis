<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Casa Alanis</title>
	<link rel="stylesheet" href="<?=CSS?>pro_drop_1.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">
    <link type="text/css" rel="stylesheet" href="<?=CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />
    <script type="text/javascript" src="<?= JS?>jquery-1.7.1.min.js"></script>
    <script type='text/javascript' src="<?= JS?>jquery-ui-1.8.17.custom.min.js"></script>

	<script language="JavaScript" src="<?=JS?>funciones.js"></script>
	<script src="<?=JS?>stuHover.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function(){
		$('#buscar_usuarios').autocomplete({
		source:"ajax.php"
				
		});
		
	});

</script> 

<div class="contentArea"> 


<form method="post" name="datos">
<div class="pageTitle">
LISTADO DE PRODUCTOS A IMPRIMIR
</div>
<br>
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><th colspan=20 align="left">
		INGRESE DATOS DEL PRODUCTO <input type="text" size="70" name="buscador" id="buscar_usuarios" value="<?= $_POST["buscador"]?>">
		<b>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('listado_productos_imprimir','<?= $_POST['buscador'] ?>')">BUSCAR</A>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('listado_productos_imprimir','TODOS')">TODOS</A>
		</b>
		&nbsp;&nbsp;&nbsp;
		<br>
		<FONT SIZE="1" COLOR="white">Buscar por : id, descripcion, categoria, subcategoria</FONT>
	</td></tr>
 	<tr><td><a href="javascript:imprSelec('seleccion')" ><font color="#FFFFFF">Imprimir Planilla</font></a>	</td></tr>   
</table>
<div id="seleccion">
	<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
    <tr>
		<th>id
			<a href="javaScript:ordenar_por('listado_productos_imprimir','id','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('listado_productos_imprimir','id','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Descripcion
			<a href="javaScript:ordenar_por('listado_productos_imprimir','descripcion','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('listado_productos_imprimir','descripcion','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Precio
			<a href="javaScript:ordenar_por('listado_productos_imprimir','precio','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('listado_productos_imprimir','precio','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		</th>

	</tr>
	<? $contador = 0;
	foreach ($productos as $producto):
	$contador++;
	?>
	<tr style="font-size:12px;" <? if($producto["activo"] != 1) echo 'style="color:#CCC"';?>   class="<?=($contador%2==0? "fila_par":"fila_impar");?>" width="100%">
		<td align="center" width="4%"><?= $producto["id"] ?></td>
		<td  width="88%" align="left"><?= $producto["descripcion"] ?></td>
		<td align="center" width="8%">$<?= redondear_dos_decimal(Producto::get_precio_lista($producto["id"])) ?></td>
	</tr>
	<? endforeach ?>

	</div>

   	</table>
</form>
</div>
</div>
