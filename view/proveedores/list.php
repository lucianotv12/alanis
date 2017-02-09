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
 $("a.classpopup_clientes").fancybox({  
 'width': '100%',  
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


<div class="contentArea"> 


<form method="post" name="datos">
<div class="pageTitle">
LISTADO DE PROVEEDORES 
</div>

<br>
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr>
		<td ><a href="index.php?accion=new" class="classpopup_clientes">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>

	</tr>	    
		<tr><th colspan=20 align="left">
		INGRESE DATOS DEL PROVEEDOR <input type="text" size="70" name="buscador" value="<?= $_POST["buscador"]?>">
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','<?= $_POST['buscador'] ?>')">BUSCAR</A>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','TODOS')">TODOS</A>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','DEUDORES')">DEUDORES</A>
		<br>
		<FONT SIZE="1" COLOR="white">Busque por : nombre, domicilio, telefono, mail, contacto</FONT>
		</td></tr>
	<tr>
		<th>id</th>
		<th>Razon Social</th>
		<th>Telefono</th>
		<th>Mail</th>
		<th>N&deg; Cuit</th>
		<th>+ Info</th>
		<th>Facturas</th>
		<th>Remitos</th>                
                <th>Borrar</th>
		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($proveedores as $proveedor):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
		<td width="5%" align="center"><?= $proveedor->get_id() ?></td>
		<td width="40%" align="left"><?= $proveedor->get_nombre() ?></td>
		<td width="15%" align="center"><?= $proveedor->get_telefono() ?></td>
		<td width="15%" align="center"><?= $proveedor->get_mail() ?></td>
		<td width="15%" align="center"><?= $proveedor->get_nro_cuit() ?></td>

		<td width="5%" align="center">
			<a href="index.php?accion=modify&id=<?= $proveedor->get_id() ?>" class="classpopup_clientes">
				<img src="<?= IMGS?>ver.gif"  border="0">
			</a>
		</td>
		<td width="5%" align="center">
                    <a href="<?=CTRL?>compras/index.php?tipo=factura&idcliente=<?= $proveedor->get_id() ?>&cliente_nombre=<?= $proveedor->get_nombre() ?>">
				<img src="<?= IMGS?>ver.gif"  border="0">
			</a>
		</td>
		<td width="5%" align="center">
			<a href="<?=CTRL?>compras/index.php?tipo=remito&idcliente=<?= $proveedor->get_id() ?>&cliente_nombre=<?= $proveedor->get_nombre() ?>">
				<img src="<?= IMGS?>ver.gif"  border="0">
			</a>
		</td>                

		<td width="5%" align="center">
			<a href="javaScript:pregunta('<?= $proveedor->get_id()?>', 'el proveedor', 'delete' )">
				<img src="<?= IMGS?>del.gif"  border="0">
			</a>
		</td>
	</tr>
	<? endforeach ?>
	<tr>
		<td ><a href="index.php?accion=new" class="classpopup_clientes">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>

	</tr>	

	</table>
</form>
</div>
</div>
