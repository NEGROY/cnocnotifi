<?php
require_once("config.php");
require_once("./controlador/controller.php");

if(isset($_GET['op'])):
    if(method_exists("modeloController",$_GET['op'])):
        //echo "<h3>Función guardar() ejecutada correctamente</h3>".$_GET['op'];
        modeloController::{$_GET['op']}();
    endif;
else:
    //echo $_GET['op'];
    modeloController::nuevo(); 
endif;



/* if(isset($_GET['op'])) {
    //if(method_exists(modeloController,$_GET['op']))
        modeloController::{$_GET['op']}();
}else{
    modeloController::pruebas(); 
//endif;
} */


