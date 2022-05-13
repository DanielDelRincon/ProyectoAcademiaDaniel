<?php
//crear una clase llamada fichero
class Fichero extends Conexion{
    //atributos
    private $nombre;
    private $tipo;
    private $tamanno;

    //constructor
    function __construct($bbdd,$nom, $tip, $tam){
        parent::__construct($bbdd);
        $this->nombre = $nom;
        $this-> tipo= $tip;
        $this->tamanno = $tam;
    }

    //funcionalidad
    function validar($tipo){
        //$tipo --> pdf o $tipo-->imagen
        $resultado = false;
        if($tipo == "pdf"){
            if($this-> tipo == "application/pdf"){
                if($this->tamanno <= 300000000){
                    $resultado = true;
                    //Guardar foto
                    //raiz del servidor: htdocs
                    $carp_gua = $_SERVER["DOCUMENT_ROOT"] . "/Academia/pdf/";
                    //Zona temporal al destino 
                    move_uploaded_file($_FILES["docpdf"]["tmp_name"], $carp_gua . $this->nombre);
                }else{
                    echo "<p>el tamaño es del documento es excesivo</p>";
                }
            }else{
                echo "<p>tipo incorrecto</p>";
            }
        }elseif(!empty($tipo)){
            if($this-> tipo == "image/jpeg" || $this-> tipo == "image/jpg" || $this-> tipo == "image/png" || $this-> tipo == "image/webp" || $this-> tipo == "image/tiff" || $this-> tipo == "image/gif"){
                if($this->tamanno <= 300000000){
                    $resultado = true;
                    //Guardar foto
                    //raiz del servidor: htdocs
                    $carp_gua = $_SERVER["DOCUMENT_ROOT"] . "/Academia/imagenes/";
                    //Zona temporal al destino 
                    move_uploaded_file($_FILES["docfoto"]["tmp_name"], $carp_gua . $this->nombre);
                
                }else{
                    echo "<p>el tamaño de la imagen es excesivo</p>";
                }
            }else{
                echo "<p>tipo de imagen incorrecto</p>";
            }
        }
        return $resultado;
    }

    //metodos getters y setters
    //metodo getters nombre
    function getNombre(){
        return $this->nombre;
    }

    //metodo getters tipo
    function getTipo(){
        return $this->tipo;
    }
    //metodo getters tamanno
    function getTamanno(){
        return $this->tamanno;
    }
    
    
}

?>