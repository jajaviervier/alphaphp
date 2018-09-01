<?php 

require_once "controllers/template.controller.php";
require_once "controllers/enrutamiento.controller.php";
require_once "controllers/sesion.controller.php";
require_once "controllers/funcionarios.controller.php";
require_once "controllers/armas.controller.php";
require_once "controllers/cascos.controller.php";

require_once "controllers/escudos.controller.php";


require_once "models/sesion.modelo.php";
require_once "models/funcionarios.modelo.php";
require_once "models/armas.modelo.php";
require_once "models/cascos.modelo.php";
require_once "models/escudos.modelo.php";

$template = new ControllerTemplate();
$template -> template();


?>