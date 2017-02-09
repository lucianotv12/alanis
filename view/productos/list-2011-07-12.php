
<div class="contentArea"> 


<form method="post" name="datos">
<div class="pageTitle">
LISTADO DE PRODUCTOS 
</div>
<br>
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><th colspan=20 align="left">
		INGRESE DATOS DEL PRODUCTO <input type="text" size="70" name="buscador" value="<?= $_POST["buscador"]?>">
		<b>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('<?= $_POST['buscador'] ?>')">BUSCAR</A>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('TODOS')">TODOS</A>
		</b>
		&nbsp;&nbsp;&nbsp;<input name="LISTADO DE PRECIOS" type="button" value="LISTADO DE PRECIOS" onCLICK="javascript:popUp('index.php?accion=listado_precios')" />
		<br>
		<FONT SIZE="1" COLOR="white">Buscar por : id, descripcion, categoria, subcategoria</FONT>
	</td></tr>

	<tr>
		<th>id
			<a href="javaScript:ordenar_por('id','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('id','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Descripcion
			<a href="javaScript:ordenar_por('descripcion','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('descripcion','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Categoria
			<a href="javaScript:ordenar_por('categoria_nombre','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('categoria_nombre','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Subcategoria
			<a href="javaScript:ordenar_por('subcategoria_nombre','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('subcategoria_nombre','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Precio
			<a href="javaScript:ordenar_por('precio','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('precio','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		</th>
		<th>Stock</th>
		<th>+ Info</th>

		<th>Borrar</th>
		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($productos as $producto):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>" width="100%">
		<td align="center" width="4%"><?= $producto["id"] ?></td>
		<td  width="63%" align="left"><?= $producto["descripcion"] ?></td>
		<td  width="10%" ><?= $producto["categoria_nombre"]; ?></td>
		<td width="10%"><?= $producto["subcategoria_nombre"]; ?></td>
		<td align="center" width="7%"><?=$producto["simbolo"];?><?= redondear_dos_decimal(Producto::get_precio_lista($producto["id"])) ?></td>
		<td align="center" width="3%"><?= Producto::aviso_stock_cantidad($producto["id"]) ?></td>

		<td width="3%"><a href="index.php?accion=modify&id=<?= $producto["id"] ?>">
		<img  src="<?= IMGS?>lupa.gif"  border="0" height ="20px" width="20px" >
		</a></td>

<!--		<td><a href="index.php?accion=codigo_barras&id=<?= $producto["id"] ?>">
		<img  src="<?= IMGS?>codigo_barras.jpg"  border="0" height ="20px" width="20px" >
		</a></td>-->

		<td align="center" width="2%"><a href="javaScript:pregunta('<?= $producto["id"]?>','el Producto', 'delete')">
		<img  src="<?= IMGS?>eliminar.png"  border="0">
		</a></td>
	</tr>
	<? endforeach ?>
	<tr>
		<td align="left" colspan="10"><a href="index.php?accion=new">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>
	</tr>	

	</table>
</form>
</div>
</div>
