<?php
    function depurarTxt($dato){
        $dato = strip_tags($dato); //quita cualquier etiqueta maligna de los campos
        $dato = trim($dato); //quita los espacios en blanca a la izq y la derecha del campo
        $dato = htmlentities($dato); //"UTF-8"); //quita caracteres especiales del campo //ENT_QUOTES -> me cambia las tildes por &ecout, "UTF-8" ->esto es para que no me quite los caracteres como tildes y esas cosas normales.
        //$dato = preg_replace('/[0-9\@\.\;]+/', '', $dato); deberia hacer un depurar para numeros y otro para texto
        
        $resultado = depurarNum($dato);

        return $dato;
    }

    function depurarNum($dato){
        return is_numeric($dato);
    }

    function depurarFoto($docfoto){
        
        $docfotoTam = $_FILES["docfoto"]["size"];
        $docfotoTip = $_FILES["docfoto"]["type"];

        if($docfotoTam <= 1000000){
            if($docfotoTip == "image/jpeg" || $docfotoTip == "image/jpg" || $docfotoTip == "image/png" || $docfotoTip == "image/webp" || $docfotoTip == "image/tiff" || $docfotoTip == "image/gif" ){
                //si al validar tamaño y tipo son los correctos tomo el nombre
                $docfoto = $_FILES["docfoto"]["name"];
            }else{
                echo "<p>Tipo no correcto, verifique</p>";
                sleep(5);
                header("location:./MateriasModificar.php?mensaje=501");
            }
        }else{
            echo "<p>La foto tiene un tamaño excesivo</p>";
        }
    }

    function depurarPdf($docpdf){
        
        $docpdfTam = $_FILES["docpdf"]["size"];
        $docpdfTip = $_FILES["docpdf"]["type"];
        if($docpdf != null || $docpdf != ""){
            if($docpdfTam <= 1000000){
                if($docpdfTip == "application/pdf" ){
                    //si al validar tamaño y tipo son los correctos tomo el nombre
                    $docpdf = $_FILES["docpdf"]["name"];
                }else{
                    echo "<p>Tipo no correcto, verifique</p>";
                    sleep(5);
                    header("location:./MateriasModificar.php?mensaje=501");
                }
            }else{
                header("location:./MateriasModificar.php?mensaje=502");
    
            }
        }
        require_once("./ConexionCrudPOO.php");
        $conexion = new conexion("ibecon3_2022");
        $sql = "UPDATE materia SET nombre_materia = '$nombre', creditos_mat = '$creditos', anno = '$anno', semestre = '$semestre', id_carrera2 = '$id_carrera2', docfoto = '$docfoto', docpdf = '$docpdf' WHERE id_materia = '$id_materia'";
        $resultado = mysqli_query($conexion->getConexion(), $sql);
        if($resultado){
            header("location./MateriasCrud.php?mensaje=400");
        }else{
            header("location./MateriasCrud.php?mensaje=401");
        }
    }
?>
