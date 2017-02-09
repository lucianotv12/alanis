<?php
session_start();
include_once("../../funciones.php");
include_once("../../models/clientes.class.php");
#validar_permanencia();
conectar_bd();
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
				$end = 100 ; 
				$clientes = Cliente::get_clientes($start,$end,1);	
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);

#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				$total_clientes = Cliente::total_clientes();
				include("../principal.php");
				include("../view/clientes/list.php");
				#				$template->draw_footer();	
				}
				break;
	case "new" :
				{
				// Muestra el formulario de NUEVO
				$Cliente = new Cliente;
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
				$idProvincia="";
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

			//	$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				include("../principal.php");
					include("../view/clientes/abm.php");
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
					include("../principal.php");
					include("../view/clientes/abm.php");
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

					include("../principal.php");
					include("../view/clientes/abm.php");

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
					header("Location: index.php");								
#					$_SESSION["usuario"] = serialize($usuario);

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

					$cliente->save();

					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion Cliente ".$_GET["id"];
//					mysql_query("insert into log values(null,".$_Cliente->get_id().",'".$texto."', '".$hoy."')");

					//	if($Cliente->get_id_tipo() != 1 ){
						header("Location: index.php");
					//	}else{
					//	header("Location: index.php?accion=detail&id=".$_Cliente->idCliente);
					//	}
				}
				break;

	}
?>