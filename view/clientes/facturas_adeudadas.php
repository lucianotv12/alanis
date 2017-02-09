<script language="Javascript">
function imprSelec(nombre)
{
  var ficha = document.getElementById(nombre);
  var ventimp = window.open(' ', 'popimpr');
  ventimp.document.write( ficha.innerHTML );
  ventimp.document.close();
  ventimp.print( );
  ventimp.close();
}
</script> 

<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<?
// Fecha en formato dd/mm/yyyy o dd-mm-yyyy retorna la diferencia en dias

function restaFechas($dFecIni, $dFecFin)
{
	$dFecIni = str_replace("-","",$dFecIni);
	$dFecIni = str_replace("/","",$dFecIni);
	$dFecFin = str_replace("-","",$dFecFin);
	$dFecFin = str_replace("/","",$dFecFin);

	ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $dFecIni, $aFecIni);
	ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $dFecFin, $aFecFin);

	$date1 = mktime(0,0,0,$aFecIni[2], $aFecIni[1], $aFecIni[3]);
	$date2 = mktime(0,0,0,$aFecFin[2], $aFecFin[1], $aFecFin[3]);

	return round(($date2 - $date1) / (60 * 60 * 24));
}

?>

<div class="contentArea"> 

	<div class="header">
	
		<DIV ID="seleccion">
			<div class="pageTitle">
			LISTADO DE FACTURAS ADEUDADAS
			</div>
			
			<form method="post" name="datos">
			<br>
			<table class="tabla_list" width="100%" align="center">
				<tr>
					<td>
						<table cellpadding=5 cellspacing=0 border=1 >
							<tr>
								<th>Cliente</th>
								<th>N° Remito</th>
								<th>N° Factura</th>
								<th>Fecha Factura</th>
								<th>Dias Atraso</th>
								<th>Importe</th>
								<th>Saldo Deudor</th>
			
							<!--	<th>Borrar</th>-->
								<?if($gerarquia == true) {?>	<th> </th><? } ?>
							</tr>
							<? $contador = 0;
							foreach ($facturas as $factura):
							$cliente = new Cliente ($factura->get_idCliente());
							$contador++;
							?>
							<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
								<td><?= $cliente->get_nombre() ?></td>
								<td><?= $factura->get_n_remito() ?></td>
								<td><?= $factura->get_n_factura() ?></td>
								<td><?= $factura->get_fecha() ?> </td>
			<?
								$fecha_factura=explode("-",$factura->get_fecha());
								$fechasalida= $fecha[2]."-".$fecha[1]."-".$fecha[0];
								$fecha_vencimiento = date("d-m-Y",mktime(0, 0, 0, $fecha_factura[1]+1, $fecha_factura[2],   $fecha_factura[0])); ?>
								<td><?= $resultado_resta = restaFechas( $fecha_vencimiento , date('d-m-Y') );?></td>
								<td>$ <?= $factura->get_importe() ?></td>
								<? $saldo_factura = $factura->get_saldo_factura($factura->get_importe(),$factura->get_n_factura(),$factura->get_idCliente()) ;
								if($saldo_factura > 0) {
													?>
								<td>$<FONT SIZE='' COLOR='red'><?= $saldo_factura?></FONT></td>
								<? }else{ ?>
								<td>$<FONT SIZE='' COLOR='green'><?= $saldo_factura?></FONT></td>
			
								<? } ?>
							</tr>
							<?
							$pagos_facturas = $factura->get_pagos_facturas($factura->get_n_factura(),$factura->get_idCliente()); 
							IF($pagos_facturas): ?>
			
								<tr>	
									<td colspan=5>
										<table border=1 align="left">
											<tr>
											<th rowspan="100">PAGOS</th>
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
							<? endif; ?>
							
							<? endforeach; ?>
			
							</table>
					</td>
				</tr>
			</table>
			</form>
		</DIV>
		<br><br>
		<a href="javascript:imprSelec('seleccion')" >Imprimir Planilla</a>		
	</div>
</div>
