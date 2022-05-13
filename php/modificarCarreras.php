<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Carreras</title>
    <link rel="stylesheet" href="../css/cssEncabezado.css">
</head>

<body>
    <div id="contenedor">
        <header>
            <hgroup>
                <a href="../index">
                    <h1>Academia Panda Rojo</h1>
                </a>
                <h2>Modificar Carreras</h2>
            </hgroup>
        </header>
        <main>
            <form action="" method="POST">
                <div class="separador">
                    <label for="carrera">Seleccione carrera</label>
                    <select name="carrera" id="carrera">
                        <?php
                            require_once("./conexion.php");
                            $sql = "SELECT * FROM carreras";
                            $resultado = mysqli_query($conexion, $sql);
                            if($resultado){
                                echo "<option value=0>Seleccione una carrera</option>";
                                while($tupla = mysqli_fetch_assoc($resultado)){
                                    echo "<option value={$tupla['id_carrera']}>{$tupla['nombre']}</option>";
                                }
                            }else{
                                header("location:../webs/menuCarreras.html?mensaje=401");

                            }
                        ?>
                    </select>
                    <input type="submit" value="Modificar Carrera" name="submit">
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $sql = "SELECT * FROM carreras WHERE id_carrera = {$_POST['carrera']}";
                    $resultado = mysqli_query($conexion, $sql);
                    if($resultado){
                        $tupla = mysqli_fetch_assoc($resultado);
                        echo "<form action='./carrerasModificacion.php' method='post'>
                        <div class='separador'>
                            <label for='id_carrera'>Identificar</label>
                            <span>{$tupla['id_carrera']}</span>
                            <input type='hidden' id='id_carrera' name='id_carrera' value={$tupla['id_carrera']}>
                        </div>
                        <div class='separador'>
                            <label for='nombre'>Nombre carrera</label>
                            <input type='text' id='nombre' value={$tupla['nombre']} name='nombre'>
                        </div>
                        <div class='separador'>
                            <label for='periodo'>Periodo carrera</label>
                            <input type='number' id='periodo' value={$tupla['periodo']} name='periodo'>
                        </div>
                        <div class='separador'>
                            <input type='submit' id='submit' name='submit' value='modificar carrera'>
                            <input type='reset' id='reset' name='reset'>
                        </div>
                        </form>";
                    }else{
                        header("location:../webs/menuCarreras.html?mensaje=402");
                    }
                }
            ?>
        </main>
    </div>
</body>

</html>