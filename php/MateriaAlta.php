<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta de Carreras</title>
        <link rel="stylesheet" href="../css/cssEncabezado.css">
        <script src="../js/JsCarreras.js"></script>

    </head>

    <body>
        <div id="contenedor">
            <header>
                <hgroup>
                <a href="../index"><h1>Academia Panda Rojo</h1></a>
                <h2>Alta carreras</h2>
                </hgroup>
            </header>
            <main>
                <form action="" method="POST">
                    <div class="separador">
                        <label for="id_materia">Inserte nombre Materia </label>
                        <input type="text" id="id_materia" name="id_materia" required pattern="[a-zA-ZñÑ 0-9]{2,30}" placeholder="Inserte el nombre de la materia" size="40">
                    </div>
                    <div class="separador">
                        <label for="creditos_mat">Diga los creditos</label>
                        <input type="number" id="creditos_mat" name="creditos_mat" required pattern="[0-9]{2}">
                    </div>
                    <div class="separador">
                        <label for="anno">Diga el año</label>
                        <input type="number" id="anno" name="anno" required pattern="[0-9]{2}">
                    </div>
                    <div class="separador">
                        <label for="semestre">Diga el semestre</label>
                        <input type="number" id="semestre" name="semestre" required pattern="[0-9]{2}">
                    </div>
                    <div class="separador">
                        <label for="id_carrera2">Diga la carrrea</label>
                        <input type="number" id="id_carrera2" name="id_carrera2">
                    </div>
                    <div class="separador">
                        <input type="submit" id="submit" name="submit">
                        <input type="reset" id="reset" name="reset">
                    </div>
                </form>
                <div id="panelInformativo"></div>
                <a href="../webs/menuMateria.html"><button>Volver al menu</button></a>
            </main>
            <?php

                if(isset($_POST["submit"])){
                    $nombre = $_POST["id_materia"];
                    $creditos = $_POST["creditos_mat"];
                    $anno = $_POST["anno"];
                    $semestre = $_POST["semestre"];
                    $id_carrera2 = $_POST["id_carrera2"];

                    require_once("./conexion.php");

                    //construir la sentencia sql
                    $sql = "INSERT INTO materia (nombre_materia, creditos_mat, anno, semestre, id_carrera2) values ('$nombre', '$creditos', $anno, $semestre, $id_carrera2)";
                    $resultado = mysqli_query($conexion, $sql);
                    if($resultado){
                        header("location:../webs/menuMateria.html?mensaje=100");
                    }else{
                        header("location:../webs/menuMateria.html?mensaje=101");

                    }
                }
            ?>
        </div>
    </body>
</html>