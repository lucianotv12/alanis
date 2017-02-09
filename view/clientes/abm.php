<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
$(document).ready(function(){

	$("#cmbProvincia").change(function(){dependencia_estado();});
//	$("#cmbProvincia").change(function(){alert("hola");});
//	$("#estado").change(function(){dependencia_ciudad();});
//	$("#cmbLocalidad").attr("disabled",true);
//	$("#ciudad").attr("disabled",true);
});

function dependencia_estado()
{
	var code = $("#cmbProvincia").val();
	$.get("<?=VIEW?>clientes/carga_ciudades.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
//				alert("Error");
			}
			else
			{
	//			$("#cmbLocalidad").value('');
				$("#cmbLocalidad").attr("disabled",false);
				document.getElementById("cmbLocalidad").options.length=1;
				$('#cmbLocalidad').append(resultado);			
			}
		}

	);
}

</script>


<div class="contentArea"> 

<? if($cambio == "nuevo") {?>
<form name="cliente" method="post" enctype="multipart/form-data" action="index.php?accion=insert">
<? }else{ ?>
<form name="cliente" method="post" enctype="multipart/form-data" action="index.php?accion=update&id=<?= $_GET["id"]?>">
<? } ?>
<div class="pageTitle">
<?= $mensaje_cabezera?> <?=$nombre?><br>
</div>
<table class="tabla_list" cellpadding=0 cellspacing=0 border=1 >
	<tr>
		<td class="td_text">Razon social :</td><td class="td_text"><input name="nombre" size="35" type="text" <?= $deshabilitado?> value="<?=$nombre?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
		<td class="td_text">Nº CUIT:</td><td class="td_text"><input type="text" maxlength="11" name="nro_cuit"   <?= $deshabilitado?> value="<?=$nro_cuit?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>

	</tr>

	<tr>
		<td class="td_text">Domicilio :</td><td class="td_text"><input name="domicilio" type="text" <?= $deshabilitado?> value="<?=$domicilio?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>

		<td class="td_text">Provincia:</td>
		<td colspan="2" class="td_text">
			<select id="cmbProvincia" name="cmbProvincia">
		<!--		<option value="0">-Provincia-</option>-->
		
      <?php
		  $_POST["cmbProvincia"] = 1 ;
		  foreach($provincias as $provincia){ ?>
			<option value="<?=$provincia['idProvincia'];?>" <? if($idProvincia == $provincia['idProvincia']) echo "selected";?>
			><?=$provincia['Descripcion'];?></option>
	  <? } ?>	
			</select>
<!-- <? if(!empty($_POST["cmbProvincia"]))if(@$_POST["cmbProvincia"] == $provincia['idProvincia']) echo "selected"; else if(@$datosCliente['Provincia'] == $provincia['idProvincia']) echo "selected";?> -->


	&nbsp;Localidad:

        <select id="cmbLocalidad" name="cmbLocalidad">
	<? if(!$idLocalidad and $cambio != "nuevo"): ?> 
				<option value="0">Selecciona Uno...</option>
			</select>
	<? elseif($cambio == "nuevo" and !$idLocalidad):
	$_localidades=Cliente::get_localidades($idProvincia);	
	?><option value="0" selected>Selecciona Uno...</option><?
	foreach($_localidades as $sub):
	?>
				<option value="<?= $sub["idLocalidad"]?>" <? if($idLocalidad == $sub["idLocalidad"] ) echo "selected"; ?>><?= $sub["Descripcion"]?></option>
	<? endforeach;?>
			</select>
	<? else :
	?><option value="0" selected>Selecciona Uno...</option><?
	
	$_localidades=Cliente::get_localidades($idProvincia);	
	foreach($_localidades as $sub):
	?>
				<option value="<?= $sub["idLocalidad"]?>" <? if($idLocalidad == $sub["idLocalidad"] ) echo "selected"; ?>><?= $sub["Descripcion"]?></option>
	<? endforeach;?>
			</select>
	<? endif;?>
	</td>
<!--	</tr> -->




<!--	<tr>
		<td class="td_text">Pais :</td><td class="td_text"><input name="pais" type="text" <?= $deshabilitado?> value="<?=$pais?>"></td>
	</tr>

	<tr>-->
		<td class="td_text">Codigo Postal :</td><td class="td_text"><input name="cp"  type="text" <?= $deshabilitado?> value="<?=$cp?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

	<tr>
		<td class="td_text">Telefono :</td><td class="td_text"><input name="telefono"  type="text" <?= $deshabilitado?> value="<?=$telefono?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
		<td class="td_text">Telefono2 :</td><td class="td_text"><input name="telefono2"  type="text" <?= $deshabilitado?> value="<?=$telefono2?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
		<td class="td_text">Contacto:</td><td class="td_text"><input name="contacto"  type="text" <?= $deshabilitado?> value="<?=$contacto?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
		<td class="td_text">Mail:</td><td class="td_text"><input name="mail"  type="text" <?= $deshabilitado?> value="<?=$mail?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
		<td class="td_text">Web:</td><td class="td_text"><input name="web"  type="text" <?= $deshabilitado?> value="<?=$web?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
        </tr>
	</tr>
		<td class="td_text">Observaciones :</td><td class="td_area" colspan="3"><textarea rows="6" cols="80"  name="observaciones" <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);"><?=$observaciones?></textarea></td>
	</tr>
	<tr>
		<td class="td_text">Descuento:</td><td class="td_text"><input name="descuento" maxlength="2" size="1"  type="text" <?= $deshabilitado?> value="<?=$descuento?>" onFocus="foco(this);" onBlur="no_foco(this);">%</td>
	</tr>
	<tr>
	<td class="td_text">Condicion IVA:</td><td class="td_text">
	<select name="condicion_iva">
		<option value="0" >Seleccione...</option>		
		<option value="Responsable Inscripto" <?if($condicion_iva == "Responsable Inscripto") echo"selected"; ?> >Responsable Inscripto</option>
		<option value="Monotributista" <?if($condicion_iva == "Monotributista") echo"selected"; ?>>Monotributista</option>
	</select>
	</tr>

	<tr>
		<td class="td_text">Activo :</td><td class="td_text">
		<select name="activo"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<option value="1" <? if($activo == 1) echo"selected";?>>Activo</option>
		<option value="0"  <? if($activo == 0) echo"selected";?>>No Activo</option>
		</select>
		</td>
	</tr>

	<tr>
	<td class="submit" align="center" colspan="10" ><?if($boton== true){?><input type="submit" name="submit" value="GUARDAR" ><? } ?></td>
	</tr>
	</table>
<?// if($gerarquia == true) {?>
<? if($detalle == true) {?>
<table class="tabla_list">
<tr>
	<td><a href="index.php?accion=modify&id=<?= $cliente->get_id() ?>"><img style="display:block;" src="<?= IMGS?>lupa.gif"  border="0"></a></td>
	<td><a href="index.php?accion=modify&id=<?= $cliente->get_id() ?>">Editar</a></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
<!--	< ?if($cliente->get_id_tipo() != 1){ ?> -->
	<td><a href="javaScript:pregunta('<?= $cliente->get_id()?>')"><img style="display:block;" src="<?= IMGS?>eliminar.png"  border="0"></a></td>
	<td><a href="javaScript:pregunta('<?= $cliente->get_id()?>')">Eliminar</a></td>
<!--	< ? } ?> -->
</tr>

</table>
<? }?>
<?// }?>
	</form>
	</div>
	</div>

<!--<script src="../../template/js/models/gen_validatorv2.js" language="javascript" type="text/javascript"></script>
<script src="../../template/js/validaciones/clientes/modificacion.js" language="javascript" type="text/javascript"></script>
-->
