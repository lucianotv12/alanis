<link type="text/css" rel="stylesheet" href="<?php echo CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />
<script type='text/javascript' src="<?php echo  JS?>jquery-ui-1.8.17.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo  JS?>fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
<script type="text/javascript" src="<?php echo  JS?>fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

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
		source:"<?php echo VIEW?>productos/ajax.php",				
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
	<input type="hidden" name="productos_excel" value="<?php echo  $productos_excel?>">



<div class="pageTitle">
LISTADO DE PRODUCTOS 	<input type="submit" name="exportar" value ="Exportar a Excel">
</div>


</form>


<br>
<form method="post" name="datos">
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><th colspan=20 align="left">
		INGRESE DATOS DEL PRODUCTO <input type="text" size="70" name="buscador" id="buscar_usuarios" value="<?php echo  $_POST["buscador"]?>" >
		<b>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','<?php echo  $_POST['buscador'] ?>')">BUSCAR</A>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','TODOS')">TODOS</A>
		</b>
		&nbsp;&nbsp;&nbsp;
	<?php if($_usuario->gerarquia == 1):?>  	
        <a href="index.php?accion=listado_precios"><font color="#FFFFFF">Listado de Precios</font></a>
        &nbsp;&nbsp;&nbsp;
        <a class="classpopup_list" href="index.php?accion=listado_productos_imprimir"><font color="#FFFFFF">Imprimir Productos</font></a>
        &nbsp;&nbsp;&nbsp;
	    <a href="index.php?accion=exportar"><font color="#FFFFFF">Exportar a EXCEL</font></a>
        <?php endif;?>
        <br>
		<FONT SIZE="1" COLOR="white">Buscar por : id, descripcion, categoria, subcategoria</FONT>
	</td></tr>
	
        <?php if($_usuario->gerarquia == 1):?>  	

        <tr><td align="left" colspan="10"><a href="index.php?accion=new" class="classpopup_productos">
		<img style="display:block;" src="<?php echo  IMGS?>add2.gif"  border="0" >
		</a></td></tr>	
        <?php endif;?>
        <tr>
		<th>id
			<a href="javaScript:ordenar_por('list','id','ASC')"><img  src="<?php echo  IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','id','DESC')"><img  src="<?php echo  IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Descripcion
			<a href="javaScript:ordenar_por('list','descripcion','ASC')"><img  src="<?php echo  IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','descripcion','DESC')"><img  src="<?php echo  IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Referencia
			<a href="javaScript:ordenar_por('list','referencia','ASC')"><img  src="<?php echo  IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','referencia','DESC')"><img  src="<?php echo  IMGS?>next.png"  border="0" ></a>
		</th>                
		<th>
			Categoria
			<a href="javaScript:ordenar_por('list','categoria_nombre','ASC')"><img  src="<?php echo  IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','categoria_nombre','DESC')"><img  src="<?php echo  IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Subcategoria
			<a href="javaScript:ordenar_por('list','subcategoria_nombre','ASC')"><img  src="<?php echo  IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','subcategoria_nombre','DESC')"><img  src="<?php echo  IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Precio
			<a href="javaScript:ordenar_por('list','precio','ASC')"><img  src="<?php echo  IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','precio','DESC')"><img  src="<?php echo  IMGS?>next.png"  border="0" ></a>		</th>
		<th>Fech
                        <a href="javaScript:ordenar_por('list','fechaActualizacion','ASC')"><img  src="<?php echo  IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','fechaActualizacion','DESC')"><img  src="<?php echo  IMGS?>next.png"  border="0" ></a>                
                </th>
                <?php if($_usuario->gerarquia == 1):?>  
		<th>+ Info</th>
                <?php endif;?>
		<!--<th>C.Barras</th>-->
                <?php if($_usuario->gerarquia == 1):?>  
		<th>Borrar</th>
                <?php endif;?>

		<?php if($gerarquia == true) {?>	<th> </th><?php } ?>
	</tr>
	<?php $contador = 0;
	foreach ($productos as $producto):
	$contador++;
	?>
	<tr <?php if($producto["activo"] != 1) echo 'style="color:#CCC"';?>   class="<?php echo ($contador%2==0? "fila_par":"fila_impar");?>" width="100%">
		<td align="center" width="4%"><?php echo  $producto["id"] ?></td>
		<td  width="63%" align="left"><?php echo  $producto["descripcion"] ?></td>
		<td  width="10%" align="left"><?php echo  $producto["referencia"] ?></td>
                <td  width="10%" ><?php echo  $producto["categoria_nombre"]; ?></td>
		<td width="10%"><?php echo  $producto["subcategoria_nombre"]; ?></td>
		<td align="center" width="7%">$<?php echo  redondear_dos_decimal(Producto::get_precio_lista($producto["id"])) ?></td>
	<!--	<td align="center" width="3%">< ?= Producto::aviso_stock_cantidad($producto["id"]) ?></td>-->
                <td width="3%" style="background-color:<?php echo  Producto::get_color_fecha($producto["fechaActualizacion"]);?>;color:white">
                    <?php if($producto["fechaActualizacion_muestra"] == "00/00/0000") echo ""; else echo $producto["fechaActualizacion_muestra"]; ?>
                </td>
                <?php if($_usuario->gerarquia == 1):?>    
                
                    <td width="3%"><a href="index.php?accion=modify&id=<?php echo  $producto["id"] ?>" class="classpopup_productos">
                    <img  src="<?php echo  IMGS?>ver.gif"  border="0">
                    </a></td>
                <?php endif;?>    
		<!--<td align="center"><a class="classpopup" href="../../codigo/index.php?accion=codigo_barras&id=<?php echo  $producto["id"] ?>">
		<img  src="< ?= IMGS?>codigo_barras.jpg"  border="0" height ="20px" width="20px" >
		</a></td> -->

                <?php if($_usuario->gerarquia == 1):?>    

                <td align="center" width="2%"><a href="javaScript:pregunta('<?php echo  $producto["id"]?>','el Producto', 'delete')">
			<img  src="<?php echo  IMGS?>del.gif"  border="0"></a>
		</td>
                <?php endif;?>                
        </tr>
	<?php endforeach;?>
      <?php if($_usuario->gerarquia == 1):?>  	        
	<tr>
		<td align="left" colspan="10"><a href="index.php?accion=new" class="classpopup_productos">
		<img style="display:block;" src="<?php echo  IMGS?>add2.gif"  border="0" >
		</a></td>
	</tr>	
     <?php endif;?>   
	</table>
</form>
</div>
</div>
