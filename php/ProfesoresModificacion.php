<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Academia - Modificar prof</title>
        <link rel="stylesheet" href="../css/cssEncabezado.css"/>
        <link rel="stylesheet" href="../css/cssTabla.css"/>
        <script src="../js/jsConsulta.js"></script>
        
        
    </head>
    <body>
    <div id="contenedor">
        <header>
            <hgroup>
                <h1>ACADEMIA Panda Rojo</h1>
                <h2>Modificar profe</h2>
            </hgroup>
            <div>
                <input id="buscar" type="text"/>
                <input type="button" value="Buscar" id="fBuscar" /> <!-- este boton realmente no es necesario, no hace funcion enviar, xk ya no he puesto en el js el click, pero asi veo k pone buscar y me resulta mas comodo-->
            </div>
            
        </header>
        <main>
            <?php
                    //para conectar el documento externo de comprobar conexion
                    require_once("./Conexion.php");
                    
                    
                    
                    //instruccion sql para dar datos
                    $sql = "SELECT * FROM profesor";
                    $resultado = mysqli_query($conexion,$sql);

                    echo "<table><tr>
                                <th>ID Profesor</th>
                                <th>Nombre profesor</th>
                                <th>Direccion profesor</th>
                                <th>telefono profesor</th>
                                <th>horario profesor</th>
                                <th>Operacion</th>
                                </tr>
                                <tbody id='tabla'>";
                    while($tupla = mysqli_fetch_row($resultado)){
                        echo "<td>" . $tupla[0]."</td>" .
                            "<td>" . $tupla[1]."</td>" .
                            "<td>" . $tupla[2]."</td>" . 
                            "<td>" . $tupla[3]."</td>". 
                            "<td>" . $tupla[4]."</td>". 
                            
                            "<td><a href='./ProfesoresModificarIntermedio.php?id_profesor=". $tupla[0] ."'><button>Modificar</button></a></td></tr>";
                    }
                    echo "</tbody></table>";

                    if(!$resultado){ /*puedo quitar el == true xk es redundante*/
                        header("location:../webs/menuAlumno.html?mensaje=300");
                    }

            ?>
            <a href="../webs/menuAlumno.html"><button>Volver a menú Profesores</button></a>
        </main>
        
    </div>
        
    </body>
    </html>