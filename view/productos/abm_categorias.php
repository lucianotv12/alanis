<link rel="stylesheet" type="text/css" href="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
<script type="text/javascript" src="<?=JS?>fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript"> $(document).ready(function () {  
 $("a.classpopup").fancybox({  
 'width': '50%',  
 'height': '50%', 
 //'centerOnScroll':true, 
'autoScale'			: false,
'transitionIn'		: 'none',
'transitionOut'		: 'none',
'type': 'iframe',
/*'content':'<div>asdasdasdasdasdasdasdasdas</div>',*/
 'onClosed': function () {
				            parent.location.reload(true); ;}
	
 });  
 });  
  
 </script>

<!-- FANCYBOX -->
<div class="contentArea"> 

<div class="header">


<? if($cambio == "nuevo") {?>
<form name="producto" method="post" enctype="multipart/form-data" action="index.php?accion=insert_categorias">
<? }else{ ?>
<form name="producto" method="post" enctype="multipart/form-data" action="index.php?accion=update_categorias&id=<?= $_GET["id"]?>">
<? } ?>
<div class="pageTitle">
<?= $mensaje_cabezera?> <?=$codigo?><br>
</div>
<table class="tabla_list" cellpadding=3 cellspacing=3  border="1">

	<tr>
		<td class="td_text">Nombre :</td><td class="td_text"><input name="nombre"  type="text" <?= $deshabilitado?> value="<?=$nombre?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

	<tr>
		<td class="td_text">Descripcion:</td><td class="td_area"><textarea name="descripcion" rows="4" cols="80"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);"><?=$descripcion?></textarea></td>
	</tr>
	<tr>
		<td class="td_text">Dolar :</td><td class="td_text"><input name="dolar"  type="text" <?= $deshabilitado?> value="<?=$dolar?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>
        
	<tr>
		<td class="td_text">Activo :</td><td class="td_text">
		<select name="activo"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">
		<option value="0"  <? if($activo == 0) echo"selected";?>>No Activo</option>
		<option value="1" <? if($activo == 1) echo"selected";?>>Activo</option>

		</select>
		</td>
	</tr>
	<tr>
		<td class="td_text">proveedor :</td><td class="td_text">
                    <select name="proveedor"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);">                    
                        <option value ="0" selected>NINGUNO</option>    
                        <? 
                        foreach($proveedores as $proveedor):?>
                        <option value="<?= $proveedor->id;?>" <?if($proveedor->id == $idProveedor) echo "selected";?> ><?= $proveedor->nombre;?></option>
                        
                        <? endforeach;?>    
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
<? if($cambio != "nuevo"): ?>
<form method="post" name="datos">
<br><br>
	<table>
	<tr><td colspan="4" align="left"><div class="pageTitle">
LISTADO DE SUBCATEGORIAS 
</div></td></tr>
	<tr>
		<td colspan="4" align="center" width="600">
			<table  border=1 width="100%">
			<tr>
				<th>Nombre</th>
				<th>Descripcion</th>
                                <th>Proveedor</th>
                                <th>Dolar</th>
                                <th>Actualizacion</th>
                                <th>Activo</th>
                                <th>Proveedor</th>
			</tr>
			<?foreach($subcategorias as $subcategoria):?>
				<tr  class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
					<td><?=$subcategoria["nombre"]; ?></td>
					<td><?=$subcategoria["descripcion"];?></td>
					<td><?=$subcategoria["proveedor_subcategoria"];?></td>                                        
					<td><?=$subcategoria["dolar"];?></td>
                                        <td><? if($subcategoria["fechaActualizacion"] == "00/00/0000") echo ""; else echo $subcategoria["fechaActualizacion"]; ?></td>                
                                        <td><?if($subcategoria["activo"]== 1) echo "Activo"; else echo "No Activo"; ?></td>
					<td align="center"> <a class="classpopup" href="index.php?accion=modify_subcategoria&id=<?=$subcategoria["id"];?>">
					<img style="display:block;" src="<?= IMGS?>editar.png"  border="0"></a>
					</td>
					<td align="center"><a href="javaScript:pregunta('<?= $subcategoria["id"]?>','SubCategoria','delete_subcategoria','<?= $_GET["id"]?>')">
					<img  src="<?= IMGS?>eliminar.png"  border="0">
					</a></td>
				</tr>
			<? endforeach;?>
				<tr>
					<td align="right" colspan="10"><a class="classpopup" href="index.php?accion=new_subcategoria&id=<?=$id;?>">
					<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
					</a></td>
				</tr>	
			</table>
		</td>
	</tr>
	<table>
	</form>
<? endif; ?>
	</div>
	</div>

<script src="../../view/js/models/gen_validatorv2.js" language="javascript" type="text/javascript"></script>
<script src="../../view/js/validaciones/productos/modificacion.js" language="javascript" type="text/javascript"></script>

