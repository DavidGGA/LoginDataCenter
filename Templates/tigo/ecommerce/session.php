<?php

    echo "<html><script>alert('...');</script></html>";


    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        
    } else {
        echo "Esta pagina es solo para usuarios registrados";
        echo "<br><a href='index.php'>Login</a>";
        exit;
    }

    $now = time();

    if($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado, <a href=index.php> Necesita Hacer Login</a>";
        exit;
    }
?>