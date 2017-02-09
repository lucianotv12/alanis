<?php

/*include_once("funciones.php");
include_once("producto.class.php");
conectar_bd();
//echo "holaaaaa";

$_producto = new Producto();

echo json_encode($_producto->buscarProductoAjax($_GET['term']));

//echo "['luciano','tomas','verni']";

//print_r($productos = $_producto->buscarProductoAjax('TALADRO'));

foreach($productos as $producto):
//echo 'ENTRO';


echo $producto['descripcion'];

endforeach;
*/

@mysql_connect("localhost","root","");
@mysql_select_db("control_alanis");

	function buscarProductoAjax($palabra)
	{
		 $query=" Select P.descripcion, P.id, PC.nombre as categoria, PS.nombre as subcategoria from productos as P
			INNER JOIN productos_categorias PC ON P.idCategoria = PC.id
			INNER JOIN productos_subcategorias PS ON P.idSubCategoria = PS.id
			Where P.descripcion like '%$palabra%' or PC.nombre like '%$palabra%' or PS.nombre like '%$palabra%'
			Order By P.descripcion limit 500";
		
		$result = mysql_query($query) or die(mysql_error());
		
		$productos = array();
		while ($row = mysql_fetch_assoc($result)):
	//	echo "ACA ENTREEEE"	;
		$productos[] = array("value" => $row['descripcion'] ,
							 "id"	 =>	$row['id'],
							 "categoria"	 =>	$row['categoria'],
							 "subcategoria"	 =>	$row['subcategoria']
							);
	//	$productos[] = $row;	
		
		endwhile;
		@mysql_free_result($result);
		
		return($productos);
		 	
		
		
	}
echo json_encode(buscarProductoAjax($_GET['term']));



?>