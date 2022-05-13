<?php
    //Carrera Baja de Registro
    $dato = $_GET["id_alumnos"];
    require_once("./conexion.php");

    $sql = "DELETE FROM alumnos WHERE id_alumnos = '$dato'";
    echo "<p>Desea realmente borrar el registro?</p>";
    echo "<a href='?id_alumnos=$dato&respuesta=si'><button>si</button></a>";
    echo "<a href='?id_alumnos=$dato&respuesta=no'><button>no</button></a>";
    if(isset($_GET["respuesta"])){
        $respuesta = $_GET["respuesta"];
        if($respuesta == "si"){
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                header("location:../webs/menuAlumnos.html?mensaje=200");
            }else{
                header("location:../webs/menuAlumnos.html?mensaje=201");
            }
        }else if($respuesta == "no"){
            
            header("location:../webs/menuAlumnos.html?mensaje=202");
        }
    };


?>