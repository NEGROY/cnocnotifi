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
    public function insertar($tabla, $data){
        $consulta = 'insert into...'.$tabla.' values ('.$data.')';
        $resultado = $this->db->query($consulta);
        if ($resultado){
            return true;
        } else{ return false; }
    }

    //public function eliminar(){}

    // FUNOION MOSTRAR IONFO 
    public function mostrar($tabla, $condicion){
        $consulta="select * from ".$tabla." where ".$condicion;
        $resu= $this->db->query($consulta);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)){
            $this->datos[]=$filas;
        }
            return $this->datos;
    }


}