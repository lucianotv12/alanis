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
                 
shortcut.add("Enter", function () { busqueda('list','<?= $_POST['buscador'] ?>');});
shortcut.add("F5", function () { document.datos.buscador.focus(); });	
		  
		 </script>
</head>
<body>
<div class="contentArea"> 

<div class="header">
   
                

	<div class="pageTitle">
	<?= $mensaje_cabecera;?>
	</div>
	
	<form method="post" name="datos">
	<br>
	<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
            <tr><th colspan=20 align="left">
            BUSQUEDA FACTURA <input type="text" size="70" name="buscador" value="<?= $_POST["buscador"]?>">
            <a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('list','<?= $_POST['buscador'] ?>')">BUSCAR</A>
            <a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('list','TODOS')">TODOS</A>
            <br>
            <FONT SIZE="1" COLOR="white">Busque por : cliente, N&#176; Factura, Fecha</FONT>
            </td></tr>
            <tr>

                    <th>Fecha</th>
                    <th>Cliente</th>
                    <?if($_GET["tipo"] != "remito"):?>                                            
                    <th>N&#176; Factura</th>
                   <?else: ?>
                    <th>N&#176; Remito</th>
                   <? endif; ?>

                    <th>Neta</th>
                    <th>Bonif.</th>
                    <th>SubTotal</th>          

                    <?if($_GET["tipo"] != "remito"):?>    
                    <th>IVA 21</th>  
                    <th>IVA 10,5</th>
                    <th>Ing.Bts.</th>  
                    <th>Desc.</th>
                    <th>Total</th>
                    <?endif;?>    
                    <th>Pagado</th>
                    <th>Saldo</th>
                    <th>Estado</th>                    
                    <th>Pagos</th>
                    <th></th>
                    <th>Borrar</th>


            </tr>
                    <? $contador = 0;
                    $total_importe_final=0;
                    $total_saldo_factura=0;
                    $total_pagado=0;
                    foreach ($facturas as $factura):
                    $contador++;
                    ?>
            <tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
                    <td><?= $factura["fecha"] ?></td>
                    <td><?= $factura["nombre_cliente"] ?></td>
                    <?if($_GET["tipo"] != "remito"):?>                                                                                        
                    <td><?= $factura["n_factura"] ?></td>
                    <? else:?>
                    <td><?= $factura["n_remito"] ?></td>                    
                    <? endif;?>

                    <td>$ <?=$factura["importe"] ?></td>
                    <td>% <?=$factura["bonificacion"] ?></td>
                    <td>$ <?= $subtotal_bonificado =redondear_dos_decimal( $factura["importe"] - ($factura["importe"] * $factura["bonificacion"] / 100))  ?></td>                                        

                    <?if($_GET["tipo"] != "remito"):?>    

                    <td>$ <?=$factura["iva21"] ?></td>
                    <td>$ <?=$factura["iva10"] ?></td>
                    <td>$ <?=$factura["ingresosBrutos"] ?></td>
                    <?
                    if($factura["descuento_sel"] == 2): 
                         $descuento_total =($subtotal_bonificado + $factura["iva21"] + $factura["iva10"] + $factura["ingresosBrutos"]) * $factura["descuento"] / 100 ;                    
                         $leyenda = "IB";
                    elseif($factura["descuento_sel"] == 1):
                         $descuento_total =($subtotal_bonificado + $factura["iva21"] + $factura["iva10"]) * $factura["descuento"] / 100 ;                    
                         $leyenda = "";
                    endif; 
                    
                    $total_final = redondear_dos_decimal($subtotal_bonificado + $factura["iva21"] + $factura["iva10"] + $factura["ingresosBrutos"] - $descuento_total);
                   
                    ?>
                    <td>% <?=$factura["descuento"] ?> <?=$leyenda ?></td>                    
                    <td>$ <?=$total_final?> </td>
                    
                    <?endif;?>
                    <td>$ <?=$pagado = Factura::get_pagos_factura($factura["id"]) ;?></td> 
                    <? $saldo_factura = Factura::get_saldo_factura($total_final,$factura["id"]) ;
                    if($saldo_factura > 0) {
                                                            ?>
                    <td>$<FONT SIZE='' COLOR='red'><?= $saldo_factura?></FONT></td>
                    <? }else{ ?>
                    <td>$<FONT SIZE='' COLOR='green'><?= $saldo_factura?></FONT></td>

                    <? } 
                    $fecha_factura=explode("-",$factura["fecha"]);
                    $fechasalida= $fecha[2]."-".$fecha[1]."-".$fecha[0];

                    $fecha_vencimiento = date("Y-m-d",mktime(0, 0, 0, $fecha_factura[1]+1, $fecha_factura[2],   $fecha_factura[0]));
                            if($fecha_vencimiento < date("Y-m-d") and $saldo_factura != 0 )
                                    {
                                            echo "<td>Vencida</td>";
                                    }
                            elseif($fecha_vencimiento > date("Y-m-d") and $saldo_factura != 0 )	
                                    {
                                            echo "<td>Pendiente</td>";
                                    }
                            elseif($saldo_factura == 0 )	
                                    {
                                            echo "<td>Abonada</td>";
                                    }?>                    
                    <td>
                            <a class="classpopup" href="<?=VIEW?>facturacion/pagos_factura.php?id=<?= $factura["id"] ?>">
                            <img  src="<?= IMGS?>ver.gif"  border="0">
                            </a>
                    </td>

                    <td>
                        <?if($saldo_factura != 0):?>
                            <a class="classpopup" href="<?=VIEW?>facturacion/alta_pago.php?&id=<?= $factura["id"] ?>">
                            Pagar
                            </a>
                       <? endif;?>     
                    </td>

    		<td><a href="javaScript:pregunta('<?= $factura["id"]?>','la Compra','delete')">
                    <img src="<?= IMGS?>del.gif"  border="0">
                    </a></td>

            </tr>	
            <?
            $total_importe_final += $total_final;
            $total_saldo_factura +=$saldo_factura;
            $total_pagado += $pagado;
            endforeach ?>
            
            <tr> 
                <td align="right" colspan="<? if($_GET["tipo"] =="factura")echo "11";else echo "10";?>"><FONT COLOR="WHITE"> TOTALES :</font></td>
                <td><FONT COLOR="WHITE">$ <?= $total_importe_final?></font></td>
                <td><FONT COLOR="WHITE">$ <?= $total_pagado?></font></td></td>
                <td><FONT COLOR="WHITE">$ <?= $total_saldo_factura?></FONT></td>                
            </tr>       

            <?if($_GET["tipo"] != "remito"):?>                                            
            <tr>
                    <td align="right" colspan="13"><a class="classpopup" href="index.php?accion=nueva_factura">
                    <img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
                    </a></td>
            </tr>	
            <?else:?>
            <tr>
                    <td align="right" colspan="13"><a class="classpopup" href="index.php?accion=nueva_factura&tipo=remito">
                    <img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
                    </a></td>
            </tr>	
            
            <? endif;?>
        </table>
        </form>

</div>
</div>


</body>
</html>
