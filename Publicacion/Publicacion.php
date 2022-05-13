<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicacion</title>
    <link rel="stylesheet" href="../css/cssEncabezado.css">
    <script>
        window.onload = escucha;
        function escucha(){
            document.getElementById("encontrar").addEventListener("click", encontrarTexto);
            var tParrafos = document.querySelectorAll("p");

        }
        function encontrarTexto(){
            var texto = document.getElementsByTagName("input")[0].value;
            //alert("la cadena \x22" + texto +  "\x22 " +  window.find(texto));
            window.find(texto);
        }
    </script>
    <style>
        #buscar{
            border-radius: 7px;
        }
        #buscar:focus{
            background-color: cyan;
        }
    </style>
</head>
<body>
    <div id="contenedor">
        <header>
                <hgroup>
                    <a href="../index"><h1>Academia Panda Rojo</h1></a>
                    <h2>Menu Principal</h2>
                </hgroup>
            </header>
        <form>
            <label for="buscar">Buscar termino</label>
            <input type="text" id="buscar" name="texto_buscar" />
            <button type="button" id="encontrar" name="encontrar">Buscar</button>
        </form>
        
    </div>
</body>
</html>