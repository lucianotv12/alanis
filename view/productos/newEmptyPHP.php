
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Casa Alanis</title>

	<link rel="stylesheet" type="text/css" href="http://localhost/alanis/template/css/style.css">

        <!-- SmartMenus core CSS (required) -->
        <link href="http://localhost/alanis/template/css/sm-core-css.css" rel="stylesheet" type="text/css" />

        <!-- "sm-mint" menu theme (optional, you can use your own CSS, too) -->
        <link href="http://localhost/alanis/template/css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />

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
            
            
            
	<script language="JavaScript" src="http://localhost/alanis/template/js/funciones.js"></script>
	<script src="http://localhost/alanis/template/js/stuHover.js" type="text/javascript"></script>
	<script src="http://localhost/alanis/template/js/shortcut.js" type="text/javascript"></script>

        <!-- jQuery -->
        <script type="text/javascript" src="http://localhost/alanis/template/js/jquery-1.7.1.min.js"></script>


        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="http://localhost/alanis/template/js/jquery.smartmenus.js"></script>

        <!-- SmartMenus jQuery Keyboard Addon -->
        <script type="text/javascript" src="http://localhost/alanis/template/js/jquery.smartmenus.keyboard.js"></script>

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

shortcut.add("F8", function () { window.location="http://localhost/alanis/ctrl/productos/"; });
//shortcut.add("Esc", function () { window.close(); });
shortcut.add("F12", function () { btnBuscar_onclick(); });
        shortcut.add("insert", function () { genera_presupuesto();  });

</script>


</head>

<body onKeyPress="return acceptNav(event)" onLoad="document.datos.buscador.focus();">


Usuario Logueado : lucho - Nombre :luciano verni - Categoria :Administrador    <span class="preload1"></span>
    <span class="preload2"></span>

    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-blue">
        <li ><a href="http://localhost/alanis/" >Inicio</a></li>
        <li ><a href="#" >Productos</a>
                <ul >
                        <li><a href="#">Productos</a>
                                        <ul >
                                                <li><a href="http://localhost/alanis/ctrl/productos/">Listado</a></li>
                                                <li><a href="http://localhost/alanis/ctrl/productos/index.php?accion=listado_precios">Lista Precios</a></li>
                                                 <li ><a href="http://localhost/alanis/ctrl/stock/" >Stock</a></li>
                                        </ul>
                        </li>
                        <li><a href=http://localhost/alanis/ctrl/productos/index.php?accion=list_categorias>Categorias</a>
                                        <ul >
                                                <li><a href="http://localhost/alanis/ctrl/productos/index.php?accion=list_categorias">Listado</a></li>
                                                <li><a href="http://localhost/alanis/ctrl/productos/index.php?accion=new_categoria">Nueva</a></li>
                                        </ul>
                        </li>
                </ul>
        </li>
        <li ><a href="http://localhost/alanis/ctrl/clientes/" >Clientes</a>
                <ul >
                        <li><a href="http://localhost/alanis/ctrl/clientes/" >listado Clientes</a></li>
                 </ul>
        </li>
        </li>
        <li ><a href="http://localhost/alanis/ctrl/facturacion/" >Facturacion</a>
                <ul >
                                <li><a href="http://localhost/alanis/ctrl/facturacion/index.php?accion=balance_iva" >Balance IVA</a></li>
                                <li><a href="http://localhost/alanis/ctrl/facturacion/" >Presupuestos</a></li>
                        <li><a href="http://localhost/alanis/ctrl/facturacion/index.php?accion=list&tipo_factura=5" >Facturas</a></li>
                        <li><a href="http://localhost/alanis/ctrl/facturacion/index.php?accion=nueva_factura" >Nueva</a></li>
                        <li><a href="http://localhost/alanis/ctrl/compras/index.php?accion=cheques" >Cheques</a></li>

                </ul>
        </li>
        <li class="top"><a href="http://localhost/alanis/ctrl/cobranzas/">Cobranzas</a>
                </li>
        <li class="top"><a href="http://localhost/alanis/ctrl/proveedores/">Proveedores</a>
                <ul>
                        <li><a href="http://localhost/alanis/ctrl/proveedores/" >Listado</a></li>
                        <li><a href="http://localhost/alanis/ctrl/proveedores/index.php?accion=new" >Nuevo</a></li>
                        <li><a href="http://localhost/alanis/ctrl/compras/" >Facturas</a></li>
                        <li><a href="http://localhost/alanis/ctrl/compras/index.php?tipo=remito" >Remitos</a></li>
                </ul>
        </li>
    <!--	<li class="top"><a href="< ?=CTRL?>compras/" class="top_link"><span class="down">Compras</span></a>
                <ul class="sub">
                        <li><a href="< ?=CTRL?>compras/" >listado facturas</a></li>
                </ul>
        </li>-->

                <li><a href="http://localhost/alanis/ctrl/cobranzas/" >Herramientas</a>
                <ul>
                        <li><a href="http://localhost/alanis/view/productos/gestion_precios.php" >Gestion de precios</a></li>
                        <li><a href="http://localhost/alanis/view/herramientas/precios_movimientos.php" >Historial de Precios</a></li>
                        <li><a href="http://localhost/alanis/view/productos/dolar.php" >Precio Dolar</a></li>
                        <li><a href="http://localhost/alanis/view/herramientas/provincias.php" >Provincias</a></li>
                        <li><a href="http://localhost/alanis/backup/dump.php">Backup del Sistema</a></li>
                </ul>

        </li>
        <li ><a href="http://localhost/alanis/ctrl/usuarios/">Usuarios</a>
                <ul>
                        <li><a href="http://localhost/alanis/ctrl/usuarios/" >listado Usuarios</a></li>
                        <li><a href="http://localhost/alanis/ctrl/usuarios/index.php?accion=new" >Nuevo Usuario</a></li>
                </ul>
        </li>
                <li ><a href="http://localhost/alanis/ctrl/pedidos/">Pedidos</a>
                <ul>
                        <li><a href="http://localhost/alanis/ctrl/pedidos/" >Listado Pedidos</a></li>
                        <li><a href="http://localhost/alanis/ctrl/pedidos/index.php?accion=new" >Nuevo Pedido</a></li>
                </ul>
        </li>        
        
        <li><a href="http://localhost/alanis/">Salir</a>
        </li>
    </ul>


            
<div class="contentArea"> 

<div class="header">

<link rel="stylesheet" type="text/css" href="http://localhost/alanis/template/js/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
<script type="text/javascript" src="http://localhost/alanis/template/js/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<script type="text/javascript"> $(document).ready(function () {  
 $("a.classpopup").fancybox({  
 'width': '80%',  
 'height': '100%', 
 //'centerOnScroll':true, 
 'scrolling':'no',
 'autoScale': false,  
 'transitionIn': 'none',  
 'transitionOut': 'none',  
 'type': 'iframe',
 'hideOnOverlayClick' : false,
 'onClosed': function() { parent.location.reload(true); ; }			 
 });  
 });  
  
 </script>




	<div class="pageTitle">
	LISTADO GENERAL DE PRESUPUESTOS
	</div>
	
	<form method="post" name="datos">
	<br>
	<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><th colspan=20 align="left">
	BUSQUEDA PRESUPUESTO <input type="text" size="70" name="buscador" value="">
	<a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('list','')">BUSCAR</A>
	<a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('list','TODOS')">TODOS</A>
	<br>
	<FONT SIZE="1" COLOR="white">Busque por : cliente, N&#176; Factura, Fecha</FONT>
	</td></tr>
	<tr>

					<th>Fecha</th>
					<th>Cliente</th>
                    					<th>Importe</th>
					<th>Saldo</th>
					<th>Estado</th>
					<th>Facturar</th>					<th>Comprobantes</th>					<th>Ver</th>
					<th>Pagos</th>
					<th>Borrar</th>
						</tr>
								<tr class="fila_impar">
					<td>29/01/2015</td>
					<td>Consumidor Final</td>
                    					<td>$ 46.04</td>
										<td>$<FONT SIZE='' COLOR='red'>46.04</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=149">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=149')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=149">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=149">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('149','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante149" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>29/01/2015</td>
					<td>Consumidor Final</td>
                    					<td>$ 527.08</td>
										<td>$<FONT SIZE='' COLOR='red'>527.08</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=145">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=145')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=145">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=145">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('145','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante145" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>29/01/2015</td>
					<td>Consumidor Final</td>
                    					<td>$ 423.76</td>
										<td>$<FONT SIZE='' COLOR='red'>423.76</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=144">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=144')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=144">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=144">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('144','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante144" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>29/01/2015</td>
					<td>Consumidor Final</td>
                    					<td>$ 178.24</td>
										<td>$<FONT SIZE='' COLOR='red'>178.24</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=143">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=143')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=143">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=143">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('143','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante143" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>29/01/2015</td>
					<td>Consumidor Final</td>
                    					<td>$ 209.58</td>
										<td>$<FONT SIZE='' COLOR='red'>209.58</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=142">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=142')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=142">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=142">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('142','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante142" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>29/01/2015</td>
					<td>Consumidor Final</td>
                    					<td>$ 121.17</td>
										<td>$<FONT SIZE='' COLOR='red'>121.17</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=138">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=138')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=138">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=138">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('138','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante138" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>28/01/2015</td>
					<td>Consumidor Final</td>
                    					<td>$ 10137.31</td>
										<td>$<FONT SIZE='' COLOR='red'>10137.31</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=129">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=129')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=129">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=129">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('129','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante129" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>28/01/2015</td>
					<td>Consumidor Final</td>
                    					<td>$ 743.73</td>
										<td>$<FONT SIZE='' COLOR='red'>743.73</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=128">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=128')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=128">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=128">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('128','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante128" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>18/12/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 759.92</td>
										<td>$<FONT SIZE='' COLOR='red'>759.92</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=127">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=127')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=127">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=127">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('127','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante127" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>18/12/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 2213.15</td>
										<td>$<FONT SIZE='' COLOR='red'>2213.15</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=126">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=126')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=126">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=126">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('126','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante126" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>03/12/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 898.00</td>
										<td>$<FONT SIZE='' COLOR='red'>898</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=125">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=125')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=125">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=125">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('125','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante125" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>07/11/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 520.71</td>
										<td>$<FONT SIZE='' COLOR='red'>520.71</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=124">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=124')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=124">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=124">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('124','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante124" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>07/11/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 10848.22</td>
										<td>$<FONT SIZE='' COLOR='red'>10848.22</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=123">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=123')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=123">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=123">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('123','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante123" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>05/11/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 10536.42</td>
										<td>$<FONT SIZE='' COLOR='red'>10536.42</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=121">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=121')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=121">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=121">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('121','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante121" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>05/11/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 6475.78</td>
										<td>$<FONT SIZE='' COLOR='red'>6475.78</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=120">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=120')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=120">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=120">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('120','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante120" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>28/10/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 122.71</td>
										<td>$<FONT SIZE='' COLOR='red'>122.71</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=118">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=118')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=118">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=118">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('118','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante118" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>28/10/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 16.10</td>
										<td>$<FONT SIZE='' COLOR='red'>16.1</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=117">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=117')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=117">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=117">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('117','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante117" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>28/10/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 113.13</td>
										<td>$<FONT SIZE='' COLOR='red'>113.13</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=116">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=116')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=116">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=116">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('116','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante116" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>28/10/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 2985.52</td>
										<td>$<FONT SIZE='' COLOR='red'>2985.52</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=115">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=115')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=115">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=115">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('115','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante115" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>28/10/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 2985.52</td>
										<td>$<FONT SIZE='' COLOR='red'>2985.52</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=114">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=114')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=114">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=114">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('114','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante114" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>28/10/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 2936.54</td>
										<td>$<FONT SIZE='' COLOR='red'>2936.54</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=113">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=113')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=113">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=113">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('113','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante113" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>28/10/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 1380.11</td>
										<td>$<FONT SIZE='' COLOR='red'>1380.11</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=112">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=112')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=112">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=112">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('112','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante112" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>28/10/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 1380.11</td>
										<td>$<FONT SIZE='' COLOR='red'>1380.11</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=111">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=111')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=111">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=111">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('111','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante111" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>28/10/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 1380.11</td>
										<td>$<FONT SIZE='' COLOR='red'>1380.11</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=110">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=110')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=110">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=110">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('110','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante110" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 117.77</td>
										<td>$<FONT SIZE='' COLOR='red'>117.77</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=109">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=109')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=109">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=109">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('109','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante109" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 1722.05</td>
										<td>$<FONT SIZE='' COLOR='red'>1722.05</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=108">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=108')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=108">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=108">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('108','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante108" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 1722.05</td>
										<td>$<FONT SIZE='' COLOR='red'>1722.05</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=107">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=107')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=107">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=107">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('107','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante107" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 352.92</td>
										<td>$<FONT SIZE='' COLOR='red'>352.92</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=106">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=106')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=106">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=106">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('106','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante106" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 4676.74</td>
										<td>$<FONT SIZE='' COLOR='red'>4676.74</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=105">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=105')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=105">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=105">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('105','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante105" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 3831.89</td>
										<td>$<FONT SIZE='' COLOR='red'>3831.89</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=104">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=104')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=104">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=104">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('104','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante104" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 3831.89</td>
										<td>$<FONT SIZE='' COLOR='red'>3831.89</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=103">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=103')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=103">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=103">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('103','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante103" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 3082.13</td>
										<td>$<FONT SIZE='' COLOR='red'>3082.13</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=102">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=102')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=102">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=102">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('102','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante102" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 3082.13</td>
										<td>$<FONT SIZE='' COLOR='red'>3082.13</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=101">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=101')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=101">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=101">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('101','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante101" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 3082.13</td>
										<td>$<FONT SIZE='' COLOR='red'>3082.13</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=100">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=100')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=100">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=100">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('100','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante100" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 3082.13</td>
										<td>$<FONT SIZE='' COLOR='red'>3082.13</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=99">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=99')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=99">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=99">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('99','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante99" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 3082.13</td>
										<td>$<FONT SIZE='' COLOR='red'>3082.13</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=98">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=98')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=98">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=98">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('98','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante98" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 3082.13</td>
										<td>$<FONT SIZE='' COLOR='red'>3082.13</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=97">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=97')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=97">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=97">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('97','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante97" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>09/09/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 3082.13</td>
										<td>$<FONT SIZE='' COLOR='red'>3082.13</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=96">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=96')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=96">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=96">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('96','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante96" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>12/08/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 756.75</td>
										<td>$<FONT SIZE='' COLOR='red'>756.75</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=95">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=95')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=95">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=95">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('95','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante95" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>12/08/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 756.75</td>
										<td>$<FONT SIZE='' COLOR='red'>756.75</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=94">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=94')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=94">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=94">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('94','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante94" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>12/08/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 393.19</td>
										<td>$<FONT SIZE='' COLOR='red'>393.19</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=93">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=93')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=93">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=93">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('93','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante93" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>12/08/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 156.92</td>
										<td>$<FONT SIZE='' COLOR='red'>156.92</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=92">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=92')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=92">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=92">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('92','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante92" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>12/08/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 587.15</td>
										<td>$<FONT SIZE='' COLOR='red'>587.15</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=90">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=90')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=90">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=90">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('90','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante90" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>11/08/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 133.63</td>
										<td>$<FONT SIZE='' COLOR='red'>133.63</FONT></td>
					<td>Vencida</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=89">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=89')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=89">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=89">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('89','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante89" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_impar">
					<td>29/07/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 1844.02</td>
										<td>$<FONT SIZE='' COLOR='red'>1844.02</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=88">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=88')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=88">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=88">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('88','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante88" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr class="fila_par">
					<td>29/07/2014</td>
					<td>Consumidor Final</td>
                    					<td>$ 710.21</td>
										<td>$<FONT SIZE='' COLOR='red'>710.21</FONT></td>
					<td>Pendiente</td>										<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=87">
						<img src="http://localhost/alanis/template/img/tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
															<td >
						<img style="" src="http://localhost/alanis/template/img/factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=87')">
					</td>

								<td>
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/pagos_factura.php?id=87">
					<img  src="http://localhost/alanis/template/img/lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    
					<a class="classpopup" href="http://localhost/alanis/view/facturacion/alta_pago.php?&id=87">
					Pagar
					</a>
                                        
                                </td>

						<td><a href="javaScript:pregunta('87','Presupuesto','delete')">
				<img src="http://localhost/alanis/template/img/del.gif"  border="0">
				</a></td> 
				
				</tr>						
				<tr id="flotante87" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
									
						</table>
					</td>
					</tr>
								<tr>
					<td align="right" colspan="10"><a href="index.php?accion=nueva_factura">
					<img style="display:block;" src="http://localhost/alanis/template/img/add2.gif"  border="0" >
					</a></td>
				</tr>	

				</table>
			</form>
		</td>
			</tr>
		</form>

	<table>
</div>
</div>


</body>
</html>
