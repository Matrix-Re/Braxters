<?php
// On définit les constantes de l'application
define('APP_NAME', "Braxters");

define('APP_LINK', "http://" . APP_NAME . "/");
//define('APP_LINK', "https://" . APP_NAME . ".alwaysdata.net/");

define('CSS_RESSOURCES', 'Views/CSS/');
define('JS_RESSOURCES', 'Views/JS/');
define('PICTURE_RESSOURCES', 'Views/Picture/UI/');
define('PICTURE_RESSOURCES_MACHINE', 'Views/Picture/Machine/');
define('PICTURE_RESSOURCES_PROGRAM', 'Views/Picture/Programme/');

require './Controllers/Router.php';

$routeur = new Router();
$routeur->routeReq();