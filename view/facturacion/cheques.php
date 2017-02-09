    <link type="text/css" rel="stylesheet" href="<?=CSS?>autocomplete/jquery-ui-1.8.17.custom.css" />

    <script type='text/javascript' src="<?= JS?>jquery-ui-1.8.17.custom.min.js"></script>
		<script>
		var miPopup
		function abreVentana(){
			miPopup = window.open("../productos/index.php?accion=listado_productos","miwin","width=500,height=300,scrollbars=yes")
			miPopup.focus()
		}
		function abre_nueva_factura(){
			miPopup = window.open("index.php?accion=nueva_factura","miwin","width=800,height=600,scrollbars=yes")
			miPopup.focus()
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
		<SCRIPT LANGUAGE="JavaScript">
		<!-- Begin
		function popUp(URL) {
		day = new Date();
		id = day.getTime();
		eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=850,height=800');");
		}
		// End -->
		</script>


		<link rel="stylesheet" type="text/css" href="<?= JS?>fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen">
		<script type="text/javascript" src="<?= JS?>fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

		<script type="text/javascript"> $(document).ready(function () {  
		 $("a.classpopup").fancybox({  
		 'width': '80%',  
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
		 });  
                 
              
  </script>
  
<script type="text/javascript">                

                 
                $(function(){
                        $('#buscar_usuarios').autocomplete({
                        source:"<?=VIEW?>compras/ajax.php",
                                select: function(event, ui){
                         $("#numero").val(ui.item.cheque);
                                //AGREGAR EL PRECIO DEL PRODUCTO 
                                }		

                        });

                });   	
                
shortcut.add("Enter", function () { busqueda('cheques','<?= $_POST['buscador'] ?>');});
shortcut.add("F5", function () { document.datos.buscador.focus(); });	                
                
		 </script>
</head>
<body>
<div class="contentArea"> 

<div class="header">


	<div class="pageTitle">
	LISTADO DE CHEQUES
	</div>
	
	<form method="post" name="datos">
	<br>
	<table cellpadding=3 cellspacing=1 border=0 width="90%" align="center" >
            <tr><th colspan=20 align="left">
            BUSQUEDA CHEQUE <input type="text" size="70" name="buscador"  id="buscar_usuarios"  value="<?= $_POST["buscador"]?>">
            <a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('cheques','<?= $_POST['buscador'] ?>')">BUSCAR</A>
            <a style="color:white" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" href="javaScript:busqueda('cheques','TODOS')">TODOS</A>
            <br>
            <FONT SIZE="1" COLOR="white">Busque por : N°cheque, N&#176; Factura, Banco, importe, destinatario, titular</FONT>
            </td></tr>
            <tr>
                    <td align="left" colspan="13"><a class="classpopup" href="<?=VIEW?>compras/nuevo_cheque.php">
                    <img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
                    </a></td>
            </tr>	
            
            
            <tr>                
                <th>N&#176;Cheque
			<a href="javaScript:ordenar_por('cheques','numero','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('cheques','numero','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>                
                </th>
                <th>Banco</th>
                <th>Titular
			<a href="javaScript:ordenar_por('cheques','titular','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('cheques','titular','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>                 
                </th>
                <th>Destino
			<a href="javaScript:ordenar_por('cheques','destinatario','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('cheques','destinatario','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>                 
                </th>
                <th>Importe
			<a href="javaScript:ordenar_por('cheques','importe','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('cheques','importe','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>                 
                </th>
                <th>N&#176; Factura</th>                                        
                <th>Operacion</th>
                <th>Cliente</th>
                <th>F. Emisi&oacute;n
			<a href="javaScript:ordenar_por('cheques','fechaEmision','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('cheques','fechaEmision','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>                 
                </th>  
                <th>F. Cobro
			<a href="javaScript:ordenar_por('cheques','fechaCobro','ASC')"><img  src="<?= IMGS?>prev.png"  border="0"  ></a>
			<a href="javaScript:ordenar_por('cheques','fechaCobro','DESC')"><img  src="<?= IMGS?>next.png"  border="0" ></a>                 
                </th>
                <th></th>

            </tr>
            <? $contador = 0;
            foreach ($cheques as $cheque):
            $contador++;
            ?>
            <tr class="<?=($contador%2==0? "fila_par":"fila_impar");?>">
                <td><?= $cheque["cheque"] ?></td>
                <td><?= $cheque["banco"] ?></td>
                <td><?= $cheque["titular"] ?></td>
                <td><?= $cheque["destinatario"] ?></td>
                <td>$ <?= $cheque["importe"] ?></td>
                <td><?= $cheque["n_factura"] ?></td>
                <td><?= $cheque["operacion"] ?></td>
                <td><?= $cheque["cliente"] ?></td>
                <td><?= $cheque["fechaEmision"] ?></td>
                <td><?= $cheque["fechaCobro"] ?></td>

<!--                <td><a href="javaScript:pregunta('< ?= $factura["id"]?>','el cheque','delete')">
                <img src="< ?= IMGS?>del.gif"  border="0">
                </a></td> -->
		<td ><a class="classpopup" href="<?=VIEW?>compras/editar_cheque.php?id=<?= $cheque["id"] ?>">
		<img  src="<?= IMGS?>edt.gif"  border="0">
		</a></td>

            </tr>						

           <? endforeach ?>
            <tr>
                    <td align="left" colspan="13"><a class="classpopup" href="<?=VIEW?>compras/nuevo_cheque.php">
                    <img style="display:block;" src="<?= IMGS?>add2.gif"  border="0" >
                    </a></td>
            </tr>	

	</table>
	</form>

</div>
</div>


</body>
</html>
