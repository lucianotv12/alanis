<?
session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();
$bancos = Pago::get_bancos();
?>
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">
<link type="text/css" rel="stylesheet" href="<?=CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />
<script language="JavaScript" src="<?=JS?>funciones.js"></script>
<script src="<?=JS?>jquery-1.7.1.min.js"></script>
<script src="<?=JS?>jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="<?=JS?>calendario/calendario_esp.js"></script>
<link rel="stylesheet" type="text/css" href="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
<script type="text/javascript" src="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });  
//SOLO NUMEROS
	$(document).ready(function(){
	$(".solo-numero").keyup(function(){
	if ($(this).val() != '')
	$(this).val($(this).attr('value').replace(/[^0-9\.]/g, ""));
	});
	});

function mostrardiv() {

div = document.getElementById('flotante');

div.style.display = '';

}

function cerrar() {

div = document.getElementById('flotante');

div.style.display='none';

}

</script>
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
			<td class="td_text" align="center">importe</td>
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

<table class="tabla_list" cellpadding=3 cellspacing=0  border="1">
<input type="hidden" name="idFactura" value="<?= $_GET["id"]?>">


	<tr>
		<td class="td_text">Forma Pago :</td>
                <td class="td_text">
                <? foreach(Pago::get_tipos_pagos() as $tipo_pago): ?>

                    <input type="radio" name="idTipoPago" value="<?= $tipo_pago["id"];?>" onclick="<? if($tipo_pago["id"] == 2) echo 'javascript:mostrardiv();'; else echo 'javascript:cerrar();'; ?>">
                    <?= $tipo_pago["nombre"];?>
                <? endforeach;?>
                </td>                    
	</tr>
<!-- DATOS DEL CHEQUE -->        
        <tr id="flotante" style="display:none;">
            <td colspan="2">
                <table class="tabla_list" >    
                    <tr>
                            <td class="td_text">N° Cheque :</td><td class="td_text"><input class="solo-numero" name="numero_cheque"  type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
                    </tr>
                    <tr>
                            <td class="td_text">Banco :</td>
                            <td class="td_text" colspan="2">
                                <select name="banco">
                                    <? foreach($bancos as $banco):?>
                                    <option value="<?=$banco["id"]?>"><?=$banco["nombre"];?></option> 
                                 
                                    <? endforeach;?>
                                </select>
                            </td>
                    </tr>
                    <tr>
                            <td class="td_text">Titular :</td><td class="td_text"><input name="titular"  type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
                            <td class="td_text">Destinatario :</td><td class="td_text"><input name="destinatario"  type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
                    </tr>
                    <tr>
                            <td class="td_text">Fecha Emisi&oacute;n :</td><td class="td_text"><input name="fecha_emision" id="datepicker" type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
                            <td class="td_text">Fecha Cobro :</td><td class="td_text"><input name="fecha_cobro" id="datepicker1"  type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
                    </tr>
                </table>

            </td>
        </tr>
        
<!-- FIN DATOS DEL CHEQUE -->        
        
        <tr>
		<td class="td_text">Importe :</td><td class="td_text"><input class="solo-numero" name="importe"  type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
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

