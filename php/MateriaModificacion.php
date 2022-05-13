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
                <h2>Modificar Materia</h2>
            </hgroup>
        </header>
        <main>
            <form action="" method="POST">
                <div class="separador">
                    <label for="materia">Seleccione Materia</label>
                    <select name="materia" id="materia">
                        <?php
                            require_once("./conexion.php");
                            $sql = "SELECT * FROM materia";
                            $resultado = mysqli_query($conexion, $sql);
                            if($resultado){
                                echo "<option value=0>Seleccione una Materia</option>";
                                while($tupla = mysqli_fetch_assoc($resultado)){
                                    echo "<option value={$tupla['id_materia']}>{$tupla['nombre_mat']}</option>";
                                }
                            }else{
                                header("location:../webs/menuMateria.html?mensaje=401");

                            }
                        ?>
                    </select>
                    <input type="submit" value="Modificar Materia" name="submit">
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $sql = "SELECT * FROM materia WHERE id_materia = {$_POST['materia']}";
                    $resultado = mysqli_query($conexion, $sql);
                    if($resultado){
                        $tupla = mysqli_fetch_assoc($resultado);
                        echo "<form action='./MateriaModificacionRegistros.php' method='post'>
                        <div class='separador'>
                            <label for='id_materia'>Identificar</label>
                            <span>{$tupla['id_materia']}</span>
                            <input type='hidden' id='id_materia' name='id_materia' value={$tupla['id_materia']}>
                        </div>
                        
                        <div class='separador'>
                            <label for='nombre_mat'>Nombre Materia</label>
                            <input type='text' id='nombre_mat' value={$tupla['nombre_mat']} name='nombre_mat'>
                        </div>

                        <div class='separador'>
                            <label for='creditos_mat'>Creditos materia</label>
                            <input type='number' id='creditos_mat' value={$tupla['creditos_mat']} name='creditos_mat'>
                        </div>

                        <div class='separador'>
                            <input type='submit' id='submit' name='submit' value='modificar carrera'>
                            <input type='reset' id='reset' name='reset'>
                        </div>
                        </form>";
                    }else{
                        header("location:../webs/menuMateria.html?mensaje=402");
                    }
                }
            ?>
        </main>
    </div>
</body>

</html>