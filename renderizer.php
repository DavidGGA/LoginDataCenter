<?php
    $cli = @$_POST['client'];
    $pro = @$_POST['product'];

    echo "holi".@$_POST['loggedin'];

    function renderize($template, $params){
        require_once 'static/lib/twig/lib/Twig/Autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('Templates');
        $twig = new Twig_Environment($loader);

        echo($twig->render(
            $template,
            $params
        ));
    }

    if (isset($cli) && isset($pro)){
        renderize($cli."/".$pro."/index.html", array());
    } else {
        //renderize('index.php', array());
    }
?>
