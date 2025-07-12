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
      <form action=" " method="POST">
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
      <h2>Mensajes</h2>

      <!-- Estructura ejemplo de mensaje -->
      <div class="mensaje">
        <strong>Fecha:</strong> 2025-07-12 18:30<br>
        <strong>Número:</strong> 50255512345<br>
        <strong>Mensaje:</strong> Hola, este es un mensaje de prueba.
      </div>

      <!-- Puedes repetir este bloque por cada mensaje en PHP con un foreach -->
    </div>

  </div>


<?php
require_once("layout/footer.php");