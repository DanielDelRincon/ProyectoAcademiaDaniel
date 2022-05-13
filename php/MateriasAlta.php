<?php
    // session_start();
    // if(!isset($_SESSION["usuario"])){
    //     header("location:../../autenticar.html");
    // }
    //clases de POO
    require_once ("./ConexionCrudPOO.php");
    //$conexion = new Conexion("ibecon3_2022");

    require_once ("./ficherosPoo.php");
    
    //depuracion de los datos
    require_once ("./MateriasDepuracion.php");
?>
<?php
    if(isset($_POST["submit"])){
        $nombre_materia = depurarTxt($_POST["nombre_materia"]);
        $creditos_mat = depurarNum($_POST["creditos_mat"]);
        $anno = depurarNum($_POST["anno"]);
        $semestre = depurarNum($_POST["semestre"]);
        $id_carrera2 = depurarTxt($_POST["id_carrera2"]);
    
        //capturar el nombre de los ficheros
        $docfoto = new Fichero("ibecon3_2022", $_FILES["docfoto"]["name"], $_FILES["docfoto"]["type"], $_FILES["docfoto"]["size"]); 

        $docPdf = new Fichero("ibecon3_2022", $_FILES["docpdf"]["name"], $_FILES["docpdf"]["type"], $_FILES["docpdf"]["size"]);
    //******* la foto  */
    if($docfoto->validar("imagen")){
        $nombreFoto = $docfoto->getNombre();
    }else{
        $nombreFoto = null;
    }

    if($docPdf->validar("pdf")){
        $nombrePdf = $docPdf->getNombre();
    }else{
        $nombrePdf = null;
    }
    /******** Filtrar */
    $foto =  $docfoto->getNombre();
    $pdf = $docPdf->getNombre();
    
    $sql = "INSERT INTO materia (nombre_materia, creditos_mat, anno, semestre, id_carrera2, docfoto, docpdf) VALUES ('$nombre_materia','$creditos_mat','$anno', '$semestre', '$id_carrera2', '$foto', '$pdf')";
        
    $resultado = mysqli_query($docfoto->getConexion(),$sql);

    if($resultado){
        mysqli_close($docfoto->getConexion());
        //header("location:./MateriasCrud.php?mensaje=100");
    }else{
        mysqli_close($docfoto->getConexion());
        //header("location:./MateriasCrud.php?mensaje=101");
    }


}
?>