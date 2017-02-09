<?php
session_start();
include_once("../../funciones.php");


validar_permanencia();
//conectar_bd();
$_usuario = unserialize($_SESSION["usuario"]);

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
				
				$productos = Producto::get_productos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);	

				$total_productos = Producto::total_productos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);
				
				$_POST["buscador"] = ""; 
			//	$_GET["buscador"] = "";
				
				Template::draw_header();
				include("../../view/productos/list.php");
				include("../../view/productos/paginado.php");
				
				#				$template->draw_footer();	
				}
				break;

	case "exportar" :
				{	
					function array_recibe($url_array) { 
					    $tmp = stripslashes($url_array); 
					    $tmp = urldecode($tmp); 
					    $tmp = unserialize($tmp); 

					   return $tmp; 
					} 
					$array=$_POST['productos_excel']; 

					$productos=array_recibe($array); 

	//			print_r($productos);die;
//				Template::draw_header();
				include("../../view/productos/exportar.php");
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
				
				$productos = Producto::get_productos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"],"listado");	

				$total_productos = Producto::total_productos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);
                                
                                $_GET["buscador"] = htmlentities($_GET["buscador"]);
				$_POST["buscador"] = ""; 
                                
				Template::draw_header();				
				include("../../view/productos/listado_precios.php");
				include("../../view/productos/paginado.php");
				
				}
				break;						
				
	case "listado_productos_imprimir" :
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
				
				$productos = Producto::get_productos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"],"listado");	

				$total_productos = Producto::total_productos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);

			//	Template::draw_header();				
				include("../../view/productos/listado_productos_imprimir.php");
				include("../../view/productos/paginado.php");
				
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

				$referencia_nombre = "referencia_" . $_GET["id"];									
				$referencia = $_POST[$referencia_nombre];       

				$bulto_nombre = "bulto_" . $_GET["id"];									
				$bulto = $_POST[$bulto_nombre];      
                                
				$usuario = $_POST["idUsuario"];                                
				
			//	echo $_POST[$precio_nombre];die();
					Producto::modificar_importe($_GET["id"],$precio,$desc1,$desc2,$desc3,$utilidad,$iva,$referencia,$bulto,$usuario);

				

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
				
				$productos = Producto::get_productos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"],"listado");	

				$total_productos = Producto::total_productos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);

                                Template::draw_header(true, $_GET["id"]);

				include("../../view/productos/listado_precios.php");
				include("../../view/productos/paginado.php");
				}
				break;

	case "new" :
				{
				// Muestra el formulario de NUEVO
				$producto = new Producto;
				$mensaje_cabezera = "ALTA DEL PRODUCTO";
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
                $referencia="";
                $bulto="";
                $iva_10="";
				$categorias = $producto->get_categorias_combo();
				$monedas = $producto->get_monedas();
				Template::draw_header(2);
				include("../../view/productos/abm.php");

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
					$referencia = $producto->get_referencia();
					$bulto = $producto->get_bulto();
					$iva_10 = $producto->get_iva_10();
                                        
	
				Template::draw_header();
				include("../../view/productos/abm.php");
				
				}
				break;
	case "modify" :
				{
				// ESPERA UN ID
					$producto = new Producto($_GET["id"]);
				
					$mensaje_cabezera = "MODIFICACION DEL PRODUCTO";
					$cambio = "modificar";
					$detalle = false;
					$boton=true;							
					$deshabilitado = "";

					$categorias = $producto->get_categorias_combo();
					$monedas = $producto->get_monedas();

					$idCategoria = $producto->get_idCategoria();
					$idSubCategoria = $producto->get_idSubCategoria();
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
					$referencia = $producto->get_referencia();
					$bulto = $producto->get_bulto();
					$iva_10 = $producto->get_iva_10();
                                        

					Template::draw_header(2);
					include("../../view/productos/abm.php");

				}
				break;

	case "delete" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				$producto = new Producto($_GET["id"]);
				$producto->erase();
				//ingreso un registro en el log
				$hoy = date("Y-m-d G:i:s"); 
				$texto = "Baja producto".$_GET["id"];
				header("Location: index.php");
				}
				break;
				
	case "insert":
				{
						$producto = new Producto;
						$producto->nuevo_producto($_POST);
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Alta nuevo producto ";
	//				mysql_query("insert into log values(null,".$_producto->get_idproducto().",'".$texto."', '".$hoy."')");
//					header("Location: index.php");								
                             ?>                         
                             <script language="javascript">
                             parent.jQuery.fancybox.close();

                             </script>                                        
                             <?	                                        

				}
				break;
				
				
	case "update":
				{
					$producto = new Producto($_GET["id"]);

					$producto->set_idCategoria($_POST['idCategoria']);
					$producto->set_idSubCategoria($_POST['idSubCategoria']);
					$producto->set_descripcion($_POST['descripcion']);
					$producto->set_aviso_stock($_POST['aviso_stock']);
					$producto->set_precio($_POST['precio']);
					$producto->set_desc1($_POST['desc1']);
					$producto->set_desc2($_POST['desc2']);
					$producto->set_desc3($_POST['desc3']);
					$producto->set_utilidad($_POST['utilidad']);
					$producto->set_iva($_POST['iva']);
					$producto->set_idMoneda($_POST['idMoneda']);
					$producto->set_activo($_POST['activo']);
					$producto->set_referencia($_POST['referencia']);
					$producto->set_bulto($_POST['bulto']);
					$producto->set_iva_10($_POST['iva_10']);
                                        
					$producto->save();

					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion producto ".$_GET["id"];

					//	header("Location: index.php");
                            ?>                         
                             <script language="javascript">
                             parent.jQuery.fancybox.close();

                             </script>                                        
                             <?	
                            }
				break;

/*************CATEGORIAS *******************************************************/
	case "list_categorias" :
				{
				if(!isset($_GET["start"])){
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 100 ; 

				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				$productos = Producto::get_categorias($start,$end,$_GET["buscador"]);	

				$total_productos = Producto::total_productos();
				
				Template::draw_header();
				include("../../view/productos/list_categorias.php");
				#				$template->draw_footer();	
				}
				break;

	case "new_categoria" :
				{
				// Muestra el formulario de NUEVO
				$producto = new Producto;
				$subcategorias = Producto::get_subcategorias();
				$mensaje_cabezera = "ALTA DE LA CATEGORIA";
				$boton=true;
				$cambio = "nuevo";
				$deshabilitado = "";
				$id="";
				$nombre="";
                                $dolar="";
				$descripcion="";
				$activo="";
                                $proveedores = Cliente::get_clientes(0,0,2);                                

				Template::draw_header();
				include("../../view/productos/abm_categorias.php");

				}
				break;

        case "modify_categoria" :
                                {
                                // ESPERA UN ID

                                        $mensaje_cabezera = "MODIFICACION DE LA CATEGORIA";
                                        $cambio = "modificar";
                                        $detalle = false;
                                        $boton=true;							
                                        $deshabilitado = "";

                                        $categorias = Producto::get_categorias(0,0,0,$_GET["id"]);
                                        foreach($categorias as $categoria):
                                        $id= $categoria["id"];
                                        $nombre= $categoria["nombre"];
                                        $descripcion= $categoria["descripcion"];
                                        $dolar= $categoria["dolar"];
                                        $activo= $categoria["activo"];
                                   //     $idProveedor = $categoria["idProveedor"];
                                        $idProveedor = $categoria["id_proveedor"] ;
                                        
                                        $proveedores = Cliente::get_clientes(0,0,2);

                                        endforeach;
                                        $subcategorias = Producto::get_subcategorias($categoria["id"]);															
                                        Template::draw_header();
                                        include("../../view/productos/abm_categorias.php");

                                }
                                break;


	case "insert_categorias":
				{
//						$producto = new Producto;
						Producto::nueva_categoria($_POST);
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Alta nueva categoria ";
	//				mysql_query("insert into log values(null,".$_producto->get_idproducto().",'".$texto."', '".$hoy."')");
					header("Location: index.php?accion=list_categorias");								

				}
				break;

	case "update_categorias":
				{
					$producto = new Producto($_GET["id"]);

					Producto::update_categoria($_GET["id"], $_POST);
					
					
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion producto ".$_GET["id"];

					header("Location: index.php?accion=list_categorias");								
				}
				break;
	case "delete_categoria" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				Producto::delete_categoria($_GET["id"]);
				//ingreso un registro en el log

				header("Location: index.php?accion=list_categorias");
				}
				break;
/*************CATEGORIAS *******************************************************/

/*************SUBCATEGORIAS *******************************************************/
	case "delete_subcategoria" :
				{
				Producto::delete_subcategoria($_GET["id"]);

				$mensaje_cabezera = "MODIFICACION DE LA CATEGORIA";
				$cambio = "modificar";
				$detalle = false;
				$boton=true;							
				$deshabilitado = "";

				$categorias = Producto::get_categorias(0,0,0,$_GET["id_categoria"]);
				foreach($categorias as $categoria):
				$id= $categoria["id"];
				$nombre= $categoria["nombre"];
				$descripcion= $categoria["descripcion"];
				$activo= $categoria["activo"];

				endforeach;
				$subcategorias = Producto::get_subcategorias($categoria["id"]);															
				Template::draw_header();

				include("../../view/productos/abm_categorias.php");
				}
				break;

	case "new_subcategoria" :
				{
				// Muestra el formulario de NUEVO
			//	$producto = new Producto;
				$mensaje_cabezera = "ALTA DE LA SUBCATEGORIA";
				$boton=true;
				$cambio = "nuevo";
				$deshabilitado = "";
				$id="";
				$nombre="";
                                $dolar="";
				$descripcion="";
				$activo="";
				$idCategoria = $_GET["id"];


				include("../../view/productos/abm_subcategorias.php");

				}
				break;

	case "modify_subcategoria" :
				{
			
				$mensaje_cabezera = "MODIFICACION DE LA SUBCATEGORIA";
				$cambio = "modificar";
				$detalle = false;
				$boton=true;							
				$deshabilitado = "";

				$categorias = Producto::get_subcategoria_byid($_GET["id"]);
				foreach($categorias as $categoria):
				$id= $categoria["id"];
				$idCategoria = $categoria["idCategoria"];
				$nombre= $categoria["nombre"];
				$descripcion= $categoria["descripcion"];
				$dolar= $categoria["dolar"];                                
				$activo= $categoria["activo"];
                                $idProveedor = $categoria["idProveedor"];
                                $proveedores = Cliente::get_clientes(0,0,2);
                                
				endforeach;

				include("../../view/productos/abm_subcategorias.php");

				}
				break;


/*************SUBCATEGORIAS *******************************************************/
        

	case "listado_productos" :
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
				
				$productos = Producto::get_productos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"],"listado");	

				$total_productos = Producto::total_productos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);
				
				include("../../view/productos/listado_productos.php");
				include("../../view/productos/paginado.php");
				
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
					include("../../view/productos/codigo/html/code39.php");
				}
				break;

	}
?>