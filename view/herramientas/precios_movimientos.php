<?

session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();
Template::draw_header();

?>
<link type="text/css" rel="stylesheet" href="<?=CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />
<script language="JavaScript" src="<?=JS?>funciones.js"></script>

<script src="<?=JS?>jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="<?=JS?>calendario/calendario_esp.js"></script>

<script type="text/javascript">
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
	/*		if(resultado == false)
			{
				alert(" Esta Categoria no posee subcategorias, por favor ingreselas");
			}
			else
			{
	*/			$("#idSubCategoria").attr("disabled",false);
				document.getElementById("idSubCategoria").options.length=1;
				$('#idSubCategoria').append(resultado);			
	/*		}*/
		}

	);
}
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });

 $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
</script>


<?
$categorias= Producto::get_categorias_combo();


?>


<div class="contentArea"> 

<div class="header">


	<div class="pageTitle">
	HISTORIAL DE MOVIMIENTOS REALIZADOS SOBRE LOS PRODUCTOS
	<br>
	</div>
	
	<form method="post" name="datos">
        <table align="center" class="tabla_list">
        <tr>
            <td>Categoria</td>
            <td>SubCategoria</td>
            
        </tr>
	<tr>
		<td >
		<select name="idCategoria" id="idCategoria" onFocus="foco(this);" onBlur="no_foco(this);" size="10">
			<option value="-1" >Seleccione una Categoria... </option>
			<option value="-2" >Todos los Productos </option>
			<? foreach($categorias as $categoria):?>
			<option value="<?=$categoria["id"];?>" <? if($idCategoria == $categoria["id"]) echo"selected";?>><?=$categoria["nombre"];?></option>
			<? endforeach;?>
		</select>	
                </td>
                <td>
		   <select multiple id="idSubCategoria" name="idSubCategoria[]" size="10">
				<option value="-1">Selecciona Uno...</option>

			</select>
		
		</td>
	</tr>
	<tr>
		<td colspan="5" >Desde :<input id="datepicker" name="fecha_desde" size="10"  type="text" <?= $deshabilitado?> value="<?=$fecha_desde?>" onFocus="foco(this);" onBlur="no_foco(this);">
                     Hasta :<input id="datepicker1" name="fecha_hasta" size="10"  type="text" <?= $deshabilitado?> value="<?=$fecha_hasta?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>        
        <tr>
                <td colspan="5" align="center"><input type="submit" name="submit" value="BUSCAR MOVIMIENTOS"></td>
        </tr>               
            
            
        </table>    
            
	<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" style="margin-top:10px;"  >
<!--	<tr><th colspan=20 align="left">
	BUSQUEDA MOVIMIENTO <input type="text" size="70" name="buscador" value="<?= $_POST["buscador"]?>">
	<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('<?= $_POST['buscador'] ?>')">BUSCAR</A>
	<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('TODOS')">TODOS</A>
	<br>
	<FONT SIZE="1" COLOR="white">Busque por : Cliente, Forma de Pago, Fecha, Importe</FONT>
	</td></tr>
-->

<?
if($_POST["submit"]):
    $whereclause_categoria ="";
    if($_POST["idCategoria"] and $_POST["idCategoria"] != "-2"):
      $idCategoria =  $_POST["idCategoria"];
       $whereclause_categoria = " and PML.idCategoria = $idCategoria ";
       if($_POST["idSubCategoria"]):

                $contador_categorias= 0;
            if(!in_array("0", $_POST["idSubCategoria"])): 
                foreach($_POST["idSubCategoria"] as $sub_categoria):

                    if($contador_categorias == 0):
                        $whereclause_subcategoria .= " AND ( idSubCategoria = $sub_categoria" ; 
                    else:
                        $whereclause_subcategoria .= " OR idSubCategoria = $sub_categoria" ;                                     
                    endif;
                   $contador_categorias++;
                    // inicio log de registros

                endforeach;

                $whereclause_subcategoria .= " )";           
            endif; // end si eligio todas las sub    
       endif;
       
    endif;
    if($_POST["fecha_desde"] and $_POST["fecha_hasta"]):
        $whereclause_fechas = " AND PML.fecha between '" . convertir_fecha($_POST["fecha_desde"]) . "' AND '". convertir_fecha($_POST["fecha_hasta"]) . "'" ;
    endif;
endif;


		$query= mysql_query("SELECT PML.id, PM.movimiento as tipo_movimiento,PML.descripcion, concat(U.nombre,' ' , U.apellido) as usuario,
				PC.nombre as categoria , PS.nombre as subcategoria, DATE_FORMAT(PML.fecha,'%d/%m/%Y') as fecha, PML.hora, PML.MovimientoTipo
				FROM productos_movimientos_log AS PML
				inner join productos_movimientos as PM on PML.idProductoMovimiento = PM.id
				inner join usuarios as U on PML.idUsuario = U.idUsuario
				left join productos_categorias as PC on PML.idCategoria = PC.id
				left join productos_subcategorias as PS on PML.idSubCategoria = PS.id
                                where 1 $whereclause_categoria $whereclause_subcategoria $whereclause_fechas
				order by id DESC ") or die(mysql_error());

?>


		<tr>
		<!--	<th>id</th>-->
			<th>Tipo Movimiento </th>
			<th>Descripcion</th>
			<th>Categoria</th>
			<th>Subcategoria</th>
			<th>Usuario</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Forma</th>
                        
		</tr>
		<? $contador = 0;
		
		while($row = mysql_fetch_assoc($query)):
		
		$contador++;
		?>
		<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
		<!--	<td>< ?= $row["id"] ?></td> -->
			<td><?= $row["tipo_movimiento"] ?></td>
			<td><?= $row["descripcion"] ?></td>
			<td><? if($row["categoria"]) echo $row["categoria"]; else echo "Todas las categorias"; ?></td>
			<td><? if($row["subcategoria"]) echo $row["subcategoria"]; else echo "Todas las subcategorias"; ?></td>
			<td><?= $row["usuario"] ?></td>
			<td><?= $row["fecha"] ?></td>
			<td><?= $row["hora"] ?></td>		
			<td><? if($row["MovimientoTipo"] == 1) echo "Masivo"; else echo "Individual"; ?></td>		
		</tr>						
		<? endwhile; ?>
		<tr>
			<td align="right" colspan="10"></td>
		</tr>	

		</table>
	</form>
</div>
</div>
