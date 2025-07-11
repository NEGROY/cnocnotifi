<?php

require_once("./modelo/index.php");

class modeloController{
    private $model;
    
    public function __construct(){
    $this->model = new Modelo();

    }

    // Mostrar 
    static function pruebas(){
        $producto = new Modelo();
        $dato     = $producto->mostrar('tb_escalaciones_registro', 'estado = 1');
        require_once("./vista/index.php");
    }

    // NUEVO OP  
    static function nuevo(){
        require_once("./vista/nuevo.php");
    }


}