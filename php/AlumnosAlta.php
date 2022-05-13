<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta de Alumnos</title>
        <link rel="stylesheet" href="../css/cssEncabezado.css">
        <script src="../js/JsAlumnos.js"></script>

    </head>

    <body>
        <div id="contenedor">
            <header>
                <hgroup>
                <a href="../index"><h1>Academia Panda Rojo</h1></a>
                <h2>Alta Alumnos</h2>
                </hgroup>
            </header>
            <main>
                <form action="" method="POST">
                    <div class="separador">
                        <label for="DNI">Inserte DNI alumno</label>
                        <input type="text" id="DNI" name="DNI" required pattern="[a-zA-ZñÑ 0-9]{1,9}" placeholder="Inserte el DNI de Alumno" size="40">
                    </div>
                    <div class="separador">
                        <label for="nombre_alu">Inserte Nombre alumno</label>
                        <input type="text" id="nombre_alu" name="nombre_alu" required pattern="[a-zA-ZñÑ ]{2,30}" placeholder="Inserte el nombre de Alumno" size="40">
                    </div>
                    <div class="separador">
                        <label for="apellido1_alu">Inserte Apeliido 1 alumno</label>
                        <input type="text" id="apellido1_alu" name="apellido1_alu" required pattern="[a-zA-ZñÑ ]{2,30}">
                    </div>
                    <div class="separador">
                        <label for="apellido2_alu">Inserte Apeliido 2 alumno</label>
                        <input type="text" id="apellido2_alu" name="apellido2_alu" required pattern="[a-zA-ZñÑ ]{2,30}">
                    </div>
                    <div class="separador">
                        <label for="edad_alu">Diga la edad Alumno </label>
                        <input type="number" id="edad_alu" name="edad_alu" required pattern="[0-9]{2}">
                    </div>
                    <div class="separador">
                        <label for="genero_alu">Elige género:  </label>
                        <input id="genero1" name="genero_alu" type="radio" value="M" />
                        <label for="genero_alu">Masculino  </label>
                        <input id="genero2" name="genero_alu" type="radio" value="F" />
                        <label for="genero_alu">Femenino</label>
                    </div>
                    <div class="separador">
                        <label for="id_carrera1">Selecciona carrera:</label>
                        <select name="id_carrera1" id="id_carrera1">
                            <?php
                                require_once("./conexion.php");
                                $sql="SELECT * FROM carreras";
                                $resultado=mysqli_query($conexion, $sql);
                                while($tupla=mysqli_fetch_assoc($resultado)){
                                    echo "<option value={$tupla['id_carrera']}>{$tupla['nombre']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="separador">
                        <input type="submit" id="submit" name="submit">
                        <input type="reset" id="reset" name="reset">
                    </div>
                </form>
                <div id="panelInformativo"></div>
                <a href="../webs/menuAlumnos.html"><button>Volver al menu</button></a>
            </main>
            <?php

                if(isset($_POST["submit"])){
                    $DNI = $_POST["DNI"];
                    $nombre = $_POST["nombre_alu"];
                    $apellido1 = $_POST["apellido1_alu"];
                    $apellido2 = $_POST["apellido2_alu"];
                    $edad = $_POST["edad_alu"];
                    $genero = $_POST["genero_alu"];
                    $id_carrera = $_POST["id_carrera1"];

                    require_once("./conexion.php");

                    //construir la sentencia sql
                    $sql = "INSERT INTO alumnos (DNI, nombre_alu, apellido1_alu, apellido2_alu, edad_alu, genero_alu, id_carrera1) values ('$DNI', '$nombre', '$apellido1', '$apellido2', '$edad', '$genero', '$id_carrera')";
                    $resultado = mysqli_query($conexion, $sql);
                    if($resultado){
                        header("location:../webs/menuAlumnos.html?mensaje=100");
                    }else{
                        header("location:../webs/menuAlumnos.html?mensaje=101");

                    }
                }
            ?>
            
        </div>
    </body>
</html>