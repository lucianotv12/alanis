
<script>
    //VARIABLE GLOBAL
    var textoAnterior = '';

    //ESTA FUNCIÓN DEFINE LAS REGLAS DEL JUEGO
    function cumpleReglas(simpleTexto)
        {
            //la pasamos por una poderosa expresión regular
            var expresion = new RegExp("^(|([0-9]{1,2}(\\.([0-9]{1,2})?)?))$");

            //si pasa la prueba, es válida
            if(expresion.test(simpleTexto))
                return true;
            return false;
        }//end function checaReglas

    //ESTA FUNCIÓN REVISA QUE TODO LO QUE SE ESCRIBA ESTÉ EN ORDEN
    function revisaCadena(textItem)
        {
            //si comienza con un punto, le agregamos un cero
            if(textItem.value.substring(0,1) == '.') 
                textItem.value = '0' + textItem.value;

            //si no cumples las reglas, no te dejo escribir
            if(!cumpleReglas(textItem.value))
                textItem.value = textoAnterior;
            else //todo en orden
                textoAnterior = textItem.value;
        }//end function revisaCadena
</script>
<script>
function foco(elemento) {
elemento.style.border = "1px solid red";
}

function no_foco(elemento) {
elemento.style.border = "";
}
</script>
<link rel="stylesheet" type="text/css" href="<?= CSS?>style.css">


<div class="contentArea"> 

<div class="header">

	<div class="logo">
	</div>
<div>

</div>
<div class="pageTitle">
Código de Barras  Producto:<?=@$producto->get_id();?><br>
</div>

<? 
 define (__TRACE_ENABLED__, false);
 define (__DEBUG_ENABLED__, false);
								   
 require("../../view/productos/codigo_barras/barcode.php");		   
 require("../../view/productos/codigo_barras/i25object.php");
 require("../../view/productos/codigo_barras/c39object.php");
 require("../../view/productos/codigo_barras/c128aobject.php");
 require("../../view/productos/codigo_barras/c128bobject.php");
 require("../../view/productos/codigo_barras/c128cobject.php");
 						  


//if($_POST["precio"]) { $_POST["precio"] = str_replace(".","",$_POST["precio"]); }

//$barcode = $codigo . $_POST["precio"];
$barcode ="12345678";


/* Default value */
//if (!isset($output))  $output   = "png"; 
//if (!isset($barcode)) $barcode  = "0123456789";
//if (!isset($type))    $type     = "I25";
//if (!isset($width))   $width    = "460";
//if (!isset($height))  $height   = "120";
if (!isset($xres))    $xres     = "1";
if (!isset($font))    $font     = "2";
/*********************************/ 
									
if (isset($barcode) && strlen($barcode)>0) {    

  
  switch ($type)
  {
    case "I25":
			  $obj = new I25Object(250, 120, $style, $barcode);
			  break;
    case "C39":
			  $obj = new C39Object(250, 120, $style, $barcode);
			  break;
    case "C128A":
			  $obj = new C128AObject(250, 120, $style, $barcode);
			  break;
    case "C128B":
			  $obj = new C128BObject(250, 120, $style, $barcode);
			  break;
    case "C128C":
                          $obj = new C128CObject(250, 120, $style, $barcode);
			  break;
	default:
			$obj = false;
  }
  if ($obj) {
     if ($obj->DrawObject($xres)) {
         echo "<table align='center'><tr><td><img src='http://localhost/alanis/view/productos/codigo_barras/image.php?code=".$barcode."&style=".$style."&type=".$type."&width=".$width."&height=".$height."&xres=".$xres."&font=".$font."'></td></tr></table>";
     } else echo "<table align='center'><tr><td><font color='#FF0000'>".($obj->GetError())."</font></td></tr></table>";
  }
}
?>
<br>
<form name="codigo_barras" method="post" action="index.php?accion=codigo_barras&id=<?=$_GET['id']?>">
<table align="center" border="1" cellpadding="1" cellspacing="1">
 <tr>
  <td bgcolor="#EFEFEF"><b>Tipo</b></td>
  <td><select name="type" style="WIDTH: 260px" size="1" onFocus="foco(this);" onBlur="no_foco(this);">
 <!-- 		<option value="I25" <?=($type=="I25" ? "selected" : " ")?>>Interleaved 2 of 5-->
  		<option value="C39" <?=($type=="C39" ? "selected" : " ")?>>Code 39
  		<option value="C128A" <?=($type=="C128A" ? "selected" : " ")?>>Code 128-A
		<option value="C128B" <?=($type=="C128B" ? "selected" : " ")?>>Code 128-B
        <option value="C128C" <?=($type=="C128C" ? "selected" : " ")?>>Code 128-C</select></td>
 </tr>

<!--	<tr>
		<td class="td_text">precio:</td><td class="td_text"><input name="precio" type="text" maxlength="5" size="10" onKeyup="revisaCadena(this)" value="<?=$producto->get_precio();?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
	</tr>-->
<!-- <tr>
  <td bgcolor="#EFEFEF"><b>Imagen salida</b></td>
  <td><select name="output" style="WIDTH: 260px" size="1">
   		<option value="png" <?=($output=="png" ? "selected" : " ")?>>Portable Network Graphics (PNG)
   		<option value="jpeg" <?=($output=="jpeg" ? "selected" : " ")?>>Joint Photographic Experts Group(JPEG)</select></td>
 </tr>
 <tr>
  <td rowspan="4" bgcolor="#EFEFEF"><b>Estilo</b></td>
  <td rowspan="1"><input type="Checkbox" name="border" <?=($border=="on" ? "CHECKED" : " ")?>>Draw border</td>
 </tr>
 <tr>
  <td><input type="Checkbox" name="drawtext" <?=($drawtext=="on" ? "CHECKED" : " ")?>>Draw value text</td>
 </tr>
 <tr>
  <td><input type="Checkbox" name="stretchtext" <?=($stretchtext=="on" ? "CHECKED" : " ")?>>Stretch text</td>
 </tr>
 <tr>
  <td><input type="Checkbox" name="negative" <?=($negative=="on" ? "CHECKED" : " ")?>>Negative (White on black)</td>
 </tr>
 <tr>
  <td rowspan="2" bgcolor="#EFEFEF"><b>Tamaño</b></td>
  <td rowspan="1">Ancho: <input type="text" size="6" maxlength="3" name="width" value="<?=$width?>"></td>
 </tr>
 <tr>
  <td>Alto: <input type="text" size="6" maxlength="3" name="height" value="<?=$height?>"></td>
 </tr>
 <input type="hidden" name="xres" value="1">
 <input type="hidden" name="font" value="1">
 <input type="hidden" name="barcode" value="<?=$barcode?>">

<!-- <tr>
  <td bgcolor="#EFEFEF"><b>Xres</b></td>
  <td>
      <input type="Radio" name="xres" value="1" <?=($xres=="1" ? "CHECKED" : " ")?>>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="xres" value="2" <?=($xres=="2" ? "CHECKED" : " ")?>>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="xres" value="3" <?=($xres=="3" ? "CHECKED" : " ")?>>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </td>
 </tr>-->
<!-- <tr>
  <td bgcolor="#EFEFEF"><b>Text Font</b></td>
  <td>
      <input type="Radio" name="font" value="1" <?=($font=="1" ? "CHECKED" : " ")?>>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="font" value="2" <?=($font=="2" ? "CHECKED" : " ")?>>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="font" value="3" <?=($font=="3" ? "CHECKED" : " ")?>>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="font" value="4" <?=($font=="4" ? "CHECKED" : " ")?>>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="Radio" name="font" value="5" <?=($font=="5" ? "CHECKED" : " ")?>>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </td>
 </tr>
 <tr>
  <td bgcolor="#EFEFEF"><b>Value</b></td>
  <td><input type="Text" size="24" name="barcode" style="WIDTH: 260px" value="<?=$barcode?>"></td>
 </tr>-->
 <input type="hidden" name="xres" value="1">
 <input type="hidden" name="font" value="1">
 <input type="hidden" name="barcode" value="<?=$barcode?>">
 <input type="hidden" name="width" value="200">
 <input type="hidden" name="height" value="100">
 <tr>
 </tr>
 <tr>
  <td colspan="2" align="center"><input type="Submit" name="Submit" value="Generar"></td>
 </tr>
 <tr>
  <td colspan="2" align="center"><input type="button" name="imprimir" value="Imprimir" onclick="window.print();"></td>
 </tr>

</table>
</form>
</body>
</html>
