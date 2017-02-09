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
	var $referencia;	
	var $fechaActualizacion;	
	var $bulto;	
	var $iva_10;	

        
	function Producto($_id=0) 
	{ 
		if ($_id<>0) 
		{
		$conn = new Conexion();

		$sql = $conn->prepare("select * from productos where id=:ID"); 
		$sql->execute(array('ID' => $_id));
		$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);

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
		$this->referencia = $datos_carga['referencia'];
		$this->fechaActualizacion = $datos_carga['fechaActualizacion'];
		$this->bulto = $datos_carga['bulto'];
		$this->iva_10 = $datos_carga['iva_10'];

		$sql=null;
		$conn=null;

		} 
	}
	function save() 
	{//Guarda o inserta segun corresponda 
		$conn = new Conexion();

		if ($this->id<>0) 
			{ 
			$sql = $conn->prepare("update productos set idMoneda = '$this->idMoneda', idCategoria = '$this->idCategoria', idSubCategoria = '$this->idSubCategoria', descripcion = '$this->descripcion', fechaCarga = '$this->fechaCarga', idUsuario = '$this->idUsuario', activo = '$this->activo', aviso_stock = '$this->aviso_stock', precio = '$this->precio', desc1 = '$this->desc1', desc2 = '$this->desc2', desc3 = '$this->desc3', utilidad = '$this->utilidad', iva = '$this->iva', referencia = '$this->referencia', fechaActualizacion = '$this->fechaActualizacion', bulto = '$this->bulto', iva_10 = '$this->iva_10' where id='$this->id'");
			$sql->execute();
			
			}
		else
			{
			 $sql = $conn->prepare("insert into productos values (null, '$this->idMoneda', '$this->idCategoria','$this->idSubCategoria', '$this->descripcion', CURDATE(), '$this->idUsuario', '$this->activo', '$this->aviso_stock', '$this->precio', '$this->desc1', '$this->desc2', '$this->desc3', '$this->utilidad', '$this->iva', '$this->referencia', '$this->fechaActualizacion','$this->bulto', '$this->iva_10')");
			$sql->execute();
			$this->id = $conn->lastInsertId();
			} 
		$sql=null;
		$conn=null;	
	}
	
	function erase()
		{//Borra el CONTACTO, segun el ID, 
		if ($this->id<>0)
			{

				$conn = new Conexion();
				$sql = $conn->prepare("DELETE FROM productos WHERE id = $this->id ");
				$sql->execute();
			}
		
		}	

	function nuevo_producto($_PARAM)
	{ 
		$producto = new Producto ();
		$producto->set_idCategoria($_POST['idCategoria']);
		$producto->set_idSubCategoria($_POST['idSubCategoria']);
		$producto->set_descripcion($_POST['descripcion']);
		$producto->set_precio($_POST['precio']);
		$producto->set_fechaCarga('');
		$producto->set_idUsuario($_PARAM['idUsuario']);
		$producto->set_activo($_PARAM['activo']);
		$producto->set_aviso_stock($_PARAM['aviso_stock']);
		$producto->set_precio($_PARAM['precio']);
		$producto->set_desc1($_PARAM['desc1']);
		$producto->set_desc2($_PARAM['desc2']);
		$producto->set_desc3($_PARAM['desc3']);
		$producto->set_utilidad($_PARAM['utilidad']);
		$producto->set_iva($_PARAM['iva']);
		$producto->set_idMoneda($_PARAM['idMoneda']);
		$producto->set_referencia($_PARAM['referencia']);                
		$producto->set_fechaActualizacion(0);                                
		$producto->set_bulto($_PARAM['bulto']);                                
		$producto->set_iva_10($_PARAM['iva_10']);                                
		$producto->save();

	
	}

	function get_productos($start=0, $end=0,$busqueda=0,$ordenar=0,$tipo_orden=0, $listado=null)
	{
		if($listado == "listado") $activo_clause = " AND P.activo = 1";
		if($start==0 and $end== 0)	$limit ="" ; else $limit = "LIMIT $start , $end";
		if($busqueda):
		 		$busqueda = mysql_real_escape_string($busqueda);

		//		$whereclause =" AND ";
				$whereclause = " AND P.id like '%$busqueda%' or P.descripcion like '%$busqueda%' or P.referencia like '%$busqueda%' or PC.nombre like '%$busqueda%' or PS.nombre like '%$busqueda%' ";				
		//SPLIT DE BUSQUEDAS whereclause2
				$busquedas = split(" ",$busqueda);		
				$contador = 0;
				foreach($busquedas as $busqueda):
				if($contador == 0) $whereclause2 .= " AND ("; else $whereclause2 .= " OR";
				
					$whereclause2 .= " P.id like '%$busqueda%' or P.descripcion like '%$busqueda%' or P.referencia like '%$busqueda%' or PC.nombre like '%$busqueda%' or PS.nombre like '%$busqueda%' ";				
				$contador++;
				endforeach;
					$whereclause2 .= ") ";
		//SPLIT DE BUSQUEDAS
						
		//	 
		else: 
		$whereclause ="";
		$whereclause2 ="";
		endif;
		if($ordenar) $order_clause = $ordenar; else $order_clause = "id";
		if($tipo_orden) $order_tipo = $tipo_orden; else $order_tipo = "ASC";

		$conn = new Conexion();

		$sql = $conn->prepare("Select P.*, PC.nombre as categoria_nombre, PS.nombre as subcategoria_nombre, M.simbolo, DATE_FORMAT(P.fechaActualizacion,'%d/%m/%Y') as fechaActualizacion_muestra
						FROM productos P 
						left JOIN productos_categorias PC ON P.idCategoria = PC.id  
						left JOIN productos_subcategorias PS ON P.idSubCategoria = PS.id
						left join monedas as M ON M.id = P.idMoneda
						WHERE 1
						$whereclause 
						$activo_clause
						order by $order_clause $order_tipo $limit");
		$sql->execute();

		 $resultado = $sql->fetchAll();


		$conn = null;
		$sql = null;
		return $resultado;
	}

	/*BUSCAR PRODUCTOS AJAX
	FUNCION QUE UTILIZA AUTOCOMPLETE
	*/
	function buscarProductoAjax($palabra)
	{
		$palabra = mysql_real_escape_string($palabra);
                $palabras = explode(" ", $palabra);
                $whereclause_referencia ="";
                $contador = 0;
                foreach($palabras as $palabras_separada ):
                    
                  if($contador == 0):
                      $whereclause_referencia .= "OR ( P.referencia like '%$palabras_separada%' ";
                      $whereclause_id .= " OR P.id like '%$palabras_separada%' ";
                  
                  endif;
                   
                  $whereclause_descripcion .= " AND P.descripcion like '%$palabras_separada%' ";
                  if($contador > 0):
                      $whereclause_referencia .= " AND P.referencia like '%$palabras_separada%' ";
                  endif;
                  
                  $contador++;
                endforeach;
                $whereclause_referencia .= " )";


		$conn = new Conexion();

		$sql = $conn->prepare(" Select P.descripcion, P.id, PC.nombre as categoria, PS.nombre as subcategoria, P.referencia from productos as P
			INNER JOIN productos_categorias PC ON P.idCategoria = PC.id
			INNER JOIN productos_subcategorias PS ON P.idSubCategoria = PS.id
                        WHERE 1 $whereclause_descripcion $whereclause_referencia $whereclause_id  $whereclause_categoria $whereclause_subcategoria
			Order By P.descripcion limit 50");
		$sql->execute();
	 	$result = $sql->fetchAll();
		
		$productos = array();
		foreach($result as $row):
	

		$productos[] = array("value" => $row['descripcion'] ,
							 "descripcion" => $row['descripcion'] ,
							 "id"	 =>	$row['id'],
							 "referencia" => $row['referencia'],                    
							 "categoria"	 =>	$row['categoria'],
							 "subcategoria"	 =>	$row['subcategoria'],
							 "precio"		=> redondear_dos_decimal(Producto::get_precio_lista($row['id']))
							);

		endforeach;	
		$sql=null;
		$conn=null;
		
		return($productos);
		 	
		
		
	}


	/*BUSCAR PRODUCTOS AJAX
	FUNCION QUE UTILIZA AUTOCOMPLETE
	*/
	function buscarProductoAjax_factura($palabra)
	{
		$palabra = mysql_real_escape_string($palabra);
                $palabras = explode(" ", $palabra);
                $whereclause_referencia ="";
                $contador = 0;
                foreach($palabras as $palabras_separada ):
                    
                  if($contador == 0):
                      $whereclause_referencia .= "OR ( P.referencia like '%$palabras_separada%' ";
                      $whereclause_id .= " OR P.id like '%$palabras_separada%' ";
                  
                  endif;
                   
                  $whereclause_descripcion .= " AND P.descripcion like '%$palabras_separada%' ";
                  if($contador > 0):
                      $whereclause_referencia .= " AND P.referencia like '%$palabras_separada%' ";
                  endif;
                  
                  $contador++;
                endforeach;
                $whereclause_referencia .= " )";

		$conn = new Conexion();

		$sql = $conn->prepare(" Select P.descripcion, P.id, PC.nombre as categoria, PS.nombre as subcategoria, P.referencia from productos as P
			INNER JOIN productos_categorias PC ON P.idCategoria = PC.id
			INNER JOIN productos_subcategorias PS ON P.idSubCategoria = PS.id
                        WHERE 1 $whereclause_descripcion $whereclause_referencia $whereclause_id  $whereclause_categoria $whereclause_subcategoria
			Order By P.descripcion limit 50");
	 	
		$sql->execute();
	 	$result = $sql->fetchAll();
		
		$productos = array();
		foreach($result as $row):

	// ARREGLAR EL TEMA DEL VALUEEEE, PONER SOLO DESCRIPCION EN EL LIST.
		$productos[] = array("value" => $row['id'] . ' - ' .
										$row['descripcion'] ,
							 "descripcion" => $row['descripcion'] ,
							 "id"	 =>	$row['id'],
							 "referencia" => $row['referencia'],                    
							 "categoria"	 =>	$row['categoria'],
							 "subcategoria"	 =>	$row['subcategoria'],
							 "precio"		=> redondear_dos_decimal(Producto::get_precio_lista($row['id']))
							);
		
		endforeach;
		$sql=null;
		$conn=null;
		
		return($productos);
		 			
	}


	function total_productos($busqueda=0)
	{ 
	if($busqueda) $whereclause = " where P.id like '%$busqueda%' or P.descripcion like '%$busqueda%' or PC.nombre like '%$busqueda%' or PS.nombre like '%$busqueda%' "; else $whereclause ="";

		$conn = new Conexion();

		$sql = $conn->prepare("select count(P.id) as cuenta from productos P
				INNER JOIN productos_categorias PC ON P.idCategoria = PC.id  
				INNER JOIN productos_subcategorias PS ON P.idSubCategoria = PS.id
				$whereclause");
		$sql->execute();


		$nrows = $sql->fetch(PDO::FETCH_ASSOC);

		$sql=null;
		$conn=null;

		return($nrows["cuenta"]); 

	}

	function modificar_importe($_id, $precio, $desc1, $desc2, $desc3, $utilidad, $iva, $referencia,$bulto,$usuario)
	{
		$precio = mysql_real_escape_string($precio);
		$desc1 = mysql_real_escape_string($desc1);
		$desc2 = mysql_real_escape_string($desc2);
		$desc3 = mysql_real_escape_string($desc3);
		$utilidad = mysql_real_escape_string($utilidad);
		$iva = mysql_real_escape_string($iva);
		$referencia = mysql_real_escape_string($referencia);                
		$bulto = mysql_real_escape_string($bulto);                
		$_id = mysql_real_escape_string($_id);
                $descripcion = new Producto($_id);
                $descripcion = $descripcion->get_descripcion();

		$conn = new Conexion();

		$sql = $conn->prepare("UPDATE productos set precio = '$precio',desc1 = '$desc1',desc2 = '$desc2',desc3 = '$desc3',utilidad = '$utilidad', iva='$iva', referencia = '$referencia', bulto = '$bulto', fechaActualizacion = curdate() WHERE id= $_id");
		$sql->execute();
     


	$producto_actual = new Producto($_id);
        $idCategoria = $producto_actual->get_idCategoria();
        $idSubCategoria = $producto_actual->get_idSubCategoria();
        
        // GUARDO REGISTRO EN LOG
        $sql = $conn->prepare("INSERT INTO productos_movimientos_log (id, idProductoMovimiento, descripcion, idUsuario, idCategoria, idSubCategoria, fecha, hora, MovimientoTipo) values (NULL, '9', '$descripcion','$usuario', '$idCategoria', '$idSubCategoria', CURDATE(), CURTIME(),2)");
        $sql->execute();
        
		
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
	

	/*CATEGORIAS***********************************************************/
	
	function get_categorias($start=0, $end=0,$busqueda=0,$id_categoria=0)
	{
		if($start==0 and $end== 0)	$limit ="" ; else $limit = "LIMIT $start , $end";
		if($busqueda) $whereclause = " and PC.codigo = '$busqueda'"; else $whereclause ="";
		if($id_categoria)$whereclause2 = " and PC.id = $id_categoria"; else $whereclause2 = "";
		$conn = new Conexion();

		$sql = $conn->prepare("Select PC.*,DATE_FORMAT(PC.fechaActualizacion,'%d/%m/%Y') as fechaActualizacion ,C.nombre as proveedor_categoria, C.id as id_proveedor  
                                FROM productos_categorias AS PC 
                                left join proveedores_categorias as PR on PC.id = PR.idCategoria 
                                left join clientes as C ON C.id = PR.idProveedor 
                                where 1 $whereclause $whereclause2 order by PC.id $limit");

		$sql->execute();
    	$resultado = $sql->fetchAll();

		$conn = null;
		$sql = null;
		return $resultado;

	}
	
	function nueva_categoria($paramentros)
	{
	$nombre = $paramentros['nombre'];
	$descripcion = $paramentros['descripcion'];
      	$dolar = $paramentros['dolar'];
        $activo = $paramentros['activo'];
        $proveedor = $paramentros['proveedor'];
//        $fechaActualizacion = $paramentros['proveedor'];
	
		$conn = new Conexion();

		$sql = $conn->prepare("insert into productos_categorias values('','$nombre','$descripcion','$activo','$dolar',CURDATE())");
		$sql->execute();
		$insert = $conn->lastInsertId();			
        
        if($proveedor != 0): 
           $sql = $conn->prepare("insert into proveedores_categorias values('$proveedor','$insert')");
           $sql->execute(); 
        endif;

        $sql=null;
        $conn=null;
        
        }

	function update_categoria($_id,$paramentros)
	{
	$nombre = $paramentros['nombre'];
	$descripcion = $paramentros['descripcion'];
      	$dolar = $paramentros['dolar'];
	$activo = $paramentros['activo'];	
        $proveedor = $paramentros['proveedor'];
//        $fechaActualizacion = $paramentros['proveedor'];

        
    	$conn = new Conexion();

		$sql = $conn->prepare("UPDATE productos_categorias set nombre = '$nombre', descripcion = '$descripcion', activo = '$activo', dolar = '$dolar' where id = '$_id'");
		$sql->execute();

        $sql = $conn->prepare("delete from proveedores_categorias where idCategoria ='$_id'");    
        $sql->execute();
        $sql = $conn->prepare("insert into proveedores_categorias values('$proveedor','$_id')");
        $sql->execute();
            
        
        }

	function get_categorias_combo()
	{
		$conn = new Conexion();

		$sql = $conn->prepare("SELECT * from productos_categorias where activo = 1  order by nombre");
		$sql->execute();
		$resultado = $sql->fetchAll();
		$sql=null;
		$conn=null;

		return($resultado);

	}
	function delete_categoria($_id)
	{
		$conn = new Conexion();

		$sql = $conn->prepare("DELETE FROM productos_categorias WHERE id = $_id ");
		$sql->execute();
	
	}


	/*CATEGORIAS***********************************************************/

	/*SUBCATEGORIAS***********************************************************/
	
	function get_subcategorias($id_categoria=0)
	{
		if($id_categoria)$whereclause2 = " and PS.idCategoria = $id_categoria"; else $whereclause2 = "";

		$conn = new Conexion();

		$sql = $conn->prepare("Select PS.*,DATE_FORMAT(PS.fechaActualizacion,'%d/%m/%Y') as fechaActualizacion, C.nombre as proveedor_subcategoria
                                  FROM productos_subcategorias as PS
                                  left join proveedores_subcategorias as PR on PS.id = PR.idSubCategoria 
                                  left join clientes as C ON C.id = PR.idProveedor 
                                  where 1 $whereclause2 order by PS.id ");
		$sql->execute();
    	$resultado = $sql->fetchAll();

		$conn = null;
		$sql = null;
		return $resultado;
	}
	function get_subcategoria_byid($id_categoria=0)
	{
		if($id_categoria)$whereclause2 = " and id = $id_categoria"; else $whereclause2 = "";
		$conn = new Conexion();

		$sql = $conn->prepare("Select * FROM productos_subcategorias where 1 $whereclause2 order by id ");
		$sql->execute();
	    	$resultado = $sql->fetchAll();

		$conn = null;
		$sql = null;
		return $resultado;
	}

	function delete_subcategoria($_id)
	{
		$conn = new Conexion();

		$sql = $conn->prepare("DELETE FROM productos_subcategorias WHERE id = $_id ");
		$sql->execute();

		$sql=null;
		$conn=null;
	
	}	

	function admin_subcategoria($paramentros)
	{
	$idSub = $paramentros['id'];
	$idCategoria = $paramentros['idCategoria'];
	$nombre = $paramentros['nombre'];
	$descripcion = $paramentros['descripcion'];
	$dolar = $paramentros['dolar'];        
	$activo = $paramentros['activo'];	
	$cambio= $paramentros['cambio'];	
        $proveedor = $paramentros['proveedor'];
        
		if($cambio == "nuevo"):
			
			$conn = new Conexion();

			$sql = $conn->prepare("insert into productos_subcategorias values('','$idCategoria','$nombre','$descripcion','$activo', '$dolar',CURDATE())");
			$sql->execute();	
			$insert = $conn->lastInsertId();

            if($proveedor != 0): 
                $sql = $conn->prepare("insert into proveedores_subcategorias values('$proveedor','$insert')");
				$sql->execute();
            endif;                        
                        
		elseif($cambio == "modificar"):
			$sql = $conn->prepare("UPDATE productos_subcategorias set nombre = '$nombre', descripcion = '$descripcion', activo = '$activo', dolar = '$dolar' where id = '$idSub'");
			$sql->execute();	

            $sql = $conn->prepare("delete from proveedores_subcategorias where idSubCategoria ='$idSub'");    
            $sql->execute();
            $sql = $conn->prepare("insert into proveedores_subcategorias values('$proveedor','$idSub')");
            $sql->execute();
                        
		endif;

			$sql=null;
			$conn=null;
	}


	/****************MODIFICACION DE PRECIOS****************************/
	function modificacion_precios($_PARAM)
	{		                 
				$conn = new Conexion();
		$idCategoria = $_PARAM["idCategoria"];
		$idSubCategoria = $_PARAM["idSubCategoria"];
		$idUsuario = $_PARAM["idUsuario"];

		switch  ($_PARAM["tipo_valor"]):
			case 1 : $tipo_valor_txt = "Aumento % "; break;
			case 2 : $tipo_valor_txt = "Disminucion % "; break;
			case 3 : $tipo_valor_txt = "Procentaje exacto %"; break;

		endswitch;

		switch  ($_PARAM["radio"]):		
			case 1 :
					$campo = "utilidad";
					$monto_modificable = $_PARAM["cantidad_utilidad"];
					$id_movimiento = 3;
					break;
			case 2 :
					$campo = "desc1";
					$monto_modificable = $_PARAM["cantidad_descuento"];
					$id_movimiento = 4;
					break;
			case 3 :
					$campo = "desc2";
					$monto_modificable = $_PARAM["cantidad_descuento"];
					$id_movimiento = 5;
					break;
			case 4 :
					$campo = "desc3";
					$monto_modificable = $_PARAM["cantidad_descuento"];
					$id_movimiento = 6;
					break;
			case 5 :
					$campo = "precio";
					$monto_modificable = $_PARAM["cantidad_precio"];
					$id_movimiento = 7;
					break;
			case 6 :
					$campo = "iva";
					$monto_modificable = $_PARAM["cantidad_iva"];
					$id_movimiento = 8;
                                        $_PARAM["tipo_valor"] = 3;
					break;                                    
		endswitch;

		if($_PARAM["idCategoria"] == "-2"):
                    $whereclause = ""; // si selecciono todos los productos
		// inicio log de registros
		$descripcion_log = "$tipo_valor_txt $monto_modificable";


				$sql = $conn->prepare("INSERT INTO productos_movimientos_log (id, idProductoMovimiento, descripcion, idUsuario, idCategoria, idSubCategoria, fecha, hora, MovimientoTipo) values (NULL, '$id_movimiento', '$descripcion_log','$idUsuario', '$idCategoria', '$idSubCategoria', CURDATE(), CURTIME(),1)");
                $sql->execute();
                else:
                    if($_PARAM["idSubCategoria"]): // si selecciono subcategorias

                        if(in_array("0", $_PARAM["idSubCategoria"])):  //si encontro 0en el array subcategorias
                            $whereclause = "where idCategoria = $idCategoria ";
                            // inicio log de registros
                            $descripcion_log = "$tipo_valor_txt $monto_modificable";
                            $sql = $conn->prepare("INSERT INTO productos_movimientos_log (id, idProductoMovimiento, descripcion, idUsuario, idCategoria, idSubCategoria, fecha, hora, MovimientoTipo) values (NULL, '$id_movimiento', '$descripcion_log','$idUsuario', '$idCategoria', '0', CURDATE(), CURTIME(),1)");
                            $sql->execute();
                            $sql = $conn->prepare("UPDATE productos_categorias set fechaActualizacion = curdate() WHERE id = $idCategoria ");
                            $sql->execute();
                            $sql = $conn->prepare("UPDATE productos set fechaActualizacion = curdate() WHERE idCategoria = $idCategoria ");
                            $sql->execute();
                        else:  
                            $whereclause = " where idCategoria = $idCategoria ";  
                            $contador_categorias= 0;
                            foreach($_PARAM["idSubCategoria"] as $categoria):
             	                $sql = $conn->prepare("UPDATE productos_subcategorias set fechaActualizacion = curdate() WHERE id = $categoria ");
                                $sql->execute();
                                $sql = $conn->prepare("UPDATE productos set fechaActualizacion = curdate() WHERE idSubCategoria = $categoria ");
                            	$sql->execute();
                                if($contador_categorias == 0):
                                    $whereclause .= " AND ( idSubCategoria = $categoria" ; 
                                else:
                                    $whereclause .= " OR idSubCategoria = $categoria" ;                                     
                                endif;
                               $contador_categorias++;
                                // inicio log de registros
                                $descripcion_log = "$tipo_valor_txt $monto_modificable";
                                $sql = $conn->prepare("INSERT INTO productos_movimientos_log (id, idProductoMovimiento, descripcion, idUsuario, idCategoria, idSubCategoria, fecha, hora, MovimientoTipo) values (NULL, '$id_movimiento', '$descripcion_log','$idUsuario', '$idCategoria', '$categoria', CURDATE(), CURTIME(),1)");
                                $sql->execute();
                               
                            endforeach;
                            
                            $whereclause .= " )";
                            
                            
                        endif;
                    endif;
                endif;
                

		// fin log de registros
            $sql = $conn->prepare("select id, $campo from productos $whereclause ");
            $sql->execute();
            $query =$sql->fetchAll();
//echo		$query = "select id, $campo from productos $whereclause "; die();
                
		
		foreach($query as $row):
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
				
			$sql = $conn->prepare("update productos set $campo = $nuevo_precio where id = $id_campo");
			$sql->execute();
		endforeach;
		
	
	}

	/****************MODIFICACION DE PRECIOS****************************/

	/*SUBCATEGORIAS***********************************************************/

	function get_monedas()
	{
		$conn = new Conexion();

		$sql = $conn->prepare("Select * FROM monedas where activo = 1 order by id ");
		$sql->execute();
		$resultado = $sql->fetchAll();
		$sql=null;
		$conn=null;

		return($resultado);
	}
	function get_moneda_producto($_id = 0)
	{
           if($_id):
               $whereclause = " id= $_id AND ";
           else:    
               $whereclause = " ";
           endif;

		$conn = new Conexion();

		$sql = $conn->prepare("Select simbolo FROM monedas where $whereclause activo = 1 order by id");
		$sql->execute();

		$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);                
        return($datos_carga["simbolo"]);
                
		
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
	function get_referencia() { return($this->referencia); }         
	function get_idMoneda() { return($this->idMoneda); } 
	function get_fechaActualizacion() { return($this->fechaActualizacion); } 
	function get_bulto() { return($this->bulto); } 
	function get_iva_10() { return($this->iva_10); } 


	function get_precio_lista($_id){
		$conn = new Conexion();

		$producto_actual = new Producto($_id);
		// agrego el bulto
                if($producto_actual->get_bulto() > 1):
                    $precio_bulto = $producto_actual->get_precio() / $producto_actual->get_bulto(); 
                else:   
                    $precio_bulto = $producto_actual->get_precio();
                endif;

		$desc1_desc = $precio_bulto - ($precio_bulto * $producto_actual->get_desc1() / 100);

		$desc2_desc = $desc1_desc - ($desc1_desc * $producto_actual->get_desc2() / 100);

		$desc3_desc = $desc2_desc - ($desc2_desc * $producto_actual->get_desc3() / 100);	
		
		$precio_utilidad = $desc3_desc + ($desc3_desc * $producto_actual->get_utilidad() / 100);
		$precio_iva = $precio_utilidad + ($precio_utilidad * $producto_actual->get_iva() / 100);

		if($producto_actual->get_idMoneda() == 2):
                    $dolar_subcategoria = $producto_actual->get_subCategoria_dolar($producto_actual->get_idSubCategoria());
                    $dolar_categoria = $producto_actual->get_categoria_dolar($producto_actual->get_idCategoria());
                        if($dolar_subcategoria != NULL and $dolar_subcategoria != 0):
                            $dolar_actual = $dolar_subcategoria;                    
                        elseif($dolar_categoria != NULL and $dolar_categoria != 0):    
                            $dolar_actual = $dolar_categoria;                        
                        else:    
							$sql = $conn->prepare("select cotizacion from monedas where id = 2");
							$sql->execute();
							$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  
                            $dolar_actual = $datos_carga["cotizacion"];

                        endif;
		
                        $precio_iva = $precio_iva * $dolar_actual;


		endif; //if dolar

		if($producto_actual->get_idMoneda() == 5):
			$sql = $conn->prepare("select cotizacion from monedas where id = 5");
			$sql->execute();
			$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  
            $dolar_actual = $datos_carga["cotizacion"];
			
			$precio_iva = $precio_iva * $dolar_actual;

		endif; //if EURO

		return($precio_iva);
		//$precio_desc
	}	
        
	function get_precio_lista_dolar($_id){
		$producto_actual = new Producto($_id);
		// agrego el bulto
                if($producto_actual->get_bulto() > 1):
                    $precio_bulto = $producto_actual->get_precio() / $producto_actual->get_bulto(); 
                else:   
                    $precio_bulto = $producto_actual->get_precio();
                endif;

		$desc1_desc = $precio_bulto - ($precio_bulto * $producto_actual->get_desc1() / 100);

		$desc2_desc = $desc1_desc - ($desc1_desc * $producto_actual->get_desc2() / 100);

		$desc3_desc = $desc2_desc - ($desc2_desc * $producto_actual->get_desc3() / 100);	
		
		$precio_utilidad = $desc3_desc + ($desc3_desc * $producto_actual->get_utilidad() / 100);
		$precio_iva = $precio_utilidad + ($precio_utilidad * $producto_actual->get_iva() / 100);


		return($precio_iva);
		//$precio_desc
	}	        

	function get_precio_lista_sin_iva($_id){
		$producto_actual = new Producto($_id);

		$desc1_desc = $producto_actual->get_precio() - ($producto_actual->get_precio() * $producto_actual->get_desc1() / 100);

		$desc2_desc = $desc1_desc - ($desc1_desc * $producto_actual->get_desc2() / 100);

		$desc3_desc = $desc2_desc - ($desc2_desc * $producto_actual->get_desc3() / 100);	
		
		$precio_utilidad = $desc3_desc + ($desc3_desc * $producto_actual->get_utilidad() / 100);
	//	$precio_iva = $precio_utilidad + ($precio_utilidad * $producto_actual->get_iva() / 100);

		if($producto_actual->get_idMoneda() == 2):
                    $dolar_subcategoria = $producto_actual->get_subCategoria_dolar($producto_actual->get_idSubCategoria());
                    $dolar_categoria = $producto_actual->get_categoria_dolar($producto_actual->get_idCategoria());
                        if($dolar_subcategoria != NULL or $dolar_subcategoria > 0):
                            $dolar_actual = $dolar_subcategoria;                    
                        elseif($dolar_categoria != NULL and $dolar_categoria > 0):    
                            $dolar_actual = $dolar_categoria;                        
                        else:    
                            $dolar_actual = mysql_result(mysql_query("select cotizacion from monedas where id = 2"),0,0);

                        endif;
		
                        $precio_iva = $precio_iva * $dolar_actual;

		endif; //if dolar


		return($precio_utilidad);
		//$precio_desc
	}	
        
        function get_categoria_dolar($idcategoria)
        {
       //     return  mysql_result(mysql_query("SELECT dolar FROM productos_categorias where id = $idcategoria"),0,0);            

			$conn = new Conexion();

			$sql = $conn->prepare("SELECT dolar FROM productos_categorias where id = $idcategoria");
			$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  
            $resultado = $datos_carga["dolar"];
			$sql=null;
			$conn=null;

			return($resultado);

            
        }

        function get_subCategoria_dolar($idsubcategoria)
        {
         //  return  mysql_result(mysql_query("SELECT dolar FROM productos_subcategorias where id = $idsubcategoria"),0,0);            

			$conn = new Conexion();

			$sql = $conn->prepare("SELECT dolar FROM productos_subcategorias where id = $idsubcategoria");
			$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  
            $resultado = $datos_carga["dolar"];
			$sql=null;
			$conn=null;

			return($resultado);

            
        }        
        
        function get_color_fecha($fecha)
        {
            //DEVUELVE EL COLOR QUE LE CORRESPONDE, SEGUN SU ACTUALIZACION, +2MESES ROJO, -1 MES VERDE, +1MES NARANJA
         $fecha_actual = date('Y-m-d');
         if($fecha ):
             
             $resta = $fecha_actual- $fecha;
             //echo   $segundos=strtotime($fecha_actual) - strtotime($fecha);
            $dias	= (strtotime($fecha_actual)-strtotime($fecha))/86400;
            $dias 	= abs($dias); $dias = floor($dias);		
            
            if($fecha == '0000-00-00'):
                return "";
            
            elseif($dias >= 60):
                return "red";
            elseif($dias >= 30):
                return "orange";
            
            elseif($dias < 30):
                return "green";
            endif;
            

         else:
             
             return "";
             
         endif;   
            
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
	function set_referencia($_referencia) { $this->referencia = $_referencia; }	
    function set_idMoneda($_idMoneda) { $this->idMoneda = $_idMoneda; }	
    function set_fechaActualizacion($_fechaActualizacion) { $this->fechaActualizacion = $_fechaActualizacion; }	
    function set_bulto($_bulto) { $this->bulto = $_bulto; }	
    function set_iva_10($_iva_10) { $this->iva_10 = $_iva_10; }	

	/*------------------------------------------------------------------------*/ 
	
} 

?>
