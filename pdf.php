<?php
require('../models/pdf.class/invoice.php');
include_once("funciones.php");
conectar_bd();

$factura = new Factura($_GET["idFactura"]);
$cliente = new Cliente($factura->get_idCliente());
$productos_facturas = Factura::get_productos_x_factura($_GET["idFactura"]);
$fecha = date("d/m/Y");
$nombre_cliente = $cliente->get_nombre();
$domicilio_cliente = $cliente->get_domicilio()." ".$cliente->get_localidad()." ".$cliente->get_provincia()." ".$cliente->get_cp();
$condicion_iva_cliente = $cliente->get_condicion_iva();
$id_cliente = $cliente->get_id();
$cuit_cliente = $cliente->get_nro_cuit();


 $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "Casa Alanis",
                  "Direccion:\n" .
                  "Storni y Cuyo - La Reja\n".
                  "(1744) Moreno Prov. de Buenos Aires\n				" .
                  "Tel:(0237)462-4777/462-6047\n						".
                  "I.V.A. RESPONSABLE INSCRIPTO\n");
$pdf->fact_dev( "Remito ", "TEMPO" );
$pdf->temporaire( "Ferreteria Casa Alanis" );
$pdf->addDate( "$fecha");
$pdf->addClient("$id_cliente");
//$pdf->addPageNumber("1");
$pdf->addClientAdresse("\nSEÑOR/ES: $nombre_cliente\nDOMICILIO: $domicilio_cliente\nIVA:$condicion_iva_cliente \nCUIT:$cuit_cliente");

//$pdf->addReglement("Chèque à réception de facture");
//$pdf->addEcheance("$fecha");
//$pdf->addNumTVA("FR888777666");
//$pdf->addReference("Devis ... du ....");
$cols=array( "CANT."    => 15,
             "CODIGO"  => 15,
             "DESCRIPCION"     => 93,
             "PRECIO U."      => 26,
             "PRECIO T." => 30);
$pdf->addCols( $cols);
$cols=array( "CANT."    => "C",
             "CODIGO"  => "C",
             "DESCRIPCION"     => "C",
             "PRECIO U."      => "R",
             "PRECIO T." => "R");
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 79;

$contador = 0;
$precio_final = 0;
foreach($productos_facturas as $producto):
$id_producto = $producto['idProducto'];
$descripcion = $producto['descripcion'];
$cantidad = $producto['cantidad'];
$precio_unitario = $producto['precio_unitario'];
$precio_total = $producto['precio_total'];

$line = array( "CODIGO"    => "$id_producto",
               "DESCRIPCION"  => "$descripcion",
               "CANT."     => "$cantidad",
               "PRECIO U."      => "$precio_unitario",
               "PRECIO T." => "$precio_total");

$contador = $contador + 2;

$size = $pdf->addLine( $y, $line );
$y   += $size + $contador;
$precio_final += $precio_total;
endforeach;

$line = array( "CODIGO"    => " ",
               "DESCRIPCION"  => " ",
               "CANT."     => " ",
               "PRECIO U."      => "TOTAL",
               "PRECIO T." => "$precio_final");

$contador = $contador + 2;


$y    = 188;
$size = $pdf->addLine( $y, $line );

//$pdf->addCadreTVAs();
        
// invoice = array( "px_unit" => value,
//                  "qte"     => qte,
//                  "tva"     => code_tva );
// tab_tva = array( "1"       => 19.6,
//                  "2"       => 5.5, ... );
// params  = array( "RemiseGlobale" => [0|1],
//                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
//                      "remise"         => value,     // {montant de la remise}
//                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
//                  "FraisPort"     => [0|1],
//                      "portTTC"        => value,     // montant des frais de ports TTC
//                                                     // par defaut la TVA = 19.6 %
//                      "portHT"         => value,     // montant des frais de ports HT
//                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
//                  "AccompteExige" => [0|1],
//                      "accompte"         => value    // montant de l'acompte (TTC)
//                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
//                  "Remarque" => "texte"              // texte
/*$tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                    array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
$tab_tva = array( "1"       => 19.6,
                  "2"       => 5.5);
$params  = array( "RemiseGlobale" => 1,
                      "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
                      "remise"         => 0,       // {montant de la remise}
                      "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
                  "FraisPort"     => 1,
                      "portTTC"        => 10,      // montant des frais de ports TTC
                                                   // par defaut la TVA = 19.6 %
                      "portHT"         => 0,       // montant des frais de ports HT
                      "portTVA"        => 19.6,    // valeur de la TVA a appliquer sur le montant HT
                  "AccompteExige" => 1,
                      "accompte"         => 0,     // montant de l'acompte (TTC)
                      "accompte_percent" => 15,    // pourcentage d'acompte (TTC)
                  "Remarque" => "Avec un acompte, svp..." );
*/
//$pdf->addTVAs( $params, $tab_tva, $tot_prods);
//$pdf->addCadreEurosFrancs();
$pdf->Output();
?>