<?php
class Pedido {
    
    var $idPedido;
    var $pedido;
    var $descripcion; 
    var $activo; 
    var $idEstado; 
    var $idProveedor; 
    var $fechaPedido; 
    var $fechaRecepcion; 
    var $idUsuario; 
    var $contactoProveedor; 
    var $metodoPedido; 
    
    
    function Pedido($_idPedido=0) {
        if ($_idPedido<>0) : 
            $query_carga= "select * from pedidos where idPedido=$_idPedido"; 
            $result_carga = mysql_query($query_carga); 
            $datos_carga = mysql_fetch_assoc($result_carga); 
            $this->idPedido = $datos_carga['idPedido']; 
            $this->pedido = $datos_carga['pedido']; 
            $this->descripcion = $datos_carga['descripcion']; 
            $this->activo = $datos_carga['activo']; 
            $this->idEstado = $datos_carga['idEstado']; 
            $this->idProveedor = $datos_carga['idProveedor']; 
            $this->fechaPedido = $datos_carga['fechaPedido']; 
            $this->fechaRecepcion = $datos_carga['fechaRecepcion']; 
            $this->idUsuario = $datos_carga['idUsuario']; 
            $this->contactoProveedor = $datos_carga['contactoProveedor']; 
            $this->metodoPedido = $datos_carga['metodoPedido']; 
            
        endif; 
        
    }
    function save() {//Guarda o inserta segun corresponda 
        if ($this->idPedido<>0):
            $query_save = "update pedidos set pedido = '$this->pedido', descripcion = '$this->descripcion', activo = '$this->activo', idEstado = '$this->idEstado', idProveedor = '$this->idProveedor', fechaPedido = '$this->fechaPedido', fechaRecepcion = '$this->fechaRecepcion', idUsuario = '$this->idUsuario', contactoProveedor = '$this->contactoProveedor', metodoPedido = '$this->metodoPedido' where idPedido='$this->idPedido'";
            mysql_query($query_save) or die(mysql_error()); 
            
        else: 
            $query_save = "insert into pedidos values (null, '$this->pedido', '$this->descripcion', '$this->activo', '$this->idEstado', '$this->idProveedor', '$this->fechaPedido', '$this->fechaRecepcion', '$this->idUsuario', '$this->contactoProveedor', '$this->metodoPedido')";
            mysql_query($query_save) or die(mysql_error()); 
            $this->id = mysql_insert_id(); 
            return(mysql_insert_id());
            
        endif; 
        
    } 
    

    function nuevo_pedido($_PARAM){
        //idPedido, pedido, descripcion, activo, idEstado, idProveedor, fechaPedido, fechaRecepcion, idUsuario, contactoProveedor, metodoPedido


        
            $pedido = new Pedido ();
            $pedido->set_pedido($_PARAM["pedido"]);    
            $pedido->set_descripcion($_PARAM["descripcion"]);    
            $pedido->set_activo($_PARAM["activo"]);      
            $pedido->set_idEstado($_PARAM["idEstado"]);    
            $pedido->set_idProveedor($_PARAM["idProveedor"]);    
            $pedido->set_fechaPedido(convertir_fecha($_PARAM["fechaPedido"]));                
            $pedido->set_fechaRecepcion(convertir_fecha($_PARAM["fechaRecepcion"]));                
            $pedido->set_idUsuario($_PARAM["idUsuario"]);                
            $pedido->set_contactoProveedor($_PARAM["contactoProveedor"]);                
            $pedido->set_metodoPedido($_PARAM["metodoPedido"]);      
            $id_retorno = $pedido->save();


            for ($i = 1; $i <= 30; $i++):

                $cantidad = "cantidad" . $i;
                $cantidad_stock = "-" . $cantidad;
                $idproducto = "idproducto" . $i;
                $detalleProducto = "detalle_producto" . $i;
                        
                if($_PARAM[$cantidad]):
                    echo "entro a cantidad";
                    $cantidad = $_PARAM[$cantidad];
                    $idproducto = $_PARAM[$idproducto];
                    
                    $detalleProducto = $_PARAM[$detalleProducto];

                    if($idproducto == 0):
                        $relacion = 0;
                    else:
                        $relacion = 1;
                    endif;
                    
                    $query_save = "insert into pedidos_productos (idPedido_producto, idPedido, idProducto, producto, producto_relacion, cantidad, activo) values (0,'$id_retorno','$idproducto','$detalleProducto','$relacion', '$cantidad','1')";
                    mysql_query($query_save) or die(mysql_error());
                    
                 endif;
                   
            endfor;            
            
    }    

    function erase()
            {//Borra el CONTACTO, segun el ID, 
            if ($this->idPedido<>0)
                    {
                            $query_erase = "DELETE FROM pedidos WHERE idPedido = $this->idPedido ";
                            mysql_query($query_erase) or die(mysql_error());
                    }

            }	

    
	function get_pedidos($start=0, $end=0,$busqueda=0,$ordenar=0,$tipo_orden=0, $listado=null)
	{
		if($listado == "listado") $activo_clause = " AND P.activo = 1";
		if($start==0 and $end== 0)	$limit ="" ; else $limit = "LIMIT $start , $end";
		if($busqueda):
		 		$busqueda = mysql_real_escape_string($busqueda);

		//		$whereclause =" AND ";
				$whereclause = " AND P.idPedido like '%$busqueda%' or P.descripcion like '%$busqueda%' or P.pedido like '%$busqueda%' ";				
		//SPLIT DE BUSQUEDAS whereclause2
				$busquedas = split(" ",$busqueda);		
				$contador = 0;
				foreach($busquedas as $busqueda):
				if($contador == 0) $whereclause2 .= " AND ("; else $whereclause2 .= " OR";
				
					$whereclause2 .= " P.idPedido like '%$busqueda%' or P.descripcion like '%$busqueda%' or P.pedido like '%$busqueda%' ";				
				$contador++;
				endforeach;
					$whereclause2 .= ") ";
		//SPLIT DE BUSQUEDAS
						
		//	 
		else: 
                    $whereclause ="";
                    $whereclause2 ="";
		endif;
		if($ordenar) $order_clause = $ordenar; else $order_clause = "idPedido";
		if($tipo_orden) $order_tipo = $tipo_orden; else $order_tipo = "ASC";

		 $query_listado = "Select P.*, PE.estado, C.nombre as proveedor 
						FROM pedidos P 												
                                                inner join pedidos_estados PE ON P.idEstado = PE.idPedidoEstado
                                                left join clientes C ON P.idProveedor = C.id 
                                                WHERE 1
						$whereclause 
						$activo_clause
						order by $order_clause $order_tipo $limit"; 
		$result_listado = mysql_query($query_listado);
		$pedidos = array();
		$whereclause_productos = "";
		while ($dato_producto = @mysql_fetch_assoc($result_listado))
		{
		$whereclause_productos .=" AND P.idPedido != " . $dato_producto['idPedido'];	
		$pedidos[] = $dato_producto;
		}
		@mysql_free_result($result_listado);


		return($pedidos);
	}
    
    
    	function total_pedidos($busqueda=0)
	{
	if($busqueda) $whereclause = " where P.idPedido like '%$busqueda%' or P.descripcion like '%$busqueda%' or P.pedido like '%$busqueda%' "; else $whereclause ="";

	$query_all = "select P.idPedido from pedidos P
				$whereclause";
	$result_all = mysql_query($query_all) or die(mysql_error());
	$nrows = mysql_num_rows($result_all);	
	return($nrows);
	}
        
        function get_pedidoEstados()
        {
          $query =mysql_query("select * from pedidos_estados");  
          $estados = array();
          while($row = mysql_fetch_assoc($query)):
              $estados[] = $row;
          endwhile;
          return($estados);
            
        }
        function  get_productosPedidos($idPedido)
        {
            $query = "select * from pedidos_productos where idPedido = $idPedido ";
            $result = mysql_query($query) or die(mysql_error());
            $productos = array(); 
            while( $row = mysql_fetch_assoc($result)):
            $productos[] = $row;
                
            endwhile;
            return($productos);
             
        }
    
    /*---GETTERS--------------------------------------------------------------*/ 
    function get_idPedido() { return($this->idPedido); } 
    function get_pedido() { return($this->pedido); } 
    function get_descripcion() { return($this->descripcion); } 
    function get_activo() { return($this->activo); } 
    function get_idEstado() { return($this->idEstado); } 
    function get_idProveedor() { return($this->idProveedor); } 
    function get_fechaPedido() { return($this->fechaPedido); } 
    function get_fechaRecepcion() { return($this->fechaRecepcion); } 
    function get_idUsuario() { return($this->idUsuario); } 
    function get_contactoProveedor() { return($this->contactoProveedor); } 
    function get_metodoPedido() { return($this->metodoPedido); } 
    
    /*------------------------------------------------------------------------*/
    /*---SETTERS--------------------------------------------------------------*/ 
    
    function set_idPedido($_idPedido) { $this->idPedido = $_idPedido; } 
    function set_pedido($_pedido) { $this->pedido = $_pedido; } 
    function set_descripcion($_descripcion) { $this->descripcion = $_descripcion; } 
    function set_activo($_activo) { $this->activo = $_activo; } 
    function set_idEstado($_idEstado) { $this->idEstado = $_idEstado; } 
    function set_idProveedor($_idProveedor) { $this->idProveedor = $_idProveedor; } 
    function set_fechaPedido($_fechaPedido) { $this->fechaPedido = $_fechaPedido; } 
    function set_fechaRecepcion($_fechaRecepcion) { $this->fechaRecepcion = $_fechaRecepcion; } 
    function set_idUsuario($_idUsuario) { $this->idUsuario = $_idUsuario; } 
    function set_contactoProveedor($_contactoProveedor) { $this->contactoProveedor = $_contactoProveedor; } 
    function set_metodoPedido($_metodoPedido) { $this->metodoPedido = $_metodoPedido; } 
    
    /*------------------------------------------------------------------------*/ 
    

}
?>
