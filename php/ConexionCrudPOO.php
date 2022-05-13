<?php
    class conexion{
        private $servidor;
        private $usuario;
        private $password;
        private $bbdd;
        private $conexion;
        
        function __construct($bbdd){
            $this->servidor = "localhost";
            $this->usuario = "root";
            $this->password = "";
            $this->bbdd = $bbdd;
            $this->conectar();
        }
        function conectar(){
            $establecerConexion = mysqli_connect($this->servidor, $this->usuario, $this->password);
            if(mysqli_connect_errno()){
                echo "<p>Error 1: Conexion no establecida</p>";
                echo "Error 2: No se pudo conectar a SQL" . PHP_EOL;//borrar
                echo "Error de depuracion: " . mysqli_connect_errno() . PHP_EOL;//borrar
                exit();
            }
            mysqli_select_db($establecerConexion, $this->bbdd) or die("Error 2: No se puede entrar a la BBDD");
            //echo "<p>Conexion completada</p>";//borrar
            $this->conexion = $establecerConexion;
        }
        function cerrarBBDD(){
            mysqli_close($this->conexion);
        }
        //getter
        function getConexion(){
            return $this->conexion;
        }
    }
?>