<?
session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();

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
  
function mostrar_iva() {
  divs = 'iva';
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
}  
function no_iva() {
  divs = 'iva';
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'none' : 'none';
}  

var nav4 = window.Event ? true : false;
function acceptNum(evt){
// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57, '.' = 46
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}
//-->
</script>


 
 <?                                    
if($_POST["submit"]):
    
    if($_POST["importe"] and $_POST["fecha_factura"]):
    
		Factura::generar_compra($_POST);
		?>
		<script language="javascript">
		parent.jQuery.fancybox.close();

		</script>
		<?
     else:
       echo "<font size='3' color='red'>Tiene que ingresar la fecha y el importe de la compra</font>";  
         
     endif;           

endif;
?>
<div class="contentArea"> 



<div class="header">
 <!-- HACER COMBO PARA QUE SE VEAN TODOS LOS CLIENTES PROVEEDORES, EL CUAL SE VA A CARGAR LA COMPRA CORRESPONDIENTE.  -->

<form name="producto" method="post" >
    
<div class="pageTitle">
<?= $mensaje_cabezera?> <?=$codigo?><br>
</div>
<table class="tabla_list" cellpadding=3 cellspacing=3  border="0">
<input type="hidden" name="id" value="<?= $id?>">
<input type="hidden" name="cambio" value="<?= $cambio?>">

	
	<tr>
		<td class="td_text" colspan="2">Proveedores :	
		<select name="idProveedor">
		<? foreach($proveedores as $proveedor): ?> 
			<option value="<?= $proveedor->get_id()?>"><?= $proveedor->get_nombre()?> </option>
		<? endforeach; ?>
		</select>
		</td>
	</tr>	
	<tr>
		<td class="td_text">Fecha :</td><td class="td_text"><input id="datepicker" name="fecha_factura"  type="text" <?= $deshabilitado?> value="<?=$fecha_factura?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
        <?if($_GET["tipo"] != "remito"):?>                                            
	<tr>
		<td class="td_text">N&#176; Factura :</td><td class="td_text"><input name="n_factura" onKeyPress="return acceptNum(event)"  type="text" <?= $deshabilitado?> value="<?=$n_factura?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<?endif;?>
        <tr>
		<td class="td_text">N&#176; Remito :</td><td class="td_text"><input name="n_remito" onKeyPress="return acceptNum(event)"  type="text" <?= $deshabilitado?> value="<?=$n_remito?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
		<td class="td_text">Subtotal :</td><td class="td_text"><input onKeyPress="return acceptNum(event)" name="importe"  type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
            <td class="td_text">Bonificaci&oacute;n :</td><td class="td_text"><input onKeyPress="return acceptNum(event)" name="bonificacion"  type="text" <?= $deshabilitado?> value="<?=$bonificacion?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>   
        <?if($_GET["tipo"] != "remito"):?>                                            
	<tr>
		<td class="td_text">IVA 21% :</td>
                <td class="td_text">
                        <input type="radio" name="iva_selector" value="21" onclick="javaScript:no_iva();" >21
                        <input type="radio" name="iva_selector" value="10.5" onclick="javaScript:no_iva();">10.5
                        <input type="radio" name="iva_selector" value="ambos" onclick="javaScript:mostrar_iva();">Ambos                        
                </td>
                <td id="iva" style="display:none;">IVA 21 : <input onKeyPress="return acceptNum(event)" type="text" name="iva21" value="">IVA 10 : <input onKeyPress="return acceptNum(event)" type="text" name="iva10" value=""></td>
	</tr>
	<tr>
		<td class="td_text">Ingresos Brutos 3,5% :</td><td class="td_text">
                    <select name="ingresos_brutos">
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>    
                </td>
	</tr>    
	<tr>
		<td class="td_text">Descuentos%:</td><td class="td_text">
                    <select name="descuento_sel">
                        <option value="1">Sin Ingresos Brutos</option>
                        <option value="2">Con ingresos Brutos</option>
                    </select> 
                    <input type="text" name="descuento" value="" onKeyPress="return acceptNum(event)" >
                </td>
	</tr>            
        <?endif;?>
           

	<tr>
	<td class="submit" align="center" colspan="10" ><?if($boton== true){?><input type="submit" name="submit" value="GENERAR" ><? } ?></td>
	</tr>
	</table>




	</form>
</div>
</div>

