
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


                <link type="text/css" rel="stylesheet" href="http://localhost/alanis/template/css/autocomplete/jquery-ui-1.8.17.custom.css" />
    <script type='text/javascript' src="http://localhost/alanis/template/js/jquery-ui-1.8.17.custom.min.js"></script>

	<script language="JavaScript">


		$(function(){
			$('#buscador').autocomplete({
			source:"http://localhost/alanis/view/facturacion/ajax.php",
			select: function(event, ui){
				 $("#idproducto").val(ui.item.id);
             	 $("#detalle_producto").val(ui.item.descripcion);
             	 $("#precio_producto").val(ui.item.precio);	
				 			 
			//AGREGAR EL PRECIO DEL PRODUCTO 
			}
					
			});
			
		});

	shortcut.add("F1", function () { abreVentana_productos(); });
	shortcut.add("F2", function () { abreVentana_clientes(); });
	shortcut.add("Enter", function () { addTemporal();  });
        shortcut.add("insert", function () { genera_presupuesto();  });

        

	function disableEnterKey(e){
	var key;
	if(window.event){
	key = window.event.keyCode; //IE
	}else{
	key = e.which; //firefox
	}
	if(key==13){
	return false;
	}else{
	return true;
	}
	}


	var miPopup
	function abreVentana_clientes(){
		miPopup = window.open("../clientes/index.php?accion=listado_clientes","miwin","width=900,height=600,scrollbars=yes")
		miPopup.focus()
	}
	function abreVentana_productos(){
		miPopup = window.open("../productos/index.php?accion=listado_productos","miwin","width=2000,height=1000,scrollbars=yes")
		miPopup.focus()
	}

	</script>
	<script language="JavaScript">
		var cursor;
		if (document.all) {
		// Est� utilizando EXPLORER
		cursor='hand';
		} else {
		// Est� utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		var miPopup
		function abreVentana(){
			var bi=document.getElementById("baseimponible").value;
			if (bi==0) {
				miPopup = window.open("ver_proveedores.php","miwin","width=700,height=380,scrollbars=yes");
				miPopup.focus();
			} else {
				alert ("Ha comenzado la factura. No puede cambiar de proveedor");
			}
		}
	// VALIDA QUE EL NUMERO DE PRODUCTO
	function validarproducto(){
//		alert("lucho");
			var idproducto=document.getElementById("idproducto").value;
			miPopup = window.open("../../view/facturacion/comprobarproducto.php?idproducto="+idproducto,"frame_datos","width=700,height=80,scrollbars=yes");
	}	

	// VALIDA CLIENTE
	function validarcliente(){
//		alert("lucho");
			var idcliente=document.getElementById("_idcliente").value;
			miPopup = window.open("../../view/facturacion/comprobarcliente.php?idcliente="+idcliente+"&idtipo=1","frame_datos","width=700,height=80,scrollbars=yes");
	}	


	//SOLO NUMEROS
	$(document).ready(function(){
	$(".solo-numero").keyup(function(){
	if ($(this).val() != '')
	$(this).val($(this).attr('value').replace(/[^0-9\.]/g, ""));
	});
	});

	function generar_factura()
	{ 
	document.datos.submit();		
		
	}

	function addTemporal_1()
	{
	var tabla = $(document.createElement("table")).attr('width', '100%').attr('cellpadding', '5').attr('cellspacing', '5');
	var tb = $(document.createElement("tbody"));
	var tr = $(document.createElement("tr"));

	var td1 = $(document.createElement("td"));

	var td2 = $(document.createElement("td")).attr("align", "right")
											 .attr("width", "5%");


	tr.append(td1);
	tr.append(td2);


	}
	var nav4 = window.Event ? true : false;
	function acceptNum(evt){
	// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57, '.' = 46
	var key = nav4 ? evt.which : evt.keyCode;
	return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
	}

	function removeFormField() {
	$(this).empty();
		alert($(this));
	}

	function addTemporal()
	{

		if($('#cantidad').val())
			{
				if($('#idproducto').val())
					{	
					var desc = $('#detalle_producto').val();
					var numero = $('#mitabla tr:last').attr("id");
					var numero = Number(numero.replace(/[^0-9\.]+/g,""));
		//			var lucho = $(this).parent("tr").remove();
					var lucho = '"tr"';	
					//crear tabla manualmente
				//	var table = document.getElementById('mitabla');   
				//	var rows = table.getElementsByTagName("tr");   
					//crear tabla manualmente
					numero = numero + parseInt(1);

					var precio_descuento = $('#precio_producto').val() - ($('#precio_producto').val() * $('#descuento_producto').val() / 100) ;
					var precio_total = precio_descuento * $('#cantidad').val();
					precio_total = (precio_total); // valor con 2 decimales			



					$('#mitabla tr:last').after("<tr class='fila_par' id="+ numero +"><td align='center'><input type=text size='1' onfocus='this.blur()' name=cantidad"+ numero + " value=" + $('#cantidad').val() + "></td><td align='center'><input type=text size='3' onfocus='this.blur()' name=idproducto"+ numero + "  value=" + $('#idproducto').val() + "></td><td align='left'>"+desc+"</td><td align='center'><input type=text size='7' onfocus='this.blur()' name=precio_producto"+ numero + "  value=" + $('#precio_producto').val() + "></td><td align='center'><input type=text size='7' onfocus='this.blur()' name=descuento_producto"+ numero + "  value=" + $('#descuento_producto').val() + "></td><td align='center'><input type=text size='7' name=precio_total"+ numero + " id=precio_total"+ numero + "  value=" + precio_total + " onfocus='this.blur()'></td><td><a href='#' onClick=$(this).parent().parent().remove();>Quitar</a></td></tr>"); 
					
					
				//	total_total = $('#precio_total1').val() ;
					if(numero > 1){
					var total_total=0;
	
						var i=0;						
//						var total_total=parseInt($('#precio_total'+i).val());
						for(i=1;i<=numero;i++){	
							parcial = 'precio_total'+i;	
						//	total_total = parseInt(precio_total);
							total_total = parseFloat(total_total) + parseFloat($('#'+parcial+'').val());
						}

					}else{
					//	total_total = $('#precio_total1').val() ;
					$("#cantidad").attr('value', '1');
					$("#idproducto").attr('value', '');
					$("#detalle_producto").attr('value', '');
					$("#precio_producto").attr('value', '');
					$("#buscador").attr('value', '');
					$("#descuento_producto").attr('value', 0);
					$("#_total").attr('value', total_total);
					$("#buscador").focus();
					
						
					}
					total_total = (total_total); // valor con 2 decimales			

					$("#cantidad").attr('value', '1');
					$("#idproducto").attr('value', '');
					$("#detalle_producto").attr('value', '');
					$("#precio_producto").attr('value', '');
					$("#buscador").attr('value', '');
					$("#descuento_producto").attr('value', 0);
					$("#_total").attr('value', total_total);

					$("#buscador").focus();

					}//<td><img SRC='http://www.controldestockmovil.com.ar/lady-jane/templates/img/del.gif' onclick=$(this).parent('tr').remove();></td>
					//<td><a href='#' onClick='removeFormField(); return false;'>Remove</a></td>
				else
					{
					window.alert('Tiene que ingresar un Producto');		 					
					}
			}
		else
			{
			window.alert('Tiene que cargar la cantidad de productos para poder ingresar el producto');		 
			$("#cantidad").focus();
			}
	}
			 /* Opci�n 1 
			 var n = $('tr:last td', $("#mitabla")).length;

			 var tds = '<tr>';
		 for(var i = 0; i < n; i++){
			 tds += '<td>nuevo</td>';
		 }
		 tds += '</tr>';

		 $("#mitabla").append(tds);          
	   });
	$('#myTable tr:last').attr("id"); */
	</script>




	<div class="contentArea"> 

	<div class="header">
		
	<form name="datos" method="post" enctype="multipart/form-data" action="index.php?accion=generar_factura" onKeyPress="return disableEnterKey(event)" >
            <input type="hidden" name="tipo_factura" value="1" />

            <div class="pageTitle">
            NUEVO PRESUPUESTO <br>
            </div>

            <table class="tabla_list" cellpadding=2 cellspacing=5  border="0" >
                    <tr>
                            <td class="td_text" Colspan="4" align="center">Datos del Cliente</td>
                    </tr>

                    <tr>
                            <td class="td_text">Cod.Cliente:<input type="Button" value="?" onClick="abreVentana_clientes()"><input class="solo-numero" type="text" name="_idcliente" id="_idcliente" value="1" onBlur="validarcliente()" size="3" ></td>
                            <td class="td_text">Razon social:<input type="text" name="descripcion" id="descripcion" size="50" value="Consumidor Final" disabled></td> 
                            <td class="td_text">Desc.:%<input type="text" name="descuento" id="descuento" size="1" value="0"></td>
                            <td class="td_text">Condicion IVA:<input type="text" name="condicion_iva" id="condicion_iva" size="25" value="0" disabled></td>

                    </tr>
            <!--		<tr>
                            <td class="td_text" Colspan="4" align="center"><B>DATOS FACTURA</B></td>
                    </tr>
                    <tr>
                            <td class="td_text" align="center">N� Remito</td>
                            <td class="td_text" align="center">N� Factura</td>
                            <td class="td_text" align="center" >Cond. Venta</td>
                            <td class="td_text" align="center">Orden Compra</td>
                    </tr>
                    <tr>
                            <td class="td_text"><input class="solo-numero" type="text" name="n_remito" ></td>
                            <td class="td_text"><input class="solo-numero" type="text" name="n_factura"></td> 
                            <td class="td_text"><input type="text" name="condicion_venta" size="15"></td>
                            <td class="td_text"><input type="text" name="orden_compra" size="15"></td>
                    </tr>
            -->
            </table>



            <table class="tabla_list" cellpadding=2 cellspacing=5  border="0" >
                    <tr>
                            <td class="td_text" Colspan="5" align="center"><B>PRODUCTOS A INGRESAR EN FACTURA</B></td>
                    </tr>
                    <tr >
                        <td class="td_text">Busqueda:</td>
                        <td class="td_text"  colspan="3"><input type="text"  name="buscador" id="buscador" size="120" onKeypress="if (event.keyCode == 13) event.returnValue = false;" >&nbsp;
                        <img src="../../template/img/ver.png" width="16" height="16" name="lupa" onClick="abreVentana_productos()">                
                        </td>
                    </tr>

                    <tr >
                        <td class="td_text">Codigo:</td>
                        <td class="td_text"  colspan="3"><input type="text"  name="idproducto" id="idproducto" size="10" disabled></td>
                    </tr>
                    <tr>
                        <td class="td_text">Desc.:</td>
                        <td class="td_text" colspan="3"><input type="text" name="detalle_producto" id="detalle_producto"  size="120" disabled></td>
                    </tr>
                    <tr>
                        <td class="td_text">Cantidad:</td>
                        <td class="td_text"><input type="text" class="solo-numero" maxlength="6" value="1" name="cantidad" id="cantidad" size="3" onFocus="foco(this);" onBlur="no_foco(this);"></td>
                        <td class="td_text">Descuento:<input type="text" class="solo-numero" maxlength="5" name="descuento_producto" id="descuento_producto" size="2" onFocus="foco(this);this.value='';" onBlur="no_foco(this);" value="0"></td>                        
                        <td class="td_text">Precio:<input type="text" onKeyPress="return acceptNum(event)" name="precio_producto" id="precio_producto" size="15" onFocus="foco(this);" onBlur="no_foco(this);" ></td>            
                        <td class="td_text"><img SRC="http://localhost/alanis/template/img/botonagregar.jpg" onClick="addTemporal()" ></td>
                    </tr>        

            </table>

            <table id="mitabla" cellpadding=3 cellspacing=1 border=0 width="90%" align="left" style="font-size:11px" >
                <br><br><br>
                <tr>
                    <td colspan="5" align="center" style="color:white; font-size:14px; font-weight:bold"> PRODUCTOS SELECCIONADOS</td>
                </tr>	

                <tr id="0" >
                        <th>Cant.</th>
                        <th>Art.</th>
                        <th>Detalle</th>
                        <th>P/unitario</th>
                        <th>Desc.</th>
                        <th>Importe</th>
                        <th></th>
                </tr>        
            </table>
            
            <table border="0" width="90%" class="tabla_list">
                <tr align="right" class='fila_par'>
                    <td>SubTotal:</td>
                    <td width="15%" align="center"> <input type="text" name="_total" id="_total" size='7'></td>
                    <td width="5%"></td>
                </tr>
            </table>

            <table width="100%" class="tabla_list">
                <tr>
                    <td class="submit" align="center" colspan="20" >
                        <BR><BR><BR><BR>
                        <input type="submit" name="submit" value="GENERAR PRESUPUESTO" >
                        <input type="submit" name="submit" value="PRESUPUESTO SIN FACTURA" >
                                            </td>
                </tr>

           </table>
	</form>

        <br><br>
        <iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
        <ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
        </iframe>


