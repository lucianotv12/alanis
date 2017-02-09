<link type="text/css" rel="stylesheet" href="<?=CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />
<script type="text/javascript" src="<?= JS?>jquery-1.7.1.min.js"></script>
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
 
 
 });  
  
 </script>
<script type="text/javascript">
	$(function(){
		$('#buscar_usuarios').autocomplete({
		source:"ajax.php"
				
		});
		
	});

</script> 
<div class="contentArea"> 


<form method="post" name="datos">
<div class="pageTitle">
LISTADO DE PEDIDOS 
</div>
<br>
<div class="row" style="background-color: lightskyblue">
  <div class="col-lg-1">
    id
    <a href="javaScript:ordenar_por('list','id','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
    <a href="javaScript:ordenar_por('list','id','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>      
  </div>
  <div class="col-lg-1">
    Pedido
    <a href="javaScript:ordenar_por('list','pedido','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
    <a href="javaScript:ordenar_por('list','pedido','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>      
      
  </div>
  <div class="col-lg-2">
    Descripcion
    <a href="javaScript:ordenar_por('list','descripcion','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
    <a href="javaScript:ordenar_por('list','descripcion','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>      
  </div>
  <div class="col-lg-1">
    Estado
    <a href="javaScript:ordenar_por('list','estado','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
    <a href="javaScript:ordenar_por('list','estado','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
      
  </div>
  <div class="col-lg-1">
    Proveedor
    <a href="javaScript:ordenar_por('list','proveedor','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
    <a href="javaScript:ordenar_por('list','proveedor','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		      
  </div>
  <div class="col-lg-1">
    Contacto
    <a href="javaScript:ordenar_por('list','contactoProveedor','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
    <a href="javaScript:ordenar_por('list','contactoProveedor','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		      
  </div>
  <div class="col-lg-1">
    Metodo
    <a href="javaScript:ordenar_por('list','metodoPedido','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
    <a href="javaScript:ordenar_por('list','metodoPedido','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>	      
  </div>
  <div class="col-lg-1">
    Fecha
    <a href="javaScript:ordenar_por('list','fechaPedido','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
    <a href="javaScript:ordenar_por('list','fechaPedido','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>	      
  </div>
  <div class="col-lg-1">
    Fecha est.
    <a href="javaScript:ordenar_por('list','fechaRecepcion','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
    <a href="javaScript:ordenar_por('list','fechaRecepcion','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		      
  </div>
  <div class="col-lg-1">
      VER
  </div>
  <div class="col-lg-1">
      Borrar
  </div>    
</div>
	<? $contador = 0; 
	foreach ($pedidos as $pedido):
	$contador++;
	?>
        <div class="row" <? if($pedido["activo"] != 1) echo 'style="color:#CCC"';?>   class="<?=($contador%2==0? "fila_par":"fila_impar");?>" width="100%">
          <div class="col-lg-1"><?= $pedido["idPedido"] ?></div>
          <div class="col-lg-1"><?= $pedido["pedido"] ?></div>
          <div class="col-lg-2"><?= $pedido["descripcion"] ?></div>
          <div class="col-lg-1"><?= $pedido["estado"]; ?></div>
          <div class="col-lg-1"><?= $pedido["proveedor"]; ?></div>
          <div class="col-lg-1"><?= $pedido["contactoProveedor"]; ?></div>
          <div class="col-lg-1"><?= $pedido["metodoPedido"]; ?></div>
          <div class="col-lg-1"><?= $pedido["fechaPedido"]; ?></div>
          <div class="col-lg-1"><?= $pedido["fechaRecepcion"]; ?></div>
          <div class="col-lg-1"><a href="index.php?accion=modify&id=<?= $pedido["idPedido"] ?>">
		<img  src="<?= IMGS?>ver.gif"  border="0">
		</a>
          </div>
          <div class="col-lg-1">
            <a href="javaScript:pregunta('<?=$pedido["idPedido"]?>','el Pedido', 'delete')">
			<img  src="<?= IMGS?>del.gif"  border="0"></a>              
          </div>

        </div>

	<? endforeach ?>


