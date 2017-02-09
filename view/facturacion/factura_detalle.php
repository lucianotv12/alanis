
<body >
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 

<div class="header">
	

<div class="pageTitle">
DETALLE FACTURA<br>
</div>

<table class="tabla_list" cellpadding=0 cellspacing=0  border="1" width="90%" >
	<tr>
		<td class="td_text" Colspan="4" align="center"><B>DATOS DEL CLIENTE</B></td>
	</tr>

	<tr>
		<td class="td_text" align="center">Cod.Cliente	</td>
		<td class="td_text" align="center">Razon social del Cliente</td>
		<td class="td_text" align="center" >Desc.</td>
		<td class="td_text" align="center">Condicion IVA</td>
	</tr>
	<tr>
		<td class="td_text"><?= $cliente->get_id();?></td>
		<td class="td_text"><?= $cliente->get_nombre();?></td> 
		<td class="td_text">%<?= $cliente->get_descuento();?></td>
		<td class="td_text"><?= $cliente->get_condicion_iva();?></td>
	</tr>
	<tr>
		<td class="td_text" Colspan="4" align="center"><br></td>
	</tr>
	<tr>
		<td class="td_text" Colspan="4" align="center"><B>DATOS FACTURA</B></td>
	</tr>

	<tr>
		<td class="td_text" align="center">N° Remito</td>
		<td class="td_text" align="center">N° Factura</td>
		<td class="td_text" align="center" >Cond. Venta</td>
		<td class="td_text" align="center">Orden Compra</td>
	</tr>
	<tr>
		<td class="td_text"><?= $factura->get_n_remito(); ?></td>
		<td class="td_text"><?= $factura->get_n_remito(); ?></td> 
		<td class="td_text"><?= $factura->get_condicion_venta(); ?></td>
		<td class="td_text"><?= $factura->get_orden_compra(); ?></td>
	</tr>
</table>



<table class="tabla_list"  cellpadding=0 cellspacing=0  border="1" width="90%" >
	<tr>
		<td class="td_text" Colspan="5" align="center"><br></td>
	</tr>

	<tr>
		<td class="td_text" Colspan="5" align="center"><B>PRODUCTOS DE LA FACTURA</B></td>
	</tr>
	<tr >
		<th class="td_text">Cant.</th>
		<th class="td_text">Art.</th>
		<th class="td_text">Detalle</th>
		<th class="td_text">P/unitario</th>
		<th class="td_text">Importe</th>
		<th class="td_text"></th>
	</tr>
<?foreach($productos_facturas as $producto_factura):?>
	<tr >
		<td class="td_text"><?=$producto_factura['cantidad'];?></td>
		<td class="td_text"><?=$producto_factura['idProducto'];?></td>
		<td class="td_text"><?=$producto_factura['descripcion'];?></td>
		<td class="td_text"><?=$producto_factura['precio_unitario'];?></td>
		<td class="td_text"><?=$producto_factura['precio_total'];?></td>
	</tr>
<? endforeach;?>
	<tr >
		<td class="td_text"></td>
		<td class="td_text"></td>
		<td class="td_text"></td>
		<td class="td_text" align="right"><B>Total</B></td>
		<td class="td_text"><?=$factura->get_importe();?></td>
	</tr>
</table>

