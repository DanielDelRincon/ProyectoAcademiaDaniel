<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta de Materia</title>
        <link rel="stylesheet" href="../css/cssEncabezado.css">
        <link rel="stylesheet" href="../css/cssTabla.css">
        <script src="../js/jsConsulta.js"></script>
    </head>
    <body>
        <div id="contenedor">
            <header>
                <hgroup>
                    <a href="../index"><h1>Academia Panda Rojo</h1></a>
                    <h2>Baja Materia</h2>
                </hgroup>
                <div>
                <input type="text" id="buscar" >
                <!-- <input type="button" value="buscar" id="fBuscar"> -->
                </div>
            </header>
            <main>
                <?php
                    require_once("./conexion.php");
                    //construir la sentencia sql
                    $sql = "SELECT * FROM materia";
                    $resultado = mysqli_query($conexion, $sql);

                    echo "<table><tr>
                                    <th>Id Carrera</th>
                                    <th>Nombre</th>
                                    <th>Periodo</th>
                                    <th>Operaciones</th>
                                </tr>
                                <tbody id='tabla'>";
                    while($tupla = mysqli_fetch_row($resultado)){
                        echo    "<tr><td>" . $tupla[0] . "</td>" .
                                "<td>" . $tupla[1] . "</td>" .
                                "<td>" . $tupla[2] . "</td>" .
                                "<td><a href='./carrerasBajaRegistro.php?id_materia=" . $tupla[0] . "'><button>Borrar</button></a></td></tr>";
                    }
                    echo "</tbody></table>";
                    if(!$resultado){
                        header("location:../webs/menuCarreras.html?mensaje=300");
                    }
                    
                ?>
                <a href="../webs/menuCarreras.html"><button>Volver al menu</button></a>
                <div id="panelInformativo"></div>
            </main>
            
        </div>
    </body>
</html>