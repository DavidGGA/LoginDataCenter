<?php

    $host_db = "104.131.169.113";
    $user_db = "postgres";
    $pass_db = "maiadata";
    $db_name = "segment";

    $conn = pg_connect("host=$host_db port=5432 dbname=$db_name user=$user_db password=$pass_db");

    $sqlSchemas = "SELECT n.nspname AS \"Name\" FROM pg_catalog.pg_namespace n WHERE n.nspname !~ '^pg_' AND n.nspname <> 'information_schema' AND n.nspname <> 'public' ORDER BY 1;";
    $schemas = pg_query($conn, $sqlSchemas);

    while($schema = pg_fetch_array($schemas)) {
        $name = $schema['Name'];
        echo '
                <form class="f1" action="traertablas.php" class="asidenav">
                <input type="text" name="bases" value="'.$name.'" style="display:none;"><br>
                <input class="btn_fam" type="submit" name="bases" value="'.$name.'"><br>
                </form>
            ';
            }
?>
