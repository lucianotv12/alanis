
<?

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=AlanisLista.xls");

?>

<html>

<head>

<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />

<title>LISTA EXCEL ALANIS</title>

</head>
<body>

<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >

        <tr>
		<th>id</th>
		<th>Descripcion</th>
		<th>Referencia</th>                
		<th>Categoria</th>
		<th>Subcategoria</th>
		<th>Precio</th>
		</tr>
	<? $contador = 0;
	foreach ($productos as $producto):
	$contador++;
	?>
	<tr <? if($producto["activo"] != 1) echo 'style="color:#CCC"';?>   class="<?=($contador%2==0? "fila_par":"fila_impar");?>" width="100%">
		<td align="center" width="4%"><?= $producto["id"] ?></td>
		<td  width="63%" align="left"><?= $producto["descripcion"] ?></td>
		<td  width="10%" align="left"><?= $producto["referencia"] ?></td>
		<td  width="10%" ><?= $producto["categoria_nombre"]; ?></td>
		<td width="10%"><?= $producto["subcategoria_nombre"]; ?></td>
		<td align="center" width="7%">$<?= redondear_dos_decimal(Producto::get_precio_lista($producto["id"])) ?></td>

    </tr>
	<? endforeach;?>
	</table>
</body>
</html>
