<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
$(document).ready(function(){

	$("#idCategoria").change(function(){dependencia_estado();});
//	$("#idCategoria").change(function(){alert("hola");});
//	$("#estado").change(function(){dependencia_ciudad();});
//	$("#subCategoria").attr("disabled",true);
//	$("#ciudad").attr("disabled",true);
});

function dependencia_estado()
{
	var code = $("#idCategoria").val();
	$.get("<?=VIEW?>productos/carga_subcategorias.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert(" Esta Categoria no posee subcategorias, por favor ingreselas");
			}
			else
			{
				$("#idSubCategoria").attr("disabled",false);
				document.getElementById("idSubCategoria").options.length=1;
				$('#idSubCategoria').append(resultado);			
			}
		}

	);
}

var nav4 = window.Event ? true : false;
function acceptNum(evt){
// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57, '.' = 46
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}
//-->

</script>
<div class="contentArea"> 

<div class="header">


<? if($cambio == "nuevo") {?>
<form name="producto" method="post" enctype="multipart/form-data" action="index.php?accion=insert">
<? }else{ ?>
<form name="producto" method="post" enctype="multipart/form-data" action="index.php?accion=update&id=<?= $_GET["id"]?>">
<? } ?>
<div class="pageTitle">
<?= $mensaje_cabezera?> <br>
</div>
<table class="tabla_list" cellpadding=3 cellspacing=3  border="1">

	<tr>
		<td class="td_text" >Categoria :</td><td class="td_text">
			<select name="idCategoria" id="idCategoria" <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);" tabindex="0">
				<option value="-1" >Seleccione una Categoria... </option>
				<? foreach($categorias as $categoria):?>
				<option value="<?=$categoria["id"];?>" <? if($idCategoria == $categoria["id"]) echo"selected";?>><?=$categoria["nombre"];?></option>
				<? endforeach;?>
			</select>		
		&nbsp;SubCategoria :
		   <select id="idSubCategoria" name="idSubCategoria">
	<? if(!$idSubCategoria): ?> 
				<option value="0">Selecciona Uno...</option>
			</select>
	<? else :
	$_subcategorias=Producto::get_subcategorias($idCategoria);	
	foreach($_subcategorias as $sub):
	?>
				<option value="<?= $sub["id"]?>" <? if($idSubCategoria == $sub["id"] ) echo "selected"; ?>><?= $sub["nombre"]?></option>
	<? endforeach;?>
			</select>

	<? endif;?>

		</td>
	</tr>

	<tr>
		<td class="td_text">Descripcion:</td><td class="td_area"><textarea name="descripcion" rows="4" cols="80"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);"><?=$descripcion?></textarea></td>
	</tr>
	<tr>
		<td class="td_text">Referencia:</td><td class="td_text"><input name="referencia" type="text" <?= $deshabilitado?> value="<?=$referencia?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>    
	<tr>
		<td class="td_text">Stock Bajo Minimo:</td><td class="td_text"><input name="aviso_stock"  onKeyPress="return acceptNum(event)"  type="text" <?= $deshabilitado?> value="<?=$aviso_stock?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
		<td class="td_text">Precio:</td><td class="td_text"><input name="precio" onKeyPress="return acceptNum(event)"  type="text" <?= $deshabilitado?> value="<?=$precio?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
	<tr>
		<td class="td_text">Desc. 1:</td><td class="td_text"><input name="desc1" onKeyPress="return acceptNum(event)" size="3" maxlength="5"  type="text" <?= $deshabilitado?> value="<?=$desc1?>" onFocus="foco(this);" onBlur="no_foco(this);">%</td>
	</tr>
	<tr>
		<td class="td_text">Desc. 2:</td><td class="td_text"><input name="desc2" onKeyPress="return acceptNum(event)" size="3" maxlength="5"  type="text" <?= $deshabilitado?> value="<?=$desc2?>" onFocus="foco(this);" onBlur="no_foco(this);">%</td>
	</tr>
	<tr>
		<td class="td_text">Desc. 3:</td><td class="td_text"><input name="desc3" onKeyPress="return acceptNum(event)" size="3" maxlength="5"  type="text" <?= $deshabilitado?> value="<?=$desc3?>" onFocus="foco(this);" onBlur="no_foco(this);">%</td>
	</tr>
	<tr>
		<td class="td_text">Utilidad:</td><td class="td_text"><input name="utilidad" onKeyPress="return acceptNum(event)" size="3" maxlength="5"  type="text" <?= $deshabilitado?> value="<?=$utilidad?>" onFocus="foco(this);" onBlur="no_foco(this);">%</td>
	</tr>
	<tr>
		<td class="td_text">Iva:</td>
		<td class="td_text">
		<select name="iva"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<option value="21" <? if($iva == "21") echo"selected";?>>21</option>
		<option value="10.5"  <? if($iva == "10.5") echo"selected";?>>10.5</option>
		<option value="0"  <? if($iva == "0") echo"selected";?>>0</option>
		</select>%</td>
	</tr>	
	<tr>
		<td class="td_text">Moneda :</td><td class="td_text">
		<select name="idMoneda"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<? foreach($monedas as $moneda): ?>
		<option value="<?= $moneda["id"]?>" <? if($idMoneda == $moneda["id"]) echo"selected";?>><?= $moneda["simbolo"]?></option>
		
		<? endforeach;?>
		</select>
		</td>
	</tr>

	<tr>
		<td class="td_text">Activo :</td><td class="td_text">
		<select name="activo"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<option value="1" <? if($activo == 1 or $cambio == "nuevo") echo"selected";?>>Activo</option>
		<option value="2"  <? if($activo == 2 ) echo"selected";?>>No Activo</option>
		</select>
		</td>
	</tr>

	<tr>
		<td class="td_text">Bulto:</td><td class="td_text"><input name="bulto" onKeyPress="return acceptNum(event)" size="3" maxlength="5"  type="text" <?= $deshabilitado?> value="<?=$bulto?>" onFocus="foco(this);" onBlur="no_foco(this);"/></td>
	</tr>    
	<tr>
		<td class="td_text">Iva 10.5% ?:</td><td class="td_text"><input type="checkbox" name="iva_10" value="1" <?if($iva_10): echo "checked"; endif;?>>Iva 10.5</td>
	</tr>    
	<tr>
	<td class="submit" align="center" colspan="10" ><?if($boton== true){?><input type="submit" name="submit" value="GUARDAR" ><? } ?></td>
	</tr>
	</table>
<?// if($gerarquia == true) {?>
<? if($detalle == true) {?>
<table class="tabla_list">
<tr>
	<td><a href="index.php?accion=modify&id=<?= $producto->get_id() ?>"><img style="display:block;" src="<?= IMGS?>lupa.gif"  border="0"></a></td>
	<td><a href="index.php?accion=modify&id=<?= $producto->get_id() ?>">Editar</a></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
<!--	< ?if($producto->get_id_tipo() != 1){ ?> -->
	<td><a href="javaScript:pregunta('<?= $producto->get_id()?>', 'Producto :')"><img style="display:block;" src="<?= IMGS?>eliminar.png"  border="0"></a></td>
	<td><a href="javaScript:pregunta('<?= $producto->get_id()?>', 'Producto :')">Eliminar</a></td>
<!--	< ? } ?> -->
</tr>

</table>
<? }?>
<?// }?>
	</form>
	</div>
	</div>

<script src="../../view/js/models/gen_validatorv2.js" language="javascript" type="text/javascript"></script>
<script src="../../view/js/validaciones/productos/modificacion.js" language="javascript" type="text/javascript"></script>

