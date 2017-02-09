<?php

class Producto 
{
	var $id; 
	var $idCategoria; 
	var $idSubCategoria; 
	var $descripcion; 
	var $fechaCarga; 
	var $idUsuario; 
	var $activo; 
	var $aviso_stock;
	var $desc1;
	var $desc2;
	var $desc3;
	var $utilidad;	
	var $iva;	
	var $idMoneda;	

	function Producto($_id=0) 
	{ 
		if ($_id<>0) 
		{
		$query_carga= "select * from productos where id=$_id"; 
		$result_carga = mysql_query($query_carga); 
		$datos_carga = mysql_fetch_assoc($result_carga); 
		$this->id = $datos_carga['id']; 
		$this->idCategoria = $datos_carga['idCategoria']; 
		$this->idSubCategoria = $datos_carga['idSubCategoria']; 
		$this->descripcion = $datos_carga['descripcion']; 
		$this->fechaCarga = $datos_carga['fechaCarga']; 
		$this->idUsuario = $datos_carga['idUsuario']; 
		$this->activo = $datos_carga['activo']; 
		$this->aviso_stock = $datos_carga['aviso_stock'];
		$this->precio = $datos_carga['precio'];
		$this->desc1 = $datos_carga['desc1']; 
		$this->desc2 = $datos_carga['desc2'];
		$this->desc3 = $datos_carga['desc3'];
		$this->utilidad = $datos_carga['utilidad'];
		$this->iva = $datos_carga['iva'];
		$this->idMoneda = $datos_carga['idMoneda'];



		} 
	}
	function save() 
	{//Guarda o inserta segun corresponda 
		if ($this->id<>0) 
			{ 
			$query_save = "update productos set idMoneda = '$this->idMoneda', idCategoria = '$this->idCategoria', idSubCategoria = '$this->idSubCategoria', descripcion = '$this->descripcion', fechaCarga = '$this->fechaCarga', idUsuario = '$this->idUsuario', activo = '$this->activo', aviso_stock = '$this->aviso_stock', precio = '$this->precio', desc1 = '$this->desc1', desc2 = '$this->desc2', desc3 = '$this->desc3', utilidad = '$this->utilidad', iva = '$this->iva' where id='$this->id'";
			mysql_query($query_save) or die(mysql_error()); 
			}
		else
			{
			$query_save = "insert into productos values (null, '$this->idMoneda', '$this->idCategoria','$this->idSubCategoria', '$this->descripcion', '$this->fechaCarga', '$this->idUsuario', '$this->activo', '$this->aviso_stock', '$this->precio', '$this->desc1', '$this->desc2', '$this->desc3', '$this->utilidad', '$this->iva')";
			mysql_query($query_save) or die(mysql_error()); 
			$this->id = mysql_insert_id(); 
			} 
	}
	
	function erase()
		{//Borra el CONTACTO, segun el ID, 
		if ($this->id<>0)
			{
				$query_erase = "DELETE FROM productos WHERE id = $this->id ";
				mysql_query($query_erase) or die(mysql_error());
			}
		
		}	

	function nuevo_producto($_PARAM)
	{
		$producto = new Producto ();
		$producto->set_idCategoria($_POST['idCategoria']);
		$producto->set_idSubCategoria($_POST['idSubCategoria']);
		$producto->set_descripcion($_POST['descripcion']);
		$producto->set_precio($_POST['precio']);
		$producto->set_fechaCarga('0');
		$producto->set_idUsuario($_PARAM['idUsuario']);
		$producto->set_activo(1);
		$producto->set_aviso_stock($_PARAM['aviso_stock']);
		$producto->set_precio($_PARAM['precio']);
		$producto->set_desc1($_PARAM['desc1']);
		$producto->set_desc2($_PARAM['desc2']);
		$producto->set_desc3($_PARAM['desc3']);
		$producto->set_utilidad($_PARAM['utilidad']);
		$producto->set_iva($_PARAM['iva']);
		$producto->set_idMoneda($_PARAM['idMoneda']);
		$producto->save();

	
	}

	function get_productos($start=0, $end=0,$busqueda=0,$ordenar=0,$tipo_orden=0)
	{
		if($start==0 and $end== 0)	$limit ="" ; else $limit = "LIMIT $start , $end";
		if($busqueda) $whereclause = " where P.id like '%$busqueda%' or P.descripcion like '%$busqueda%' or PC.nombre like '%$busqueda%' or PS.nombre like '%$busqueda%' "; else $whereclause ="";
		if($ordenar) $order_clause = $ordenar; else $order_clause = "id";
		if($tipo_orden) $order_tipo = $tipo_orden; else $order_tipo = "ASC";

		$query_listado = "Select P.*, PC.nombre as categoria_nombre, PS.nombre as subcategoria_nombre, M.simbolo 
						FROM productos P 
						INNER JOIN productos_categorias PC ON P.idCategoria = PC.id  
						INNER JOIN productos_subcategorias PS ON P.idSubCategoria = PS.id
						left join monedas as M ON M.id = P.idMoneda $whereclause 
						order by $order_clause $order_tipo $limit";
		$result_listado = mysql_query($query_listado);
		$productos = array();
		while ($dato_producto = @mysql_fetch_assoc($result_listado))
		{
		$productos[] = $dato_producto;
		}
		@mysql_free_result($result_listado);
		return($productos);
	}

	function avisos_stock()
	{
		$query="SELECT id,codigo from productos ";
		$result= mysql_query($query);
		while ($row = mysql_fetch_assoc($result))
		{ 
			$query_avisos="SELECT SUM(cantidad) AS cantidad_total, aviso_stock FROM productos AS P inner join productos_stock as PS ON PS.idProducto = P.codigo WHERE codigo = '".$row["codigo"]. "' group by codigo";
			$result_avisos = mysql_query($query_avisos);
			if($row_avisos = mysql_fetch_assoc($result_avisos))
			{
#				if($row_avisos["cantidad_total"] < $row_avisos["aviso_stock"])
#				{	
				ECHO "<FONT SIZE=3 COLOR=red>EL CODIGO TIENE FALTANTES : <A HREF='http://localhost/control_stock/admin/productos/index.php?accion=detail&id=".$row["id"]."'>" . $row["codigo"] . "</a> TIENE DE STOCK : ".$row_avisos["cantidad_total"]." </FONT><br>";
				
#				}
			}
		}

	}


	function avisos_stock_bis()
	{
		//SELECCIONO TODOS LOS PRODUCTOS
		$query="SELECT id,codigo from productos ";
		$result= mysql_query($query);
		?><TABLE border="1">
		<TR>
			<TH>CODIGO</TH>
			<TH>COLOR</TH>
			<TH>TALLE</TH>
			<TH>CANTIDAD TOTAL</TH>
		</TR>
		<? $contador = 0;
		while ($row = mysql_fetch_assoc($result))
		{  //recorro todos los productos 1 por 1

			// AHORA SE RECORRO LOS COLORES
			$query_color="SELECT * FROM colores";
			$result_color= mysql_query($query_color);
			while ($row_color = mysql_fetch_assoc($result_color))
			{

				$query_talle="SELECT * FROM talles";
				$result_talle= mysql_query($query_talle);
				while ($row_talle = mysql_fetch_assoc($result_talle))
				{


					$query_avisos="SELECT SUM(cantidad) AS cantidad_total, aviso_stock FROM productos AS P inner join productos_stock as PS ON PS.idProducto = P.codigo WHERE codigo = '".$row["codigo"]. "' and idcolor = '".$row_color["id"]. "' and idtalle = '".$row_talle["id"]. "' group by codigo";
					$result_avisos = mysql_query($query_avisos);
					if($row_avisos = mysql_fetch_assoc($result_avisos))
					{
						if($row_avisos["cantidad_total"] < $row_avisos["aviso_stock"])
						{	
						//	ECHO "<FONT SIZE=3 COLOR=blue>EL PRODUCTO <A HREF='http://localhost/control_stock/admin/productos/index.php?accion=detail&id=".$row["id"]."'>" . $row["codigo"] . "</a> COLOR : ".$row_color["nombre"]." TALLE : ".$row_talle["nombre"]." TIENE DE STOCK : ".$row_avisos["cantidad_total"]." </FONT><br>";
						$contador++;
						?>
						<TR class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
							<TD><A HREF='<?=ADMIN?>productos/index.php?accion=detail&id=<?=$row["id"]?>'><?= $row["codigo"];?></a></TD>
							<TD><?= $row_color["nombre"];?></TD>
							<TD><?= $row_talle["nombre"];?></TD>
							<TD><?= $row_avisos["cantidad_total"];?></TD>							
						</TR>
						<?
						}
					}
				}//END WHILE TALLES
			}//END WHILE COLORES
		}//EN DWHILE PRODUCTOS
		?></TABLE><?
	}


	function avisos_listado_stock()
	{
		//SELECCIONO TODOS LOS PRODUCTOS
		$query="SELECT id,codigo from productos ";
		$result= mysql_query($query);
		?><TABLE border="1">
		<TR>
			<TH>CODIGO</TH>
			<TH>COLOR</TH>
			<TH>TALLE</TH>
			<TH>CANTIDAD TOTAL</TH>
			<TH>STOCK BAJO MINIMO</TH>

		</TR>
		<? $contador = 0;
		while ($row = mysql_fetch_assoc($result))
		{  //recorro todos los productos 1 por 1
		$contador++;

			// AHORA SE RECORRO LOS COLORES
			$query_color="SELECT * FROM colores";
			$result_color= mysql_query($query_color);
			while ($row_color = mysql_fetch_assoc($result_color))
			{

				$query_talle="SELECT * FROM talles";
				$result_talle= mysql_query($query_talle);
				while ($row_talle = mysql_fetch_assoc($result_talle))
				{


					$query_avisos="SELECT SUM(cantidad) AS cantidad_total, aviso_stock FROM productos AS P inner join productos_stock as PS ON PS.idProducto = P.codigo WHERE codigo = '".$row["codigo"]. "' and idcolor = '".$row_color["id"]. "' and idtalle = '".$row_talle["id"]. "' group by codigo";
					$result_avisos = mysql_query($query_avisos);
					if($row_avisos = mysql_fetch_assoc($result_avisos))
					{
						//if($row_avisos["cantidad_total"] < $row_avisos["aviso_stock"])
						//{	
						//	ECHO "<FONT SIZE=3 COLOR=blue>EL PRODUCTO <A HREF='http://localhost/control_stock/admin/productos/index.php?accion=detail&id=".$row["id"]."'>" . $row["codigo"] . "</a> COLOR : ".$row_color["nombre"]." TALLE : ".$row_talle["nombre"]." TIENE DE STOCK : ".$row_avisos["cantidad_total"]." </FONT><br>";
						?>
						<TR class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
							<TD><A HREF='<?=ADMIN?>productos/index.php?accion=detail&id=<?=$row["id"]?>'><?= $row["codigo"];?></a></TD>
							<TD><?= $row_color["nombre"];?></TD>
							<TD><?= $row_talle["nombre"];?></TD>
							<TD><?= $row_avisos["cantidad_total"];?></TD>
							<TD><?= $row_avisos["aviso_stock"];?></TD>
						</TR>
						<?
						//}
					}
				}//END WHILE TALLES
			}//END WHILE COLORES
		}//EN DWHILE PRODUCTOS
		?></TABLE><?
	}

	function producto_stock($codigo_producto, $idcolor, $idtalle,$cantidad)
	{// DEVUELVE SI EL PRODUCTO TIENE STOCK DISPONIBLE O NO
		$query="SELECT SUM(cantidad) AS cantidad_total FROM productos AS P inner join productos_stock as PS ON PS.idProducto = P.codigo WHERE codigo = '".$codigo_producto. "' and idcolor = '".$idcolor. "' and idtalle = '".$idtalle. "' group by codigo";
		$result = mysql_query($query);	
		
		if($row = mysql_fetch_assoc($result))
		{
			if($row["cantidad_total"] > $cantidad)
				{
				return("ok");
				}
			else
				{
				return($row["cantidad_total"]);
				}
		}

	}

	function get_listado_precios()
	{
		$query="SELECT * from productos where activo = 1 ";
		$result= mysql_query($query);
		$productos = array();
		while ($dato_producto = @mysql_fetch_assoc($result))
		{
		$productos[] = new Producto($dato_producto["id"]);
		}
		@mysql_free_result($result);
		return($productos);
	
	
	
	}


	function aviso_stock_cantidad($_codigo)
	{
			$query_avisos="SELECT SUM(cantidad) AS cantidad_total, aviso_stock FROM productos AS P inner join productos_stock as PS ON PS.idProducto = P.id WHERE P.id = '".$_codigo. "' group by P.id	";
			$result_avisos = mysql_query($query_avisos);
			if($row_avisos = mysql_fetch_assoc($result_avisos))
			{
				if($row_avisos["cantidad_total"] < $row_avisos["aviso_stock"])
					{
					ECHO "<FONT SIZE=3 COLOR=red>".$row_avisos["cantidad_total"]." </FONT><br>";
					}
				else
					{
					ECHO "<FONT SIZE=3 COLOR=green>".$row_avisos["cantidad_total"]." </FONT><br>";				
					}
			}

	}

	function total_productos()
	{
	$query_all = "select id from productos";
	$result_all = mysql_query($query_all) or die(mysql_error());
	$nrows = mysql_num_rows($result_all);	
	return($nrows);
	}


	function movimientos_stock($id_producto)
	{
		$query = "select PS.id, PM.movimiento, PS.cantidad, PS.precio, C.nombre as color, T.nombre as talle
					from productos_stock AS PS
					inner join productos_movimientos as PM ON PM.id = PS.idMovimiento
					inner join talles as T ON T.id = PS.idtalle
					inner join colores as C ON C.id = PS.idcolor
					where idProducto =  " . $id_producto;
	
		$result = mysql_query($query) or die(mysql_error());

		$movimientos = array();
		while ($dato_producto = @mysql_fetch_assoc($result))
		{
		$movimientos[] = $dato_producto;
		}
		@mysql_free_result($result);

		return($movimientos);
	
	}

	function detalle_movimiento_stock($id_movimiento)
	{
		$query = "select * from productos_stock where id = " . $id_movimiento;
	
		$result = mysql_query($query) or die(mysql_error());

		$movimientos = array();
		while ($dato_producto = @mysql_fetch_assoc($result))
		{
		$movimientos[] = $dato_producto;
		}
		@mysql_free_result($result);

		return($movimientos);
	
	}
	
	function modificar_stock($mov,$id_stock, $_PARAM)
	{
		if($mov == 1)
			{
			$comentario = $_PARAM["comentario"];
			$cantidad = $_PARAM["cantidad"];
			$precio = $_PARAM["precio"];

			$query_save = "update productos_stock set  comentario = '$comentario', cantidad = '$cantidad',  precio = '$precio' where id='$id_stock'";
			mysql_query($query_save) or die(mysql_error()); 
			}
		elseif($mov == 2)
			{
			$comentario = $_PARAM["comentario"];
			$cantidad = $_PARAM["cantidad"];
			$precio = $_PARAM["precio"];
			$idcolor = $_PARAM["idcolor"];
			$idtalle = $_PARAM["idtalle"];

			$query_save = "insert into productos_stock (id, idProducto, comentario, idMovimiento, cantidad, fechaCarga, idUsuario, precio,idcolor,idtalle) values (null,'$id_stock','$comentario', 1 , '$cantidad', 0, 0, '$precio', '$idcolor', '$idtalle')"; 
			mysql_query($query_save) or die(mysql_error()); 
			}
		elseif($mov == 3)
			{ 
			$idstock = substr($_PARAM["codigo_barras"],0,-4);
//			$idcolor = substr($_PARAM["codigo_barras"],-8,2); 	
//			$idtalle = substr($_PARAM["codigo_barras"],-6,2); 	
			$precio1 = substr($_PARAM["codigo_barras"],-4,2);
			$precio2 = substr($_PARAM["codigo_barras"],-2,2);

			$precio = $precio1 . "." . $precio2;
			$comentario = $_PARAM["comentario"];
			$cantidad = $_PARAM["cantidad"];
			
			$stock = mysql_num_rows( mysql_query ("Select id From productos WHERE id = '" .$idstock."'"));		
	//		$color = mysql_num_rows( mysql_query ("Select id From colores WHERE id = '" .$idcolor."'"));		
	//		$talle = mysql_num_rows( mysql_query ("Select id From talles WHERE id = '" .$idtalle."'"));		
			
				if(!$stock)
				{
					return("El Codigo del Producto no esta registrado");				

				}
				else
				{
					$query_save = "insert into productos_stock (id, idProducto, comentario, idMovimiento, cantidad, fechaCarga, idUsuario, precio) values (null,'$idstock','$comentario', 1 , '$cantidad', 0, 0, '$precio')";
					mysql_query($query_save) or die(mysql_error());
					return("El ingreso de mercaderia se registro  correctamente");
				}
	
			}
	
	}

	/*CATEGORIAS***********************************************************/
	
	function get_categorias($start=0, $end=0,$busqueda=0,$id_categoria=0)
	{
		if($start==0 and $end== 0)	$limit ="" ; else $limit = "LIMIT $start , $end";
		if($busqueda) $whereclause = " and codigo = '$busqueda'"; else $whereclause ="";
		if($id_categoria)$whereclause2 = " and id = $id_categoria"; else $whereclause2 = "";

		$query_listado = "Select * FROM productos_categorias where 1 $whereclause $whereclause2 order by id $limit";
		$result_listado = mysql_query($query_listado);
		$categorias = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$categorias[] = $row;
		}
		@mysql_free_result($result_listado);
		return($categorias);
	}
	
	function nueva_categoria($paramentros)
	{
	$nombre = $paramentros['nombre'];
	$descripcion = $paramentros['descripcion'];
	$activo = $paramentros['activo'];	
		$query ="insert into productos_categorias values('','$nombre','$descripcion','$activo')";
		mysql_query($query);	
	}

	function update_categoria($_id,$paramentros)
	{
	$nombre = $paramentros['nombre'];
	$descripcion = $paramentros['descripcion'];
	$activo = $paramentros['activo'];	
		$query ="UPDATE productos_categorias set nombre = '$nombre', descripcion = '$descripcion', activo = '$activo' where id = '$_id'";
		mysql_query($query);	
	}

	function get_categorias_combo()
	{
		$query = "SELECT * from productos_categorias where activo = 1  order by nombre";
		$result_listado = mysql_query($query);
		$categorias = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$categorias[] = $row;
		}
		@mysql_free_result($result_listado);
		return($categorias);	
	}
	function delete_categoria($_id)
	{
			$query_erase = "DELETE FROM productos_categorias WHERE id = $_id ";
			mysql_query($query_erase) or die(mysql_error());
	
	}


	/*CATEGORIAS***********************************************************/

	/*SUBCATEGORIAS***********************************************************/
	
	function get_subcategorias($id_categoria=0)
	{
		if($id_categoria)$whereclause2 = " and idCategoria = $id_categoria"; else $whereclause2 = "";

		$query_listado = "Select * FROM productos_subcategorias where 1 $whereclause2 order by id ";
		$result_listado = mysql_query($query_listado);
		$subcategorias = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$subcategorias[] = $row;
		}
		@mysql_free_result($result_listado);
		return($subcategorias);
	}
	function get_subcategoria_byid($id_categoria=0)
	{
		if($id_categoria)$whereclause2 = " and id = $id_categoria"; else $whereclause2 = "";

		$query_listado = "Select * FROM productos_subcategorias where 1 $whereclause2 order by id ";
		$result_listado = mysql_query($query_listado);
		$subcategorias = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$subcategorias[] = $row;
		}
		@mysql_free_result($result_listado);
		return($subcategorias);
	}

	function delete_subcategoria($_id)
	{
			$query_erase = "DELETE FROM productos_subcategorias WHERE id = $_id ";
			mysql_query($query_erase) or die(mysql_error());
	
	}	

	function admin_subcategoria($paramentros)
	{
	$idSub = $paramentros['id'];
	$idCategoria = $paramentros['idCategoria'];
	$nombre = $paramentros['nombre'];
	$descripcion = $paramentros['descripcion'];
	$activo = $paramentros['activo'];	
	$cambio= $paramentros['cambio'];	
		if($cambio == "nuevo"):
			$query ="insert into productos_subcategorias values('','$idCategoria','$nombre','$descripcion','$activo')";
			mysql_query($query);	
		elseif($cambio == "modificar"):
			$query ="UPDATE productos_subcategorias set nombre = '$nombre', descripcion = '$descripcion', activo = '$activo' where id = '$idSub'";
			mysql_query($query);	
		endif;

	}


	/****************MODIFICACION DE PRECIOS****************************/
	function modificacion_precios($_PARAM)
	{//ENTRO AL SUBMITArray ( [radio] => 1 [idCategoria] => 5 [idSubCategoria] => 15 [cantidad] => [tipo_valor] => 1 [submit] => Generar ) 
		$idCategoria = $_PARAM["idCategoria"];
		$idSubCategoria = $_PARAM["idSubCategoria"];
		switch  ($_PARAM["radio"]):		
			case 1 :
					$campo = "utilidad";
					$monto_modificable = $_PARAM["cantidad_utilidad"];
					break;
			case 2 :
					$campo = "desc1";
					$monto_modificable = $_PARAM["cantidad_descuento"];
					break;
			case 3 :
					$campo = "desc2";
					$monto_modificable = $_PARAM["cantidad_descuento"];
					break;
			case 4 :
					$campo = "desc3";
					$monto_modificable = $_PARAM["cantidad_descuento"];
					break;
			case 5 :
					$campo = "precio";
					$monto_modificable = $_PARAM["cantidad_precio"];
					break;
		endswitch;
		
		if($_PARAM["idCategoria"] == "-2") $whereclause = "";
		elseif($_PARAM["idCategoria"] != "-2" and $_PARAM["idSubCategoria"] == 0 ) $whereclause = "where idCategoria = $idCategoria ";
		elseif($_PARAM["idCategoria"] != "-2" and $_PARAM["idSubCategoria"] != 0 ) $whereclause = "where idCategoria = $idCategoria and idSubCategoria = $idSubCategoria ";					

		$query = mysql_query("select id, $campo from productos $whereclause ") or die(mysql_error());

		while( $row = mysql_fetch_assoc($query)):
			$campo_modificable = $row["$campo"]; 
			$id_campo = $row["id"]; 			
			switch($_PARAM["tipo_valor"]):
				case 1: 
					if($campo != "precio"):
						$nuevo_precio = $campo_modificable + $monto_modificable;	
					elseif($campo == "precio"):
						$nuevo_precio = $campo_modificable + ( $campo_modificable * $monto_modificable / 100);						
					endif;
					break;			
				case 2: 
					if($campo != "precio"):
						$nuevo_precio = $campo_modificable - $monto_modificable;	
					elseif($campo == "precio"):
						$nuevo_precio = $campo_modificable - ( $campo_modificable * $monto_modificable / 100);		
					endif;
					break;
				case 3: 
					$nuevo_precio = $monto_modificable;	
					break;
			endswitch;
				
			mysql_query("update productos set $campo = $nuevo_precio where id = $id_campo");
//echo "update  productos set $campo = $nuevo_precio where id = $id_campo";		
		endwhile;
		
//		die();
	
	}

	/****************MODIFICACION DE PRECIOS****************************/

	/*SUBCATEGORIAS***********************************************************/

	function get_monedas()
	{

		$query_listado = "Select * FROM monedas where activo = 1 order by id ";
		$result_listado = mysql_query($query_listado);
		$monedas = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$monedas[] = $row;
		}
		@mysql_free_result($result_listado);
		return($monedas);
	}

	/*---GETTERS--------------------------------------------------------------*/ 
	function get_id() { return($this->id); } 
	function get_idCategoria() { return($this->idCategoria); } 
	function get_idSubCategoria() { return($this->idSubCategoria); } 
	function get_descripcion() { return($this->descripcion); } 
	function get_fechaCarga() { return($this->fechaCarga); } 
	function get_idUsuario() { return($this->idUsuario); } 
	function get_activo() { return($this->activo); } 
	function get_aviso_stock() { return($this->aviso_stock); } 
	function get_precio() { return($this->precio); } 
	function get_desc1() { return($this->desc1); } 
	function get_desc2() { return($this->desc2); } 
	function get_desc3() { return($this->desc3); } 
	function get_utilidad() { return($this->utilidad); } 
	function get_iva() { return($this->iva); } 
	function get_idMoneda() { return($this->idMoneda); } 
	function get_idTalle() { return($this->idTalle); } 
	function get_idColor() { return($this->idColor); } 	

	function get_precio_lista($_id){
	$producto_actual = new Producto($_id);

	$desc1_desc = $producto_actual->get_precio() - ($producto_actual->get_precio() * $producto_actual->get_desc1() / 100);

	$desc2_desc = $desc1_desc - ($desc1_desc * $producto_actual->get_desc2() / 100);

	$desc3_desc = $desc2_desc - ($desc2_desc * $producto_actual->get_desc3() / 100);	
	
	$precio_utilidad = $desc3_desc + ($desc3_desc * $producto_actual->get_utilidad() / 100);
	$precio_iva = $precio_utilidad + ($precio_utilidad * $producto_actual->get_iva() / 100);
	return($precio_iva);
	//$precio_desc
	}	

	/*------------------------------------------------------------------------*/ 
	/*---SETTERS--------------------------------------------------------------*/ 
	function set_id($_id) { $this->id = $_id; } 
	function set_idCategoria($_idCategoria) { $this->idCategoria = $_idCategoria; } 
	function set_idSubCategoria($_idSubCategoria) { $this->idSubCategoria = $_idSubCategoria; } 
	function set_descripcion($_descripcion) { $this->descripcion = $_descripcion; } 
	function set_fechaCarga($_fechaCarga) { $this->fechaCarga = $_fechaCarga; } 
	function set_idUsuario($_idUsuario) { $this->idUsuario = $_idUsuario; } 
	function set_activo($_activo) { $this->activo = $_activo; } 
	function set_aviso_stock($_aviso_stock) { $this->aviso_stock = $_aviso_stock; }
	function set_precio($_precio) { $this->precio = $_precio; }
	function set_desc1($_desc1) { $this->desc1 = $_desc1; }
	function set_desc2($_desc2) { $this->desc2 = $_desc2; }
	function set_desc3($_desc3) { $this->desc3 = $_desc3; }
	function set_utilidad($_utilidad) { $this->utilidad = $_utilidad; }	
	function set_iva($_iva) { $this->iva = $_iva; }	
	function set_idMoneda($_idMoneda) { $this->idMoneda = $_idMoneda; }	
	function set_idTalle($_idTalle) { $this->idTalle = $_idTalle; }
	function set_idColor($_idColor) { $this->idColor = $_idColor; }
	/*------------------------------------------------------------------------*/ 
	
} 

?>