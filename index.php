<?php
    session_start();

    require_once 'static/lib/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('Templates');
    $twig = new Twig_Environment($loader);

    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $db_name = "datacenterbd";
    $tbl_name = "user";

    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    $username = @$_POST['usuario'];
    $password = @$_POST['clave'];
    
    $sql = "SELECT * FROM $tbl_name WHERE useEmail = '$username'";

    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($password == $row['usePassword']) {

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
            
            $sql2 = "SELECT user.useEmail, client.cliName FROM user INNER JOIN client ON user.fk_cliID = client.cliID WHERE user.useEmail = $username";
            $client = $conexion->query($sql2);
            if ($client->num_rows > 0) {
                $row = $client->fetch_array(MYSQLI_ASSOC);
                $clientName = $row['cliName'];
            }

            $sql3 = "SELECT product.proName FROM product INNER JOIN client ON product.fk_cliPID = client.cliID WHERE client.cliName = '$clientName'";
            $product = $conexion->query($sql3);
            $product2 = $product->fetch_array(MYSQLI_ASSOC);

            echo($twig->render(
                'product.html',
                array('email' => $clientName, 'products' => $product)
            ));

        }
    } else {
        echo($twig->render('home.html'));
    }
    mysqli_close($conexion); 
 ?>
