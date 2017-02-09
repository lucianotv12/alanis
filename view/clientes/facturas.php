<script language="JavaScript">
<!--
function pregunta(idcliente)  // ABRE POPUP, DONDE PREGUNTA SI SE ABRIRAN LOS ARCHIVOS ANTIGUOS
{

var update=window.confirm("Se procederá a borrar el cliente " + idcliente + " desea continuar?");



if (update){
document.datos.action="index.php?accion=delete&id=" + idcliente ;
document.datos.submit();
}else

document.datos.action="";
}
//-->
</script>

<script language="JavaScript">
<!--
function busqueda(buscador)
{

document.datos.action="index.php?accion=list&buscador=" + buscador ;
document.datos.submit();

}
//-->
</script>
<script>
function foco(elemento) {
elemento.style.border = "1px solid red";
}

function no_foco(elemento) {
elemento.style.border = "";
}
</script>
<script type="text/javascript">
function mostrar(variable) {
  divs = 'flotante' + variable ;
  enla = 'enla'	+ variable ;
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
  document.getElementById(enla).innerHTML = (obj.style.display=='none') ? 'Mostrar' : 'Ocultar';
}
</script>

<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 

<div class="header">
	<table width="100%" border=0 cellpadding=0 cellspacing=0>
		<tr>
			<td colspan="10">
				<ul id='menu'>
				<li ><a href='<?= ADMIN?>clientes/index.php'>Listado</a></li>
				<li ><a href='<?= ADMIN?>clientes/index.php?accion=detail&id=<?= $cliente->get_id() ?>' >cliente</a></li>
				<li ><a class='current' href='<?= ADMIN?>clientes/index.php?accion=facturas&id=<?= $cliente->get_id() ?>' >Facturas</a></li>
				<li ><a  href='<?= ADMIN?>clientes/index.php?accion=nueva_factura&id=<?= $cliente->get_id() ?>' >Nueva Factura</a></li>
<!--				<li ><a href='<?= ADMIN?>clientes/index.php?accion=galeria_archivos&id=< ?= $cliente->get_id() ?>' >Galeria Archivos</a></li>-->
				</ul><br>
			</td>
		</tr>
	</table>


	<div class="pageTitle">
	LISTADO DE FACTURAS  Cliente : <?= $nombre?>
	</div>
	
	<form method="post" name="datos">
	<br>
	<table class="tabla_list">
	<tr>
		<td>
			<table cellpadding=5 cellspacing=0 border=5 >
				<tr>
					<th>id</th>
					<th>N° Remito</th>
					<th>N° Factura</th>
					<th>Descuento</th>
					<th>Importe</th>
					<th>Saldo</th>
					<th>Estado</th>
					<th>Ver</th>
					<th>Pagos</th>
				<!--	<th>Borrar</th>-->
					<?if($gerarquia == true) {?>	<th> </th><? } ?>
				</tr>
				<? $contador = 0;
				foreach ($facturas as $factura):
				$contador++;
				?>
				<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
					<td><?= $factura->get_id() ?></td>
					<td><?= $factura->get_n_remito() ?></td>
					<td><?= $factura->get_n_factura() ?></td>
					<td><?= $factura->get_descuento() ?> %</td>
					<td>$ <?= $factura->get_importe() ?></td>
					<? $saldo_factura = $factura->get_saldo_factura($factura->get_importe(),$factura->get_n_factura(),$factura->get_idCliente()) ;
					if($saldo_factura > 0) {
										?>
					<td>$<FONT SIZE='' COLOR='red'><?= $saldo_factura?></FONT></td>
					<? }else{ ?>
					<td>$<FONT SIZE='' COLOR='green'><?= $saldo_factura?></FONT></td>

					<? } 
					$fecha_factura=explode("-",$factura->get_fecha());
					$fechasalida= $fecha[2]."-".$fecha[1]."-".$fecha[0];

					$fecha_vencimiento = date("Y-m-d",mktime(0, 0, 0, $fecha_factura[1]+1, $fecha_factura[2],   $fecha_factura[0]));
						if($fecha_vencimiento < date("Y-m-d") and $saldo_factura != 0 )
							{
								echo "<td>Vencida</td>";
							}
						elseif($fecha_vencimiento > date("Y-m-d") and $saldo_factura != 0 )	
							{
								echo "<td>Pendiente</td>";
							}
						elseif($saldo_factura == 0 )	
							{
								echo "<td>Abonada</td>";
							}
					?>
					<td>
						<a href="index.php?accion=factura_detalle&id=<?=$_GET['id']?>&idfactura=<?= $factura->get_id() ?>">
						<img style="display:block;" src="<?= IMGS?>lupa.gif"  border="0" height ="20px" width="20px" >
						</a>
					</td>
					<? $_pagos = $factura->get_pagos_facturas($factura->get_n_factura(),$factura->get_idCliente()); 
					if($_pagos){
					?>
					<td><a href="#" id="enla<?= $factura->get_id() ?>" onclick = "mostrar(<?= $factura->get_id()?>); return false">Mostrar</a></td>
					<?}else{?>
					<td>no hay</td>
					<? } ?>
					<td>
						<a href="index.php?accion=facturas&id=<?=$_GET['id']?>&idfactura=<?= $factura->get_id() ?>&pago=true">
						<img style="display:block;" src="<?= IMGS?>pagar.jpg"  border="0"  >
						</a>
					</td>

			<!--		<td><a href="javaScript:pregunta('<?= $factura->get_id()?>')">
					<img style="display:block;" src="<?= IMGS?>eliminar.png"  border="0">
					</a></td>-->
				</tr>
										
					<tr id="flotante<?= $factura->get_id() ?>" style="display:none">	
					<td colspan=5>
						<table BORDER=1 align="right">
							<tr>
							<th>Fecha</th>
							<th>Importe</th>
							</tr>
							<? $pagos_facturas = $factura->get_pagos_facturas($factura->get_n_factura(),$factura->get_idCliente()); 					
							$contador1=0;
							foreach($pagos_facturas as $pagos_factura):
							$contador1++;
							?>								
							<tr class="<?=($contador1%2==0? "fila_par":"fila_impar");?>">
							<td><?=$pagos_factura->get_fecha();?></td>
							<td><?=$pagos_factura->get_importe();?></td>
							</tr>
							<? endforeach; ?>		
						</table>
					</td>
					</tr>
				<? endforeach ?>
				<tr>
					<td align="right" colspan="10"><a href="index.php?accion=nueva_factura&id=<?= $_GET['id'] ?> ">
					<img style="display:block;" src="<?= IMGS?>add.gif"  border="0" >
					</a></td>
				</tr>	

				</table>
			</form>
		</td>
		<? if($_GET["pago"] == true){
		 $factura_pago = new Factura($_GET['idfactura']);
			?>

		<td>&nbsp;&nbsp;&nbsp;</td>
		<td valign="button">
		<form name="pago_factura" method="post" enctype="multipart/form-data" action="index.php?accion=insert_pago&id=<?=$_GET['id']?>">

			<table  border=5 cellspacing=3 cellpadding=4>
				<tr>
					<td colspan="5" align="center">
						<div class="pageTitle">
						Pago Factura
						</div>
					</td>
				</tr>
				<tr>
					<td class="td_text">N° Remito:</td><td class="td_text"><input name="n_remito_pago" size="12"  type="text" <?= $deshabilitado?> value="<?=$factura_pago->get_n_remito();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
					<td class="td_text">N° Factura:</td><td class="td_text"><input name="n_factura_pago" size="12"  type="text"  value="<?=$factura_pago->get_n_factura();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
				</tr>
				<tr>
					<td class="td_text">Fecha Pago:</td><td class="td_text"><input name="fecha_pago" size="12"  type="text" <?= $deshabilitado?> value="<?= $fecha_actual=date("d/m/Y");  ?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
					<td class="td_text">Importe:</td><td class="td_text"><input name="importe_pago" size="12"  type="text" <?= $deshabilitado?> value="<?=$factura_pago->get_saldo_factura($factura_pago->get_importe(),$factura_pago->get_n_factura(),$factura->get_idCliente());?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
				</tr>
				<tr>
				<td class="submit" align="center" colspan="10" ><input type="submit" name="submit" value="GENERAR PAGO" ></td>
				</tr>

			</table>
		</form>
		<? } ?>
	</tr>
	<table>
</div>
</div>
