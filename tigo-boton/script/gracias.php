
<?PHP

$name = $_POST['nombre'];
$tel = $_POST['numero'];
$correo = $_POST['email'];
$tcell = "noaplica";
$tplan = "noaplica";
$toperador ="crosselling";

require_once('lib/nusoap.php');

//$servicio="http://181.49.168.203:8084/Service.asmx";//url
$servicio="http://181.49.168.203:8084/Service.asmx?WSDL";//url

$parametros=array(); //parametros de la llamada
$parametros['campanaCliente']=7;//Siempre debe de ir este numero
$parametros['nombreCliente']=utf8_decode($name);
$parametros['telefonoCliente']=$tel;
$parametros['codSeguridad']="487KMCHWASYT2TR";//Siempre debe de ir esta Cadena
$parametros['equipoCliente']=$tcell;
$parametros['planCliente']=utf8_decode($tplan);
$parametros['operadorCliente']=$toperador;


$client = new nusoap_client($servicio,'wsdl');

$err = $client->getError();
if ($err) {
echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}

//$client->setUseCurl($servicio);
//$client->soap_defencoding = 'UTF-8';

$result = $client->call("tigoUneTellamamos", $parametros);
//$result = $client->tigoUneTellamamos($parametros);

//echo var_dump($result)."<hr>".$result['tigoUneTellamamosResult'];


$curl_connection = curl_init("https://forms.hubspot.com/uploads/form/v2/4059876/cf2d9612-9231-49e5-8687-7fdf83b41ca2");
//set options
curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl_connection, CURLOPT_USERAGENT, 
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
//set data to be posted
curl_setopt($curl_connection, CURLOPT_POSTFIELDS, "firstname=".$name."&phone=".$tel."&email=".$correo);
//perform our request
$result = curl_exec($curl_connection);
//close the connection
curl_close($curl_connection);
// envia al thank you page en 1 segundo

header("refresh:0; url=http://ofertas.tigo.com.co/clientes-tigoune-gracias");  
exit;  

?>



