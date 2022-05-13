<?php
    
    $id = $_POST["id_carrera"];
    $nombre = $_POST["nombre"];
    $periodo = $_POST["periodo"];

    require_once("./conexion.php");
    function depurar($dato){
        $dato = strip_tags($dato);
        $dato = trim($dato);
        $dato = htmlentities($dato);
        return $dato;
    }
    $sql = "UPDATE carreras SET nombre = '$nombre', periodo = '$periodo' WHERE id_carrera = '$id'";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        header("location:../webs/menuCarreras.html?mensaje=400");
    }else{
        header("location:../webs/menuCarreras.html?mensaje=403");
    }
?>