<?php

require_once './Views/View.php';

/**
 * Class Description
 *
 * This class is used to display the Description page of the application.
 */
class DetailsProgram extends View
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
        View::addResourceFile("card.css");
        ?>

        <div class="flex-center">
            <div class="flex-center flex-column">
                <img class="picture" src="../../<?= PICTURE_RESSOURCES_PROGRAM . $program->__get("picture") ?>">
                <div class="flex-center">
                    <div class="descriptionProgram">
                        <h1 class="text-primary font-important"><?= $program->__get("name") ?></h1>
                        <h2 class="text-secondary">
                            <?= $program->__get("motif") ?><br>
                        </h2>
                        <h3 class="text-secondary">
                            Nombre d'exercices :
                            <?= count($program->__get("exercices")) ?><br>
                            Durée du programme :
                            <?= $program->getTotalDuration() ?> minutes
                        </h3>
                        <br>
                        <h2 class="text-weight text-secondary">
                            <?= $program->__get("description") ?>
                        </h2>
                    </div>
                </div>



                <div class="flex-center listCards">
                    <?php
                    foreach ($program->__get("exercices") as $exercise) {
                        $this->generateCard($exercise);
                    }
                    ?>
                </div>

                <div class="flex-center">
                    <a class="button buttonCallToAction" href="<?= APP_LINK ?>Contact"><?= $callToAction->__get("value") ?></a>
                </div>
            </div>
        </div>
        
        <?php
        require "./Views/Champs/Footer.php";
    }

    private function generateCard($exercise)
    {
        ?>
        <div class="card rounded-box">
            <img class="picture" src="../../<?= PICTURE_RESSOURCES_MACHINE . $exercise->__get("machine")->__get("picture") ?>">
            <h1 class="text-primary"><?= $exercise->__get("machine")->__get("name") ?></h1>
            <p class="text-secondary">
                Durée de l'exercice :
                <?= $exercise->__get("duration") ?> minutes<br>
                Temps de repos :
                <?= $exercise->__get("rest") ?> minutes<br>
                Nombre de séries :
                <?= $exercise->__get("repetition") ?>

            </p>
        </div>
        <?php
    }
}