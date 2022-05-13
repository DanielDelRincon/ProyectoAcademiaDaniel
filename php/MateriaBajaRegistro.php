<?php
    //Carrera Baja de Registro
    $dato = $_GET["id_materia"];
    require_once("./conexion.php");

    $sql = "DELETE FROM materia WHERE id_materia = '$dato'";
    echo "<p>Desea realmente borrar el registro?</p>";
    echo "<a href='?id_materia=$dato&respuesta=si'><button>si</button></a>";
    echo "<a href='?id_materia=$dato&respuesta=no'><button>no</button></a>";
    if(isset($_GET["respuesta"])){
        $respuesta = $_GET["respuesta"];
        if($respuesta == "si"){
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                header("location:../webs/menuMateria.html?mensaje=200");
            }else{
                header("location:../webs/menuMateria.html?mensaje=201");
            }
        }else if($respuesta == "no"){
            
            header("location:../webs/menuMateria.html?mensaje=202");
        }
    };


?>