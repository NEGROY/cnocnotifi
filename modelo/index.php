<?php

class Modelo{
    //require_once '../bd/db_con.php';
    private $modelo;
    private $db;
    private $datos;
    
    public function __construct() {
        $hst = "65.109.88.87";  $port = 3306; $user = "pawsoyos_escalaciones";  $password = "Vmgvx~vgxn[(";  
        $database = "pawsoyos_escalaciones_no_eliminar"; 
        $this->modelo = array();
        $this->db = new PDO("mysql:host=$hst;port=$port;dbname=$database;charset=utf8", $user, $password);
        //$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8", $user, $password);
    }

    // funcion basica para insertar 
    public function insertar($tabla, $data) {
        // Validar que $data sea un arreglo asociativo
        if (!is_array($data) || empty($data)) {
            return false;
        }

        $columnas = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $tabla ($columnas) VALUES ($placeholders)";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $clave => $valor) {
            $stmt->bindValue(":$clave", $valor);
        }
        return $stmt->execute();
    }
 

    // FUNOION MOSTRAR IONFO 
    public function mostrar($tabla, $condicion){
        $consulta="select * from ".$tabla." where ".$condicion;
        $resu= $this->db->query($consulta);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)){
            $this->datos[]=$filas;
        }
            return $this->datos;
    }

    // tarer los mensajes 
    public function obtenerMensajes() {
        $sql = "SELECT * FROM mensajes ORDER BY fecha_envio DESC";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // PARA ELIMINAR  LOS MENSAJES 
    public function eliminar($tabla, $id) {
        // Validar entrada
        if (empty($tabla) || empty($id)) {
            return false;
        }
        try {
            // Preparar y ejecutar sentencia SQL segura
            //$sql = "DELETE FROM `$tabla` WHERE id = :id";
            $sql = "UPDATE $tabla SET nombre = 1 WHERE id = $id";
            $stmt = $this->db->prepare($sql);
            //$stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            // Opcional: puedes guar dar el error en logs
            return false;
        }
    }


}