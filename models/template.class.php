<?php

class Template
{
	function draw_header($_variable=0,$_id=0)
	{
	$_usuario = unserialize($_SESSION["usuario"]);
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Casa Alanis</title>

	<link rel="stylesheet" type="text/css" href="<?php echo CSS?>style.css">

        <!-- SmartMenus core CSS (required) -->
        <link href="<?php echo  CSS?>sm-core-css.css" rel="stylesheet" type="text/css" />

        <!-- "sm-mint" menu theme (optional, you can use your own CSS, too) -->
        <link href="<?php echo CSS?>sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />

        <!-- #main-menu config - instance specific stuff not covered in the theme -->
        <style type="text/css">
                #main-menu {
                        position:relative;
                        z-index:9999;
                        width:auto;
                }
                #main-menu ul {
                        width:12em; /* fixed width only please - you can use the "subMenusMinWidth"/"subMenusMaxWidth" script options to override this if you like */
                }
        </style>
            
            
            
	<script language="JavaScript" src="<?php echo JS?>funciones.js"></script>
	<script src="<?php echo JS?>stuHover.js" type="text/javascript"></script>
	<script src="<?php echo JS?>shortcut.js" type="text/javascript"></script>

        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo  JS?>jquery-1.7.1.min.js"></script>


        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="<?php echo  JS?>jquery.smartmenus.js"></script>

        <!-- SmartMenus jQuery Keyboard Addon -->
        <script type="text/javascript" src="<?php echo  JS?>jquery.smartmenus.keyboard.js"></script>

        <!-- SmartMenus jQuery init -->
        <script type="text/javascript">
                $(function() {
                        $('#main-menu').smartmenus({
                                subMenusSubOffsetX: 6,
                                subMenusSubOffsetY: -8
                        });
                        $('#main-menu').smartmenus('keyboardSetHotkey', 123, 'shiftKey');
                });
        </script>        
        


<script>

shortcut.add("F8", function () { window.location="<?php echo  CTRL ?>productos/"; });
//shortcut.add("Esc", function () { window.close(); });
shortcut.add("F12", function () { btnBuscar_onclick(); });

</script>


</head>

<?php
 if($_SERVER['PHP_SELF']== '/alanis/ctrl/facturacion/index.php' and $_variable == true):

$_evento = "javascript:popUp('../../pdf/presupuesto.php?idFactura= ". $_id . " ')";
$_evento .= ';document.datos.buscador.focus();';

 $_variable = 1 ;
 elseif($_SERVER['PHP_SELF']== '/ctrl/productos/index.php' and $_variable == true):
$_evento = 'document.datos.edit_'. $_id.'.focus()';
 else: 
$_evento = 'document.datos.buscador.focus();';

 endif; ?>
<body onKeyPress="return acceptNav(event)" onLoad="<?php echo  $_evento?>">


<?php
if($_variable != 2):
    if($_usuario->gerarquia == 1) $gerarquia = "Administrador"; else $gerarquia = "Vendedor";	
    echo "Usuario Logueado : " . $_usuario->user . " - Nombre :". $_usuario->nombre ." ". $_usuario->apellido . " - Categoria :". $gerarquia  ;  ?>
    <span class="preload1"></span>
    <span class="preload2"></span>

    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-blue">
        <li ><a href="<?php echo HOME?>" >Inicio</a></li>
        <li ><a href="#" >Productos</a>
                <ul >
                        <li><a href="#">Productos</a>
                                        <ul >
                                                <li><a href="<?php echo CTRL?>productos/">Listado</a></li>
                                                <li><a href="<?php echo CTRL?>productos/index.php?accion=listado_precios">Lista Precios</a></li>
                                                 <li ><a href="<?php echo CTRL?>stock/" >Stock</a></li>
                                        </ul>
                        </li>
                        <li><a href="<?php echo CTRL?>productos/index.php?accion=list_categorias">Categorias</a>
                                        <ul >
                                                <li><a href="<?php echo CTRL?>productos/index.php?accion=list_categorias">Listado</a></li>
                                                <li><a href="<?php echo CTRL?>productos/index.php?accion=new_categoria">Nueva</a></li>
                                        </ul>
                        </li>
                </ul>
        </li>
        <li ><a href="<?php echo CTRL?>clientes/" >Clientes</a>
                <ul >
                        <li><a href="<?php echo CTRL?>clientes/" >listado Clientes</a></li>
                 </ul>
        </li>
        </li>
        <li ><a href="<?php echo CTRL?>facturacion/" >Facturacion</a>
                <ul >
        <?php if($_usuario->gerarquia == 1):?>
                        <li><a href="<?php echo CTRL?>facturacion/index.php?accion=balance_iva" >Balance IVA</a></li>
        <?php endif; ?>
                        <li><a href="<?php echo CTRL?>facturacion/" >Presupuestos</a></li>
                        <li><a href="<?php echo CTRL?>facturacion/index.php?accion=list&tipo_factura=5" >Facturas</a></li>
                        <li><a href="<?php echo CTRL?>facturacion/index.php?accion=nueva_factura" >Nueva</a></li>
                        <li><a href="<?php echo CTRL?>compras/index.php?accion=cheques" >Cheques</a></li>

                </ul>
        </li>
        <li class="top"><a href="<?php echo CTRL?>cobranzas/">Cobranzas</a>
        <?php if($_usuario->gerarquia == 1):?>
        </li>
        <li class="top"><a href="<?php echo CTRL?>proveedores/">Proveedores</a>
                <ul>
                        <li><a href="<?php echo CTRL?>proveedores/" >Listado</a></li>
                        <li><a href="<?php echo CTRL?>proveedores/index.php?accion=new" >Nuevo</a></li>
                        <li><a href="<?php echo CTRL?>compras/" >Facturas</a></li>
                        <li><a href="<?php echo CTRL?>compras/index.php?tipo=remito" >Remitos</a></li>
                </ul>
        </li>
    <!--	<li class="top"><a href="< ?=CTRL?>compras/" class="top_link"><span class="down">Compras</span></a>
                <ul class="sub">
                        <li><a href="< ?=CTRL?>compras/" >listado facturas</a></li>
                </ul>
        </li>-->

                <li><a href="<?php echo CTRL?>cobranzas/" >Herramientas</a>
                <ul>
                        <li><a href="<?php echo VIEW?>productos/gestion_precios.php" >Gestion de precios</a></li>
                        <li><a href="<?php echo VIEW?>herramientas/precios_movimientos.php" >Historial de Precios</a></li>
                        <li><a href="<?php echo VIEW?>productos/dolar.php" >Precio Dolar</a></li>
                        <li><a href="<?php echo VIEW?>herramientas/provincias.php" >Provincias</a></li>
                        <li><a href="<?php echo HOME?>backup/dump.php">Backup del Sistema</a></li>
                </ul>

        </li>
        <li ><a href="<?php echo CTRL?>usuarios/">Usuarios</a>
                <ul>
                        <li><a href="<?php echo CTRL?>usuarios/" >listado Usuarios</a></li>
                        <li><a href="<?php echo CTRL?>usuarios/index.php?accion=new" >Nuevo Usuario</a></li>
                </ul>
        </li>
        <?php endif; ?>
        <li ><a href="<?php echo CTRL?>pedidos/">Pedidos</a>
                <ul>
                        <li><a href="<?php echo CTRL?>pedidos/" >Listado Pedidos</a></li>
                        <li><a href="<?php echo CTRL?>pedidos/index.php?accion=new" >Nuevo Pedido</a></li>
                </ul>
        </li>        
        
        <li><a href="<?php echo HOME?>">Salir</a>
        </li>
    </ul>


            <?php
endif;            
}


	function draw_footer()
	{
	?>

		</body>
		</html>	

	<?php
	}
















}











?>