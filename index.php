<?php 

require_once "controllers/template.controller.php";
require_once "controllers/enrutamiento.controller.php";
require_once "controllers/sesion.controller.php";
require_once "controllers/slider.controller.php";
require_once "controllers/funcionarioscontroller.php";

require_once "models/sesion.modelo.php";
require_once "models/slider.modelo.php";
require_once "models/funcionariosmodelo.php";

$template = new ControllerTemplate();
$template -> template();


?>