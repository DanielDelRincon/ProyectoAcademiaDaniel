<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/cssEncabezado.css">
        <title>Document</title>
    </head>
    <body>
    <div id="contenedor">
            <header>
                <hgroup>
                    <a href="./index"><h1>Academia Panda Rojo</h1></a>
                    <h2>Autentificar Usuarios</h2>
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
                        $password = $_POST["password"];
                        require_once("./php/conexion.php");
                        $sql = "SELECT usuario, passsword FROM usuarios WHERE usuario ='$nombre'";
                        $resultado = mysqli_query($conexion, $sql);
                        echo "<p>$nombre</p>";
                        echo "<p>$password</p>";
                        if($resultado){
                            while($tupla = mysqli_fetch_assoc($resultado)){
                                if(password_verify($password, $tupla["passsword"])){
                                    session_start();
                                    $_SESSION["usuario"] = $_POST["usuario"];
                                    header("location:./index?mensaje=ok");
                                }else{
                                    echo "<script>alert('ok')</script>";
                                    header("location:./Autentificar.php?mensaje=no ok");
                                    echo "<p>No</p>";
                                };
                            };
                        }else{
                            echo "<p>Error en ejecucion</p>";
                        }
                    };
                ?>
            </main>
        </div>
    </body>
</html>