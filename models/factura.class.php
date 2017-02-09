<?php
class Factura 
{ 
	var $id; 
	var $idCliente; 
	var $idTipo; 
	var $n_remito; 
	var $n_factura; 
	var $descuento; 
	var $fecha; 
	var $importe; 
	var $activo; 
	var $comision_vendedor;
	var $condicion_venta;
	var $condicion_iva; 
	var $orden_compra;

	function Factura($_id=0) 
	{
		if ($_id<>0) 
		{
			$conn = new Conexion();

			$sql = $conn->prepare("select * from clientes_facturas where id=:ID"); 
			$sql->execute(array('ID' => $_id));
			$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);
			$this->id = $datos_carga['id']; 
			$this->idCliente = $datos_carga['idCliente']; 
			$this->idTipo = $datos_carga['idTipo']; 
			$this->n_remito = $datos_carga['n_remito']; 
			$this->n_factura = $datos_carga['n_factura']; 
			$this->descuento = $datos_carga['descuento']; 
			$this->fecha = $datos_carga['fecha']; 
			$this->importe = $datos_carga['importe']; 
			$this->activo = $datos_carga['activo']; 
			$this->comision_vendedor = $datos_carga['comision_vendedor'];
			$this->condicion_venta = $datos_carga['condicion_venta']; 
			$this->condicion_iva = $datos_carga['condicion_iva']; 
			$this->orden_compra = $datos_carga['orden_compra'];
		} 
	}
	
	function save() 
	{//Guarda o inserta segun corresponda 
	$conn = new Conexion();

	if ($this->id<>0) 
		{
		$sql = $conn->prepare("update clientes_facturas set idCliente = '$this->idCliente', idTipo = '$this->idTipo', n_remito = '$this->n_remito', n_factura = '$this->n_factura', descuento = '$this->descuento', fecha = '$this->fecha', importe = '$this->importe', activo = '$this->activo', comision_vendedor = '$this->comision_vendedor', condicion_venta = '$this->condicion_venta', condicion_iva = '$this->condicion_iva', orden_compra = '$this->orden_compra' where id='$this->id'"); 
		$sql->execute();
		} 
	else
		{
		$sql = $conn->prepare( "insert into clientes_facturas values (null, '$this->idCliente', '$this->idTipo', '$this->n_remito', '$this->n_factura', '$this->descuento', CURDATE(), '$this->importe', '$this->activo', '$this->comision_vendedor', '$this->condicion_venta', '$this->condicion_iva', '$this->orden_compra' )"); 
		$sql->execute();
		$id_insert = $conn->lastInsertId();
		return($id_insert);
		} 
	$sql=null;
	$conn=null;	
	}

	function erase($idfactura)
		{//Borra el CONTACTO, segun el ID, 
			$conn = new Conexion();
			$sql = $conn->prepare("SELECT * from clientes_factura_productos where idFactura = $idfactura");
			$sql->execute();
			$query = $sql->fetchAll();
			foreach($query as $row):
				$_id = $row["id"];
		
				$sql = $conn->prepare("DELETE FROM clientes_factura_productos WHERE id = $_id");
				$sql->execute();
				
				$sql = $conn->prepare("DELETE FROM productos_stock WHERE id = $_id");
				$sql->execute();
			endforeach;

			$sql = $conn->prepare("DELETE FROM clientes_facturas WHERE id = $idfactura");
			$sql->execute();

			$sql=null;
			$conn=null;

		}

	function erase_compra($idfactura)
		{//Borra el CONTACTO, segun el ID, 

			$conn = new Conexion();
			$sql = $conn->prepare("DELETE FROM clientes_facturas WHERE id = $idfactura");
			$sql->execute();

			$sql = $conn->prepare("DELETE FROM clientes_facturas_compras WHERE idFactura = $idfactura");
			$sql->execute();
			$sql=null;
			$conn=null;		
		}

	function facturar_registro($_PARAM)
	{
		$n_remito=$_PARAM["n_remito"];
		$n_factura=$_PARAM["n_factura"];	
		$condicion_venta=$_PARAM["condicion_venta"];	
		$orden_compra=$_PARAM["orden_compra"];	
		$_id = $_PARAM["id"];
		$precio_total = $_PARAM["precio_total"];

		$conn = new Conexion();
		$sql = $conn->prepare("UPDATE clientes_facturas SET idTipo = 5, n_remito = '$n_remito', n_factura = '$n_factura', condicion_venta = '$condicion_venta', orden_compra = '$orden_compra', importe = '$precio_total' WHERE id = $_id ");
		$sql->execute();

		for ($i = 1; $i <= 10; $i++):

			$idProducto = "idProducto" . $i;
			$precio_unitario = "precio_unitario" . $i;
			$precio_final = "precio_final" . $i;

			if($_PARAM[$precio_unitario]):
				$idProducto = $_PARAM[$idProducto];
				$precio_unitario = $_PARAM[$precio_unitario];
				$precio_final = $_PARAM[$precio_final];

				$sql = $conn->prepare("UPDATE clientes_factura_productos SET precio_unitario = $precio_unitario, precio_total = $precio_final WHERE idProducto = $idProducto and idFactura = $_id ");
				$sql->execute();
			endif;

		endfor;
		$sql=null;
		$conn=null;		
	}

	function generar_factura($id_cliente, $_PARAM)
	{
		$conn = new Conexion();
		$sql = $conn->prepare("SELECT SUM(precio_total) as precio_final FROM clientes_factura_productos where activo = 2");
		$sql->execute();
		$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  
        $importe_total = $datos_carga["precio_final"];
	//	$importe_total = mysql_result(mysql_query("SELECT SUM(precio_total) FROM clientes_factura_productos where activo = 2 "),0);
		$factura = new Factura();
		$factura->set_idCliente($id_cliente);
		$factura->set_idTipo(1);
		$factura->set_n_remito($_PARAM["n_remito"]);
		$factura->set_n_factura($_PARAM["n_factura"]);
		$factura->set_descuento($_PARAM["descuento"]);
		$factura->set_condicion_venta($_PARAM["condicion_venta"]);
		$factura->set_condicion_iva($_PARAM["condicion_iva"]);
		$factura->set_orden_compra($_PARAM["orden_compra"]);
		$factura->set_importe($importe_total);
		$factura->set_activo(1);
		
		$sql = $conn->prepare("SELECT V.comision FROM clientes AS C inner join vendedores as V ON C.idVendedor = V.id WHERE C.id = $id_cliente");
		$sql->execute();
		$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  		
		$comisiones = $datos_carga;

		$comision = $importe_total * $comisiones / 100 ;
		$factura->set_comision_vendedor($comision);

		$respuesta = $factura->save();

		$sql = $conn->prepare("UPDATE clientes_factura_productos set activo = 1, idFactura = '$respuesta' where activo = 2");
		$sql->execute();

		$sql = $conn->prepare("UPDATE productos_stock set idMovimiento = 2 where idMovimiento = 100");
		$sql->execute();


		$sql=null;
		$conn=null;

	}

	
	function generar_compra($_PARAM)
	{

		$factura = new Factura();
		$factura->set_idCliente($_PARAM["idProveedor"]);
		$factura->set_n_remito($_PARAM["n_remito"]);
		$factura->set_n_factura($_PARAM["n_factura"]);
		$factura->set_importe($_PARAM["importe"]);
		$factura->set_activo(1);
		$factura->set_comision_vendedor(0);
                if($_PARAM["n_factura"] == ""):
                    $factura->set_idTipo(7);
                else:
                    $factura->set_idTipo(6);
                endif;                

                
		$respuesta = $factura->save();
		
                $iva_selector = $_PARAM["iva_selector"];
                
                if($_PARAM["bonificacion"] != "" or $_PARAM["bonificacion"] != 0):
                   $subtotal_bonificado = $_PARAM["importe"] - ($_PARAM["importe"] * $_PARAM["bonificacion"] / 100);                    
                else:
                   $subtotal_bonificado = $_PARAM["importe"];
                endif;
                                    
                if($iva_selector != "ambos"):
                    if($iva_selector == "21"):
                    $iva21 = $subtotal_bonificado * 21 / 100;
                    $iva10 = 0;     
                    elseif($iva_selector == "10.5"):
                    $iva10 = $subtotal_bonificado * 10.5 / 100;
                    $iva21 = 0;     
                        
                    endif;
               
                elseif($iva_selector == "ambos"):
                    $iva21 = $_PARAM["iva21"];
                    $iva10 = $_PARAM["iva10"];		
                endif;
                
                
                if($_PARAM["ingresos_brutos"] == 1):
                   $ingresos_brutos = $subtotal_bonificado * 3.5 / 100;                    
                elseif($_PARAM["ingresos_brutos"] == 2):
                    $ingresos_brutos = 0;                                    
                endif;
                

		$fecha_factura = convertir_fecha($_PARAM["fecha_factura"]);
		$bonificacion = $_PARAM["bonificacion"];                
		$descuento = $_PARAM["descuento"];   
                $descuento_sel = $_PARAM["descuento_sel"] ;
        //        echo $hola = "insert into clientes_facturas_compras values ('$respuesta', '$iva21', '$iva10', '$ingresos_brutos', '$descuento', '$bonificacion','$descuento_sel')";
          //      die();

		$conn = new Conexion();
		$sql = $conn->prepare("insert into clientes_facturas_compras values ('$respuesta', '$iva21', '$iva10', '$ingresos_brutos', '$descuento', '$bonificacion','$descuento_sel')");
		$sql->execute();
		$sql = $conn->prepare("update clientes_facturas set fecha = '$fecha_factura' where id = '$respuesta'");
		$sql->execute();

		$sql=null;
		$conn=null;

	}


	function generar_factura2($_PARAM)
	{
		$conn = new Conexion();			
            for ($i = 1; $i <= 30; $i++):

                $cantidad = "cantidad" . $i;
                $cantidad_stock = "-" . $cantidad;
                $idproducto = "idproducto" . $i;
                $precio_producto = "precio_producto" . $i;
                $precio_total = "precio_total" . $i;
                $descuento_producto = "descuento_producto" . $i;

                if($_PARAM[$cantidad]):

                    $cantidad = $_PARAM[$cantidad];
                    $cantidad_stock = "-" . $cantidad;
                    $idproducto = $_PARAM[$idproducto];
                    $precio_producto = redondear_dos_decimal($_PARAM[$precio_producto]);
                    $precio_total = redondear_dos_decimal($_PARAM[$precio_total]);
                    $descuento_producto = $_PARAM[$descuento_producto];

					$sql = $conn->prepare("insert into productos_stock (id, idProducto, comentario, idMovimiento, cantidad, fechaCarga, idUsuario, precio) values (null,'$idproducto','PROCESO DE FACTURA', 2 , '$cantidad_stock', CURDATE(), 0, '$precio_producto')");
					$sql->execute();
                    $insert_id = $conn->lastInsertId();

                    $sql = $conn->prepare("insert into clientes_factura_productos (idFactura, idProducto, cantidad, precio_unitario, precio_total, activo,id, descuento) values (0,'$idproducto','$cantidad', $precio_producto , '$precio_total', 2, '$insert_id', '$descuento_producto')");
					$sql->execute();


                 endif;

            endfor;

		$sql = $conn->prepare("SELECT COUNT(precio_total) as precio_total FROM clientes_factura_productos where activo = 2");
		$sql->execute();
		$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  				
		$productos_cargados = $datos_carga;
		
		if($productos_cargados > 0):
	
			$sql = $conn->prepare("SELECT SUM(precio_total) as precio_total FROM clientes_factura_productos where activo = 2 ");
			$sql->execute();
			$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  				
			$importe_total = $datos_carga["precio_total"];


			$factura = new Factura();
			$factura->set_idCliente($_PARAM["_idcliente"]);
			$factura->set_idTipo(1);
			$factura->set_n_remito($_PARAM["n_remito"]);
			$factura->set_n_factura($_PARAM["n_factura"]);
			$factura->set_descuento($_PARAM["descuento"]);
			$factura->set_condicion_venta($_PARAM["condicion_venta"]);
			$factura->set_condicion_iva($_PARAM["condicion_iva"]);
			$factura->set_orden_compra($_PARAM["orden_compra"]);
			$factura->set_importe($importe_total);
			$factura->set_activo(1);
			
			$sql = $conn->prepare("SELECT V.comision FROM clientes AS C inner join vendedores as V ON C.idVendedor = V.id WHERE C.id = " . $_PARAM["_idcliente"]);
			$sql->execute();
			$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  				
			$comisiones = $datos_carga;

				$comision = $importe_total * $comisiones / 100 ;
				$factura->set_comision_vendedor($comision);

			$respuesta = $factura->save();

			$sql = $conn->prepare("update clientes_factura_productos set activo = 1, idFactura = '$respuesta' where activo = 2");
			$sql->execute();

			return($respuesta);
		endif;

		$sql=null;
		$conn=null;

	}


	function generar_factura_pago($id_cliente, $_PARAM)
	{
		$factura = new Factura();
		$factura->set_idCliente($id_cliente);
		$factura->set_idTipo(2);
		$factura->set_n_remito($_PARAM["n_remito_pago"]);
		$factura->set_n_factura($_PARAM["n_factura_pago"]);
		$factura->set_descuento('');
		$factura->set_importe($_PARAM['importe_pago']);
		$factura->set_activo(1);
				
		$factura->save();

	}

	
	function nuevo_producto_factura($_PARAM)
	{
			$idstock = substr($_PARAM["codigo_barras"],0,-4);
			$idcolor = substr($_PARAM["codigo_barras"],-4,2); 	
			$idtalle = substr($_PARAM["codigo_barras"],-2,2); 	
//			$precio1 = substr($_PARAM["codigo_barras"],-4,2);
//			$precio2 = substr($_PARAM["codigo_barras"],-2,2);

//			$precio = $precio1 . "." . $precio2;
			$cantidad = $_PARAM["cantidad"];
			$precio = $_PARAM["precio_producto"];
			$cantidad_stock = "-" . $_PARAM["cantidad"];
			$precio_total = $precio * $cantidad;

/*			$stock = mysql_num_rows( mysql_query ("Select id From productos WHERE codigo = '" .$idstock."'"));		
			$color = mysql_num_rows( mysql_query ("Select id From colores WHERE id = '" .$idcolor."'"));		
			$talle = mysql_num_rows( mysql_query ("Select id From talles WHERE id = '" .$idtalle."'"));		*/
			include_once("productos.class.php");
			$disponibilidad_stock =Producto::producto_stock($idstock,$idcolor,$idtalle,$cantidad);

				if(!$stock)
				{
					return("El Codigo del Producto no esta registrado");				

				}
				elseif(!$color)
				{

					return("El Codigo del Color no esta registrado");				

				}
				elseif(!$talle)
				{
					return("El Codigo del talle no esta registrado");				

				}
				elseif($disponibilidad_stock != "ok")
				{

					return("No hay disponiblidad de Stock para este producto. Posee de este Producto $disponibilidad_stock $idstock");				

				}
				else
				{

					$query_save = "insert into productos_stock (id, idProducto, comentario, idMovimiento, cantidad, fechaCarga, idUsuario, precio,idcolor,idtalle) values (null,'$idstock','PROCESO DE FACTURA', 100 , '$cantidad_stock', CURDATE(), 0, '$precio', '$idcolor', '$idtalle')";
					mysql_query($query_save) or die(mysql_error());
					$insert_id = mysql_insert_id();

					$query_save = "insert into clientes_factura_productos (idFactura, idProducto, cantidad, precio_unitario, precio_total, idColor, idTalle, activo,id) values (0,'$idstock','$cantidad', $precio , '$precio_total','$idcolor', '$idtalle', 2, '$insert_id')";
					mysql_query($query_save) or die(mysql_error());

					return("");
				}	
	}



	function get_productos_virtuales()
	{
		$conn = new Conexion();			

		$sql = $conn->prepare("SELECT P.codigo, CFP.cantidad, P.descripcion, CFP.precio_unitario, CFP.precio_total,CFP.id FROM clientes_factura_productos AS CFP
				  inner join productos as P ON P.codigo = CFP.idProducto where CFP.activo = 2");
		$sql->execute();
		$result = $sql->fetchAll();
		$productos = array();
		foreach($result as $row):
			$productos[] = $row;				
		endforeach;

		$sql=null;
		$conn=null;
		return($productos);	

	}

	function facturas_x_cliente($_idcliente)
	{
		$conn = new Conexion();					
		$sql = $conn->prepare("select * from clientes_facturas where idCliente = " . $_idcliente . " and (idTipo = 1 or idTipo = 5)");
		$sql->execute();
		$result = $sql->fetchAll();
		
		$facturas = array();
		foreach($result as $row):
			$facturas[] = $row;
		endforeach;
		$sql=null;
		$conn=null;
		return($facturas);

	}


	function get_facturas($busqueda=0,$tipo_factura=0,$anio_sel=0,$mes_sel=0,$idcliente=0)
	{
		if($busqueda) $whereclause = " AND (CF.n_factura like '%$busqueda%' or CF.fecha like '%$busqueda%' OR C.nombre like '%$busqueda%')"; else $whereclause ="";

		$selectclause_factura = "";
		$joinclause_factura = "";			
		if($idcliente):
                  $cliente_clause = " AND C.id =" .$idcliente ;  
                else:    
                  $cliente_clause =  "";
                endif;
		if($tipo_factura == "iva"):
			 $fecha = date("d-m-Y"); // fecha actual
			 $anio = date("Y"); // A�o actual
			 $mes = date("m"); // Mes actual
			 $dia = date("d"); // Dia actua
			if($anio_sel != 0 ) $anio = $anio_sel; 	
			if($mes_sel != 0 ) $mes = $mes_sel; 	
			$selectclause_factura = ", CFC.iva21, CFC.iva10, CFC.ingresosBrutos, CFC.descuento ";
			$joinclause_factura = " LEFT JOIN clientes_facturas_compras AS CFC ON CF.id = CFC.idFactura ";			
			


			$whereclause_factura = " AND ( CF.idTipo = 5 OR CF.idTipo = 6) AND month(fecha) = $mes AND year(fecha) = $anio ";

		elseif($tipo_factura):
			$whereclause_factura = " AND CF.idTipo = $tipo_factura"; 
			if($tipo_factura == 6):
				$selectclause_factura = ", CFC.iva21, CFC.iva10, CFC.ingresosBrutos, CFC.descuento,CFC.bonificacion, CFC.descuento_sel ";
				$joinclause_factura = " INNER JOIN clientes_facturas_compras AS CFC ON CF.id = CFC.idFactura ";			
                                $whereclause_factura = " AND CF.idTipo = 6 "; 
			elseif($tipo_factura == 7):
				$selectclause_factura = ", CFC.iva21, CFC.iva10, CFC.ingresosBrutos, CFC.descuento ";
				$joinclause_factura = " INNER JOIN clientes_facturas_compras AS CFC ON CF.id = CFC.idFactura ";			
                                $whereclause_factura = " AND CF.idTipo = 7 "; 
                                endif;
		else: 
			$whereclause_factura ="";
		endif;
		
		$conn = new Conexion();					
		$sql = $conn->prepare("select CF.*,date_format(CF.fecha,'%d/%m/%Y')as fecha, C.nombre as  nombre_cliente, TF.descripcion as tipo_factura $selectclause_factura
				  from clientes_facturas AS CF
				  LEFT join clientes as C ON C.id = CF.idCliente
				  LEFT join tipos_facturas as TF ON TF.id = CF.idTipo $joinclause_factura
				 where 1 $whereclause_factura $whereclause $cliente_clause
				  ORDER BY CF.id DESC");
		$sql->execute();
		$result = $sql->fetchAll();		
		$facturas = array();
		foreach($result as $row):
			$facturas[] = $row;
		endforeach;
		$sql=null;
		$conn=null;
		return($facturas);

	}

	function get_factura_by_id($id_factura)
	{
		$conn = new Conexion();					
		$sql = $conn->prepare("select CF.*, C.nombre
				  from clientes_facturas AS CF
				  LEFT join clientes as C ON C.id = CF.idCliente
				  LEFT join tipos_facturas as TF ON TF.id = CF.idTipo
				 where CF.id = $id_factura ");
		$sql->execute();

		$result = $sql->fetch(PDO::FETCH_ASSOC);
		$sql=null;
		$conn=null;
		return($result);

	}

	function get_notas_credito()
	{
		$conn = new Conexion();					
		$sql = $conn->prepare("select n_remito, n_factura,importe, C.nombre, CF.fecha, CF.idcliente  
				  from clientes_facturas AS CF INNER JOIN clientes AS C ON C.id = CF.idcliente 
				  where CF.idTipo = 5");
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_ASSOC);
		
		$facturas = array();
		foreach($result as $row):
			$facturas[] = $row;
		endforeach;
		$sql=null;
		$conn=null;
		return($facturas);

	}

	function facturas_adeudadas()
	{
//		$query_clientes ="Select * from Clientes where activo = 1 and idTipo = 1";
//		$result_clientes = mysql_query($query_clientes) or die(mysql_error());
		$facturas = array();
		$facturas_adeudadas = array();
		// $factura->get_n_factura()
//		while($row_clientes = @mysql_fetch_assoc($result_clientes))
//		{//WHILE1
		$conn = new Conexion();					
		$sql = $conn->prepare("select CF.id,CF.fecha, CF.importe, C.nombre,CF.n_factura from clientes_facturas as CF inner join clientes as C ON C.id = CF.idCliente where CF.idTipo = 1 or CF.idTipo = 5");
		$sql->execute();
		$facturas = $sql->fetchAll();

			foreach($facturas as $factura):
			
				$saldo_factura = Factura::get_saldo_factura($factura['importe'],$factura['n_factura']) ;	
                        
				if($saldo_factura > 0):
	                     $factura['importe'] = $saldo_factura;
	                    $facturas_adeudadas[] = $factura;
				endif;		
			endforeach;

			$sql=null;
			$conn=null;

		return($facturas_adeudadas);
	}
	
	function get_saldo_factura($importe, $n_factura)
	{
		$conn = new Conexion();					
		$sql = $conn->prepare("SELECT SUM(importe) as importe FROM clientes_facturas_pagos where idFactura = '$n_factura'");
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_ASSOC);

		$importe_total = $result["importe"];		
			
		 $saldo_final = $importe - $importe_total;
		if($saldo_final < 1) $saldo_final = 0;
		$sql=null;
		$conn=null;
		return($saldo_final);
	}

        function get_pagos_factura($n_factura)
	{

		$conn = new Conexion();					
		$sql = $conn->prepare("SELECT SUM(importe) as importe FROM clientes_facturas_pagos where idFactura = '$n_factura'");
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_ASSOC);

		$importe_total = $result["importe"];		
		$sql=null;
		$conn=null;	
		return($importe_total);
			
	}

        
	function get_cliente_deudor($_idcliente)
	{
		$conn = new Conexion();					
		$sql = $conn->prepare("select * from clientes_facturas where idTipo = 1 and idCliente = " . $_idcliente);	
		$sql->execute();
		$resultado = $sql->fetchAll();

		$sql=null;
		$conn=null;			

		$facturas = array();
	//	while($row = @mysql_fetch_assoc($result))
		foreach($resultado as $row)	
		{
		$facturas[] = new Factura($row['id']);
		}
	//	@mysql_free_result($result);

		foreach($facturas as $factura):
		
		$saldo_factura = $factura->get_saldo_factura($factura->get_importe(),$factura->get_n_factura(),$_idcliente) ;	

		if($saldo_factura > 0) 
			{
			$fecha_factura=explode("-",$factura->get_fecha());
			$fechasalida= $fecha[2]."-".$fecha[1]."-".$fecha[0];
			$fecha_vencimiento = date("Y-m-d",mktime(0, 0, 0, $fecha_factura[1]+1, $fecha_factura[2],   $fecha_factura[0]));

				if($fecha_vencimiento < date("Y-m-d"))
				{
					return("<FONT COLOR=RED><B>DEUDOR</B></FONT>");	
				}
			}
	
		endforeach;
			return("<FONT COLOR=green>AL DIA</FONT>");
	}


	function get_pagos_facturas($n_factura,$_idcliente)
	{
		$conn = new Conexion();					
		$sql = $conn->prepare("SELECT id FROM clientes_facturas where idTipo =2 and  n_factura = '$n_factura' and idcliente = $_idcliente");	
		$sql->execute();
		$result = $sql->fetchAll();			

		$facturas = array();
		foreach($result as $row):
			$facturas[] = new Factura($row['id']);
		endforeach;
		$sql=null;
		$conn=null;
		return($facturas);  	
	}

	function get_productos_x_factura($id_factura)
	{
		$conn = new Conexion();					
		$sql = $conn->prepare("SELECT CFP.idProducto, CFP.cantidad, P.descripcion, CFP.precio_unitario, CFP.precio_total, P.iva, CFP.descuento FROM clientes_factura_productos as CFP INNER JOIN productos as P ON P.id = CFP.idProducto where idFactura = $id_factura");

		$sql->execute();
		$result = $sql->fetchAll();			
			
		$productos = array();
		foreach($result as $row):
			$productos[] = $row;
		endforeach;
		$sql=null;
		$conn=null;
		return($productos);  
	
	}


	/*---GETTERS--------------------------------------------------------------*/ 
	function get_id() { return($this->id); } 
	function get_idCliente() { return($this->idCliente); } 
	function get_idTipo() { return($this->idTipo); } 
	function get_n_remito() { return($this->n_remito); } 
	function get_n_factura() { return($this->n_factura); } 
	function get_descuento() { return($this->descuento); } 
	function get_fecha() { return($this->fecha); } 
	function get_importe() { return($this->importe); } 
	function get_activo() { return($this->activo); } 
	function get_comision_vendedor() { return($this->comision_vendedor); } 
	function get_condicion_venta() { return($this->condicion_venta); } 
	function get_condicion_iva() { return($this->condicion_iva); }
	function get_orden_compra() { return($this->orden_compra); } 
	
	/*------------------------------------------------------------------------*/ 
	/*---SETTERS--------------------------------------------------------------*/ 
	function set_id($_id) { $this->id = $_id; } 
	function set_idCliente($_idCliente) { $this->idCliente = $_idCliente; } 
	function set_idTipo($_idTipo) { $this->idTipo = $_idTipo; } 
	function set_n_remito($_n_remito) { $this->n_remito = $_n_remito; } 
	function set_n_factura($_n_factura) { $this->n_factura = $_n_factura; } 
	function set_descuento($_descuento) { $this->descuento = $_descuento; } 
	function set_fecha($_fecha) { $this->fecha = $_fecha; } 
	function set_importe($_importe) { $this->importe = $_importe; } 
	function set_activo($_activo) { $this->activo = $_activo; } 
	function set_comision_vendedor($_comision_vendedor) { $this->comision_vendedor = $_comision_vendedor; } 
	function set_condicion_venta($_condicion_venta) { $this->condicion_venta = $_condicion_venta; } 
	function set_condicion_iva($_condicion_iva) { $this->condicion_iva = $_condicion_iva; } 
	function set_orden_compra($_orden_compra) { $this->orden_compra = $_orden_compra; } 


	/*------------------------------------------------------------------------*/ 

} 
?>