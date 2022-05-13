<?php
//comprobar conexion
//require_once ("./conexionCrudPoo.php");
//$conexion = new Conexion("ibecon3_2022");

//Preparativos paginación
$registroPorPag = 8;

if(!isset($_GET["pag"]) || $_GET["pag"] == 1){
    $pag = 1;
}else{
    $pag = $_GET["pag"];
}

$empezarDesde = ($pag-1)*$registroPorPag;

$sql = "SELECT id_materia FROM materia";
$resultado = mysqli_query($conexion->getConexion(), $sql);

$registrosTotales = mysqli_num_rows($resultado);

$sql = "SELECT * FROM materia limit $empezarDesde, $registroPorPag";
$resultado = mysqli_query($conexion->getConexion(), $sql);

$totalPaginas = ceil($registrosTotales / $registroPorPag);

echo "<p> $pag de $totalPaginas</p>";


//Paginación
for($i=1;$i<=$totalPaginas;$i++){
if($i == $pag){
    echo "<a href='?pag=$i' style='background-color: lightgreen'>| $i | </a>";
}else{
    echo "<a href='?pag=$i'>| $i | </a>";
}
}

?>