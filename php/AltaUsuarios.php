<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/cssEncabezado.css">
        <title>Document</title>
    </head>
    <body>
    <div id="contenedor">
            <header>
                <hgroup>
                    <a href="../index"><h1>Academia Panda Rojo</h1></a>
                    <h2>Alta Usuarios</h2>
                </hgroup>
            </header>
            <main>
                <form action="" method="post">
                    <div class="separador">
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name="usuario" autocomplete="off" pattern="[a-zA-Z ñÑ]{2,20}">
                    </div>
                    <div class="separador">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" autocomplete="off" pattern="[0-9]{1,20}">
                    </div>
                    <div class="separador">
                        <input type="submit" id="submit" name="submit">
                        <input type="reset" id="reset" name="reset">
                    </div>
                </form>
                <?php
                    if(isset($_POST["submit"])){
                        $nombre = $_POST["usuario"];
                        $password = password_hash($_POST["password"], PASSWORD_DEFAULT, array("cost"=>12)); //Linea de codigo para cifrar la contraseña, con coste 12
                        require_once("./conexion.php");
                        $sql = "INSERT INTO usuarios(usuario, passsword) values ('$nombre', '$password')";
                        $resultado = mysqli_query($conexion, $sql);
                        echo "<p>$nombre</p>";
                        echo "<p>$password</p>";
                        if($resultado){
                            header("location:../index?mensaje=500");
                        }else{
                            echo "<p>El usuario no ha sido dado de alta</p>";
                            echo "<a href='../index.html?mensaje=501'>Ir a index</a>";
                        }

                    };
                ?>
            </main>
        </div>
    </body>
</html>