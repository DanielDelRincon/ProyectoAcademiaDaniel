<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Academia - Modificar Profesor Intermedio</title>
        <link rel="stylesheet" href="../css/cssEncabezado.css"/>
        
    </head>
    <body>
    <div id="contenedor">
            <header>
                <hgroup>
                    <h1>ACADEMIA</h1>
                    <h2>Modificar Alumnos Intermedio</h2>
                </hgroup>
            </header>
            <main>
                <!-- <form action= <?php //$_SERVER ["PHP_SELF"];?> method="post">
                    <div class="separador">
                        <input type="submit" value="Modificar alumno" name="submit"/>
                    </div>
                </form> -->
                <?php
                    require_once ("./Conexion.php");

                    $id = $_GET["id_profesor"];
                    $sql = "SELECT * FROM profesores";
                    $resultado = mysqli_query($conexion, $sql);

                        if($resultado){
                            $tupla = mysqli_fetch_assoc($resultado);
                            echo "<form action='./ProfesoresModificarRegistro.php' method='post'>
                                <div class='separador'>
                                    <label for='id_profesor'>Identificador profesor:</label>
                                    <span>{$tupla['id_profesor']}</span>
                                    <input id='id_profesor' name='id_profesor' type='hidden' value={$tupla['id_profesor']} />
                                </div>

                                <div class='separador'>
                                    <label for='nombre_pro'>Nombre de Profesor:</label>
                                    <input id='nombre_pro' name='nombre_pro' type='text' value={$tupla['nombre_pro']} />
                                </div>

                                <div class='separador'>
                                    <label for='dir_pro'>Direccion profesor:</label>
                                    <input id='dir_pro' name='dir_pro' type='text' value={$tupla['dir_pro']} />
                                </div>

                                <div class='separador'>
                                    <label for='telefono_pro'>Telefono profesor: </label>
                                    <input id='telefono_pro' name='telefono_pro' type='text' value={$tupla['telefono_pro']} />
                                </div>

                                <div class='separador'>
                                    <label for='horario_pro'>Horario profesor:</label>
                                    <input id='horario_pro' name='horario_pro' type='number' value={$tupla['horario_pro']} />
                                </div>

                                <div class='separador'>
                                    <input type='submit' id='submit' name='submit' value='Enviar..' />
                                    <input type='reset' id='reset' name='reset' value='Borrar todo..' />
                                </div>
                                
                            </form>";
                        }else{
                            header ("location:../webs/menuAlumnos.html?mensaje=402");
                        }
                ?>
            </main>
    </div>
    </body>
</html>