<?php

require_once './Controllers/Controller.php';
require_once './Models/ModelParameter.php';
require_once './Models/ModelProgram.php';

/**
 * Class ControllerDescription
 *
 * This class is used to manage the Description page of the application.
 */
class ControllerDescription extends Controller
{
    public function __construct()
    {
        session_start();

        if (isset($GLOBALS['paramterUrl'])){
            $this->DetailsProgram();
        }else{
            $this->Description();
        }

    }

    private function Description()
    {
        $motivation = new ModelParameter('motivation');
        $programs = ModelProgram::getAll();
        $machines = ModelMachine::getAll();

        $Data = compact('motivation', 'programs', 'machines');

        $this::Render('Description', 'Description', $Data);
    }

    private function DetailsProgram()
    {
        if ($GLOBALS['paramterUrl'][0] == "program"){
            $program = new ModelProgram($GLOBALS['paramterUrl'][1]);
            if ($program->__get("id") != 0 && $program->__get("name") != ""){
                $callToAction = new ModelParameter('callToAction');
                $Data = compact('program', 'callToAction');
                $this::Render('DetailsProgram', $program->__get("name"), $Data);
            }else{
                
            }
        }
    }
}