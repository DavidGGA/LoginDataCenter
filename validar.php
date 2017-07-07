<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//conectar a la base de datos
$conexion=mysqli_connect("localhost", "root", "", "bdprueba");
$consulta="SELECT * FROM usuarios WHERE usuario= '$usuario' and clave='$clave'";
$resultado=mysqli_query($conexion, $consulta);

$fila=mysqli_num_rows($resultado);

if (fila>0){
    header("location:bienvenido.html");
}
else {
    echo "Error en la autentificacion";
}
mysqli_free_result($resultado);
mysqli_close($conexion);