<?php
    require_once("layout/header.php");
    //    var_dump($dato);
?>

    <a href="index.php?op=nuevo" class="btn">nuevo</a>
    <table>
      <tr>
        <th>ID Registro</th>
        <th>Falla ID</th>
        <th>Área ID</th>
        <th>Título</th>
        <th>Nivel</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Tiempo</th>
        <th>Hora Apertura</th>
        <th>Hora Sumada</th>
        <th>Tiempo Acumulado</th>
        <th>Comentario</th>
        <th>Estado</th>
        <th>Fecha Registro</th>
      </tr>
      <tbody>
        <?php 
            foreach ($dato[0] as $fila) {
                echo "<tr>";
                echo "<td>{$fila['id_registro']}</td>";
                echo "<td>{$fila['falla_id']}</td>";
                echo "<td>{$fila['area_id']}</td>";
                echo "<td>{$fila['titulo']}</td>";
                echo "<td>{$fila['nivel']}</td>";
                echo "<td>{$fila['nombre']}</td>";
                echo "<td>{$fila['telefono']}</td>";
                echo "<td>{$fila['tiempo']}</td>";
                echo "<td>{$fila['hora_apertura']}</td>";
                echo "<td>{$fila['hora_sumada']}</td>";
                echo "<td>{$fila['tiempo_acumulado']}</td>";
                echo "<td>{$fila['comentario']}</td>";
                echo "<td>{$fila['estado']}</td>";
                echo "<td>{$fila['fecha_registro']}</td>";
                echo "</tr>";
                }
        ?>
      </tbody>
    </table>

<?php
require_once("layout/footer.php");


