<link type="text/css" rel="stylesheet" href="<?=CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />
<script type='text/javascript' src="<?= JS?>jquery-ui-1.8.17.custom.min.js"></script>

<script>

 
function dependencia_estado(_id)
{
	var update=window.confirm("Se van a modificar datos del Producto  " +  idProducto + " desea continuar?");
	
	if (update){
            
                    var precio_nombre = $("#precio_" + _id).val();
                    var desc1_nombre = $("#desc1_" + _id).val();
                    var desc2_nombre = $("#desc2_" + _id).val();
                    var desc3_nombre = $("#desc3_" + _id).val();
                    var utilidad_nombre = $("#utilidad_" + _id).val();
                    var iva_nombre = $("#iva_" + _id).val();
                    var referencia_nombre = $("#referencia_" + _id).val();
                    var bulto_nombre = $("#bulto_" + _id).val();
                    var usuarioid = $("#idUsuario").val();
                    var idProducto = _id;
            
    
                   var fila = $("#fila_" + _id); 
                   var flotante = $("#flotante_" + _id); 
                   var precio_lista = $("#precio_lista_"  + _id); 
//                   precio_lista_value = "lucho"; 
                   
            /*    javi= new Array();

                var code = $("#estado_turno_" + _id).val();
                var color = $("#colores_" + _id);*/
              //  alert('aca entroooo' + code);
                $.get("<?=VIEW?>productos/modifica_listado_precios.php", { idProducto:idProducto,precio_nombre: precio_nombre, desc1_nombre:desc1_nombre, desc2_nombre:desc2_nombre, desc3_nombre:desc3_nombre,
                utilidad_nombre:utilidad_nombre,iva_nombre:iva_nombre,referencia_nombre:referencia_nombre,bulto_nombre:bulto_nombre,usuarioid:usuarioid}, 
                function( data ) {
                 $("#precio_lista_"  + _id).val( data );
                });
                    
//                $("#precio_lista_"  + _id).val(< ?php echo redondear_dos_decimal(Producto::get_precio_lista_dolar($_GET['idProducto'])) ?>); 
                    

                fila.css({'background':'red'});
                fila.css({'color':'white'});
             /*   precio_lista.css({'color':'orange'});*/
                flotante.css({'display':'none'});

                
	
	}else
	
	document.datos.action="";
    
}

</script>

<script>
var nav4 = window.Event ? true : false;
function acceptNum(evt){
// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57, '.' = 46
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}


</script>
<script type="text/javascript">
	$(function(){
		$('#buscar_usuarios').autocomplete({
		source:"<?=VIEW?>productos/ajax.php",				
		});
		
		
	});
//shortcut.add("Enter", function () { busqueda('listado_precios','< ?= $_POST['buscador'] ?>');  });

</script>
<script>

function mostrardiv(idproducto) {

div = document.getElementById('flotante_' + idproducto);

div.style.display = '';

}

function cerrar() {

div = document.getElementById('flotante_' + idproducto);

div.style.display='none';

}

</script>
    
<div class="contentArea"> 


<form method="post" name="datos">
	<input type="hidden" name="idUsuario" id="idUsuario" value="<?=$_usuario->idUsuario?>">
    
<div class="pageTitle">
LISTADO DE PRECIOS 
</div>
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><th colspan=20 align="left">
		INGRESE DATOS DEL PRODUCTO <input type="text" size="70" name="buscador" id="buscar_usuarios" onFocus="foco(this);" onBlur="no_foco(this);" onKeypress="if (event.keyCode == 13) javaScript:busqueda('listado_precios','<?= $_POST['buscador'] ?>')" value="<?= $_POST["buscador"]?>">
		<b>
		<a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('listado_precios','<?= $_POST['buscador'] ?>')">BUSCAR</A>
		<a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('listado_precios','TODOS')">TODOS</A>
		</b>
		&nbsp;&nbsp;&nbsp;
        <a href="index.php?accion=list">
        Listado de Productos
        </a>
		<br>
		<FONT SIZE="1" COLOR="white">Buscar por : id, descripcion, categoria, subcategoria</FONT>
	</td></tr>
	<tr>
		<th>id
			<a href="javaScript:ordenar_por('listado_precios','id','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('listado_precios','id','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Descripcion
			<a href="javaScript:ordenar_por('listado_precios','descripcion','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('listado_precios','descripcion','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Refer.
			<a href="javaScript:ordenar_por('listado_precios','referencia','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('listado_precios','referencia','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>                
		<th>
			Categoria
			<a href="javaScript:ordenar_por('listado_precios','categoria_nombre','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('listado_precios','categoria_nombre','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Subcateg.
			<a href="javaScript:ordenar_por('listado_precios','subcategoria_nombre','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('listado_precios','subcategoria_nombre','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
                <th>
                        Bulto
                </th>
                <th>
			Precio
			<a href="javaScript:ordenar_por('listado_precios','precio','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('listado_precios','precio','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		</th>
		<th>P.Lista</th>    	
    	<th>Desc1%</th>
		<th>Desc2%</th>
		<th>Desc3%</th>
		<th>Utilidad</th>
		<th>Iva</th>
        <th>Accion</th>    
		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($productos as $producto):
	$contador++;
	?>
	<tr  <? if($producto["activo"] != 1) echo 'style="color:#CCC"';?>   class="<?=($contador%2==0? "fila_par":"fila_impar");?>" width="100%" id="fila_<?= $producto["id"] ?>">
		<td align="center" width="5%"><?= $producto["id"] ?></td>
		<td  width="50%" align="left"><?= $producto["descripcion"] ?></td>
                <td width="10%"><input type="text" id="referencia_<?= $producto["id"] ?>" name="referencia_<?= $producto["id"] ?>" value="<?= $producto["referencia"] ?>" size="5" onFocus="foco(this);javascript:mostrardiv('<?= $producto["id"]?>');"></td>      
		<td  width="10%" ><?= $producto["categoria_nombre"]; ?></td>
		<td width="10%"><?= $producto["subcategoria_nombre"]; ?></td>
                <td width="5%"><input type="text" name="bulto_<?= $producto["id"] ?>" id="bulto_<?= $producto["id"] ?>" value="<?= $producto["bulto"] ?>" size="1" onFocus="foco(this);javascript:mostrardiv('<?= $producto["id"]?>');"></td>      

                <td align="center" width="8%" id="">
                    <? if($producto["idMoneda"] == 2): 
                            $_precio_final= redondear_dos_decimal(Producto::get_precio_lista_dolar($producto["id"])) . " (" . redondear_dos_decimal(Producto::get_precio_lista($producto["id"])) . ")" ;
                        else:
                            $_precio_final= redondear_dos_decimal(Producto::get_precio_lista($producto["id"]));
                        endif;
                    ?>
                        <input  type="text" size="10" name="precio_lista_<?= $producto["id"] ?>" id="precio_lista_<?= $producto["id"] ?>" value="<?=$_precio_final ?>" disabled>
                       
                </td>
                
                <td width="9%" align="right"><?=  $producto["simbolo"]?><input type="text" id="precio_<?= $producto["id"]?>" size="4" name="precio_<?= $producto["id"] ?>" value=" <?= $producto["precio"] ?>" size="5" onFocus="foco(this);javascript:mostrardiv('<?= $producto["id"]?>');" onKeyPress="return acceptNum(event)"></td>
                <td width="2%"><input type="text" id="desc1_<?= $producto["id"] ?>" size="1" name="desc1_<?= $producto["id"] ?>" value="<?= $producto["desc1"] ?>" size="3" onFocus="foco(this);javascript:mostrardiv('<?= $producto["id"]?>');" onKeyPress="return acceptNum(event)"></td>
                <td width="2%"><input type="text" id="desc2_<?= $producto["id"] ?>" size="1" name="desc2_<?= $producto["id"] ?>" value="<?= $producto["desc2"] ?>" size="3" onFocus="foco(this);javascript:mostrardiv('<?= $producto["id"]?>');" onKeyPress="return acceptNum(event)"></td>
                <td width="2%"><input type="text" id="desc3_<?= $producto["id"] ?>" size="1" name="desc3_<?= $producto["id"] ?>" value="<?= $producto["desc3"] ?>" size="3" onFocus="foco(this);javascript:mostrardiv('<?= $producto["id"]?>');" onKeyPress="return acceptNum(event)"></td>
                <td width="2%"><input type="text" id="utilidad_<?= $producto["id"] ?>" size="1" name="utilidad_<?= $producto["id"] ?>" value="<?= $producto["utilidad"] ?>" size="3" onFocus="foco(this);javascript:mostrardiv('<?= $producto["id"]?>');"></td>
                <td width="2%">
                    <select id="iva_<?= $producto["id"] ?>" name="iva_<?= $producto["id"] ?>"  <?= $deshabilitado?> onFocus="foco(this);javascript:mostrardiv('<?= $producto["id"]?>');" >
                            <option value="21" <? if($producto["iva"] == "21") echo"selected";?>>21</option>
                            <option value="10.5"  <? if($producto["iva"] == "10.5") echo"selected";?>>10.5</option>
                            <option value="0"  <? if($producto["iva"] == "0") echo"selected";?>>0</option>
                    </select>
                </td>

                <td>
                    <div id="flotante_<?= $producto["id"]?>" style="display: none;">
                <!--    <a href="javaScript:modificar_importe('< ?= $producto["id"]?>','modificar_importe','< ?=$start?>','< ?=$_GET["buscador"]?>')"><img src="< ?= IMGS?>edt.gif" width="25" height="14" /></a>-->
                    <a href="javaScript:dependencia_estado('<?= $producto["id"]?>')"><img src="<?= IMGS?>edt.gif" width="25" height="14" /></a>
                    </div>
                </td>
	</tr>
	<? endforeach ?>
        <?
		
		?>                 
        <tr>
            <td></td>
        </tr>    
</table>
</form>
</div>

