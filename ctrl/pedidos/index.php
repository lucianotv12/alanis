<?php
session_start();

include_once("../../funciones.php");


validar_permanencia();
conectar_bd();


if(!isset($_GET["accion"]))$accion= "list";
else $accion = $_GET["accion"];
$detalle = false;
switch($accion)
	{
	case "list" :
				{
				if(!isset($_GET["start"])){
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 500 ; 

				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				$pedidos = Pedido::get_pedidos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);	

				$total_pedidos = Pedido::total_pedidos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);
				
			//	$_POST["buscador"] = ""; 
			//	$_GET["buscador"] = "";
				
                                $estados = Pedido::get_pedidoEstados();
                                
				Template::draw_header();
				include("../../view/pedidos/list.php");
			//	include("../../view/pedidos/paginado.php");
				
				#				$template->draw_footer();	
				}
				break;

	case "listado_precios" :
				{

				if(!isset($_GET["start"])){
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 350 ; 

				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				$pedidos = Producto::get_pedidos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"],"listado");	

				$total_pedidos = Producto::total_pedidos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);
                                
                                $_GET["buscador"] = htmlentities($_GET["buscador"]);
                                
				Template::draw_header();				
				include("../../view/pedidos/listado_precios.php");
				include("../../view/pedidos/paginado.php");
				
				}
				break;						
				
	case "listado_pedidos_imprimir" :
				{

				if(!isset($_GET["start"])){
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 500 ; 

				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				$pedidos = Producto::get_pedidos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"],"listado");	

				$total_pedidos = Producto::total_pedidos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);

			//	Template::draw_header();				
				include("../../view/pedidos/listado_pedidos_imprimir.php");
				include("../../view/pedidos/paginado.php");
				
				}
				break;				
				
	case "modificar_importe":
            
				{
			//		$producto = new Producto($_GET["id"]);
		//		print_r($_POST);
				$precio_nombre = "precio_" . $_GET["id"];
				$precio = $_POST[$precio_nombre];

				$desc1_nombre = "desc1_" . $_GET["id"];
				$desc1 = $_POST[$desc1_nombre];
				
				$desc2_nombre = "desc2_" . $_GET["id"];
				$desc2 = $_POST[$desc2_nombre];


				$desc3_nombre = "desc3_" . $_GET["id"];
				$desc3 = $_POST[$desc3_nombre];


				$utilidad_nombre = "utilidad_" . $_GET["id"];			
				$utilidad = $_POST[$utilidad_nombre];


				$iva_nombre = "iva_" . $_GET["id"];									
				$iva = $_POST[$iva_nombre];
				
				
			//	echo $_POST[$precio_nombre];die();
					Producto::modificar_importe($_GET["id"],$precio,$desc1,$desc2,$desc3,$utilidad,$iva);

				

				if(!isset($_GET["start"])){
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 350 ; 

				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				$pedidos = Producto::get_pedidos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"],"listado");	

				$total_pedidos = Producto::total_pedidos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);

                                Template::draw_header(true, $_GET["id"]);

				include("../../view/pedidos/listado_precios.php");
				include("../../view/pedidos/paginado.php");
				}
				break;

	case "new" :
				{
				// Muestra el formulario de NUEVO
				$producto = new Pedido();
				$mensaje_cabezera = "NUEVO PEDIDO";
				$boton=true;
				$cambio = "nuevo";
				$deshabilitado = "";
				$idCategoria = "";
				$descripcion="";
				$fechaCarga="";
				$idUsuario="";
				$activo="";
				$aviso_stock="";
				$precio="";
				$desc1="";
				$desc2="";
				$desc3="";
				$utilidad="";
				$iva="";
				$idMoneda="";
//				$categorias = $producto->get_categorias_combo();
//				$monedas = $producto->get_monedas();
                                $proveedores=Cliente::get_clientes(0,0,2);
                                $pedidoEstados = Pedido::get_pedidoEstados();
				Template::draw_header();
				include("../../view/pedidos/abm.php");

				}
				break;

	case "detail" :
				{
				// ESPERA UN ID
				$producto = new Producto($_GET["id"]);
			
					$mensaje_cabezera = "DETALLE DEL PRODUCTO";  		
					$cambio = "";
					$boton=false;		
					$detalle = true;
					$deshabilitado = "disabled";

					$categorias = $producto->get_categorias_combo();
					$idCategoria = $producto->get_idCategoria();
					$descripcion= $producto->get_descripcion();
					$activo= $producto->get_activo();
					$aviso_stock= $producto->get_aviso_stock();
					$precio= $producto->get_precio();
					$desc1=$producto->get_desc1();
					$desc2=$producto->get_desc2();
					$desc3=$producto->get_desc3();
					$utilidad=$producto->get_utilidad();
					$iva=$producto->get_iva();
					$idMoneda=$producto->get_idMoneda();
					$monedas = $producto->get_monedas();
	
				Template::draw_header();
				include("../../view/pedidos/abm.php");
				
				}
				break;
	case "modify" :
				{
				// ESPERA UN ID
					$_pedido = new Pedido($_GET["id"]);
				
					$mensaje_cabezera = "MODIFICACION DEL PEDIDO";
					$cambio = "modificar";
					$detalle = false;
					$boton=true;							
					$deshabilitado = "";
                                        
                                       // print_r($pedido);
                                        $pedido = $_pedido->get_pedido();
                                        $descripcion = $_pedido->get_descripcion();
                                        $idProveedor = $_pedido->get_idProveedor();
                                        $contactoProveedor = $_pedido->get_contactoProveedor();
                                        $fechaPedido = $_pedido->get_fechaPedido();
                                        $fechaRecepcion = $_pedido->get_fechaRecepcion();
                                        $idEstado = $_pedido->get_idEstado();
                                        $metodoPedido = $_pedido->get_metodoPedido();
                                        $activo = $_pedido->get_activo();
                                   //     $descripcion = new Pedido->Pedido(16)->get_descripcion();
                                        $proveedores=Cliente::get_clientes(0,0,2);
                                        
                                        $productos = Pedido::get_productosPedidos($_GET["id"]);
                                         $pedidoEstados = Pedido::get_pedidoEstados();

					Template::draw_header();
					include("../../view/pedidos/abm.php");

				}
				break;

	case "delete" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				$pedido = new Pedido($_GET["id"]);
				$pedido->erase();
				//ingreso un registro en el log
				$hoy = date("Y-m-d G:i:s"); 
				$texto = "Baja producto".$_GET["id"];
				header("Location: index.php");
				}
				break;
				
	case "insert":
				{
						$producto = new Pedido;
						$producto->nuevo_pedido($_POST);
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Alta nuevo producto ";
	//				mysql_query("insert into log values(null,".$_producto->get_idproducto().",'".$texto."', '".$hoy."')");
					header("Location: index.php");								

				}
				break;
				
				
	case "update":
				{
					$_pedido = new Pedido($_GET["id"]);
                                        

					$_pedido->set_pedido($_POST['pedido']);
					$_pedido->set_descripcion($_POST['descripcion']);
					$_pedido->set_idProveedor($_POST['idProveedor']);
					$_pedido->set_contactoProveedor($_POST['contactoProveedor']);
					$_pedido->set_fechaPedido($_POST['fechaPedido']);
					$_pedido->set_fechaRecepcion($_POST['fechaRecepcion']);
					$_pedido->set_idEstado($_POST['idEstado']);
					$_pedido->set_metodoPedido($_POST['metodoPedido']);
					$_pedido->set_activo($_POST['activo']);
					$_pedido->save();

					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion pedido ".$_GET["id"];

						header("Location: index.php");
				}
				break;





	case "listado_pedidos" :
				{

				if(!isset($_GET["start"])){
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 500 ; 

				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				$pedidos = Producto::get_pedidos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"],"listado");	

				$total_pedidos = Producto::total_pedidos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);
				
				include("../../view/pedidos/listado_pedidos.php");
				include("../../view/pedidos/paginado.php");
				
				}
				break;
				
		
	case "codigo_barras" :
				{
				// ESPERA UN ID
				$producto = new Producto($_GET["id"]);
			
					$mensaje_cabezera = "CODIGO DE BARRA DEL PRODUCTO";  		
					$cambio = "";
					$boton=false;		
					$detalle = true;
					$deshabilitado = "disabled";


					$type = @$_POST['type'];
					$output = @$_POST['output'];
					$width = @$_POST['width'];
					$height = @$_POST['height'];
					$border = @$_POST['height'];
					$drawtext = @$_POST['drawtext'];
					$stretchtext = @$_POST['stretchtext'];
					$negative = @$_POST['negative'];

					Template::draw_header();
					include("../../view/pedidos/codigo/html/code39.php");
				}
				break;

	}
?>