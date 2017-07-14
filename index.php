<?php
    session_start();

    require_once 'static/lib/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('DashBoard');
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

    $username = @$_POST['user'];
    $password = @$_POST['pass'];
    
    $sql = "SELECT * FROM $tbl_name WHERE useEmail = '$username'";

    $result = $conexion->query($sql);


    $now = time();
    if($now < @$_POST['expires']) {
        $username = @$_POST['username'];
        $expires = @$_POST['expires'];
        $client = @$_POST['client'];
        $sql3 = "SELECT product.proName FROM product INNER JOIN client ON product.fk_cliPID = client.cliID WHERE client.cliName = '$client'";
        $product = $conexion->query($sql3);
        echo($twig->render(
            'product.html',
            array(
                'client' => $client,
                'products' => $product,
                'expires' => $expires,
                'username' => $username
            )
        ));
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if ($password == $row['usePassword']) {
                $dataClients = array();

                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                
                $sql2 = "SELECT usecli.cliID FROM user INNER JOIN usecli ON user.useEmail = usecli.useID WHERE usecli.useID = '$username'";
                $clients = $conexion->query($sql2);
                if($clients->num_rows) {
                    while($client = $clients->fetch_array()) {
                        $id = $client['cliID'];
                        $sql3 = "SELECT client.cliName, product.proName FROM client INNER JOIN product  ON client.cliID = product.fk_cliPID WHERE client.cliID  = '$id'";
                        $products = $conexion->query($sql3);
                        if($products->num_rows) {
                            //var_dump($products);
                            while ($product = $products->fetch_array()) {
                                $productName = $product['proName'];
                                $clientName = $product['cliName'];
                                $dataClients[$clientName][] = $productName;
                            }
                        }
                    }
                }

                print_r($dataClients);

                echo($twig->render(
                    'product.html',
                    array(
                        'dataClients' => $dataClients,
                        'expires' => time() + (5 * 60),
                        'username' => $username
                    )
                ));

            }
        } else {
            echo($twig->render('home.html', array()));
        }
    }
    mysqli_close($conexion); 
 ?>
