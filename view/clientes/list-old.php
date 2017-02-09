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

<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">

<div class="contentArea"> 

<!--<div class="header">

	<div class="logo">
		<img src="<?= HOME?>view/img/plaza.gif"  />
	</div>
<div>
	<table width="100%" border=0 cellpadding=0 cellspacing=0>
		<tr>
			<td colspan="10">
				<ul id='menu'>
				<li ><a href='<?= HOME?>/ctrl/principal_auditor.php' >Principal</a></li>
				<li ><a class='current' href='<?= HOME?>/ctrl/usuarios/index.php' >Usuarios</a></li>
				<li ><a href='<?= HOME?>/ctrl/tarjeta.php'  >¿que es tarjeta buscard?</a></li>
				<li ><a href='<?= HOME?>/ctrl/solicitudes.php' >Solicitudes</a></li>
				<li ><a href='<?= HOME?>/ctrl/principal.php'  >promociones</a></li>
				<li ><a href='<?= HOME?>/ctrl/principal.php'  >mis datos</a></li>
				<li ><a href='<?= HOME?>ctrl/simulacion.php'>simulacion evento</a></li>
				</ul><br>
			</td>
		</tr>
	</table>
</div> -->



<form method="post" name="datos">
<div class="pageTitle">
LISTADO DE CLIENTES
</div>
<br>
<table cellpadding=15 cellspacing=0 border=10 >

	<tr>
		<th>id</th>
		<th>Razon Social</th>
		<th>Telefono</th>
		<th>Mail</th>
		<th>Web</th>
		<th>Ver</th>
		<th>Borrar</th>
		<?if($gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($clientes as $cliente):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
		<td><?= $cliente->get_id() ?></td>
		<td><?= $cliente->get_nombre() ?></td>
		<td><?= $cliente->get_telefono() ?></td>
		<td><?= $cliente->get_mail() ?></td>
		<td><?= $cliente->get_web() ?></td>


		<td><a href="index.php?accion=detail&id=<?= $cliente->get_id() ?>">
		<img style="display:block;" src="<?= IMGS?>lupa.gif"  border="0" height ="20px" width="20px" >
		</a></td>

		<td><a href="javaScript:pregunta('<?= $cliente->get_id()?>')">
		<img style="display:block;" src="<?= IMGS?>eliminar.png"  border="0">
		</a></td>
	</tr>
	<? endforeach ?>
	<tr>
		<td align="right" colspan="10"><a href="index.php?accion=new">
		<img style="display:block;" src="<?= IMGS?>add.gif"  border="0" >
		</a></td>
	</tr>	

	</table>
</form>
</div>
</div>
