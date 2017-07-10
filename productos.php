<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='index.html'>Login</a>";
   

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='login.html'>Necesita Hacer Login</a>";
exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Productos</title>
</head>

<body>
<h1>PRODUCTOS</h1>
<p>Aqui van los enlaces que le permitirian al usuario
seleccionar el dashboard o link de drive.</p>

<ul>
  <li>DashBoard1</li>
  <li>DashBoard2</li>
  <li>Drive Sheet</li>
  <li>Drive doc</li>
</ul>

<br><br>
<a href=logout.php>Cerrar Sesion</a>
</body>
</html>
