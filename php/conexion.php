<?php    
    //comunicarme con la base de datos MYSQL ---> servidor
    $conexion = mysqli_connect("localhost", "root", "");
    //preveer que se puede dar un error a la hora de establecer contacto con el servidor
    if(mysqli_connect_errno()){
        echo "<p>Error 1: No se ha podido establecer conexion con el servidor</p>";
        exit;
    }
    //Comunicar con la base de datos BBDD
    mysqli_select_db($conexion, "ibecon3_2022") or die("<p>Error 2: No comunica con la base de datos</p>");
?>