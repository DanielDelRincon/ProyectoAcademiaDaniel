<link rel="stylesheet" href="../css/cssEncabezado.css">
<style>
    form{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(3, 50px);
        gap: 1em;

    }
    form div img{
        width: 50%;
        height: auto;
        display: block;
    }
    .separador{
        background-color: #FFA07A;
        display: grid;
        place-items: center;
        /*justify-items: center;
        align-items: center;
        text-align: center;*/
    }
</style>
<?php
    // session_start();
    // if(!isset($_SESSION["usuario"])){
    //     header("location:../../autenticar.html");
    // }
?>
<?php
    $id_materia = $_GET["id_materia"];
    include_once("./ConexionCrudPOO.php");
    $conexion = new Conexion("ibecon3_2022");
    $sql = "SELECT * FROM materia WHERE id_materia = '$id_materia'";
    $resultado = mysqli_query($conexion->getConexion(), $sql);
    if(!$resultado){
        header("location:./materiasCrud.php?mensaje=301");
    }
foreach($resultado as $tupla) :?>
    <header>
        <hgroup>
            <a href="../index"><h1>Academia Panda Rojo</h1></a>
            <h2>Materias Crud</h2>
        </hgroup>
    </header>
    <form action="./MateriasModificarRegistros.php" method="post" enctype="multipart/form-data">
        <div class="separador">
            <label for="id_materia">Id materia:</label>
            <span><?php echo $id_materia ?></span>
            <input type="hidden" name="id_materia" value="<?php echo $tupla['id_materia'] ?>" />
        </div>
        <div class="separador">
            <label for="nombre_materia">Materia:</label>
            <input type="text" name="nombre_materia" value="<?php echo $tupla['nombre_materia'] ?>" />
        </div>
        <div class="separador">
            <label for="creditos_mat">Créditos:</label>
            <input type="text" name="creditos_mat" value="<?php echo $tupla['creditos_mat'] ?>" />
        </div>
        <div class="separador">
            <label for="anno">Años de estudios:</label>
            <input type="text" name="anno" value="<?php echo $tupla['anno'] ?>" />
        </div>
        <div class="separador">
            <label for="semestre">Semestre del estudio:</label>
            <input type="text" name="semestre" value="<?php echo $tupla['semestre'] ?>" />
        </div>
        <div class="separador">
            <label for='id_carrera2'>carrera:</label>
            <input list='lista_carreras' name='id_carrera2' />
        </div>
        <div class="separador">
            <label for='docfoto'>Foto</label>
            <img src="../imagenes/<?php echo $tupla['docfoto'] ?>" alt="Sin foto" /><br />
            <input type="file" name="docfoto" />
            <input type="hidden" name="fotoActual" value="<?php echo $tupla['docfoto'] ?>" />
        </div>
        <div class="separador"> 
            <label for='docpdf'>Pdf</label>
            <object data="../pdf/<?php echo $tupla['docpdf'] ?>" alt="Sin pdf" ></object><br />
            <input type="file" name="docpdf" />
            <input type="hidden" name="pdfActual" value="<?php echo $tupla['docpdf'] ?>" />
        </div>
        <div class="separador">
            <input type="submit" value="Actualizar..." />
        </div>
    </form>
<?php endforeach; ?>
<?php
    echo "<div class='separador'>";
    $sql = 'SELECT * FROM carreras';
    $resultado = mysqli_query($conexion->getConexion(), $sql);
    if(!$resultado){
        header("location:./materiasCrud.php?mensaje=303");
    }else{
        echo "<datalist id='lista_carreras'>";
        foreach($resultado as $tuplaCa){
            if($tuplaCa['id_carrera'] == $tupla['id_carrera2']){
                echo "<option selected value='{$tuplaCa['id_carrera']}'>{$tuplaCa['nombre']}</option>";
            }else{
                echo "<option value='{$tuplaCa['id_carrera']}'>{$tuplaCa['nombre']}</option>";
            } 
        }
        echo "</datalist>";
    }
    mysqli_close($conexion->getConexion());
    mysqli_free_result($resultado);
?>
