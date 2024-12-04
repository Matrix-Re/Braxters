<?php

require_once './Controllers/Controller.php';
require_once './Models/ModelConnexion.php';

/**
 * Class ControllerHome
 *
 * This class is used to manage the login page of the application.
 */
class ControllerLogin extends Controller
{
    public function __construct()
    {
        session_start();

        if (isset($_POST['ActionAjax'])) {
            $this::ActionJQuery();
        } else {
            $this::Render('Login', 'Login');
        }
    }

    /**
     * Executes jQuery actions.
     */
    private function ActionJQuery()
    {
        $AccesGranted = false;
        $_SESSION['Connexion'] = new ModelConnexion();

        if (isset($_POST['Username']) && isset($_POST['Password'])) {
            $AccesGranted = $_SESSION['Connexion']->Login($_POST['Username'],$_POST['Password']);
        }
        
        if ($AccesGranted) {
            echo json_encode(array("Status" => "Approuved", "Link" => APP_LINK."Dashboard"));
        }else{
            $_SESSION['Connexion'] = null;
            Controller::Message("Information", "Les identifiants sont incorrects.");
        }
    }
}