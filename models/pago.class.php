<?
class Pago 
{ 
	var $id; 
	var $idFactura; 
	var $idTipoPago; 
	var $importe; 
	var $descripcion; 
	var $fecha; 
	
	function Pago($_id=0) 
	{
		if ($_id<>0)
		{
		$query_carga= "select * from clientes_facturas_pagos where id=$_id"; 
		$result_carga = mysql_query($query_carga); 
		$datos_carga = mysql_fetch_assoc($result_carga); 
		$this->id = $datos_carga['id']; 
		$this->idFactura = $datos_carga['idFactura']; 
		$this->idTipoPago = $datos_carga['idTipoPago']; 
		$this->importe = $datos_carga['importe']; 
		$this->descripcion = $datos_carga['descripcion']; 
		$this->fecha = $datos_carga['fecha']; 
		}
	}
	
	function save() 
	{//Guarda o inserta segun corresponda 
		if ($this->id<>0) 
			{
			$query_save = "update clientes_facturas_pagos set idFactura = '$this->idFactura', idTipoPago = '$this->idTipoPago', importe = '$this->importe', descripcion = '$this->descripcion', fecha = '$this->fecha' where id='$this->id'"; 
			mysql_query($query_save) or die(mysql_error()); 
			}
		else 
			{
			$query_save = "insert into clientes_facturas_pagos values (null, '$this->idFactura', '$this->idTipoPago', '$this->importe', '$this->descripcion', CURDATE())"; 
			mysql_query($query_save) or die(mysql_error()); 
                        $id_insert = mysql_insert_id(); 
                        return($id_insert);

                        } 
	}
	

	function nuevo_pago($_PARAM)
	{
            $pago = new Pago();
            $pago->set_idFactura($_PARAM['idFactura']);
            $pago->set_idTipoPago($_PARAM['idTipoPago']);
            $pago->set_importe($_PARAM['importe']);
            $pago->set_descripcion($_PARAM['descripcion']);

            $id_pago = $pago->save();
            
            if($_PARAM['idTipoPago'] == 2):
            //SI ES CHEQUE, CARGO EL REGISTRO EN CHEQUES
            $numero_cheque = $_PARAM['numero_cheque'];
            $titular = $_PARAM['titular'];
            $destinatario = $_PARAM['destinatario'];
            $banco = $_PARAM['banco'];                
            $fecha_emision = convertir_fecha($_PARAM['fecha_emision']);
            $fecha_cobro = convertir_fecha($_PARAM['fecha_cobro']);                
            $importe = $_PARAM['importe'];                

            
            $query =mysql_query("insert into cheques values(null, '$id_pago', '$fecha_emision', '$fecha_cobro', '$numero_cheque', '$titular', '$destinatario', '$banco', 1, '$importe')");
                
            endif;
                
                
	}

        function modificar_cheque($_PARAM)
        {
            $id_pago = 0;
            $fecha_emision = convertir_fecha($_PARAM["fecha_emision"]);
             
            $fecha_cobro = convertir_fecha($_PARAM["fecha_cobro"]);    
           
            $_id = $_PARAM["id"];
            $_idClienteFacturaPago = $_PARAM["idClienteFacturaPago"];           
            $numero_cheque = $_PARAM["numero"];    
            $titular = $_PARAM["titular"];    
            $destinatario = $_PARAM["destinatario"];    
            $banco = $_PARAM["id_banco"];    
            $importe= $_PARAM["importe"];
            $factura_adeudada= $_PARAM["factura_adeudada"];
            $descripcion= $_PARAM["descripcion"];

            $query_cheque = mysql_query("UPDATE cheques set fechaEmision = '$fecha_emision', fechaCobro = '$fecha_cobro',
             numero = '$numero_cheque', titular = '$titular', destinatario = '$destinatario', idBanco = '$banco', importe = '$importe'
             WHERE id = '$_id'");    
            
            if($_idClienteFacturaPago != 0):
            $query_pago = mysql_query("UPDATE clientes_facturas_pagos set importe = '$importe' WHERE id = '$_idClienteFacturaPago' ");
            endif;
        }
        
        function nuevo_cheque($_PARAM)
        {
            $id_pago = 0;
            $fecha_emision = convertir_fecha($_PARAM["fecha_emision"]);
             
            $fecha_cobro = convertir_fecha($_PARAM["fecha_cobro"]);    
           
            $numero_cheque = $_PARAM["numero"];    
            $titular = $_PARAM["titular"];    
            $destinatario = $_PARAM["destinatario"];    
            $banco = $_PARAM["id_banco"];    
            $importe= $_PARAM["importe"];
            $factura_adeudada= $_PARAM["factura_adeudada"];
            $descripcion= $_PARAM["descripcion"];
            

            if($factura_adeudada != 0):
                $pago = new Pago();
                $pago->set_idFactura($factura_adeudada);
                $pago->set_idTipoPago(2);
                $pago->set_importe($importe);
                $pago->set_descripcion($descripcion);

                $id_pago = $pago->save();
            
            else:
                $id_pago = 0;

            endif;
            
            
            $query =mysql_query("insert into cheques values(null, '$id_pago','$fecha_emision' , '$fecha_cobro', '$numero_cheque', '$titular', '$destinatario', '$banco', 1, '$importe')");            
            
        }
        
	function get_pagos_factura($_idFactura)
	{
		$query = "SELECT *,date_format(CFP.fecha,'%d/%m/%Y')as fecha from clientes_facturas_pagos AS CFP
				  INNER JOIN tipos_pagos as TP ON TP.id = CFP.idTipoPago
				  WHERE CFP.idFactura = $_idFactura";
		$result_listado = mysql_query($query);
		$tipos = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$tipos[] = $row;
		}
		@mysql_free_result($result_listado);
		return($tipos);	
	}

	function get_pagos()
	{
		$query = "SELECT date_format(CFP.fecha,'%d/%m/%Y')as fecha, C.nombre as cliente, TP.nombre as tipo_pago, CFP.importe,CFP.descripcion,  TF.descripcion as operacion
				FROM clientes_facturas_pagos AS CFP
				INNER JOIN tipos_pagos as TP ON TP.id = CFP.idTipoPago
				INNER JOIN clientes_facturas as CF ON CF.id = CFP.idFactura
				INNER JOIN clientes as C ON C.id = CF.idCliente
				INNER JOIN tipos_facturas as TF ON TF.id = CF.idTipo
                                ORDER BY fecha desc";
		$result_listado = mysql_query($query);
		$tipos = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$tipos[] = $row;
		}
		@mysql_free_result($result_listado);
		return($tipos);	
	}
        
	/*BUSCAR CHEQUES AJAX
	FUNCION QUE UTILIZA AUTOCOMPLETE
	*/
	function buscarChequeAjax($palabra)
	{
		$palabra = mysql_real_escape_string($palabra);
		 $query=" Select CH.id,date_format(CH.fechaEmision,'%d/%m/%Y')as fechaEmision, date_format(CH.fechaCobro,'%d/%m/%Y')as fechaCobro, CH.numero as cheque, CH.titular, CH.destinatario, B.nombre as banco, CH.importe, CF.n_factura,CL.nombre as cliente,
                        if(CF.idTipo = 6 or CF.idTipo = 7,'COMPRAS','VENTAS')AS operacion
                        FROM cheques as CH
                        left join clientes_facturas_pagos as CFP ON CFP.id = CH.idClienteFacturaPago
                        left join clientes_facturas as CF ON CF.id = CFP.idFactura
                        left join bancos as B ON B.id = CH.idBanco
                        left join clientes as CL ON CL.id = CF.idCliente                        
                        WHERE CH.titular like '%$palabra%' or CH.destinatario like '%$palabra%' or CH.numero like '%$palabra%'
                        or date_format(CH.fechaEmision,'%d/%m/%Y') like '%$palabra%' or date_format(CH.fechaCobro,'%d/%m/%Y') like '%$palabra%' or ch.importe like '%$palabra%'
			Order By fechaEmision limit 500";
	 	
		$result = mysql_query($query) or die(mysql_error());
		
		$cheques = array();
		while ($row = mysql_fetch_assoc($result)):
	//	echo "ACA ENTREEEE"	;
	
	// ARREGLAR EL TEMA DEL VALUEEEE, PONER SOLO DESCRIPCION EN EL LIST.
		$cheques[] = array("value" => $row['cheque'] ,
							 "cheque" => $row['cheque'] ,
							 "titular"	 =>	$row['titular'],
							 "destinatario"	 =>	$row['destinatario'],
							 "importe"		=> $row['importe']
							);
	//	$productos[] = $row;	
		
		endwhile;
		@mysql_free_result($result);
		
		return($cheques);
		 	
		
		
	}

	function buscarBancosAjax($palabra)
	{
		$palabra = mysql_real_escape_string($palabra);
		 $query=" Select B.id, B.nombre
                        FROM bancos as B
                        WHERE B.nombre like '%$palabra%' 
                        Order By id desc limit 500";
	 	
		$result = mysql_query($query) or die(mysql_error());
		
		$bancos = array();
		while ($row = mysql_fetch_assoc($result)):
	//	echo "ACA ENTREEEE"	;
	
	// ARREGLAR EL TEMA DEL VALUEEEE, PONER SOLO DESCRIPCION EN EL LIST.
		$bancos[] = array("value" => $row['nombre'] ,
							 "nombre" => $row['nombre'] ,
							 "id"	 =>	$row['id'],
							);
	//	$productos[] = $row;	
		
		endwhile;
		@mysql_free_result($result);
		
		return($bancos);
		 	
		
		
	}
        
        
           
        function get_cheques($busqueda=0,$ordenar=0,$tipo_orden=0)
        {
                if($busqueda) $whereclause = " AND (CH.numero like '%$busqueda%' OR CH.titular like '%$busqueda%' OR CH.destinatario like '%$busqueda%' OR CH.importe like '%$busqueda%' OR CF.n_factura like '%$busqueda%' OR B.nombre like '%$busqueda%' OR date_format(CH.fechaEmision,'%d/%m/%Y') like '%$busqueda%' OR date_format(CH.fechaCobro,'%d/%m/%Y') like '%$busqueda%' )"; else $whereclause ="";
		if($ordenar) $order_clause = $ordenar; else $order_clause = "id";
		if($tipo_orden) $order_tipo = $tipo_orden; else $order_tipo = "DESC";

                
                $query ="SELECT
                CH.id,date_format(CH.fechaEmision,'%d/%m/%Y')as fechaEmision, date_format(CH.fechaCobro,'%d/%m/%Y')as fechaCobro, CH.numero as cheque, CH.titular, CH.destinatario, B.nombre as banco, CH.importe, CF.n_factura,CL.nombre as cliente,
                if(CF.idTipo = 6 or CF.idTipo = 7,'COMPRAS','VENTAS')AS operacion
                FROM cheques as CH
                left join clientes_facturas_pagos as CFP ON CFP.id = CH.idClienteFacturaPago
                left join clientes_facturas as CF ON CF.id = CFP.idFactura
                left join bancos as B ON B.id = CH.idBanco
                left join clientes as CL ON CL.id = CF.idCliente
                where 1 $whereclause
                order by $order_clause $order_tipo";  
          
 		$result_listado = mysql_query($query);
		$cheques = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$cheques[] = $row;
		}
		@mysql_free_result($result_listado);
		return($cheques);           
            
            
        }
        function get_cheque_by_id($_id)
        {
//                if($busqueda) $whereclause = " AND (CH.numero like '%$busqueda%' OR CH.titular like '%$busqueda%' OR CH.destinatario like '%$busqueda%' OR CH.importe like '%$busqueda%' OR CF.n_factura like '%$busqueda%' OR B.nombre like '%$busqueda%' )"; else $whereclause ="";

                $query ="SELECT
                CH.id,date_format(CH.fechaEmision,'%d/%m/%Y')as fechaEmision, date_format(CH.fechaCobro,'%d/%m/%Y')as fechaCobro, CH.numero as cheque, CH.titular, CH.destinatario, B.nombre as banco, CH.importe, CF.n_factura,CL.nombre as cliente,
                if(CF.idTipo = 6 or CF.idTipo = 7,'COMPRAS','VENTAS')AS operacion, CH.idClienteFacturaPago, B.id as idBanco
                FROM cheques as CH
                left join clientes_facturas_pagos as CFP ON CFP.id = CH.idClienteFacturaPago
                left join clientes_facturas as CF ON CF.id = CFP.idFactura
                left join bancos as B ON B.id = CH.idBanco
                left join clientes as CL ON CL.id = CF.idCliente
                where CH.id = $_id
                order by CH.id desc";  
          
 		$result_listado = mysql_query($query);
		$cheques = array();
		if ($row = @mysql_fetch_assoc($result_listado))
		{
		$cheques[] = $row;
		}
		@mysql_free_result($result_listado);
		return($cheques);           
            
            
        }        
        
	function get_tipos_pagos()
	{
		$query = "SELECT * from tipos_pagos   order by nombre";
		$result_listado = mysql_query($query);
		$tipos = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$tipos[] = $row;
		}
		@mysql_free_result($result_listado);
		return($tipos);	
	}

	function get_bancos()
	{
		$query = "SELECT * from bancos   order by nombre";
		$result_listado = mysql_query($query);
		$bancos = array();
		while ($row = @mysql_fetch_assoc($result_listado))
		{
		$bancos[] = $row;
		}
		@mysql_free_result($result_listado);
		return($bancos);	
	}        
        

	/*---GETTERS--------------------------------------------------------------*/ 
		function get_id() { return($this->id); } 
		function get_idFactura() { return($this->idFactura); } 
		function get_idTipoPago() { return($this->idTipoPago); } 
		function get_importe() { return($this->importe); } 
		function get_descripcion() { return($this->descripcion); } 
		function get_fecha() { return($this->fecha); } 
	
	/*------------------------------------------------------------------------*/ 

	/*---SETTERS--------------------------------------------------------------*/ 
		function set_id($_id) { $this->id = $_id; } 
		function set_idFactura($_idFactura) { $this->idFactura = $_idFactura; } 
		function set_idTipoPago($_idTipoPago) { $this->idTipoPago = $_idTipoPago; } 
		function set_importe($_importe) { $this->importe = $_importe; } 
		function set_descripcion($_descripcion) { $this->descripcion = $_descripcion; } 
		function set_fecha($_fecha) { $this->fecha = $_fecha; } 
	/*------------------------------------------------------------------------*/ 

} 
?>