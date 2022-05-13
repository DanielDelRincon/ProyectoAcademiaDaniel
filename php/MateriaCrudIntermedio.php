<?php
    foreach($resultado as $tupla){
    echo "<tr>
            <td> echo $tupla->id_materia</td>
            <td> echo $tupla->nombre_mat</td>
            <td> echo $tupla->creditos_mat</td>
            <td>Futura Foto</td>
            <td>Futuro PDF</td>
            <td>
                <a href='./MateriasBaja.php'><button>Borrar</button></a>
                <a href='./MateriasModificar.php'><button>Modificar</button></a>
            </td>
        </tr>";
    }
?>