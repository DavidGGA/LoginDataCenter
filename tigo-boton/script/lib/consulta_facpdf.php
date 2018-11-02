<?php
require_once('lib/nusoap.php');
$num = $_POST['contrato*'];
$mes = $_POST['mes*'];
$year = $_POST['ano*'];

if (empty($num) or empty($mes) or empty($year)) {die ("Hay campos en blanco, intenta de nuevo");}
if ($num<=0 or $mes<=0 or $year<=0) {die ("Hay campos en blanco, intenta de nuevo");}

$cadena='http://10.4.1.86:81/gestioncomercial/servicios/enetplataforma.asmx?WSDL';
$oSoapClient= new SoapClient($cadena,True);

if ($sError = $oSoapClient->getError()) {
   echo "No se pudo realizar la operaci&oacute;n [" . $sError . "] <br>"; 
   die(); 
} 

$function='DocumentosElectronicos';
$params=array('Parameters' => 'facturas|EDATEL1120|25|'.$num.'|'.$mes.'|'.$year.'');

$URL = $oSoapClient->call($function,$params);
$curl=$URL['DocumentosElectronicosResult'];
echo "<br>";
$rest = substr($curl, -31);  
$definit="http://www.edatel.com.co/facturas/".$rest;

if (!$error = $oSoapClient->getError())
{
$dest = "maslyv@gmail.com"; //Email de destino
$asunto = "Alerta Genera FacturaWEB"; //Asunto
$cuerpo = "<br>Desde la ip: ".$_SERVER['REMOTE_ADDR'].
"<br>Navegador usado:".$_SERVER['HTTP_USER_AGENT'].
"<br>Esta en: ".$_SERVER['HTTP_HOST'].
"<br><br>".
"Enviado el " . date('d/m/Y', time())."<br />".
"Implementado por WebMaster Edatel.com.co"; //Cuerpo del mensaje

//Cabeceras del correo
$headers = "From: JhonatanSM jsantamaria@edatel.com.co\r\n"; //Quien envia?
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
mail($dest,$asunto,$cuerpo,$headers);

echo '<br>';
print_r ("Sino aparece en pantalla la factura, presione clic en: <a href=$definit target='_blank'>Abrir Factura</a><br><br>");
echo '<b>Presione clic derecho, guardar destino como.</b> (Si desea almacenar la factura en su equipo.)<br><br>';
echo '<a href=formulario.html>Volver</a>';

}
else
{
echo "No existen los datos";
echo '<br><a href=formulario.html>Volver</a>';
}
?> 
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000;
}
body {
	background-color: #F6F6F7;
	background-image: url();
}
-->
</style>