<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
		<script>
		var miPopup
		function abreVentana(){
			miPopup = window.open("../productos/index.php?accion=listado_productos","miwin","width=500,height=300,scrollbars=yes")
			miPopup.focus()
		}
		function abre_nueva_factura(){
			miPopup = window.open("index.php?accion=nueva_factura","miwin","width=800,height=600,scrollbars=yes")
			miPopup.focus()
		}
		
		</script> 


		<script type="text/javascript">
		function mostrar(variable) {
		  divs = 'flotante' + variable ;
		  enla = 'enla'	+ variable ;
		  obj = document.getElementById(divs);
		  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
		  document.getElementById(enla).innerHTML = (obj.style.display=='none') ? 'Mostrar' : 'Ocultar';
		}
		</script>
		<SCRIPT LANGUAGE="JavaScript">
		<!-- Begin
		function popUp(URL) {
		day = new Date();
		id = day.getTime();
		eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=850,height=800');");
		}
		// End -->
		</script>

		<link rel="stylesheet" type="text/css" href="<?= JS?>fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
		<script type="text/javascript" src="<?= JS?>fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

		<script type="text/javascript"> $(document).ready(function () {  
		 $("a.classpopup").fancybox({  
		 'width': '55%',  
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
</head>
<body>
<div class="contentArea"> 

<div class="header">


	<div class="pageTitle">
	BALANCEADOR DE IVA
	</div>
	
	<form method="post" name="datos">
	<br>
	<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><th colspan=20 align="left">
	BUSQUEDA FACTURA <input type="text" size="70" name="buscador" value="<?= $_POST["buscador"]?>">
	<a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('balance_iva','<?= $_POST['buscador'] ?>')">BUSCAR</A>
	<a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('balance_iva','TODOS')">TODOS</A>
	<br>
	<FONT SIZE="1" COLOR="white">Busque por : cliente, N&#176; Factura, Fecha</FONT>
	<br>
	Buscar por Fecha : A&Ntilde;O:
	<?
	$anio_actual = date("Y");
	$anio_anterior  = date("Y")-1;
	?>
		<select name="anio">
		<option value="<?=$anio_actual?>"><?=$anio_actual?></option>
		<option value="<?=$anio_anterior?>"><?=$anio_anterior?></option>
		</select>
	<?
	$mes_actual = date("m");
	if($_GET["mes"]) $mes_actual = $_GET["mes"]; 
	?>
		<select name="mes" onChange="javaScript:busqueda_fecha('<?= $_POST['anio'] ?>','<?= $_POST['mes'] ?>')" >
		<option value="01" <? if($mes_actual == "01") echo "selected"; ?>>Enero</option>
		<option value="02" <? if($mes_actual == "02") echo "selected"; ?>>Febrero</option>
		<option value="03" <? if($mes_actual == "03") echo "selected"; ?>>Marzo</option>
		<option value="04" <? if($mes_actual == "04") echo "selected"; ?>>Abril</option>
		<option value="05" <? if($mes_actual == "05") echo "selected"; ?>>Mayo</option>
		<option value="06" <? if($mes_actual == "06") echo "selected"; ?>>Junio</option>
		<option value="07" <? if($mes_actual == "07") echo "selected"; ?>>Julio</option>
		<option value="08" <? if($mes_actual == "08") echo "selected"; ?>>Agosto</option>
		<option value="09" <? if($mes_actual == "09") echo "selected"; ?>>Septiembre</option>
		<option value="10" <? if($mes_actual == "10") echo "selected"; ?>>Octubre</option>
		<option value="11" <? if($mes_actual == "11") echo "selected"; ?>>Noviembre</option>
		<option value="12" <? if($mes_actual == "12") echo "selected"; ?>>Diciembre</option>
		</select>

	<br>	
	
	</td></tr>
    
    <tr>
    	<td colspan="5"></td>
     	<th colspan="2" align="center" >BALANCE IVA</th>
     	<th colspan="2" align="center">BALANCE INGRESOS BRUTOS</th>
    </tr>
	<tr>

					<th width="5%">Fecha</th>
					<th width="20%">Cliente / Proveedor</th>
					<th width="9%">N&#176; Remito</th>
					<th width="9%">N&#176; Factura</th>
					<th width="10%">Importe C/IVA</th>
					<th width="8%">COMPRA</th>
					<th width="8%">VENTA</th>
					<th width="8%">COMPRA</th>
					<th width="8%">VENTA</th>                                        
					<th width="10%">Tipo Factura</th>
					<th width="5%">Pagos</th>
			<? if($tipo_factura == 1 ){?>		<th>Borrar</th><? } ?>

					<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
				<? $contador = 0;
				$total_compras =0;
				$total_ventas =0;
				foreach ($facturas as $factura):
				$contador++;
				?>
				<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
					<td><?= $factura["fecha"] ?></td>
					<td><?= $factura["nombre_cliente"] ?></td>
					<td><?= $factura["n_remito"] ?></td>
					<td><?= $factura["n_factura"] ?></td>

					<td>$ <?=$factura["importe"] ?></td>
					
					<? if($factura["idTipo"] == 5) : ?>
					<!-- IVA VENTA -->		

					<? $productos_factura= Factura::get_productos_x_factura($factura["id"]);
						$contador_iva = 0;
						$importe_sin_iva = redondear_dos_decimal($factura["importe"]) / 1.21 ;
						$ingresos_brutos_ventas = redondear_dos_decimal($importe_sin_iva * 3.5 / 100);
						$total_ingresos_brutos_ventas += $ingresos_brutos_ventas;
						foreach($productos_factura as $producto_factura):
						
			//precio de lista del producto
						$precio_producto = redondear_dos_decimal(Producto::get_precio_lista($producto_factura["idProducto"]));
						
			// saca el iva del producto (a todos el 21 %, no importa que iva tenga en el listado)
						$precio_sin_iva = $precio_producto / 1.21;
						
			//iva del producto  s/iva
						$precio_iva = $precio_sin_iva * 0.21;
						
						$precio_iva = $precio_iva * $producto_factura["cantidad"];			

						$contador_iva += redondear_dos_decimal($precio_iva); 	

						endforeach;
						$total_ventas += $contador_iva;
					?>
					<td align="center"></td>
					<td align="center">$ <?=$contador_iva ?></td>
					<td align="center"></td>
					<td align="center">$<?=redondear_dos_decimal($ingresos_brutos_ventas)?></td>                    
                    					
					<? elseif($factura["idTipo"] == 6) :
					 $iva_compra = $factura["iva21"] + $factura["iva10"];
					 $total_compras += $iva_compra; 
					 $total_ingresos_brutos_compras += $factura["ingresosBrutos"] ;?>					
					<!-- IVA COMPRA -->		

					<td align="center">$ <?=$iva_compra ?></td>	
					<td align="center"></td>			
					<td align="center">$ <?=$factura["ingresosBrutos"] ?></td>                    
					<td align="center"></td>


					<? endif;?>			
				<td><? if($factura["idTipo"] == 5) echo "Venta"; elseif($factura["idTipo"] == 6) echo"Compra";?>
				</td>
				<td>
					<a class="classpopup" href="<?=VIEW?>facturacion/pagos_factura.php?id=<?= $factura["id"] ?>">
					<img  src="<?= IMGS?>ver.gif"  border="0">
					</a>
				</td>



				</tr>						
				<? endforeach ?>
				<tr>
					<td align="right" colspan="10">&nbsp;</td>
				</tr>	

				<tr>
					<td align="CENTER" colspan="5"><FONT SIZE="3" COLOR="white">TOTALES  </FONT></td>
					<td align="CENTER"><FONT SIZE="" COLOR="white">$ <?= $total_compras?></FONT></td>
					<td align="CENTER" ><FONT SIZE="" COLOR="white">$ <?= $total_ventas?></FONT></td>
					<td align="CENTER"><FONT SIZE="" COLOR="white">$ <?= $total_ingresos_brutos_compras?></FONT></td>
					<td align="CENTER" ><FONT SIZE="" COLOR="white">$ <?= $total_ingresos_brutos_ventas?></FONT></td>
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
