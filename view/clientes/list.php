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
LISTADO DE CLIENTES 
</div>

<br>
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr>
		<td ><a href="index.php?accion=new" class="classpopup_clientes">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>
	</tr>	
    
		<tr><th colspan=20 align="left">
		INGRESE DATOS DEL CLIENTE <input type="text" size="70" name="buscador" value="<?= $_POST["buscador"]?>">
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
		<th>Estado</th>
		<th>+ Info</th>
		<th>Borrar</th>
		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($clientes as $cliente):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
		<td width="5%" align="center"><?= $cliente->get_id() ?></td>
		<td width="40%" align="left"><?= $cliente->get_nombre() ?></td>
		<td width="15%" align="center"><?= $cliente->get_telefono() ?></td>
		<td width="15%" align="center"><?= $cliente->get_mail() ?></td>
		<td width="10%" align="center"><?= $cliente_deudor = Factura::get_cliente_deudor($cliente->get_id()); ?></td>


		<td width="5%" align="center">
			<a href="index.php?accion=modify&id=<?= $cliente->get_id() ?>" class="classpopup_clientes">
				<img src="<?= IMGS?>ver.gif"  border="0">
			</a>
		</td>
		<td width="5%" align="center">
			<a href="javaScript:pregunta('<?= $cliente->get_id()?>', 'el Cliente', 'delete' )">
				<img src="<?= IMGS?>del.gif"  border="0">
			</a>
		</td>
	</tr>
	<? endforeach ?>
	<tr>
		<td ><a href="index.php?accion=new" class="classpopup_clientes">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>
		<td colspan="3" align="left"><input name="LISTADO DEUDA" type="button" value="LISTADO DEUDA" onCLICK="javascript:popUp('index.php?accion=listado_deuda_facturas')" /></td>
	</tr>	

	</table>
</form>
</div>
</div>
