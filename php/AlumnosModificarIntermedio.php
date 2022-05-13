
<div class="separador">
        <label for="id_carrera1">Selecciona carrera:</label>
        <select name="id_carrera1" id="id_carrera1">
            <?php
                require_once("./conexion.php");
                $sql="SELECT * FROM carreras";
                $resultado=mysqli_query($conexion, $sql);
                while($tupla=mysqli_fetch_assoc($resultado)){
                    echo "<option value={$tupla['id_carrera1']}>{$tupla['nombre']}</option>";
                }
            ?>
        </select>
    </div>