
<div class="contentArea"> 

<div class="header">


	<div class="pageTitle">
	LISTADO GENERAL DE COBRANZAS
	<br>
	</div>
	
	<form method="post" name="datos">

	<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" style="margin-top:10px;"  >
	<tr><th colspan=20 align="left">
	BUSQUEDA COBRANZA <input type="text" size="70" name="buscador" value="<?= $_POST["buscador"]?>">
	<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','<?= $_POST['buscador'] ?>')">BUSCAR</A>
	<a style="color:white" onmouseover="this.style.color='blue'" onmouseout="this.style.color='white'" href="javaScript:busqueda('list','TODOS')">TODOS</A>
	<br>
	<FONT SIZE="1" COLOR="white">Busque por : Cliente, Forma de Pago, Fecha, Importe</FONT>
	</td></tr>
		<tr>
			<th>Fecha</th>
			<th>Cliente</th>
			<th>Forma Pago</th>
			<th>Importe</th>
			<th>Descripcion</th>
			<th>Operacion</th>
		</tr>
		<? $contador = 0;
		foreach ($pagos as $pago):
		$contador++;
		?>
		<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
			<td><?= $pago["fecha"] ?></td>
			<td><?= $pago["cliente"] ?></td>
			<td><?= $pago["tipo_pago"] ?></td>
			<td>$ <?= $pago["importe"] ?></td>
			<td><?= $pago["descripcion"] ?></td>
			<td><?= $pago["operacion"] ?></td>						

		</tr>						
		<? endforeach ?>
		<tr>
			<td align="right" colspan="10"></td>
		</tr>	

		</table>
	</form>
</div>
</div>
