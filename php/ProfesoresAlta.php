<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta de Profesores</title>
        <link rel="stylesheet" href="../css/cssEncabezado.css">
        <script src="../js/Profesor.js"></script>

    </head>

    <body>
        <div id="contenedor">
            <header>
                <hgroup>
                <a href="../index"><h1>Academia Panda Rojo</h1></a>
                <h2>Alta Profesor</h2>
                </hgroup>
            </header>
            <main>
                <form action="" method="POST">
                    <div class="separador">
                        <label for="nombre_pro">Inserte Nombre Profesor</label>
                        <input type="text" id="nombre_pro" name="nombre_pro" required pattern="[a-zA-ZñÑ ]{2,30}" placeholder="Inserte el nombre de Profesor" size="40">
                    </div>
                    <div class="separador">
                        <label for="dir_pro">Inserte Dir profesor</label>
                        <input type="text" id="dir_pro" name="dir_pro" required>
                    </div>
                    <div class="separador">
                        <label for="telefono_pro">Inserte telefono profesor</label>
                        <input type="text" id="telefono_pro" name="telefono_pro" required pattern="[0-9]{9}">
                    </div>
                    <div class="separador">
                        <label for="horario_pro">Diga el horario profesor </label>
                        <input type="number" id="horario_pro" name="horario_pro" required pattern="[0-9]">
                    </div>
                    
                    <div class="separador">
                        <input type="submit" id="submit" name="submit">
                        <input type="reset" id="reset" name="reset">
                    </div>
                </form>
                <div id="panelInformativo"></div>
                <a href="../webs/menuProfesor.html"><button>Volver al menu</button></a>
            </main>
            <?php

                if(isset($_POST["submit"])){
                    $nombre = $_POST["nombre_pro"];
                    $dir_pro = $_POST["dir_pro"];
                    $telefono = $_POST["telefono_pro"];
                    $horario = $_POST["horario_pro"];

                    require_once("./conexion.php");

                    //construir la sentencia sql
                    $sql = "INSERT INTO profesor (nombre_pro, dir_pro, telefono_pro, horario_pro) values ('$nombre', '$dir_pro', '$telefono', '$horario')";
                    $resultado = mysqli_query($conexion, $sql);
                    if($resultado){
                        header("location:../webs/menuProfesor.html?mensaje=100");
                    }else{
                        header("location:../webs/menuProfesor.html?mensaje=101");

                    }
                }
            ?>
        </div>
    </body>
</html>