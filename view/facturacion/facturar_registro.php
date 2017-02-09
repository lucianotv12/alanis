<?
session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();

?>
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">
<script language="JavaScript" src="<?=JS?>funciones.js"></script>
<script type="text/javascript" src="<?=JS?>jquery-1.3.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
<script type="text/javascript" src="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>


<?
if($_POST["submit"]):
		Factura::facturar_registro($_POST);
		?>
		<script language="javascript">
		parent.jQuery.fancybox.close();

		</script>
		<?

endif;
?>
<div class="contentArea"> 



<div class="header">


<? if($cambio == "nuevo") {?>
<form name="producto" method="post" >
<? }else{ ?>
<form name="producto" method="post" >
<? } ?>
<div class="pageTitle">
<?= $mensaje_cabezera?> <?=$codigo?><br>
</div>
<table class="tabla_list" cellpadding=3 cellspacing=3  border="1">
<input type="hidden" name="id" value="<?= $id?>">
<input type="hidden" name="cambio" value="<?= $cambio?>">
	<tr>
		<td class="td_text">N° Factura :</td><td class="td_text"><input name="n_factura"  type="text" <?= $deshabilitado?> value="<?=$n_factura?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>

		<td class="td_text">N° Remito :</td><td class="td_text"><input name="n_remito"  type="text" <?= $deshabilitado?> value="<?=$n_remito?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
		<td class="td_text">Condicion Venta :</td><td class="td_text"><input name="condicion_venta"  type="text" <?= $deshabilitado?> value="<?=$condicion_venta?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>

		<td class="td_text">Orden Compra :</td><td class="td_text"><input name="orden_compra"  type="text" <?= $deshabilitado?> value="<?=$orden_compra?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

	<tr>
	<td class="submit" align="center" colspan="10" ><?if($boton== true){?><input type="submit" name="submit" value="GENERAR" ><? } ?></td>
	</tr>
	</table>

<table style="font-size:12px;"   cellpadding=3 cellspacing=1  border="0" width="90%" >
	<tr>
		<td class="td_text" Colspan="5" align="center"><br></td>
	</tr>

	<tr>
		<td class="td_text" Colspan="5" align="center"><B>PRODUCTOS DE LA FACTURA</B></td>
	</tr>
	<tr>
		<th>Cant.</th>
		<th>Art.</th>
		<th>Detalle</th>
		<th>P/unitario</th>
		<th>Importe</th>
		<th></th>
	</tr>
<? $i=0;
foreach($productos_facturas as $producto_factura):
$i++;
$precio_unitario = Producto::get_precio_lista($producto_factura['idProducto']);
$precio_final = $precio_unitario * $producto_factura['cantidad'];
$precio_total += $precio_final;
?>
	<input type="hidden" name="idProducto<?=$i?>" value="<?= $idProducto?>">
	<input type="hidden" name="precio_unitario<?=$i?>" value="<?= redondear_dos_decimal($precio_unitario)?>">
	<input type="hidden" name="precio_final<?=$i?>" value="<?= redondear_dos_decimal($precio_final)?>">
	<tr class="<?=($i%2==0? "fila_par":"fila_impar");?>" >
		<td ><?=$producto_factura['cantidad'];?></td>
		<td ><?=$producto_factura['idProducto'];?></td>
		<td ><?=$producto_factura['descripcion'];?></td>
		<td ><?= redondear_dos_decimal($precio_unitario);?></td>
		<td align="right" ><?= redondear_dos_decimal($precio_final);?></td>
	</tr>
<? endforeach;?>
	<input type="hidden" name="precio_total" value="<?= redondear_dos_decimal($precio_total)?>">

	<tr >
		<td></td>
		<td></td>
		<td></td>
		<td align="right"><B><font color="#FFFFFF">Total</font></B></td>
		<td align="right"><font color="#FFFFFF"><b><?= redondear_dos_decimal($precio_total)?></b></font></td>
	</tr>
</table>


	</form>
</div>
</div>

