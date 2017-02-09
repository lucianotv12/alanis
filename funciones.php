<?php
define('ROOT','localhost');
define('DATABASE','control_alanis');
define('USER','root');
define('PASS','');

/*define('HOME','http://192.168.0.14/');
define('HOME_ACCESS','http://192.168.0.14/index.php');
define('ADMIN','http://192.168.0.14/');
define('IMGS','http://192.168.0.14/template/img/');
define('JS','http://192.168.0.14/template/js/');
define('CSS','http://192.168.0.14/template/css/');
define('FLASH','http://192.168.0.14/template/flash/');
define('VIEW','http://192.168.0.14/view/');
define('CTRL','http://192.168.0.14/ctrl/');
define('CLASES','http://192.168.0.14/models/');
*/
define('HOME','http://localhost/alanis/');
define('HOME_ACCESS','http://localhost/alanis/index.php');
define('ADMIN','http://localhost/alanis/');
define('IMGS','http://localhost/alanis/template/img/');
define('JS','http://localhost/alanis/template/js/');

define('CSS','http://localhost/alanis/template/css/');
define('FLASH','http://localhost/alanis/template/flash/');
define('VIEW','http://localhost/alanis/view/');
define('CTRL','http://localhost/alanis/ctrl/');
define('CLASES','http://localhost/alanis/models/');

error_reporting(E_ERROR | E_WARNING | E_PARSE);

//192.168.1.140
function conectar_bd()
	{
	$conect = mysql_pconnect(ROOT,USER,PASS);
	if (!$conect)
		{
		echo( "<P>IMPOSIBLE CONECCION A BASE DE DATOS.</P>");
		exit();
		}
		
		// seleccionar la base ****************************
	if (!@mysql_select_db(DATABASE) )
		{
   		echo( "<P>No se localizo la base .</P>" );
   		exit();
   		}
	}

/*----------------------------------------------------------------------------*/
/* funcion que valida la permanencia del usuario en la pagina
/* $_redireccion_estricta true/false indica si mata y redirecciona o no
/*----------------------------------------------------------------------------*/
function validar_permanencia ($_redireccion_estricta = true)
	{
	if (!isset($_SESSION["usuario"]))
		{
		# Verifico si me pasa una URL para mostrar un mensaje de error
		if($_redireccion_estricta)
			{# sino muestro el mensaje por defecto y redirecciono al Index
			redireccionar("Su sessi&oacute;n ha caducado, aguarde, ser&aacute; redireccionado...",3);
			}
		return false;
		}
	else
		{
		return true;
		}
	}


/*----------------------------------------------------------------------------*/
/* Funcion que retorna el directorio correspondiente a la $_categoria_id y el $_categoria_id
/*----------------------------------------------------------------------------*/
function file_patch($_categoria_id, $_articulo_id)
	{
	return FILES_PATCH.$_categoria_id."/".$_articulo_id."/";
	}

/*----------------------------------------------------------------------------*/
/* funcion que regresa a la url que inicio la peticion
/*----------------------------------------------------------------------------*/
function regresar ($_regresar=1)
	{
 	?>
 	<script>
 	function regresar()
 		{
        history.go(-<?php echo $_regresar ?>)
 		}
 	</script>
 	<body onLoad="regresar()">
 	</body>
 	<?php
	}
/*----------------------------------------------------------------------------*/
/* funcion que regresa a la url que inicio la peticion
/*----------------------------------------------------------------------------*/
function redireccionar (  $message="", $seconds=0)
	{
	$url= HOME_ACCESS ;
	header("Refresh: ".$seconds."; url=".$url); // waits 3 seconds & sends to homepage
	echo "<h4>".$message."</h4>";
	die();
	}
/*----------------------------------------------------------------------------*/
/* funcion que regresa a la url que inicio la peticion
/*----------------------------------------------------------------------------*/
function arrojar_error ( $url, $message="", $seconds=3)
	{
	header("Refresh: ".$seconds."; url=".$url); // waits 3 seconds & sends to homepage
	echo "<h4>".$message."</h4>";
	die();
	}

/*----------------------------------------------------------------------------*/
/* funcion que redirecciona a la URL pasada
/*----------------------------------------------------------------------------*/
function ir_a ( $url)
	{
	header("Location: ".$url);
	die();
	}


/**
 * Métodos estáticos PHP
 */
function jsCommand($command){
	$html = '<script type="text/javascript">'."\n";
	$html.= "	$command;\n";
	$html.= "</script>\n";
	echo $html;
}

function jsAlert($txt){
	jsCommand("alert('$txt')");
}

function jsRedir($url){
	jsCommand("location.href='$url'");
}


/*----------------------------------------------------------------------------*/
/* funcion que hace una inclusion automatica de las clases
/*----------------------------------------------------------------------------*/
function __autoload($class_name)
	{
	$bajadas = "";
	while (!is_dir($bajadas."models"))
		{
		$bajadas .= "../";
		}

		require_once($bajadas."models/".strtolower($class_name).".class.php");
	}

function redondear_dos_decimal($valor) { 
   $float_redondeado=round($valor * 100) / 100; 
   return $float_redondeado; 
} 
function convertir_fecha($fecha){
    ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
    return $lafecha;
} 

?>
