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
                        <label for="nombre">Inserte nombre Carrera</label>
                        <input type="text" id="nombre" name="nombre" required pattern="[a-zA-ZñÑ ]{2,30}" placeholder="Inserte el nombre de carrera pedazo de" size="40">
                    </div>
                    <div class="separador">
                        <label for="duracion">Diga la duracion</label>
                        <input type="number" id="duracion" name="duracion" required pattern="[0-9]{1}" value="3">
                    </div>
                    <div class="separador">
                        <input type="submit" id="submit" name="submit">
                        <input type="reset" id="reset" name="reset">
                    </div>
                </form>
                <div id="panelInformativo"></div>
                <a href="../webs/menuCarreras.html"><button>Volver al menu</button></a>
            </main>
            <?php

                if(isset($_POST["submit"])){
                    $nombre = $_POST["nombre"];
                    $duracion = $_POST["duracion"];

                    require_once("./conexion.php");

                    //construir la sentencia sql
                    $sql = "INSERT INTO carreras (nombre, periodo) values ('$nombre', '$duracion')";
                    $resultado = mysqli_query($conexion, $sql);
                    if($resultado){
                        header("location:../webs/menuCarreras.html?mensaje=100");
                    }else{
                        header("location:../webs/menuCarreras.html?mensaje=101");

                    }
                }
            ?>
        </div>
    </body>
</html>