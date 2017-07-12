<?php
    $username = @$_POST['username'];
    $expires = @$_POST['expires'];
    $client = @$_POST['client'];
    $product = @$_POST['product'];
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $now = time();
        if($now < $_SESSION['expire']) {
            echo '
                <!DOCTYPE HTML>
                <html>
                    <head>
                        <title>MAIA Data Center</title>
                        <meta charset="utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1" />
                        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
                        <link rel="stylesheet" href="assets/css/main.css" />
                        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
                        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
                        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
                    </head>
                    <body class="is-loading">

                        <!-- Wrapper -->
                            <div id="wrapper">
                            <form action="../../../../index.php" method="POST">
                                <input type="hidden" name="username" value="'.$username.'" />
                                <input type="hidden" name="expires" value="'.$expires.'" />
                                <input type="hidden" name="client" value="'.$client.'" />
                                <input type="hidden" name="product" value="'.$product.'" />
                                <input id="boton" type="submit" value="Return to products">
                            </form>
                                <iframe src="https://app.datorama.com/index.html#/page/dashboardpage/show?embedpage=75e75537-e3aa-40d5-b3e0-6f2cf75cbd63" style="border:0px" width="1100px" height="800px"></iframe>
                            </div>

                        <!-- Scripts -->
                            <!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
                            <script>
                                if ("addEventListener" in window) {
                                    window.addEventListener("load", function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ""); });
                                    document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? " is-ie" : "");
                                }
                            </script>

                    </body>
                </html>
            ';
        } else {
            echo "Su sesion a terminado, <a href='../../../../index.php'> Necesita Hacer Login</a>";
        }
    } else {
        echo "Esta pagina es solo para usuarios registrados";
        echo "<br><a '../../../../index.php'>Login</a>";
        exit;
    }
?>
