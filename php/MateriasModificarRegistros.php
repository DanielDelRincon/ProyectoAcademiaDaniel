<?php
    // session_start();
    // if(!isset($_SESSION["usuario"])){
    //     header("location:../../autenticar.html");
    // }
?>
<?php
    echo "<p>modificando...</p>";
    $id_materia       = $_POST["id_materia"];
    $nombre_materia   = $_POST["nombre_materia"];
    $creditos_mat     = $_POST["creditos_mat"];  
    $anno             = $_POST["anno"];
    $semestre         = $_POST["semestre"];
    $id_carrera2      = $_POST["id_carrera2"];
    $foto_nom = $_FILES["docfoto"]["name"];
    $pdf_nom  = $_FILES["docpdf"]["name"];
    /*** Tratar foto */
    if(!empty($_FILES["docfoto"]["name"])){ 
        $foto_nom = $_FILES["docfoto"]["name"];
        $foto_tam = $_FILES["docfoto"]["size"];
        $foto_tip = $_FILES["docfoto"]["type"];
        echo "fok... $foto_nom, $foto_tam, $foto_tip";
        /******** Guardar foto  */
            //raiz del servidor: htdocs
            $carp_gua = $_SERVER["DOCUMENT_ROOT"] . "/Academia/imagenes/";
            /******** Zona temporal al destino */
            move_uploaded_file($_FILES["docfoto"]["tmp_name"], $carp_gua.$foto_nom);
        //*************** */
    }else{
        $foto_nom = $_POST["docfoto"];
    }
    /*** */
    /*** Tratar pdf */
    if(!empty($_FILES["docpdf"]["name"])){ 
        $pdf_nom = $_FILES["docpdf"]["name"];
        $pdf_tam = $_FILES["docpdf"]["size"];
        $pdf_tip = $_FILES["docpdf"]["type"];
        echo "fok... $pdf_nom, $pdf_tam, $pdf_tip";
        /******** Guardar pdf  */
            //raiz del servidor: htdocs
            $carp_gua = $_SERVER["DOCUMENT_ROOT"] . "/Academia/imagenes/";
            /******** Zona temporal al destino */
            move_uploaded_file($_FILES["docpdf"]["tmp_name"], $carp_gua.$pdf_nom);
        //*************** */
    }else{
        $pdf_nom = $_POST["docpdf"];
    }
    /*** */

    include_once("./ConexionCrudPOO.php");
    $conexion = new Conexion("ibecon3_2022");
    $sql = "UPDATE materia SET nombre_materia = '$nombre_materia', 
                    creditos_mat = '$creditos_mat', 
                    anno = '$anno', semestre = '$semestre', 
                    id_carrera2 = '$id_carrera2', docfoto = '$foto_nom', docpdf = '$pdf_nom' 
            WHERE id_materia = '$id_materia'";
    $resultado = mysqli_query($conexion->getConexion(), $sql);
    if($resultado){
        mysqli_close($conexion->getConexion());
        header("location:./MateriasCrud.php?mensaje=400");
    }else{
        mysqli_close($conexion->getConexion());
        header("location:./MateriasCrud.php?mensaje=401");
    }
?>