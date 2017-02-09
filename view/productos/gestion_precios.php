<?php
session_start();

include_once("../../funciones.php");
$_usuario = unserialize($_SESSION["usuario"]);


validar_permanencia();
conectar_bd();

Template::draw_header();

?>
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
	/*		if(resultado == false)
			{
				alert(" Esta Categoria no posee subcategorias, por favor ingreselas");
			}
			else
			{
	*/			$("#idSubCategoria").attr("disabled",false);
				document.getElementById("idSubCategoria").options.length=1;
				$('#idSubCategoria').append(resultado);			
	/*		}*/
		}

	);
}

</script>
<script type="text/javascript">
function mostrar_descuentos() {
  divs = 'descuentos';
//  enla = 'enla'	+ variable ;
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
  obj2 = document.getElementById('utilidad');
  obj2.style.display = 'none';
  obj3 = document.getElementById('precio');
  obj3.style.display = 'none';
  obj4 = document.getElementById('iva');
  obj4.style.display = 'none';    

}
function mostrar_utilidad() {
  divs = 'utilidad';
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
  obj2 = document.getElementById('descuentos');
  obj2.style.display = 'none';
  obj3 = document.getElementById('precio');
  obj3.style.display = 'none';
  obj4 = document.getElementById('iva');
  obj4.style.display = 'none';    
}

function mostrar_precio() {
  divs = 'precio';
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
  obj2 = document.getElementById('descuentos');
  obj2.style.display = 'none';
  obj3 = document.getElementById('utilidad');
  obj3.style.display = 'none';
  obj4 = document.getElementById('iva');
  obj4.style.display = 'none';  
}

function mostrar_iva() {
  divs = 'iva';
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
  obj2 = document.getElementById('descuentos');
  obj2.style.display = 'none';
  obj3 = document.getElementById('utilidad');
  obj3.style.display = 'none';
  obj4 = document.getElementById('precio');
  obj4.style.display = 'none';  
}



var nav4 = window.Event ? true : false;
function acceptNum(evt){
// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57, '.' = 46
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}

</script>


<?
if($_GET["accion"] == "cambiar"):
   // print_r($_POST); DIE();
		Producto::modificacion_precios($_POST);

endif;
?>

<?
$categorias= Producto::get_categorias_combo();

?>
<div class="contentArea"> 

<div class="header">

	<div class="pageTitle">
	MODIFICACION MASIVA DE PRECIOS
	</div>
	<form name="datos" method="post" >
	<input type="hidden" name="idUsuario" value="<?=$_usuario->idUsuario?>">
	<TABLE border="0" cellspacing ="10px;" >
	<tr>
		<td colspan="5"><FONT SIZE="" COLOR="white">Selecciones Opcion a modificar</FONT></td>
	</tr>
	<TR>
		<TD>
			<input type="radio" name="radio" value="1" onclick="javaScript:mostrar_utilidad();"><FONT SIZE="" COLOR="white">Modificar utilidad</FONT>
		</TD>
		<TD><input type="radio" name="radio" value="2" onclick="javaScript:mostrar_descuentos();"><FONT SIZE="" COLOR="white">Modificar "Descuento 1"</FONT></TD>
		<TD><input type="radio" name="radio" value="3" onclick="javaScript:mostrar_descuentos();"><FONT SIZE="" COLOR="white">Modificar "Descuento 2"</FONT></TD>
		<TD><input type="radio" name="radio" value="4" onclick="javaScript:mostrar_descuentos();"><FONT SIZE="" COLOR="white">Modificar "Descuento 3"</FONT></TD>
		<TD><input type="radio" name="radio" value="5" onclick="javaScript:mostrar_precio();"><FONT SIZE="" COLOR="white">Modificar Precio</FONT></TD>
		<TD><input type="radio" name="radio" value="6" onclick="javaScript:mostrar_iva();"><FONT SIZE="" COLOR="white">Modificar IVA</FONT></TD>

        </TR>
	<tr>
		<td colspan="5"><FONT SIZE="" COLOR="white">Seleccione sobre que productos se aplicara el cambio</FONT></td>
	</tr>
	<tr>
		<td colspan="5">
		<select name="idCategoria" id="idCategoria" onFocus="foco(this);" onBlur="no_foco(this);" size="10">
			<option value="-1" >Seleccione una Categoria... </option>
			<option value="-2" >Todos los Productos </option>
			<? foreach($categorias as $categoria):?>
			<option value="<?=$categoria["id"];?>" <? if($idCategoria == $categoria["id"]) echo"selected";?>><?=$categoria["nombre"];?></option>
			<? endforeach;?>
		</select>		
		
		   <select multiple id="idSubCategoria" name="idSubCategoria[]" size="10">
				<option value="-1">Selecciona Uno...</option>

			</select>
		
		</td>
	</tr>
	<tr id="utilidad" style="display:none;">
		<td colspan="10">
			<table>
				<tr>
					<td>

						<FONT SIZE="" COLOR="white">Utilidad:%</font><input onKeyPress="return acceptNum(event)" type="text" name="cantidad_utilidad" size="4" maxlength=5>
						<input type="radio" name="tipo_valor" checked value="1"><FONT SIZE="" COLOR="white">Aumentar</font>
						<input type="radio" name="tipo_valor" value="2"><FONT SIZE="" COLOR="white">Disminuir</font>
						<input type="radio" name="tipo_valor" value="3"><FONT SIZE="" COLOR="white">Definir porcentaje exacto</font>
						<input type="submit" name="submit" onclick="cambiar_precios();" value="Generar">		
					</td>
				</tr>
			</table>
		</td>		
	</tr>

	<tr id="descuentos" style="display:none;">
		<td colspan="10">
			<table>
				<tr>
					<td>		
						<FONT SIZE="" COLOR="white">Descuento:%</font><input onKeyPress="return acceptNum(event)" type="text" name="cantidad_descuento" size="4" maxlength=5>
						<input type="radio" name="tipo_valor" value="1"><FONT SIZE="" COLOR="white">Aumentar</FONT>
						<input type="radio" name="tipo_valor" value="2"><FONT SIZE="" COLOR="white">Disminuir</FONT>
						<input type="radio" name="tipo_valor" value="3"><FONT SIZE="" COLOR="white">Definir porcentaje exacto</FONT>
						<input type="submit" name="submit" onclick="cambiar_precios();" value="Generar">
					</td>
				</tr>
			</table>
		</td>		
	</tr>

	<tr id="precio" style="display:none;">
		<td colspan="10">
			<table>
				<tr>
					<td>
						<FONT SIZE="" COLOR="white">Precio:%</font><input onKeyPress="return acceptNum(event)" type="text" name="cantidad_precio" size="4" maxlength=5>
						<input type="radio" name="tipo_valor" value="1"><FONT SIZE="" COLOR="white">Aumentar</FONT>
						<input type="radio" name="tipo_valor" value="2"><FONT SIZE="" COLOR="white">Disminuir</FONT>
						<input type="submit" name="submit" onclick="cambiar_precios();"	 value="Generar">
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr id="iva" style="display:none;">
		<td colspan="10">
			<table>
				<tr>
					<td>
						<FONT SIZE="" COLOR="white">IVA: </font>
                                                <select name="cantidad_iva">
                                                    <option value="0">0</option>
                                                    <option value="10.5">10.5</option>
                                                    <option value="21">21</option>                                                    
                                                </select>
						<input type="submit" name="submit" onclick="cambiar_precios();"	 value="Generar">
					</td>
				</tr>
			</table>
		</td>
	</tr>

	</TABLE>

	</form>
</div>
</div>

