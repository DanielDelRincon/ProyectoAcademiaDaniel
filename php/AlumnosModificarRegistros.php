<?php
    
    $id_alummno = $_POST["id_alumnos"];
    $nombre = $_POST["nombre_alu"];
    $apellido1 = $_POST["apellido1_alu"];
    $apellido2 = $_POST["apellido2_alu"];
    $edad = $_POST["edad_alu"];
    $anno_mat = $_POST["anno_mat_alumno"];
    $genero = $_POST["genero_alu"];
    $id_ca = $_POST["id_ca"];

    require_once("./conexion.php");
    function depurar($dato){
        $dato = strip_tags($dato);
        $dato = trim($dato);
        $dato = htmlentities($dato);
        return $dato;
    }
    $sql = "UPDATE alumnos SET nombre_alu = '$nombre', apellido1_alu = '$apellido1', apellido2_alu = '$apellido2', edad_alu = '$edad', anno_mat_alumno = '$anno_mat', genero_alu = '$genero', id_carrera1 = '$id_ca' WHERE id_alumnos = '$id_alummno'";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        header("location:../webs/menuAlumnos.html?mensaje=400");
    }else{
        header("location:../webs/menuAlumnos.html?mensaje=403");
    }
?>