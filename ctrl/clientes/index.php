<?php
session_start();
include_once("../../funciones.php");
//include_once("../../models/clientes.class.php");


validar_permanencia();
//conectar_bd();
//validar_permanencia();
//validar_permanencia_admin();
//$_usuario = unserialize($_SESSION["usuario"]);

#$template = new Template();

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
				$end = 10000 ; 

				if($_GET["buscador"]== "DEUDORES")
					{
					$clientes = Cliente::get_clientes_deudores();				
					}
				else
					{
					if($_GET["buscador"]== "TODOS") 
					{
					$_POST["buscador"] = ""; 
					$_GET["buscador"] = "";
					}
					if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
					$clientes = Cliente::get_clientes($start,$end,1,$_GET["buscador"]);	
					}	
			
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);				
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				$total_clientes = Cliente::total_clientes();
				Template::draw_header();
				include("../../view/clientes/list.php");
				#				$template->draw_footer();	
				}
				break;
	case "new" :
				{
				// Muestra el formulario de NUEVO
				$cliente = new Cliente;
#				$template->draw_header();
#				include($template->get_vista_url ("cliente/navegador.php"));
#				include($template->get_vista_url ("CLIENTE/panel/navegador.php"));
				$mensaje_cabezera = "ALTA DEL CLIENTE";
				$boton=true;
				$cambio = "nuevo";
				$provincias = Cliente::get_provincias();
				$vendedores = Cliente::get_vendedores();
				$deshabilitado = "";
				$idTipo = "";
				$nombre="";
				$domicilio="";
				$idLocalidad = "";
				$idProvincia=1;
				$pais="";
				$cp="";
				$telefono="";
				$telefono2="";
				$contacto="";
				$mail = "";
				$web="";
				$activo="";
				$observaciones="";
				$idVendedor="";
				$descuento="";
				$nro_cuit="";
				$condicion_iva="";

			//	$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				Template::draw_header(2);
					include("../../view/clientes/abm.php");
#				$template->draw_footer();
				}
				break;

	case "detail" :
				{
				// ESPERA UN ID
				$cliente = new Cliente($_GET["id"]);
			
					$mensaje_cabezera = "DETALLE DEL CLIENTE";  		
					$cambio = "";
					$boton=false;		
					$detalle = true;
					$deshabilitado = "disabled";

					$provincias = Cliente::get_provincias();
					$vendedores = Cliente::get_vendedores();
					$idTipo = $cliente->get_idTipo();
					$nombre= $cliente->get_nombre();
					$domicilio= $cliente->get_domicilio();
					$idLocalidad = $cliente->get_idLocalidad();
					$idProvincia= $cliente->get_idProvincia();
					$pais= $cliente->get_pais();
					$cp= $cliente->get_cp();
					$telefono= $cliente->get_telefono();
					$telefono2= $cliente->get_telefono2();
					$contacto= $cliente->get_contacto();
					$mail = $cliente->get_mail();
					$web= $cliente->get_web();
					$activo= $cliente->get_activo();
					$observaciones=$cliente->get_observaciones();
					$idVendedor=$cliente->get_idVendedor();
					$descuento=$cliente->get_descuento();
					$nro_cuit=$cliente->get_nro_cuit();
					$condicion_iva=$cliente->get_condicion_iva();

					Template::draw_header();
					include("../../view/clientes/abm.php");
				}
				break;
	case "modify" :
				{
				// ESPERA UN ID
					$cliente = new Cliente($_GET["id"]);
				
					$mensaje_cabezera = "MODIFICACION DEL CLIENTE";
					$cambio = "modificar";
					$detalle = false;
					$boton=true;							
					$deshabilitado = "";
	
					$provincias = Cliente::get_provincias();
					$vendedores = Cliente::get_vendedores();				
					$idTipo = $cliente->get_idTipo();
					$nombre= $cliente->get_nombre();
					$domicilio= $cliente->get_domicilio();
					$idLocalidad = $cliente->get_idLocalidad();
					$idProvincia= $cliente->get_idProvincia();
					$pais= $cliente->get_pais();
					$cp= $cliente->get_cp();
					$telefono= $cliente->get_telefono();
					$telefono2= $cliente->get_telefono2();
					$contacto= $cliente->get_contacto();
					$mail = $cliente->get_mail();
					$web= $cliente->get_web();
					$activo= $cliente->get_activo();
					$observaciones=$cliente->get_observaciones();
					$idVendedor=$cliente->get_idVendedor();
					$descuento=$cliente->get_descuento();
					$nro_cuit=$cliente->get_nro_cuit();
					$condicion_iva=$cliente->get_condicion_iva();

					Template::draw_header(2);

					include("../../view/clientes/abm.php");

				}
				break;

	case "delete" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				$Cliente = new Cliente($_GET["id"]);
				$Cliente->erase();
				//ingreso un registro en el log
				$hoy = date("Y-m-d G:i:s"); 
				$texto = "Baja Cliente".$_GET["id"];
		//		mysql_query("insert into log values(null,".$_Cliente->get_id().",'".$texto."', '".$hoy."')");
				header("Location: index.php");
				}
				break;
				
	case "insert":
				{
						$Cliente = new Cliente;
						$Cliente->nuevo_cliente($_POST,1);
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Alta nuevo Cliente ";
	//				mysql_query("insert into log values(null,".$_Cliente->get_idCliente().",'".$texto."', '".$hoy."')");
//					header("Location: index.php");								
#					$_SESSION["usuario"] = serialize($usuario);
                             ?>                         
                             <script language="javascript">
                             parent.jQuery.fancybox.close();

                             </script>                                        
                             <?	 
				}
				break;
				
				
	case "update":
				{
					$cliente = new Cliente($_GET["id"]);

					$cliente->set_nombre($_POST['nombre']);
					$cliente->set_domicilio($_POST['domicilio']);
					$cliente->set_idLocalidad($_POST['cmbLocalidad']);
					$cliente->set_idProvincia($_POST['cmbProvincia']);
					$cliente->set_cp($_POST['cp']);
					$cliente->set_telefono($_POST['telefono']);
					$cliente->set_telefono2($_POST['telefono2']);
					$cliente->set_contacto($_POST['contacto']);
					$cliente->set_mail($_POST['mail']);
					$cliente->set_web($_POST['web']);
					$cliente->set_observaciones($_POST['observaciones']);
					$cliente->set_idVendedor($_POST['idVendedor']);
					$cliente->set_descuento($_POST['descuento']);
					$cliente->set_nro_cuit($_POST['nro_cuit']);
					$cliente->set_condicion_iva($_POST['condicion_iva']);

					$cliente->save();

					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion Cliente ".$_GET["id"];
//					mysql_query("insert into log values(null,".$_Cliente->get_id().",'".$texto."', '".$hoy."')");

					//	if($Cliente->get_id_tipo() != 1 ){
//						header("Location: index.php");
					//	}else{
					//	header("Location: index.php?accion=detail&id=".$_Cliente->idCliente);
					//	}
                                    ?>                         
                                    <script language="javascript">
                                    parent.jQuery.fancybox.close();

                                    </script>                                        
                                    <?	                                         
				}
				break;

				
	case "nueva_factura":
				{

				// ESPERA UN ID
				$cliente = new Cliente($_GET["id"]);
			
					$mensaje_cabezera = "NUEVA FACTURA";  		
					$boton=true;
					$cambio = "nuevo";
					$deshabilitado = "";
					$nombre= $cliente->get_nombre();

					$productos_virtuales =	Factura::get_productos_virtuales();
					Template::draw_header();

					include("../../view/clientes/nueva_factura.php");
				
				}
				break;

	case "insert_factura_producto":
				{
					$cliente = new Cliente($_GET["id"]);
					$factura = new Factura;
					$mensaje_producto =$factura->nuevo_producto_factura($_POST);
	
					$productos_virtuales =	Factura::get_productos_virtuales();
					$mensaje_cabezera = "NUEVA FACTURA";  		
					$boton=true;
					$cambio = "nuevo";
					$deshabilitado = "";

					Template::draw_header();

					include("../../view/clientes/nueva_factura.php");

				}
				break;

	case "delete_factura_producto" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				$factura = new Factura();
				$factura->erase($_GET["idfactura_producto"]);

				$cliente = new Cliente($_GET["id"]);
				$productos_virtuales =	Factura::get_productos_virtuales();
				$mensaje_cabezera = "NUEVA FACTURA";  		
				$boton=true;
				$cambio = "nuevo";
				$deshabilitado = "";

				Template::draw_header();

				include("../../view/clientes/nueva_factura.php");

				}
				break;
	
	case "generar_factura":
				{

				// ESPERA UN ID
					$cliente = new Cliente($_GET["id"]);
					Factura::generar_factura($_GET["id"],$_POST);
					$mensaje_cabezera = "FACTURA GENERADA";
					$boton=true;
					$cambio = "nuevo";
					$deshabilitado = "";
//					$productos_virtuales =	Factura::get_productos_virtuales();

					Template::draw_header();

					include("../../view/clientes/nueva_factura.php");
				
				}
				break;

	case "insert_pago":
				{

				// ESPERA UN ID
					$cliente = new Cliente($_GET["id"]);
					Factura::generar_factura_pago($_GET["id"],$_POST);
					$mensaje_cabezera = "PAGO FACTURA GENERADO";
					$boton=true;
					$cambio = "nuevo";
					$deshabilitado = "";
//					$productos_virtuales =	Factura::get_productos_virtuales();

								
					$_id = $_GET["id"];
					header("Location: index.php?accion=facturas&id=$_id");

				
				}
				break;

	case "facturas" :
		{
					$cliente = new Cliente($_GET["id"]);
					$nombre= $cliente->get_nombre();

				$facturas = Factura::facturas_x_cliente($_GET["id"]);	

				Template::draw_header();
				include("../../view/clientes/facturas.php");
	
		}
		break;

	case "factura_detalle" :
		{
				$cliente = new Cliente($_GET["id"]);
				$factura = new Factura($_GET["idfactura"]);
				$productos_factura = Factura::get_productos_x_factura($_GET["idfactura"]);

				Template::draw_header();

				include("../../view/clientes/factura_detalle.php");
	
		}
		break;

	case "listado_deuda_facturas" :
		{
//					$cliente = new Cliente($_GET["id"]);

				$facturas = Factura::facturas_adeudadas();

//				include("../principal.php");
				include("../../view/clientes/facturas_adeudadas.php");
	
		}
		break;

	case "imprimir_factura" :
		{
				$cliente = new Cliente($_GET["id"]);
				$factura = new Factura($_GET["idfactura"]);
				$productos = Factura::get_productos_x_factura($_GET["idfactura"]);

				include("../../view/clientes/planilla.php");
	
		}

		break;

	case "imprimir_remito" :
		{
				$cliente = new Cliente($_GET["id"]);
				$factura = new Factura($_GET["idfactura"]);
				$productos = Factura::get_productos_x_factura($_GET["idfactura"]);

				include("../../view/clientes/remito.php");
	
		}

		break;

	case "listado_clientes" :
				{				
				if(!isset($_GET["start"])){		
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 1000 ; 

				if($_GET["buscador"]== "DEUDORES")
					{
					$clientes = Cliente::get_clientes_deudores();				
					}
				else
					{
					if($_GET["buscador"]== "TODOS") 
					{
					$_POST["buscador"] = ""; 
					$_GET["buscador"] = "";
					}
					if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
					$clientes = Cliente::get_clientes($start,$end,1,$_GET["buscador"]);	
					}	
			
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);				
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				$total_clientes = Cliente::total_clientes();
				include("../../view/clientes/listado_clientes.php");
				#				$template->draw_footer();	
				}
				break;

	case "listado_proveedores" :
				{				
				if(!isset($_GET["start"])){		
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 1000 ; 

				if($_GET["buscador"]== "DEUDORES")
					{
					$clientes = Cliente::get_clientes_deudores();				
					}
				else
					{
					if($_GET["buscador"]== "TODOS") 
					{
					$_POST["buscador"] = ""; 
					$_GET["buscador"] = "";
					}
					if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
					$clientes = Cliente::get_clientes($start,$end,2,$_GET["buscador"]);	
					}	
			
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);				
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				$total_clientes = Cliente::total_clientes();
				include("../../view/clientes/listado_clientes.php");
				#				$template->draw_footer();	
				}
				break;				

	}
?>
