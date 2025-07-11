<?php
$host = "65.109.88.87";
$port = 3306;
$user = "pawsoyos_escalaciones";
$password = "Vmgvx~vgxn[(";
$database = "pawsoyos_escalaciones_no_eliminar";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
