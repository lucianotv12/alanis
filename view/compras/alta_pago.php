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
		Pago::nuevo_pago($_POST);
		?>
		<script language="javascript">
		parent.jQuery.fancybox.close();

		</script>
		<?

endif;
?>
<div class="contentArea"> 



<div class="header">

<?
$pagos_anteriores = Pago::get_pagos_factura($_GET["id"]);
$factura = Factura::get_factura_by_id($_GET["id"]); ?>

<form name="producto" method="post" >

<div class="pageTitle">
PAGOS FACTURA <?= $factura["id"];?> <br>
</div>
<? if($pagos_anteriores): ?>
	<table class="tabla_list" cellpadding=3 cellspacing=3  border="1" style="margin-bottom:10px">
		<tr>
			<td class="td_text" colspan="3" align="center"><b>pagos anteriores</b></td>
		</tr>
		<tr>
			<td class="td_text" align="center">forma de pago</td>
			<td class="td_text" align="center">fecha</td>
			<td class="td_text" align="center" >importe</td>
		</tr>
		<? foreach($pagos_anteriores as $pagos): ?>
		<tr>
			<td class="td_text"><?= $pagos["nombre"];?></td>
			<td class="td_text"><?=  $pagos["fecha"];?></td> 
			<td class="td_text"><?=  $pagos["importe"];?></td>
		</tr>
	<? endforeach; ?>	
	</table>
<? endif; ?>

<table class="tabla_list" cellpadding=3 cellspacing=3  border="1">
<input type="hidden" name="idFactura" value="<?= $_GET["id"]?>">


	<tr>
		<td class="td_text">Forma Pago :</td><td class="td_text">
		<select name="idTipoPago"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<? foreach(Pago::get_tipos_pagos() as $tipo_pago): ?>
		<option value="<?= $tipo_pago["id"];?>" ><?= $tipo_pago["nombre"];?></option>
		<? endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td class="td_text">Importe :</td><td class="td_text"><input name="importe"  type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

	<tr>
		<td class="td_text">Descripcion:</td><td class="td_area"><textarea name="descripcion" rows="4" cols="60"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);"><?=$descripcion?></textarea></td>
	</tr>	
	
	<tr>
	<td class="submit" align="center" colspan="10" ><input type="submit" name="submit" value="GUARDAR" ></td>
	</tr>
</table>

	</form>
</div>
</div>

