
<div class="contentArea"> 

<div class="header">

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
  
 </script>




	<div class="pageTitle">
	<?= $titulo; ?>

	</div>
	
	<form method="post" name="datos">
	<br>
	<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><th colspan=20 align="left">
	BUSQUEDA <?=$variable;?> <input type="text" size="70" name="buscador" value="<?= $_POST["buscador"]?>">
	<a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('list','<?= $_POST['buscador'] ?>')">BUSCAR</A>
	<a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('list','TODOS')">TODOS</A>
	<br>
	<FONT SIZE="1" COLOR="white">Busque por : cliente, N&#176; Factura, Fecha</FONT>
	</td></tr>
	<tr>

					<th>Fecha</th>
					<th>Cliente</th>
                    <? if($tipo_factura == 5 ): ?>
					<th>N&#176; Remito</th>
					<th>N&#176; Factura</th>
					<? endif; ?>
					<th>Importe</th>
					<th>Saldo</th>
					<th>Estado</th>
				<? if($tipo_factura == 1 ){?>	<th>Facturar</th><? } ?>
				<? if($tipo_factura == 1 ){
					?>	<th>Comprobantes</th><? 
					}elseif($tipo_factura == 5 ){ ?>
					<th>Facturas</th>
					<th>Remitos</th>
					<? } ?>
					<th>Ver</th>
					<th>Pagos</th>
			<? if($tipo_factura == 1 ){?>		<th>Borrar</th><? } ?>

					<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
				<? $contador = 0;
				foreach ($facturas as $factura):
				$contador++;
				?>
				<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
					<td><?= $factura["fecha"] ?></td>
					<td><?= $factura["nombre_cliente"] ?></td>
                    <? if($tipo_factura == 5 ): ?>
					<td><?= $factura["n_remito"] ?></td>
					<td><?= $factura["n_factura"] ?></td>
					<? endif; ?>
					<td>$ <?=$factura["importe"] ?></td>
					<? $saldo_factura = Factura::get_saldo_factura($factura["importe"],$factura["id"]) ;
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
							}
					?>
					<? if($factura["tipo_factura"] != "Factura"):?>
					<td>
						<a class="classpopup" href="index.php?accion=facturar_registro&id=<?=$factura["id"];?>">
						<img src="<?= IMGS?>tilde.png"  border="0" height ="20px" width="20px" >
						</a>
					</td>
						<? endif;?>
				<? if($factura["tipo_factura"] == "Factura"):?>	
					<!-- IMPRIME REMITO -->
					<td>
						<img style="" src="<?= IMGS?>factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=<?= $factura["id"] ?>')">
					</td>
					<td>
				<!--		<img style="" src="< ?= IMGS?>factura.jpg" onCLICK="javascript:popUp('../clientes/index.php?accion=imprimir_remito&id=<?= $factura["idCliente"] ?>&idfactura=< ?= $factura["id"]?>')">-->
						<img style="" src="<?= IMGS?>factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/remito.php?idFactura=<?= $factura["id"] ?>')">

						</td>
				<? elseif($factura["tipo_factura"] == "Presupuesto"): ?>
					<td >
						<img style="" src="<?= IMGS?>factura.jpg"  border="0" onCLICK="javascript:popUp('../../pdf/presupuesto.php?idFactura=<?= $factura["id"] ?>')">
					</td>

				<? endif;?>
				<td>
					<a class="classpopup" href="<?=VIEW?>facturacion/pagos_factura.php?id=<?= $factura["id"] ?>">
					<img  src="<?= IMGS?>lupa.gif"  border="0" height ="20px" width="20px" >
					</a>
				</td>

				<td>
                                    <?if($saldo_factura != 0):?>

					<a class="classpopup" href="<?=VIEW?>facturacion/alta_pago.php?&id=<?= $factura["id"] ?>">
					Pagar
					</a>
                                    <? endif;?>    
                                </td>

		<? if($tipo_factura == 1 ){?>
				<td><a href="javaScript:pregunta('<?= $factura["id"]?>','Presupuesto','delete')">
				<img src="<?= IMGS?>del.gif"  border="0">
				</a></td> 
				<? } ?>

				</tr>						
				<tr id="flotante<?= $factura["id"] ?>" style="display:none">	
					<td colspan="7">
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
							<? $pagos_facturas = Factura::get_pagos_facturas($factura["n_factura"],$factura["idCliente"]); 					
							$contador1=0;
							foreach($pagos_facturas as $pagos_factura):
							$contador1++;
							?>								
							<tr class="<?=($contador1%2==0? "fila_par":"fila_impar");?>">
							<td><?=$pagos_factura["fecha"];?></td>
							<td><?=$pagos_factura["importe"];?></td>
							</tr>
							<? endforeach; ?>		
						</table>
					</td>
					</tr>
				<? endforeach ?>
				<tr>
					<td align="right" colspan="10"><a href="index.php?accion=nueva_factura">
					<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
					</a></td>
				</tr>	

				</table>
			</form>
		</td>
		<? if($_GET["pago"] == true){
		 $factura_pago = new Factura($_GET['idfactura']);
			?>

		<td>&nbsp;&nbsp;&nbsp;</td>
		<td valign="button">
		<form name="pago_factura" method="post" enctype="multipart/form-data" action="index.php?accion=insert_pago&id=<?=$_GET['id']?>">

			<table  border=5 cellspacing=3 cellpadding=4>
				<tr>
					<td colspan="5" align="center">
						<div class="pageTitle">
						Pago Factura
						</div>
					</td>
				</tr>
				<tr>
					<td class="td_text">N&#176; Remito:</td><td class="td_text"><input name="n_remito_pago" size="12"  type="text" <?= $deshabilitado?> value="<?=$factura_pago->get_n_remito();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
					<td class="td_text">N&#176; Factura:</td><td class="td_text"><input name="n_factura_pago" size="12"  type="text"  value="<?=$factura_pago->get_n_factura();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
				</tr>
				<tr>
					<td class="td_text">Fecha Pago:</td><td class="td_text"><input name="fecha_pago" size="12"  type="text" <?= $deshabilitado?> value="<?= $fecha_actual=date("d/m/Y");  ?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
					<td class="td_text">Importe:</td><td class="td_text"><input name="importe_pago" size="12"  type="text" <?= $deshabilitado?> value="<?=$factura_pago->get_saldo_factura($factura_pago->get_importe(),$factura_pago->get_n_factura(),$factura->get_idCliente());?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
				</tr>
				<tr>
				<td class="submit" align="center" colspan="10" ><input type="submit" name="submit" value="GENERAR PAGO" ></td>
				</tr>
			</table>

		<? } ?>
	</tr>
		</form>

	<table>
</div>
</div>


</body>
</html>
