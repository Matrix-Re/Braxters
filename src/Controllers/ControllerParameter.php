<?php

require_once './Controllers/Controller.php';
require_once './Models/ModelParameter.php';
require_once './Models/ModelConnexion.php';

/**
 * Class ControllerHome
 *
 * This class is used to manage the parameter of the application.
 */
class ControllerParameter extends Controller
{
    public function __construct()
    {
        session_start();
        ModelConnexion::ManageAccess();

        if (isset($_POST['ActionAjax'])) {
            $this::ActionJQuery();
        } else {
            $parametres = ModelParameter::getAll();

            $Data = compact("parametres");

            $this::Render('Parameter', 'Parameter', $Data);
        }

    }

    private function ActionJQuery()
    {
        $id = $_POST['id'];
        $newValue = $_POST['newValue'];

        $parametre = new ModelParameter();
        $parametre->id = $id;
        $parametre->value = $newValue;

        $parametre->updateValue();
        Controller::Message("Information", "Paramètre mis à jour avec succès.");
    }
}