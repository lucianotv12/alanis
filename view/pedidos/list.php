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
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
	<tr><th colspan=20 align="left">
		INGRESE DATOS DEL PEDIDO <input type="text" size="70" name="buscador" id="buscar_usuarios" value="<?= $_POST["buscador"]?>">
		<b>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','<?= $_POST['buscador'] ?>')">BUSCAR</A>
		<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','TODOS')">TODOS</A>
		</b>
		<br>
		<FONT SIZE="1" COLOR="white">Buscar por : id, descripcion, categoria, subcategoria</FONT>
	</td></tr>
	<tr>
		<td align="left" colspan="10"><a href="index.php?accion=new">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>
	</tr>	
	<tr>
		<th>id
			<a href="javaScript:ordenar_por('list','id','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','id','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Pedido
			<a href="javaScript:ordenar_por('list','pedido','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','pedido','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Estado
			<a href="javaScript:ordenar_por('list','estado','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','estado','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>
		</th>
		<th>
			Proveedor
			<a href="javaScript:ordenar_por('list','proveedor','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','proveedor','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		
                </th>
		<th>
			Contacto
			<a href="javaScript:ordenar_por('list','contactoProveedor','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','contactoProveedor','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		
                </th>
		<th>
			Metodo
			<a href="javaScript:ordenar_por('list','metodoPedido','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','metodoPedido','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		
                </th>
		<th>
			Fecha
			<a href="javaScript:ordenar_por('list','fechaPedido','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','fechaPedido','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		
                </th>
		<th>
			Fecha Entrega
			<a href="javaScript:ordenar_por('list','fechaRecepcion','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('list','fechaRecepcion','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>		
                </th>
                <th>Ver</th>
                <th>Borrar</th>
		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0; 
	foreach ($pedidos as $pedido):
	$contador++;
        $pedido_ = $pedido["idPedido"];                
        $pedidos_ .= '$("#estado_pedido_'. $pedido_ .'").change(function(){dependencia_estado('.$pedido_ .');});';        
	?>
	<tr id="colores_<?= $pedido["idPedido"];?>" <? if($pedido["idEstado"] == 1):
                       echo 'style="color:orange"';            
            elseif($pedido["idEstado"] == 2):
                       echo 'style="background-color:red;color:white"';           
            elseif($pedido["idEstado"] == 3):
                       echo 'style="background-color:blue;color:white"';
            elseif($pedido["idEstado"] == 4):
                       echo 'style="background-color:orange;color:white"';            
            elseif($pedido["idEstado"] == 5):
                       echo 'style="background-color:green;color:white"';            
        endif;
 ?>   class="<?=($contador%2==0? "fila_par":"fila_impar");?>" width="100%">
		<td align="center" width="4%"><?= $pedido["idPedido"] ?></td>
		<td  width="20%" align="left"><?= $pedido["pedido"] ?></td>                
		<td  width="8%" >
                    <select name="estado_pedido_<?= $pedido["idPedido"] ?>" id="estado_pedido_<?= $pedido["idPedido"] ?>">
                        <? foreach($estados as $estado):?>
                            <option value="<?= $pedido["idPedido"] . "_" . $estado["idPedidoEstado"];?>" <? if($estado["idPedidoEstado"] == $pedido["idEstado"]) echo "selected";?>><?= $estado["estado"]; ?></option>
                        <? endforeach;?>
                    </select>    
        
        
                
                </td>
		<td width="10%"><?= $pedido["proveedor"]; ?></td>
		<td align="center" width="7%"><?= $pedido["contactoProveedor"]; ?></td>
		<td align="center" width="10%"><?= $pedido["metodoPedido"]; ?></td>
		<td align="center" width="10%"><?= $pedido["fechaPedido"]; ?></td>
		<td align="center" width="10%"><?= $pedido["fechaRecepcion"]; ?></td>

		<td width="3%"><a href="index.php?accion=modify&id=<?= $pedido["idPedido"] ?>">
		<img  src="<?= IMGS?>ver.gif"  border="0">
		</a></td>


		<td align="center" width="2%"><a href="javaScript:pregunta('<?=$pedido["idPedido"]?>','el Pedido', 'delete')">
			<img  src="<?= IMGS?>del.gif"  border="0"></a>
		</td>
	</tr>
	<? endforeach ?>
	<tr>
		<td align="left" colspan="10"><a href="index.php?accion=new">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>
	</tr>	

	</table>


</form>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){

<?= $pedidos_?>
//	$("#estado_turno").change(function(){dependencia_estado();});
//	$("#idCategoria").change(function(){alert("hola");});
//	$("#estado").change(function(){dependencia_ciudad();});
//	$("#subCategoria").attr("disabled",true);
//	$("#ciudad").attr("disabled",true);
});

function dependencia_estado(_id)
{      
    javi= new Array();
	var code = $("#estado_pedido_" + _id).val();
  //      alert(code);
        var color = $("#colores_" + _id);
//        alert('aca entroooo' + code);
	$.get("<?=VIEW?>pedidos/modificar_estado.php", { code: code });
// $("#colores").css({'color':'#DF7401'});            
        estado_ =  code.split('_');
        
        if(estado_[1]== 0){  
            color.css({'color':'black'});
        }else if(estado_[1] == 1){
            color.css({'color':'orange'});
            color.css({'background-color':'white'});            
        }else if(estado_[1] == 2){
            color.css({'color':'white'});
            color.css({'background-color':'red'});
        }else if(estado_[1] == 3){
            color.css({'color':'white'});
            color.css({'background-color':'blue'});
        }else if(estado_[1] == 4){
            color.css({'color':'white'});
            color.css({'background-color':'orange'});
        }else if(estado_[1] == 5){
            color.css({'color':'white'});
            color.css({'background-color':'green'});
        }            
}
</SCRIPT>