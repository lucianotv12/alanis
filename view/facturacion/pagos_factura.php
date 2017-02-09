<?
session_start();
include_once("../../funciones.php");

validar_permanencia();
conectar_bd();


?>
<body >
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 

	<div class="header">
		

		<div class="pageTitle">
		DETALLE PAGOS REALIZADOS FACTURA : <?= $_GET["id"];?><br>
		</div>
		<? $pagos = Pago::get_pagos_factura($_GET["id"]); ?>

		<table class="tabla_list" cellpadding=0 cellspacing=0  border="1" width="90%" >
			<tr>
				<td class="td_text" Colspan="3" align="center"><B>DATOS DEL PAGO</B></td>
			</tr>
			
			<tr>
				<td class="td_text" align="center">Forma de pago</td>
				<td class="td_text" align="center">Fecha</td>
				<td class="td_text" align="center" >Importe</td>
			</tr>
			<? foreach(Pago::get_pagos_factura($_GET["id"]) as $pagos): ?>
			<tr>
				<td class="td_text"><?= $pagos["nombre"];?></td>
				<td class="td_text"><?=  $pagos["fecha"];?></td> 
				<td class="td_text"><?=  $pagos["importe"];?></td>

			</tr>
			<? endforeach; ?>
			<tr>
				<td class="td_text" Colspan="3" align="center"><br></td>
			</tr>

		</table>

	</div>

</div>

