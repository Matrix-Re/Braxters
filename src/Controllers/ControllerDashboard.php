<?php

require_once './Controllers/Controller.php';
require_once './Models/ModelConnexion.php';

class ControllerDashboard extends Controller
{
    public function __construct()
    {
        session_start();
        ModelConnexion::ManageAccess();

        $this->Action();

        $this::Render('Dashboard', 'Dashboard');
    }

    private function Action()
    {
        // Action
        // Déconnexion de l'application
        if (isset($_POST['Logout']) && isset($_SESSION['Connexion'])) {
            $_SESSION['Connexion']->Logout();
        }
    }
}