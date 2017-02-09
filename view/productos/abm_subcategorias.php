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
		Producto::admin_subcategoria($_POST);
		?>
		<script language="javascript">
		parent.jQuery.fancybox.close();

		</script>
		<?

endif;
?>
<div class="contentArea"> 



<div class="header">


<? if($cambio == "nuevo") {?>
<form name="producto" method="post" >
<? }else{ ?>
<form name="producto" method="post" >
<? } ?>
<div class="pageTitle">
<?= $mensaje_cabezera?> <?=$codigo?><br>
</div>
<table class="tabla_list" cellpadding=3 cellspacing=3  border="1">
<input type="hidden" name="id" value="<?= $id?>">
<input type="hidden" name="idCategoria" value="<?= $idCategoria?>">
<input type="hidden" name="cambio" value="<?= $cambio?>">
	<tr>
		<td class="td_text">Nombre :</td><td class="td_text"><input name="nombre"  type="text" <?= $deshabilitado?> value="<?=$nombre?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>

	<tr>
		<td class="td_text">Descripcion:</td><td class="td_area"><textarea name="descripcion" rows="4" cols="60"  <?= $deshabilitado?> onFocus="foco(this);" onBlur="no_foco(this);"><?=$descripcion?></textarea></td>
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
		<td class="td_text">Dolar :</td><td class="td_text"><input name="dolar"  type="text" <?= $deshabilitado?> value="<?=$dolar?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
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

