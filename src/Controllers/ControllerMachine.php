<?php

require_once './Controllers/Controller.php';
require_once './Models/ModelMachine.php';
require_once './Models/ModelConnexion.php';

/**
 * Class ControllerMachine
 *
 * This class is used to manage the machine configuration page of the application.
 */
class ControllerMachine extends Controller
{
    public function __construct()
    {
        session_start();
        ModelConnexion::ManageAccess();

        if (isset($_POST['ActionAjax'])) {
            $this::ActionJQuery();
        }else{
            $machines = ModelMachine::getAll();
            $Data = compact("machines");
            $this::Render('Machine', 'Machine', $Data);
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
                $machine = new ModelMachine($id);
                $Data = compact("machine");
                $this::DisplayPopup('CardMachine', $Data);
                break;
            case 'add':
                $machine = new ModelMachine();
                $machine->__set("name", $_POST['name']);
                $machine->__set("type", $_POST['type']);
                $picture = $_FILES['picture'];
                $picName = $picture['name'];
                $machine->__set("picture", $picName);

                $uploadFile = PICTURE_RESSOURCES_MACHINE . basename($picName);
                if (move_uploaded_file($picture['tmp_name'], $uploadFile)) {
                    ModelMachine::add($machine);
                    $machine = ModelMachine::getLast();
                    require_once './Views/Machine.php';
                    echo json_encode([
                        'status' => 'success',
                        'id' => $machine->__get("id"),
                        'html' => htmlspecialchars_decode(Machine::generateCard($machine))
                    ]);
                } else {
                    $this::Message("Erreur", "Erreur lors de l'upload du fichier");
                }

                break;
            case 'update':
                $id = $_POST['id'];
                $name = $_POST['name'];
                $type = $_POST['type'];
                $picture = $_FILES['picture'];
                $picName = $picture['name'];

                $uploadFile = PICTURE_RESSOURCES_MACHINE . basename($picName);

                if (move_uploaded_file($picture['tmp_name'], $uploadFile)) {
                    ModelMachine::update($id, $name, $type, $picName);
                    $machine = new ModelMachine();
                    $machine->__set("id", $id);
                    $machine->__set("name", $name);
                    $machine->__set("type", $type);
                    $machine->__set("picture", $picName);

                    require_once './Views/Machine.php';
                    echo json_encode([
                        'status' => 'success',
                        'id' => $id,
                        'html' => htmlspecialchars_decode(Machine::contentCard($machine))
                    ]);


                } else {
                    $this::Message("Erreur", "Erreur lors de l'upload du fichier");
                }

                break;
            case 'delete':
                $id = $_POST['id'];
                ModelMachine::delete($id);
                echo json_encode([
                    'status' => 'success',
                    'id' => $id
                ]);
                break;
        }
    }
}