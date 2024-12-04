<?php

require_once './Controllers/Controller.php';
require_once './Models/ModelProgram.php';
require_once './Models/ModelConnexion.php';

/**
 * Class ControllerProgram
 *
 * This class is used to manage the program page of the application.
 */

class ControllerProgram extends Controller
{
    public function __construct()
    {
        session_start();
        ModelConnexion::ManageAccess();

        if (isset($_POST['ActionAjax'])) {
            $this::ActionJQuery();
        } else {
            $programs = ModelProgram::getAll();
            $Data = compact("programs");
            $this::Render('Program', 'Program', $Data);
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
                $exercise = ModelExercice::getAll();
                $program = new ModelProgram($id);
                $Data = compact("program" , "exercise");
                $this::DisplayPopup('CardProgram', $Data);
                break;
            case 'add':
                $program = new ModelProgram();
                $program->__set("name", $_POST['name']);
                $program->__set("motif", $_POST['motif']);
                $program->__set("description", $_POST['description']);
                
                $listExercice = $_POST['exercise'];

                $picture = $_FILES['picture'];
                $picName = $picture['name'];

                $program->__set("picture", $picName);

                $uploadFile = PICTURE_RESSOURCES_PROGRAM . basename($picName);

                if (move_uploaded_file($picture['tmp_name'], $uploadFile)) {
                    $program->add($listExercice);

                    require_once './Views/Program.php';
                    echo json_encode([
                        'status' => 'success',
                        'id' => $program->__get("id"),
                        'html' => htmlspecialchars_decode(Program::contentCard($program))
                    ]);
                }
                else {
                    $this::Message("Erreur", "Erreur lors de l'upload du fichier");
                }

                break;
            case 'update':
                $program = new ModelProgram();
                $program->__set("id", $_POST['id']);
                $program->__set("name", $_POST['name']);
                $program->__set("motif", $_POST['motif']);
                $program->__set("description", $_POST['description']);
                $program->__set("exercices", $program->getExercices());

                $newListExercice = $_POST['exercise'];

                $picture = $_FILES['picture'];
                $picName = $picture['name'];

                $program->__set("picture", $picName);

                $uploadFile = PICTURE_RESSOURCES_PROGRAM . basename($picName);

                if (move_uploaded_file($picture['tmp_name'], $uploadFile)) {
                    $program->update($newListExercice);

                    require_once './Views/Program.php';
                    echo json_encode([
                        'status' => 'success',
                        'id' => $program->__get("id"),
                        'html' => htmlspecialchars_decode(Program::contentCard($program))
                    ]);
                }else {
                    $this::Message("Erreur", "Erreur lors de l'upload du fichier");
                }

                break;
            case 'delete':
                $id = $_POST['id'];
                ModelProgram::delete($id);
                echo json_encode([
                    'status' => 'success',
                    'id' => $id
                ]);
                break;
        }
    }
}