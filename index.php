<?php
session_start();
session_destroy();
session_start();

include_once("funciones.php");


//conectar_bd();

if (isset($_POST["user"]) && isset($_POST["password"]))
	{
	$id = Usuario::login_admin($_POST["user"],$_POST["password"]);
	if ($id)
		{
	 	$_usuario = new Usuario($id);
	  	$_SESSION["usuario"] = serialize($_usuario);
	 	//header("Location: principal_header.php");
		}
	else
		{
		regresar();
		}
	}

if(!$_SESSION["usuario"]):
	include("view/index.php");
else:
	$_usuario = unserialize($_SESSION["usuario"]);
	if($_usuario->gerarquia == 1):
		header("Location: ctrl/productos/index.php");								
	else:
		header("Location: ctrl/facturacion/index.php?accion=nueva_factura");								
	endif;

endif;
/*	$id = Usuario::login_admin("lucho","123");

	 	$_usuario = new Usuario($id);
	  	$_SESSION["usuario"] = serialize($_usuario);
	 	header("Location: principal_header.php");
*/
?>
