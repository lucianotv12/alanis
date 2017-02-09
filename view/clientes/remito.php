
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
	<TD colspan="4" align="right"><FONT SIZE="2" COLOR=""></TD>
	<TD colspan="1" ALIGN="RIGHT"><FONT SIZE="2" COLOR=""></FONT></TD>
  </TR>
  </TABLE>
    <TABLE BORDER=0 Width="700" >
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

  </TR>
  <?endforeach;?>

  </TABLE>
