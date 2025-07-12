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

    //guardar desde el form 
    static function guardar() {
        $fecha_hora_raw = trim($_REQUEST['fecha_hora'] ?? '');
        $mensaje        = trim($_REQUEST['mensaje'] ?? '');
        $numero_raw     = preg_replace('/\s+/', '', $_REQUEST['numero'] ?? '');

        //return $numero_raw ;

        // Validar número
        if (!preg_match('/^(502|506)[0-9]{5,}$/', $numero_raw)) {
            die("Número inválido. Debe comenzar con 502 o 506 y tener al menos 8 dígitos.");
        }

        // Validar y formatear fecha
        $fecha_obj = DateTime::createFromFormat('Y-m-d\TH:i', $fecha_hora_raw);
        if (!$fecha_obj) {
            die("Formato de fecha y hora inválido.");
        }
        $fecha_formateada = $fecha_obj->format('Y-m-d H:i:s');

        // Datos a insertar
        $data = [
            'nombre'      => '0', // Cambia si tienes un input nombre
            'telefono'    => $numero_raw,
            'mensaje'     => $mensaje,
            'fecha_envio' => $fecha_formateada
        ];

        // Insertar
        $producto = new Modelo();
        $resultado = $producto->insertar("mensajes", $data);

        if ($resultado) {
            header('Location: ' . urlsite); // Redirige correctamente
            exit();
        } else {
            echo "Error al guardar el mensaje.";
        }
    }

}