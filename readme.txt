// bd_tabla a crear

CREATE TABLE mensajes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  telefono VARCHAR(20),
  mensaje TEXT,
  fecha_envio DATETIME DEFAULT CURRENT_TIMESTAMP
);

// 
| Tarea                           | Estado |
| ------------------------------- | ------ |
| Entorno local listo (PHP + BD)  | ⬜      |
| Carpeta base con estructura MVC | ⬜      |
| `.htaccess` para URL amigables  | ⬜      |
| Base de datos y tabla creada    | ⬜      |
| Configuración de conexión PDO   | ⬜      |
| Vista con formulario HTML       | ⬜      |
| Controlador funcional           | ⬜      |
| Modelo que guarda el mensaje    | ⬜      |
