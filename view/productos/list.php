<link type="text/css" rel="stylesheet" href="<?=CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />
<script type='text/javascript' src="<?= JS?>jquery-ui-1.8.17.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= JS?>fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
<script type="text/javascript" src="<?= JS?>fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<script type="text/javascript"> $(document).ready(function () {  
 $("a.classpopup").fancybox({  
 'width': '55%',  
 'height': '100%', 
 //'centerOnScroll':true, 
 'scrolling':'no',
 'autoScale': false,  
 'transitionIn': 'none',  
 'transitionOut': 'none',  
 'type': 'iframe',
 'hideOnOverlayClick' : false,
 'onClosed': function() { parent.location.reload(true); ; }			 
 });  
  $("a.classpopup_list").fancybox({  
 'width': '100%',  
 'height': '100%', 
 //'centerOnScroll':true, 
 'scrolling':'si',
 'autoScale': false,  
 'transitionIn': 'none',  
 'transitionOut': 'none',  
 'type': 'iframe',
 'hideOnOverlayClick' : false,
 'onClosed': function() { parent.location.reload(true); ; }			 
 });  
 $("a.classpopup_productos").fancybox({  
 'width': '70%',  
 'height': '90%', 
 //'centerOnScroll':true, 
 'scrolling':'no',
 'autoScale': false,  
 'transitionIn': 'none',  
 'transitionOut': 'none',  
 'type': 'iframe',
 'hideOnOverlayClick' : false,
 'onClosed': function() { parent.location.reload(true); ; }			 
 }); 
 
 });  
  
 </script>
<script type="text/javascript">
	$(function(){
		$('#buscar_usuarios').autocomplete({
		source:"<?=VIEW?>productos/ajax.php",				
		});
		
	});

//shortcut.add("insert", function () { busqueda('list','< ?= $_POST['buscador'] ?>');  });

</script> 
<div class="contentArea"> 

<?php
function array_envia($array) { 

    $tmp = serialize($array); 
    $tmp = urlencode($tmp); 

    return $tmp; 
} 

$productos_excel=array_envia($productos); 

?>
<form method="post" name="exportar_excel" action="index.php?accion=exportar">
	<input type="hidden" name="productos_excel" value="<?= $productos_excel?>">



<div class="pageTitle">
LISTADO DE PRODUCTOS 	<input type="submit" name="exportar" value ="Exportar a Excel">
</div>


</form>


<br>
<form method="post" name="datos">
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><th colspan=20 align="left">
		INGRESE DATOS DEL PRODUCTO <input type="text" size="70" name="buscador" id="buscar_usuarios" value="<?= $_POST["buscador"]?>" >
		<b>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','<?= $_POST['buscador'] ?>')">BUSCAR</A>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','TODOS')">TODOS</A>
		</b>
		&nbsp;&nbsp;&nbsp;
	<? if($_usuario->gerarquia == 1):?>  	
        <a href="index.php?accion=listado_precios"><font color="#FFFFFF">Listado de Precios</font></a>
        &nbsp;&nbsp;&nbsp;
        <a class="classpopup_list" href="index.php?accion=listado_productos_imprimir"><font color="#FFFFFF">Imprimir Productos</font></a>
        &nbsp;&nbsp;&nbsp;
	    <a href="index.php?accion=exportar"><font color="#FFFFFF">Exportar a EXCEL</font></a>
        <? endif;?>
        <br>
		<FONT SIZE="1" COLOR="white">Buscar por : id, descripcion, categoria, subcategoria</FONT>
	</td></tr>
	
        <? if($_usuario->gerarquia == 1):?>  	

        <tr><td align="left" colspan="10"><a href="index.php?accion=new" class="classpopup_productos">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td></tr>	
        <? endif;?>
        <tr>
		<th>id
			<a href="javaScript:ordenar_por('list','id','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','id','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Descripcion
			<a href="javaScript:ordenar_por('list','descripcion','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','descripcion','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Referencia
			<a href="javaScript:ordenar_por('list','referencia','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','referencia','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>                
		<th>
			Categoria
			<a href="javaScript:ordenar_por('list','categoria_nombre','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','categoria_nombre','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Subcategoria
			<a href="javaScript:ordenar_por('list','subcategoria_nombre','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','subcategoria_nombre','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Precio
			<a href="javaScript:ordenar_por('list','precio','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','precio','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		</th>
		<th>Fech
                        <a href="javaScript:ordenar_por('list','fechaActualizacion','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','fechaActualizacion','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>                
                </th>
                <? if($_usuario->gerarquia == 1):?>  
		<th>+ Info</th>
                <?endif;?>
		<!--<th>C.Barras</th>-->
                <? if($_usuario->gerarquia == 1):?>  
		<th>Borrar</th>
                <?endif;?>

		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($productos as $producto):
	$contador++;
	?>
	<tr <? if($producto["activo"] != 1) echo 'style="color:#CCC"';?>   class="<?=($contador%2==0? "fila_par":"fila_impar");?>" width="100%">
		<td align="center" width="4%"><?= $producto["id"] ?></td>
		<td  width="63%" align="left"><?= $producto["descripcion"] ?></td>
		<td  width="10%" align="left"><?= $producto["referencia"] ?></td>
                <td  width="10%" ><?= $producto["categoria_nombre"]; ?></td>
		<td width="10%"><?= $producto["subcategoria_nombre"]; ?></td>
		<td align="center" width="7%">$<?= redondear_dos_decimal(Producto::get_precio_lista($producto["id"])) ?></td>
	<!--	<td align="center" width="3%">< ?= Producto::aviso_stock_cantidad($producto["id"]) ?></td>-->
                <td width="3%" style="background-color:<?= Producto::get_color_fecha($producto["fechaActualizacion"]);?>;color:white">
                    <? if($producto["fechaActualizacion_muestra"] == "00/00/0000") echo ""; else echo $producto["fechaActualizacion_muestra"]; ?>
                </td>
                <? if($_usuario->gerarquia == 1):?>    
                
                    <td width="3%"><a href="index.php?accion=modify&id=<?= $producto["id"] ?>" class="classpopup_productos">
                    <img  src="<?= IMGS?>ver.gif"  border="0">
                    </a></td>
                <?endif;?>    
		<!--<td align="center"><a class="classpopup" href="../../codigo/index.php?accion=codigo_barras&id=<?= $producto["id"] ?>">
		<img  src="< ?= IMGS?>codigo_barras.jpg"  border="0" height ="20px" width="20px" >
		</a></td> -->

                <? if($_usuario->gerarquia == 1):?>    

                <td align="center" width="2%"><a href="javaScript:pregunta('<?= $producto["id"]?>','el Producto', 'delete')">
			<img  src="<?= IMGS?>del.gif"  border="0"></a>
		</td>
                <?endif;?>                
        </tr>
	<? endforeach;?>
      <? if($_usuario->gerarquia == 1):?>  	        
	<tr>
		<td align="left" colspan="10"><a href="index.php?accion=new" class="classpopup_productos">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>
	</tr>	
     <? endif;?>   
	</table>
</form>
</div>
</div>
