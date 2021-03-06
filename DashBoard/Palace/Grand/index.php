<?php
    $username = @$_POST['username'];
    $expires = @$_POST['expires'];
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
                        <!-- Google Tag Manager -->
                        <script>
                            (function(w, d, s, l, i) {
                                w[l] = w[l] || [];
                                w[l].push({
                                    "gtm.start": new Date().getTime(),
                                    event: "gtm.js"
                                });
                                var f = d.getElementsByTagName(s)[0],
                                    j = d.createElement(s),
                                    dl = l != "dataLayer" ? "&l=" + l : "";
                                j.async = true;
                                j.src =
                                    "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                                f.parentNode.insertBefore(j, f);
                            })(window, document, "script", "dataLayer", "GTM-TK446K5");

                        </script>
                        <!-- End Google Tag Manager -->
                    </head>
                    <body class="is-loading">
                        <!-- Google Tag Manager (noscript) -->
                        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TK446K5"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
                        <!-- End Google Tag Manager (noscript) -->
                        <!-- Wrapper -->
                            <div id="wrapper">
	                            <form action="../../../index.php" method="POST">
	                                <input type="hidden" name="username" value="'.$username.'" />
	                                <input type="hidden" name="expires" value="'.$expires.'" />
	                                <input id="boton" class="button" type="submit" value="Return to products">
	                            </form>
                                <iframe src="https://app.datorama.com/index.html#/page/dashboardpage/show?embedpage=db9787d6-b147-4e1f-bff4-b4e0f7c578bb" style="border:0px" width="1100px" height="800px"></iframe>
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
            echo "Su sesion a terminado, <a href='../../../index.php'> Necesita Hacer Login</a>";
        }
    } else {
        echo "Esta pagina es solo para usuarios registrados";
        echo "<br><a href='../../../index.php'>Login</a>";
        exit;
    }
?>