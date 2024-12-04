<?php

require_once './Views/View.php';

/**
 * Class Description
 *
 * This class is used to display the Description page of the application.
 */
class Description extends View
{
    /**
     * Constructor of the class.
     *
     * @param array $Data The data for the Description page display.
     */
    public function __construct($Data = [""])
    {
        extract($Data);
        require "./Views/Champs/Header.php";
        View::addResourceFile('card.css');
        ?>

        <div class="flex-center">
        <h3 class="descriptionProgram flex-center text-primary"><?= $motivation->__get("value") ?></h3>
        </div>
        <br>
        <h1 class="flex-center text-primary">Nos programmes</h1>

        <div class="listCards">
            <?php
            foreach ($programs as $program) {
                $this->gererateCardProgram($program);
            }
            ?>
        </div>

        <h1 class="flex-center text-primary">Nos machines</h1>

        <div class="listCards">
            <?php
            foreach ($machines as $machine) {
                $this->generateCardMachine($machine);
            }
            ?>
        </div>
        
        <?php
        require "./Views/Champs/Footer.php";
    }

    public function gererateCardProgram($program){
        ?>
        <a href="Description/program/<?= $program->__get("id") ?>">
            <div class="card rounded-box">
                <img src="<?= PICTURE_RESSOURCES_PROGRAM . $program->__get("picture") ?>">
                <h1 class="text-primary"><?= $program->__get("name") ?></h1>
                <h3 class="text-secondary"><?= $program->__get("motif") ?></h3>

                <p class="text-secondary">
                    Nombre d'exercices :
                    <?= count($program->__get("exercices")) ?><br>
                    Durée du programme :
                    <?= $program->getTotalDuration() ?> minutes
                </p>
                <button class="button" href="Description/program/<?= $program->__get("id") ?>">Voir le programme</button>
            </div>
        </a>
        <?php
    }

    public function generateCardMachine($machine)
    {
        ?>
        <div class="card rounded-box">
            <img src="<?= PICTURE_RESSOURCES_MACHINE . $machine->__get("picture") ?>">
            <h1 class="text-primary"><?= $machine->__get("name") ?></h1>
            <h3 class="text-secondary"><?= $machine->__get("type") ?></h3>
        </div>
        <?php
    }
}