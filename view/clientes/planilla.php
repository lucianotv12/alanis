
  <TABLE BORDER=0 Width="700">
  <TR height="141">
	<TD></TD>
	<TD></TD>
	<TD></TD>
  </TR>
  <TR height="38">
	<TD colspan=7><FONT SIZE="2" COLOR="white"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT><FONT SIZE="2" COLOR=""><?= $cliente->get_nombre();?></FONT></TD>
  </TR>
  <TR height="30">
	<TD colspan="2"><FONT SIZE="2" COLOR=""><FONT SIZE="2" COLOR="white">&nbsp;&nbsp;&nbsp;&nbsp;</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $cliente->get_domicilio();?></FONT></TD>
	<TD colspan="5" ALIGN="RIGHT"><FONT SIZE="2" COLOR="" ><FONT SIZE="2" COLOR=""><?= $cliente->get_localidad();?> - <?= $cliente->get_provincia();?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></TD>
  </TR>
  <TR height="35">
	<TD colspan="2"><FONT SIZE="2" COLOR=""><FONT SIZE="2" COLOR="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>&nbsp;&nbsp;&nbsp;<?= $factura->get_condicion_iva();?></FONT></TD>
	<TD colspan="5" ALIGN="RIGHT"><FONT SIZE="2" COLOR="" ><?= $cliente->get_nro_cuit();?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></TD>
  </TR>
  <TR height="35">
	<TD colspan="1"><FONT SIZE="2" COLOR="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $factura->get_condicion_venta();?></FONT></TD>
	<TD colspan="4" align="right"><FONT SIZE="2" COLOR="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $factura->get_n_remito();?></TD>
	<TD colspan="1" ALIGN="RIGHT"><FONT SIZE="2" COLOR=""><?= $factura->get_orden_compra();?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></TD>
  </TR>
  </TABLE>
    <TABLE BORDER=0 Width="700" height="430">
  <TR height="10">
	<Th width="55" ALIGN="CENTER"><FONT SIZE="2" COLOR="white">&nbsp;</FONT></Th>
	<Th width="45" ALIGN="CENTER"><FONT SIZE="2" COLOR="white">&nbsp;</FONT></Th>
	<Th width="225" ALIGN="CENTER"><FONT SIZE="2" COLOR="white">&nbsp;</FONT></Th>
	<Th width="50" ALIGN="CENTER"><FONT SIZE="2" COLOR="white">&nbsp;</FONT></Th>
	<Th width="70" ALIGN="CENTER"><FONT SIZE="2" COLOR="white">&nbsp;</FONT></th>
  </TR>
  <? $SUMA_IMPORTE = 0;
  foreach($productos as $producto):?>
  <TR height="10">
	<TD ALIGN="CENTER"><FONT SIZE="2" COLOR=""><?= $producto["idProducto"];?></FONT></TD>
	<TD ALIGN="CENTER"><FONT SIZE="2" COLOR=""><?= $producto["cantidad"];?></FONT></TD>
	<TD ALIGN="CENTER"><FONT SIZE="2" COLOR=""><?= $producto["descripcion"];?></FONT></TD>
	<TD ALIGN="CENTER" ><FONT SIZE="2" COLOR="">
	<? if($factura->get_condicion_iva() == "Responsable Inscripto")
		{
		$unitario =$producto["precio_unitario"];
		}
	else
		{
		$unitario = $producto["precio_unitario"] + $producto["precio_unitario"] *21/100 ;
		}

	echo $unitario= number_format ($unitario,2)?></FONT></TD>
	<TD ALIGN="right"><FONT SIZE="2" COLOR="">
	<?
		$total =$unitario * $producto["cantidad"] ;
	echo number_format ($total,2)?></FONT></TD>
  </TR>
<?
	$SUMA_IMPORTE = $SUMA_IMPORTE + $total;

endforeach;?>

  <TR>
	<TD colspan="5"></TD>
  </TR>
  </TABLE>

<? if($factura->get_condicion_iva() == "Responsable Inscripto") :?>
   <TABLE BORDER=0 Width="700">
  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></Th>
	<Td width="70" ALIGN="right"><FONT SIZE="2" COLOR=""><?= $SUMA_IMPORTE?></FONT></Td>
  </tr>
<? $descuento = number_format($SUMA_IMPORTE * $factura->get_descuento()/100,2);?>

  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="">Desc.</FONT></Th>
	<Td width="120" ALIGN="right"><FONT SIZE="2" COLOR=""><?= $descuento?></FONT></Td>
  </tr>
<? $SUMA_IMPORTE = $SUMA_IMPORTE - $descuento; ?>


  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></Th>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR=""><?= $SUMA_IMPORTE?></FONT></Td>
  </tr>
  <?

  //////////////////CALCULO IVA /////////////////////////
	if($factura->get_condicion_iva() == "Responsable Inscripto")
		{
		$IVA_DESC = $SUMA_IMPORTE *21/100;
		  $IMPORTE_FINAL = $SUMA_IMPORTE + $SUMA_IMPORTE *21/100 ;
		}
	else
		{
		  $IMPORTE_FINAL = $SUMA_IMPORTE ;
		}

  //////////////////CALCULO IVA /////////////////////////
  ?>
 <!-----------------------ESPACIO EN BLANCO----------------->
  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></Th>
	<Td width="70" ALIGN="right"><FONT SIZE="2" COLOR="">&nbsp;&nbsp;</FONT></Td>
  </tr>
<!-----------------------FIN EN BLANCO----------------->
  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="">21</FONT></Th>
	<Td width="120" ALIGN="right"><FONT SIZE="2" COLOR=""><?=$IVA_DESC?></FONT></Td>
  </tr>

  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></Th>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="">0</FONT></Td>
  </tr>
  <!-----------------------ESPACIO EN BLANCO----------------->
  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></Th>
	<Td width="70" ALIGN="right"><FONT SIZE="2" COLOR="">&nbsp;&nbsp;</FONT></Td>
  </tr>
<!-----------------------FIN EN BLANCO----------------->
  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></Th>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR=""><?= $IMPORTE_FINAL?></FONT></Td>
  </tr>
  </TABLE>
<? elseif($factura->get_condicion_iva() == "Monotributista") : ?>

   <TABLE BORDER=0 Width="700">
  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="blue">subtotal:</FONT></Th>
	<Td width="70" ALIGN="right"><FONT SIZE="2" COLOR=""><?= $SUMA_IMPORTE?></FONT></Td>
  </tr>
<? $descuento = number_format($SUMA_IMPORTE * $factura->get_descuento()/100,2);?>
  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="blue">Descuento:</FONT></Th>
	<Td width="70" ALIGN="right"><FONT SIZE="2" COLOR=""><?= $descuento?></FONT></Td>
  </tr>
<? $SUMA_IMPORTE = $SUMA_IMPORTE - $descuento;
		  $IMPORTE_FINAL = $SUMA_IMPORTE ;
?>
  <TR>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR="">TOTAL</FONT></Th>
	<Td  ALIGN="right"><FONT SIZE="2" COLOR=""><?= $IMPORTE_FINAL?></FONT></Td>
  </tr>
  </TABLE>

<? endif; ?>