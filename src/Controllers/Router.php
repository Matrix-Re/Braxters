<?php

/**
 * Executes an action and reloads the page.
 *
 * Depending on the POST variables, it either logs out the user or manages the deletion of QCMs.
 */
class Router{

     /**
     * Routes the request to the appropriate controller.
     */
     public function routeReq(){
          // Initialisation
          $url = isset($_GET['url']) ? explode('/', $_GET['url']) : ['Home'];

          // On récupère le paramètre url saisir après le nom de la page
          $parametre = $url;
          if(!empty($parametre[1])){
               array_shift($parametre);
               $GLOBALS['paramterUrl'] = $parametre;
          }

          // On défénit le controller à appeller
          $controller = ucfirst(strtolower($url[0]));
          $controllerFile = "Controller" . $controller;
          $controllerRepertory = "Controllers/" . $controllerFile . ".php";

          // Si le controller n'existe pas, on appelle le controller d'erreur
          if (!file_exists($controllerRepertory)){
              $controllerFile = "ControllerError";
              $controllerRepertory = "Controllers/ControllerError.php";
          }

          // On appelle le controller
          try {
             require($controllerRepertory);
             $MonController = new $controllerFile();
          }catch(Exception $e){
              echo "Erreur : " . $e->getMessage();
          }
     }

}