<?php
    
    $id = $_POST["id_materia"];
    $nombre = $_POST["nombre_mat"];
    $creditos = $_POST["creditos_mat"];

    require_once("./conexion.php");
    function depurar($dato){
        $dato = strip_tags($dato);
        $dato = trim($dato);
        $dato = htmlentities($dato);
        return $dato;
    }
    $sql = "UPDATE materia SET nombre_mat = '$nombre', creditos_mat = '$creditos' WHERE id_materia = '$id'";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        header("location:../webs/menuMateria.html?mensaje=400");
    }else{
        header("location:../webs/menuMateria.html?mensaje=403");
    }
?>