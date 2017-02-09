


<div class="contentArea"> 



<form method="post" name="datos">
<div class="pageTitle">
LISTADO DE USUARIOS
</div>
<br>
<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >

	<tr>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>Usuario</th>
		<th>Tipo</th>
		<th>Ver</th>
		<th>Borrar</th>
		<?if(@$gerarquia == true) {?>	<th> </th><? } ?>
	</tr>
	<? $contador = 0;
	foreach ($usuarios as $usuario):
	$contador++;
	?>
	<tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
		<td><?= $usuario->get_nombre() ?></td>
		<td><?= $usuario->get_apellido() ?></td>
		<td><a href="mailto:<?= $usuario->get_email()?>"><?= $usuario->get_email() ?></a></td>		
		<td><?= $usuario->get_user() ?></td>	
		<td><? if($usuario->get_gerarquia() == 1) echo "Administrador"; else echo "Vendedor"; ?></td>	

		<td><a href="index.php?accion=modify&id=<?= $usuario->get_idUsuario() ?>">
		<img src="<?= IMGS?>lupa.gif"  border="0" height ="20px" width="20px" >
		</a></td>

		<td><a href="javaScript:pregunta('<?= $usuario->get_idUsuario()?>','Usuario : <?= $usuario->get_nombre() . $usuario->get_apellido()?>', 'delete')">
		<img  src="<?= IMGS?>eliminar.png"  border="0">
		</a></td>
	</tr>
	<? endforeach ?>
	<tr>
		<td align="right" colspan="10"><a href="index.php?accion=new">
		<img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
		</a></td>
	</tr>	

	</table>
</form>
</div>
</div>
