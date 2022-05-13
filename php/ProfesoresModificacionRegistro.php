<?php
    $id_alumnos = $_POST["id_alumnos"];
    $dni = $_POST["dni"];
    $nombre_alumno = depurar ($_POST["nombre_alumno"]);
    $apellido1_alumno = depurar ($_POST["apellido1_alumno"]);
    $apellido2_alumno = depurar ($_POST["apellido2_alumno"]);
    $edad_alumno = depurar ($_POST["edad_alumno"]);
    $anno_matriculacion_alumno = depurar ($_POST["anno_matriculacion_alumno"]);
    $genero_alumno = depurar ($_POST["genero_alumno"]);
    $id_carrera1 = depurar ($_POST["id_carrera1"]);

    require_once("./Conexion.php");

    function depurar($dato){
        $dato = strip_tags($dato); //quita cualquier etiqueta maligna de los campos
        $dato = trim($dato); //quita los espacios en blanca a la izq y la derecha del campo
        $dato = htmlentities($dato); //"UTF-8"); //quita caracteres especiales del campo //ENT_QUOTES -> me cambia las tildes por &ecout, "UTF-8" ->esto es para que no me quite los caracteres como tildes y esas cosas normales.
        //$dato = preg_replace('/[0-9\@\.\;]+/', '', $dato); deberia hacer un depurar para numeros y otro para texto


        
        return $dato;
    }

    $sql = "UPDATE alumnos SET nombre_alumno = '$nombre_alumno', dni = '$dni', apellido1_alumno = '$apellido1_alumno', apellido2_alumno = '$apellido2_alumno', edad_alumno = '$edad_alumno', anno_matriculacion_alumno = '$anno_matriculacion_alumno', genero_alumno = '$genero_alumno', id_carrera1 = '$id_carrera1'  WHERE id_alumnos = '$id_alumnos'";
    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        header ("location:../webs/menuAlumno.html?mensaje=400");
    }else{
        header ("location:../webs/menuAlumno.html?mensaje=403");
    }





?>