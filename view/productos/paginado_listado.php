<?php
$cant_datos["count"] = $total_productos;

if($end== 0) $end= 1; 
$start = $_GET["start"];
?>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_list">
<TR>
	
	<TD class="paginado" colspan="20" align="center"> 
		<?php
		if($start > 0) 
		printf("<a href=\"http://192.168.1.140/ctrl/productos/index.php?accion=listado_productos&ordenar=".$_GET["ordenar"]."&tipo_orden=".$_GET["tipo_orden"]."&buscador=".$_GET["buscador"]."&start=" . ($start - $end) . "\"><font class=Paginado color=blue><<< Anterior |</font></a>");
		if($cant_datos["count"] > $end)
		{
			for ($i = 1; $i <= ceil($cant_datos["count"]/$end); $i++)
			{
				if ($i == (($start/$end) + 1))
				{
					printf("<font class=\"Paginado\"><font color=\"red\"> ".$i."</font>	 |</font>");
				} else {
					printf("<a href=\"http://192.168.1.140/ctrl/productos/index.php?accion=listado_productos&ordenar=".$_GET["ordenar"]."&tipo_orden=".$_GET["tipo_orden"]."&buscador=".$_GET["buscador"]."&start=" . ($end*($i-1)) . "\"><font class=\"Paginado\" color=\"blue\"> ".$i." |</font></a>");
				}
                         if($i == 35):
                           echo "</td></tr><tr><td class='paginado' colspan='20' align='left'>";  
                         endif;  
                         if($i == 70):
                           echo "</td></tr><tr><td class='paginado' colspan='20' align='left'>";  
                         endif;   
                         if($i == 105):
                           echo "</td></tr><tr><td class='paginado' colspan='20' align='left'>";  
                         endif; 			}
		}
		if($cant_datos["count"] > ($start + $end))
		{
			printf("<a href=\"http://192.168.1.140/ctrl/productos/index.php?accion=listado_productos&ordenar=".$_GET["ordenar"]."&tipo_orden=".$_GET["tipo_orden"]."&buscador=".$_GET["buscador"]."&start=" . ($start + $end) . "\"><font class=\"Paginado\" color=\"blue\"> Siguiente >>> </font></a>");
		}
		?>
	</TD>

	</TR>
</table>
