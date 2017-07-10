<?php
    $usuario=@$_POST['Usuario'];
    $clave=@$_POST['Clave'];

    //conectar a la base de datos
    $conexion=mysqli_connect("localhost", "root", "", "datacenter");
    $consulta="SELECT * FROM user WHERE useEmail= '$usuario' and usePassword='$clave'";
    $resultado=mysqli_query($conexion, $consulta);

    $fila=mysqli_num_rows($resultado);

    if ($fila>0){
        while ($row = mysqli_fetch_row($resultado))
        {
            echo $row[0];
        }
    } else {
        header("location:index.html");
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>