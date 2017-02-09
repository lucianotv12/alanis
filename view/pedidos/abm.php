<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="<?=CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />

<script language="JavaScript" src="<?=JS?>funciones.js"></script>

<script src="<?=JS?>jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="<?=JS?>calendario/calendario_esp.js"></script>


<script type="text/javascript">
    $(function(){
            $('#buscador').autocomplete({
            source:"<?=VIEW?>pedidos/ajax.php",
            select: function(event, ui){
            $("#idproducto").val(ui.item.id);
            $("#detalle_producto").val(ui.item.descripcion);

            //AGREGAR EL PRECIO DEL PRODUCTO 
            }

            });

    });




   $(document).ready(function() {
    $("#datepicker").datepicker({      dateFormat: 'yy-mm-dd'});
  });

 $(document).ready(function() {
    $("#datepicker1").datepicker({      dateFormat: 'yy-mm-dd'});
  });   
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

$(document).ready(function() {
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
});

function addTemporal()
{
    if($('#detalle_producto').val())
    {	
        var desc = $('#detalle_producto').val();
        var numero = $('#mitabla tr:last').attr("id");
        var numero = Number(numero.replace(/[^0-9\.]+/g,""));
//			var lucho = $(this).parent("tr").remove();
        var lucho = '"tr"';	

      //  desc = replaceAll(desc, " ", "/b" );
      //    desc = desc.replace(" ", "\b");  
        numero = numero + parseInt(1);

        $('#mitabla tr:last').after("<tr class='fila_par' id="+ numero +">\n\
            <td align='center'><input type=text size='1' onfocus='this.blur()' name=cantidad"+ numero + " value=" + $('#cantidad').val() + "></td>\n\
            <td align='center'><input type=text size='3' onfocus='this.blur()' name=idproducto"+ numero + "  value=" + $('#idproducto').val() + "></td>\n\
            <td align='left'><input type=text size='100%' name=detalle_producto"+ numero + "  value='" + desc + "'></td>\n\
            <td><a href='#' onClick=$(this).parent().parent().remove();>Quitar</a></td>\n\
        </tr>"); 


//	total_total = $('#precio_total1').val() ;
        if(numero > 1){
        var total_total=0;

                var i=0;						
//						var total_total=parseInt($('#precio_total'+i).val());
                for(i=1;i<=numero;i++){	
                        parcial = 'precio_total'+i;	
                //	total_total = parseInt(precio_total);
                        total_total = parseFloat(total_total) + parseFloat($('#'+parcial+'').val());
                }

        }else{
        //	total_total = $('#precio_total1').val() ;
        $("#cantidad").attr('value', '1');
        $("#idproducto").attr('value', '');
        $("#detalle_producto").attr('value', '');
        $("#buscador").attr('value', '');
        $("#buscador").focus();


        }
        total_total = (total_total).toFixed(2); // valor con 2 decimales			

        $("#cantidad").attr('value', '1');
        $("#idproducto").attr('value', '');
        $("#detalle_producto").attr('value', '');
         $("#buscador").attr('value', '');
 
        $("#buscador").focus();

    }
    else
    {
        window.alert('Tiene que ingresar un Producto');		 					
    }

}

</script>
<?
if($cambio == "modificar"):
    $variable_shorcut =  'addProducto_pedido('. $_GET["id"] .');';
else:
    $variable_shorcut =  'addTemporal();';
endif;    
?>


    <script>
        shortcut.add("Enter", function () { <?=$variable_shorcut?>  });

        shortcut.add("Insert", function () { document.datos.submit();});        
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
    
<table class="tabla_list" cellpadding=3 cellspacing=3  border="0">

	<tr>
		<td class="td_text">Pedido:</td><td class="td_text"><input name="pedido"   type="text" <?= $deshabilitado?> value="<?=$pedido?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>    
	<tr>
		<td class="td_text">Descripcion:</td><td class="td_area"><textarea name="descripcion" rows="4" cols="80"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);"><?=$descripcion?></textarea></td>
	</tr>
	<tr>
		<td class="td_text">Proveedores :</td><td class="td_text">
                    <select name="idProveedor" id="idProveedor" <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
				<option value="-1" >Seleccione un Proveedor... </option>
				<? foreach($proveedores as $proveedor):?>
				<option value="<?=$proveedor->get_id();?>" <? if($idProveedor == $proveedor->get_id()) echo"selected";?>><?=$proveedor->get_nombre();?></option>
				<? endforeach;?>
			</select>		
                    Contacto: <input name="contactoProveedor"   type="text" <?= $deshabilitado?> value="<?=$contactoProveedor?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
                
	</tr>

	<tr>
		<td class="td_text">Fecha Envio :</td><td class="td_text"><input id="datepicker" name="fechaPedido"  type="text" <?= $deshabilitado?> value="<?=$fechaPedido?>" onFocus="foco(this);" onBlur="no_foco(this);">
                        Fecha Entrega :<input id="datepicker1" name="fechaRecepcion"  type="text" <?= $deshabilitado?> value="<?=$fechaRecepcion?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

	<tr>
		<td class="td_text">Estado :</td><td class="td_text">
                    <select name="idEstado"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
				<? foreach($pedidoEstados as $pedidoEstado):?>
                                <option value="<?=$pedidoEstado["idPedidoEstado"]?>" <? if($idEstado == $pedidoEstado["idPedidoEstado"]) echo"selected";?>><?=$pedidoEstado["estado"];?></option>
				<? endforeach;?>
			</select>		
                </td>
                
	</tr>
    
	<tr>
		<td class="td_text">Metodo Envio :</td><td class="td_text"><input type="text" name="metodoPedido" value="<?= $metodoPedido?>"/></td>
	</tr>    
    
	<tr>
		<td class="td_text">Activo :</td><td class="td_text">
		<select name="activo"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<option value="1" <? if($activo == 1 or $cambio == "nuevo") echo"selected";?>>Activo</option>
		<option value="2"  <? if($activo == 2 ) echo"selected";?>>No Activo</option>
		</select>
		</td>
	</tr>


	</table>
<? if($detalle == true) {?>
<table class="tabla_list">
<tr>
	<td><a href="index.php?accion=modify&id=<?= $producto->get_id() ?>"><img style="display:block;" src="<?= IMGS?>lupa.gif"  border="0"></a></td>
	<td><a href="index.php?accion=modify&id=<?= $producto->get_id() ?>">Editar</a></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td><a href="javaScript:pregunta('<?= $producto->get_id()?>', 'Producto :')"><img style="display:block;" src="<?= IMGS?>eliminar.png"  border="0"></a></td>
	<td><a href="javaScript:pregunta('<?= $producto->get_id()?>', 'Producto :')">Eliminar</a></td>
</tr>

</table>
<? }?>
<? if($cambio != "modificar"):?>
	<table class="tabla_list" cellpadding=2 cellspacing=5  border="0" >
		<tr>
			<td class="td_text" Colspan="5" align="center"><B>PRODUCTOS A INGRESAR EN EL PEDIDO</B></td>
		</tr>
		<tr>
			<td class="td_text">Busqueda:</td>
			<td class="td_text"  colspan="3"><input type="text"  name="buscador" id="buscador" size="120" onKeypress="if (event.keyCode == 13) event.returnValue = false;" /></td>
                </tr>

		<tr>
			<td class="td_text">Codigo:</td>
			<td class="td_text"  colspan="3"><input type="text"  name="idproducto" id="idproducto" size="10" />
                </td>
        </tr>
        <tr>
        	<td class="td_text">Desc.:</td>
			<td class="td_text" colspan="3"><input type="text" name="detalle_producto" id="detalle_producto"  size="120" /></td>
            </tr>
            <tr>
                <td class="td_text">Cantidad:</td>
                <td class="td_text"><input type="text" class="solo-numero" maxlength="6" value="1" name="cantidad" id="cantidad" size="3" onFocus="foco(this);" onBlur="no_foco(this);"></td>
            	<td class="td_text"><img SRC="<?=IMGS?>botonagregar.jpg" onClick="addTemporal()" ></td>
            </tr>        

	
	</table>
	<table id="mitabla" cellpadding=3 cellspacing=1 border=0 width="90%" align="left" style="font-size:11px" >
		<br><br><br>
		<tr>
        	<td colspan="5" align="center" style="color:white; font-size:14px; font-weight:bold"> PRODUCTOS SELECCIONADOS
            </td>
        </tr>	

		<tr id="0" >
			<th>Cant.</th>
			<th>Art.</th>
			<th>Detalle</th>
			<th></th>
		</tr>        
	

	</table>
<? elseif($cambio == "modificar"):?>
    
            <table class="tabla_list" cellpadding=2 cellspacing=5  border="0" >
                    <tr>
                            <td class="td_text" Colspan="5" align="center"><B>PRODUCTOS A INGRESAR EN EL PEDIDO</B></td>
                    </tr>
                    <tr>
                            <td class="td_text">Busqueda:</td>
                            <td class="td_text"  colspan="3"><input type="text"  name="buscador" id="buscador" size="120" onKeypress="if (event.keyCode == 13) event.returnValue = false;" /></td>
                    </tr>

                    <tr>
                            <td class="td_text">Codigo:</td>
                            <td class="td_text"  colspan="3"><input type="text"  name="idproducto" id="idproducto" size="10" />
                    </td>
            </tr>
            <tr>
                    <td class="td_text">Desc.:</td>
                            <td class="td_text" colspan="3"><input type="text" name="detalle_producto" id="detalle_producto"  size="120" /></td>
                </tr>
                <tr>
                    <td class="td_text">Cantidad:</td>
                    <td class="td_text"><input type="text" class="solo-numero" maxlength="6" value="1" name="cantidad" id="cantidad" size="3" onFocus="foco(this);" onBlur="no_foco(this);"></td>
                    <td class="td_text"><img SRC="<?=IMGS?>botonagregar.jpg" onClick="addProducto_pedido(<?= $_GET["id"]?>)" ></td>
                </tr>        


            </table>    
    
    
            <table id="mitabla" class="" cellpadding=2 cellspacing=5  border="0" >
                <tr><td><b/></td></tr>    
            <tr>
                    <td class="td_text" Colspan="5" align="center"><B>PRODUCTOS PEDIDOS</B></td>
            </tr>                
            <tr>
                <TH>Codigo</TH>
                <TH>Descripcion</TH>
                <TH>Cantidad</TH>
                <TH></TH>
            </tr>

                <? foreach($productos as $producto):?>
                <tr id ='tr_<?= $producto["idPedido_producto"]?>' style='color:white'>
                    <td><?= $producto["idProducto"]?></td>
                    <td><?= $producto["producto"]?></td>
                    <td><?= $producto["cantidad"]?></td>
                    <td ><a href="javaScript:borrar_producto_pedido('<?= $producto["idPedido_producto"]?>')">
                            <img  src="<?= IMGS?>del.gif"  border="0"></a>
                    </td>                    
                </tr>
                <? endforeach;?>    
               
        </table>    

<? endif;?>    
	
    <table width="100%" class="tabla_list">
		<tr>
		<td class="submit" align="center" colspan="20" ><? if($boton== true){?><BR><BR><BR><BR>
        <input type="submit" name="submit" value="GUARDAR" >
		<? } ?></td>
		</tr>

		</table>
		</form>

	<br><br>
    

</div>
	</div>

<script src="../../view/js/models/gen_validatorv2.js" language="javascript" type="text/javascript"></script>
<script src="../../view/js/validaciones/productos/modificacion.js" language="javascript" type="text/javascript"></script>

<script type="text/javascript">


function borrar_producto_pedido(_idProducto)
{      
    

	$.get("<?=VIEW?>pedidos/borrar_producto_pedido.php", { code: _idProducto });
         $("#tr_" + _idProducto).remove();

}

function addProducto_pedido(_idPedido)
{
    if($('#detalle_producto').val())
    {	
        var desc = $('#detalle_producto').val();
        var numero = $('#mitabla tr:last').attr("id");
        var numero = Number(numero.replace(/[^0-9\.]+/g,""));
//			var lucho = $(this).parent("tr").remove();
        var lucho = '"tr"';	



        code = _idPedido + "_" + $('#idproducto').val() + "_" + $('#detalle_producto').val() + "_" + $('#cantidad').val();
        
	$.get("<?=VIEW?>pedidos/agregar_producto_pedido.php", { code: code });

      //  desc = replaceAll(desc, " ", "/b" );
      //    desc = desc.replace(" ", "\b");  
        numero = numero + parseInt(1);

        $('#mitabla tr:last').after("<tr class='fila_par' id=tr_"+ numero +">\n\
            <td align='center'><input type=text size='3' onfocus='this.blur()' name=idproducto"+ numero + "  value=" + $('#idproducto').val() + "></td>\n\
            <td align='center'><input type=text size='100%' name=detalle_producto"+ numero + "  value='" + desc + "'></td>\n\
            <td align='left'><input type=text size='1' onfocus='this.blur()' name=cantidad"+ numero + " value=" + $('#cantidad').val() + "></td>\n\
            <td><a href='#' onClick=$(this).parent().parent().remove();>Quitar</a></td>\n\
        </tr>"); 


//	total_total = $('#precio_total1').val() ;
        if(numero > 1){
        var total_total=0;

                var i=0;						
//						var total_total=parseInt($('#precio_total'+i).val());
                for(i=1;i<=numero;i++){	
                        parcial = 'precio_total'+i;	
                //	total_total = parseInt(precio_total);
                        total_total = parseFloat(total_total) + parseFloat($('#'+parcial+'').val());
                }

        }else{
        //	total_total = $('#precio_total1').val() ;
        $("#cantidad").attr('value', '1');
        $("#idproducto").attr('value', '');
        $("#detalle_producto").attr('value', '');
        $("#buscador").attr('value', '');
        $("#buscador").focus();


        }
        total_total = (total_total).toFixed(2); // valor con 2 decimales			

        $("#cantidad").attr('value', '1');
        $("#idproducto").attr('value', '');
        $("#detalle_producto").attr('value', '');
         $("#buscador").attr('value', '');
 
        $("#buscador").focus();

    }
    else
    {
        window.alert('Tiene que ingresar un Producto');		 					
    }

}




</script>