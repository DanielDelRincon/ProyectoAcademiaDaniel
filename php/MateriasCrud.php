<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/cssEncabezado.css">
        <link rel="stylesheet" href="../css/cssTabla.css">
        <script src="../js/mensajeria_materia.js"></script>
        <script src="../js/jsConsulta.js"></script>
        <title>Materias Crud</title>
        <style>
            table td img{
                width: 20%;
                height: auto;
            }
        </style>
    </head>
<body>
    <div id="contenedor">
        <header>
            <hgroup>
                <a href="../index"><h1>Academia Panda Rojo</h1></a>
                <h2>Materias Crud</h2>
                <div>
                <input type="text" id="buscar" >
                <!-- <input type="button" value="buscar" id="fBuscar"> -->
                </div>
            </hgroup>
        </header>
        <main>
            <table>
                <tr>
                    <th>Id_materia</th>
                    <th>Nombre Materia</th>
                    <th>Creditos</th>
                    <th>Años</th>
                    <th>Semestre</th>
                    <th>Id_Carrera</th>
                    <th>Foto</th>
                    <th>PDF</th>
                    <th>Acciones</th>
                </tr>
                <tr>
                    <form action="MateriasAlta.php" method="POST">
                        <td>&nbsp;</td>
                        <td><input type="text" name="nombre_materia" id="nombre_materia"></td>
                        <td><input type="number" name="creditos_mat" id="creditos_mat"></td>
                        <td><input type="number" name="anno" id="anno"></td>
                        <td><input type="number" name="semestre" id="semestre"></td>
                        <td>
                            <?php 
                                require_once("./ConexionCrudPOO.php");
                                $conexion = new Conexion("ibecon3_2022");
                                $sql = "SELECT id_carrera, nombre FROM carreras";
                                $resultado = mysqli_query($conexion->getConexion(), $sql);
                                echo "<input type='text' list='lista' name='id_carrera2' id='id_carrera2' />";
                                echo "<datalist id='lista'>";
                                foreach($resultado as $tupla){
                                    echo "<option values={$tupla['id_carrera']}>{$tupla['id_carrera']} {$tupla['nombre']}</option>";
                                }
                                echo "</datalist>";
                            ?>
                        </td>
                        <td><input id="docfoto" name="docfoto" type="file" /></td>
                        <td><input id="docpdf" name="docpdf" type="file" /></td>
                        <td><input type="submit"  name="submit" value="Alta"></td>
                    </form>
                </tr>
                <tbody id="tabla">
                            <?php 
                                //zona de paginacion
                                require_once ("./materiasPaginacion.php");

                                if($resultado){
                                if(mysqli_num_rows($resultado)==0){
                                    die("<p>La tabla está vacía.</p>");
                                }else if(!$resultado){
                                    header("?mensaje=101");
                                }
                            }

                    
                            foreach($resultado as $tupla) :?>
                                <tr>
                                    <td><?php echo $tupla['id_materia'] ?></td> 
                                    <td><?php echo $tupla["nombre_materia"] ?></td>
                                    <td><?php echo $tupla["creditos_mat"] ?></td>
                                    <td><?php echo $tupla["anno"] ?></td> 
                                    <td><?php echo $tupla["semestre"] ?></td>
                                    <td><?php echo $tupla["id_carrera2"] ?></td> 
                                    <td><img src="../imagenes/<?php echo $tupla['docfoto'] ?>" alt="Sin foto" /></td>
                                    <td><object data="../pdf/<?php echo $tupla['docpdf'] ?>" alt="Sin pdf" ></object></td>
                                    <td>
                                        <a href="./MateriasBaja.php?id_materia=<?php echo $tupla['id_materia']?>&materia=<?php echo $tupla['nombre_materia'] ?> "><button>Borrar&#x1f5d1;&#xfe0f;</button></a>
    
                                        <a href="./MateriasModificar.php?id_materia=<?php echo $tupla['id_materia']?>&materia=<?php echo $tupla['nombre_materia'] ?> "><button>Modificar&#x1F4C4;</button></a> 
                                    </td>
                                </tr>
                                <?php endforeach; 
                                    mysqli_close($conexion->getConexion());
                                    mysqli_free_result($resultado);
                            ?>
                                <div id="panelInformativo"></div>
                        </tbody>
            </table>
        </main>
        <div id="panelInformativo"></div>
    </div>

</body>
</html>