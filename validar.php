<?php
    require_once 'Twig-1.34.4\lib\Twig/Autoloader.php';
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('Templates');
    $twig = new Twig_Environment($loader);

    $str = "";
    foreach ($_POST as $key => $value){
        $str .= htmlspecialchars($key)." is ".htmlspecialchars($value);
    }
    $usuario=@$_POST['usuario'];
    $clave=@$_POST['clave'];
    /*
    echo("
        <html>
            <script>
                alert('".$str."')
            </script>
        </html>
    ");
    */
    //conectar a la base de datos
    $conexion=mysqli_connect("localhost", "root", "", "datacenter");
    $consulta="SELECT * FROM user WHERE useEmail= '$usuario' and usePassword='$clave'";
    $resultado=mysqli_query($conexion, $consulta);

    $fila=mysqli_num_rows($resultado);

    $user = mysqli_fetch_array($resultado);

    if ($fila > 0){
        echo($twig->render(
            'profile.html',
            array('email' => $user['useEmail'])
        ));
    } else {
        echo($twig->render('home.html'));
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>