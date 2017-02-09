<?
session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();
$bancos = Pago::get_bancos();
$facturas_adeudadas = Factura::facturas_adeudadas();
$mensaje_cabezera = "NUEVO CHEQUE";
$boton=true;
//print_r($facturas_adeudadas);
?>
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">
<!--<link href="< ?=CSS?>calendario/calendario.css" rel="stylesheet" type="text/css"/>-->
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

$(function(){
        $('#bancos').autocomplete({
        source:"<?=VIEW?>compras/ajax_bancos.php",
                select: function(event, ui){
         $("#id_banco").val(ui.item.id);
         $("#nombre").val(ui.item.nombre);
        //AGREGAR EL PRECIO DEL PRODUCTO 
                }		

        });

});   	


  </script>

<?
if($_POST["submit"]):
		Pago::nuevo_cheque($_POST);
		?>
		<script language="javascript">
		parent.jQuery.fancybox.close();

		</script>
		<?

endif;
?>
<body onKeyPress="return acceptNav(event)" onLoad='document.producto.titular.focus();'>                
<div class="contentArea"> 



<div class="header">
 <!-- HACER COMBO PARA QUE SE VEAN TODOS LOS CLIENTES PROVEEDORES, EL CUAL SE VA A CARGAR LA COMPRA CORRESPONDIENTE.  -->

<? if($cambio == "nuevo") {?>
<form name="producto" method="post" >
<? }else{ ?>
<form name="producto" method="post" >
<? } ?>
<div class="pageTitle">
<?= $mensaje_cabezera?> <?=$codigo?><br>
</div>
<table class="tabla_list" cellpadding=3 cellspacing=3  border="0">
<input type="hidden" name="id" value="<?= $id?>">
<input type="hidden" name="cambio" value="<?= $cambio?>">

	<tr>
		<td class="td_text">Titular :</td><td class="td_text"><input name="titular"  type="text" <?= $deshabilitado?> value="<?=$titular?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
		<td class="td_text">Destinatario :</td><td class="td_text"><input name="destinatario"  type="text" <?= $deshabilitado?> value="<?=$destinatario?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
        </tr>

	<tr>
		<td class="td_text">Fecha Emision :</td><td class="td_text"><input id="datepicker" name="fecha_emision"  type="text" <?= $deshabilitado?> value="<?=$fecha_emision?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
		<td class="td_text">Fecha Cobro :</td><td class="td_text"><input id="datepicker1" name="fecha_cobro"  type="text" <?= $deshabilitado?> value="<?=$fecha_cobro?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
        <tr>
                <td class="td_text">Banco :</td>
                <td class="td_text" colspan="4">
                    <input size="60" name="bancos" id="bancos" type="text">         
                    <input name="id_banco" id="id_banco" type="hidden">
  <!--                  <select name="banco">
                        < ? foreach($bancos as $banco):?>
                        <option value="< ?=$banco["id"]?>">< ?=$banco["nombre"];?></option> 

                        < ? endforeach;?>
                    </select> -->
                </td>
        </tr>        
	<tr>
		<td class="td_text">Numero Cheque :</td><td class="td_text"><input name="numero"  type="text" <?= $deshabilitado?> value="<?=$numero?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
                <td class="td_text">Importe :</td><td class="td_text"><input name="importe"  type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>            
<!--	<tr>
		<td class="td_text">Descripcion :</td><td class="td_text"><input name="descripcion"  type="text" < ?= $deshabilitado?> value="< ?=$descripcion?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>        -->
        <tr>
                <td class="td_text">FACTURAS ADEUDADAS :</td>
                <td class="td_text" colspan="3">
                    <select name="factura_adeudada">
                        <option value="0" selected>Ninguna</option>    
                        <? foreach($facturas_adeudadas as $factura):?>
                        <option value="<?=$factura["id"]?>"><?=  $factura["n_factura"] ." - " . $factura["nombre"] ." - " . $factura["importe"]; ?></option> 

                        <? endforeach;?>
                    </select>
                </td>
        </tr>            

        
	<tr>
	<td class="submit" align="center" colspan="10" ><?if($boton== true){?><input type="submit" name="submit" value="GENERAR" ><? } ?></td>
	</tr>
	</table>




	</form>
</div>
</div>

