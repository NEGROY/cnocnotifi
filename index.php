<?php
require_once("config.php");
require_once("./controlador/controller.php");

if(isset($_GET['op'])):
    if(method_exists("modeloController",$_GET['op'])):
        modeloController::{$_GET['op']}();
    endif;
else:
    modeloController::pruebas(); 
endif;



/* if(isset($_GET['op'])) {
    //if(method_exists(modeloController,$_GET['op']))
        modeloController::{$_GET['op']}();
}else{
    modeloController::pruebas(); 
//endif;
} */


