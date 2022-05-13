<?php
    $id_materia = $_GET["id_materia"];
    $materia = $_GET["materia"];
    require_once("./ConexionCrudPOO.php");
    $conexion = new conexion("ibecon3_2022");
    $sql = "DELETE FROM materia WHERE id_materia = '$id_materia'";
    if(isset($_GET["respuesta"])){
        $respuesta = $_GET["respuesta"];
        if($respuesta == "si"){
            $resultado = mysqli_query($conexion->getConexion(), $sql);
            if($resultado){
                header("location:./MateriasCrud.php?mensaje=200");
            }else{
                header("location:./MateriasCrud.php?mensaje=201");
            }
        }else if($respuesta == "no"){
            header("location:./MateriasCrud.php?mensaje=202");
        }
    }
    echo "<p>Desea borrar la materia $materia?</p>";
    echo "<a href='?respuesta=si&id_materia=$id_materia'><button>Si</button></a>";
    echo "<a href='?respuesta=no&id_materia=$id_materia&materia=$materia'><button>No</button></a>";
?>