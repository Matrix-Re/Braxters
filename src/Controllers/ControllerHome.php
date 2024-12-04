<?php

require_once './Controllers/Controller.php';
require_once './Models/ModelParameter.php';
require_once './Models/ModelMachine.php';

/**
 * Class ControllerHome
 *
 * This class is used to manage the home page of the application.
 */
class ControllerHome extends Controller
{

     /**
     * Constructor of the class.
     *
     * Starts the session and checks if the user is connected.
     * Depending on the 'ActionAjax' POST variable, it either executes actions and renders a view,
     * or it executes jQuery actions.
     */
     public function __construct()
     {
          session_start();

          $phraseAccroche = new ModelParameter('phraseAccroche');
          $description = new ModelParameter('description');
          $machines = ModelMachine::getAll();

          $Data = compact('phraseAccroche', 'description', 'machines');

          $this::Render('Home', 'Accueil', $Data);
     }

     /**
     * Executes jQuery actions.
     */
     private function ActionJQuery()
     {
     }

     /**
     * Executes an action and reloads the page.
     *
     * Depending on the POST variables, it either logs out the user or manages the home page.
     */
     private function Action()
     {

     }
}
