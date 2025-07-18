<?php
    require_once("layout/header.php");
    //    var_dump($dato);
    date_default_timezone_set('America/Guatemala');
    $fecha_actual = date('Y-m-d\TH:i'); 
?>


 <div class="container">
    
    <!-- Lado izquierdo: Formulario -->
    <div class="form-container">
      <h2>Enviar Mensaje</h2>
      <form action="?op=guardar" method="POST">
        <label for="fechaHora">Fecha y hora:</label>
        <input type="datetime-local" id="fechaHora" name="fecha_hora" value="<?=$fecha_actual?>" required>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>

        <label for="numero">Número de teléfono:</label>
        <input type="tel" id="numero" name="numero" pattern="[0-9]{8,15}" placeholder="Ej: 5551234567" required>

        <button type="submit" class="btn" name="btn" value="guardar">Enviar</button>
        <button hidden name="op" value="guardar">Enviar</button>
      </form>
    </div>

    <!-- Lado derecho: Mensajes desde la BD -->
    <div class="mensajes-container">
      <?php if (!empty($dato[0])): ?>
        <?php foreach ($dato[0] as $fila):?>
          <div class="mensaje">
            <strong>Fecha:</strong> <?= htmlspecialchars($fila['fecha_envio']) ?><br>
            <strong>Número:</strong> <?= htmlspecialchars($fila['telefono']) ?><br>
            <strong>Mensaje:</strong> <?= nl2br(htmlspecialchars($fila['mensaje'])) ?>
              <!-- Botón Eliminar -->
            <form action="?op=eliminar" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este mensaje?');">
              <!--   fila trae un campo 'id' -->
              <input type="hidden" name="id" value="<?= htmlspecialchars($fila['id']) ?>">
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No hay mensajes aún.</p>
      <?php endif; ?>
    </div>

  </div>


<?php
//require_once("layout/footer.php");