<?php
    require_once("layout/header.php");
    //    var_dump($dato);
?>


  <div class="form-container">
    <h2>Enviar Mensaje</h2>
    <form action="procesar.php" method="POST">
      <label for="fechaHora">Fecha y hora:</label>
      <input type="datetime-local" id="fechaHora" name="fecha_hora" required>

      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>

      <label for="numero">Número de teléfono:</label>
      <input type="tel" id="numero" name="numero" pattern="[0-9]{8,15}" placeholder="Ej: 5551234567" required>

      <button type="submit">Enviar</button>
    </form>
  </div>


<?php
require_once("layout/footer.php");