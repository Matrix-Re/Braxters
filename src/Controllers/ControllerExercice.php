<?php

require_once './Controllers/Controller.php';
require_once './Models/ModelExercice.php';
require_once './Models/ModelConnexion.php';

/**
 * Class ControllerExercice
 *
 * This class is used to manage the exercice page of the application.
 */

class ControllerExercice extends Controller
{
    public function __construct()
    {
        session_start();
        ModelConnexion::ManageAccess();

        if (isset($_POST['ActionAjax'])) {
            $this::ActionJQuery();
        } else {
            $exercices = ModelExercice::getAll();
            $Data = compact("exercices");
            $this::Render('Exercice', 'Exercice', $Data);
        }
    }

    private function ActionJQuery()
    {
        $typeAction = $_POST['typeAction'];

        switch ($typeAction) {
            case 'getCard':
                if (isset($_POST['id']))
                    $id = $_POST['id'];
                else
                    $id = 0;
                $exercice = new ModelExercice($id);
                $machines = ModelMachine::getAll();
                $Data = compact("exercice", "machines");
                $this::DisplayPopup('CardExercice', $Data);
                break;
            case 'add':
                $exercice = new ModelExercice();
                $exercice->__set("id", $_POST['id']);
                $exercice->__set("duration", $_POST['duration']);
                $exercice->__set("repetition", $_POST['repetition']);
                $exercice->__set("rest", $_POST['rest']);

                $machine = new ModelMachine();
                $machine->__set("id", $_POST['id_machine']);
                $exercice->__set("machine", $machine);

                $exercice->add();

                require_once './Views/Exercice.php';
                echo json_encode([
                    'status' => 'success',
                    'id' => $exercice->__get("id"),
                    'html' => htmlspecialchars_decode(Exercice::contentCard($exercice))
                ]);
                break;
            case 'update':
                $exercice = new ModelExercice();
                $exercice->__set("id", $_POST['id']);
                $exercice->__set("duration", $_POST['duration']);
                $exercice->__set("repetition", $_POST['repetition']);
                $exercice->__set("rest", $_POST['rest']);

                $machine = new ModelMachine();
                $machine->__set("id", $_POST['id_machine']);
                $exercice->__set("machine", $machine);

                $exercice->update();

                require_once './Views/Exercice.php';
                echo json_encode([
                    'status' => 'success',
                    'id' => $exercice->__get("id"),
                    'html' => htmlspecialchars_decode(Exercice::contentCard($exercice))
                ]);
                break;
            case 'delete':
                $id = $_POST['id'];
                ModelExercice::delete($id);
                echo json_encode([
                    'status' => 'success',
                    'id' => $id
                ]);
                break;
        }
    }

}