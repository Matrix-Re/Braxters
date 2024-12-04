<?php

require_once './Views/View.php';

/**
 * Class Machine
 *
 * This class is used to display the Machine form of the application.
 */
Class Machine extends View{

    /**
     * Constructor of the class.
     */
    public function __construct($Data = [""])
    {
        extract($Data);
        require "./Views/Champs/Header.php";
        View::addResourceFile('input.css');
        View::addResourceFile('card.css');
        View::addResourceFile('admin.js');

        ?>
        <form class="ajaxForm buttonAffichePopup" data-entity="Machine" data-type-action="info">
            <input type="hidden" name="typeAction" value="getCard">
            <button class="button buttonAdd" type="submit">Ajouter une machine</button>
        </form>

        <div class="listCards" id="listCards"><?php
            foreach ($machines as $machine){
                echo $this->generateCard($machine);
            }
        ?></div><?php
        require "./Views/Champs/Footer.php";
    }

    public static function generateCard($machine){
        ob_start();
        ?>
        <div id="machine<?= $machine->__get("id") ?>">
            <?= self::contentCard($machine) ?>
        </div>
        <?php
        return ob_get_clean();
    }

    public static function contentCard($machine){
        ob_start();
        ?>
        <div class="card rounded-box">
            <img src="<?= PICTURE_RESSOURCES_MACHINE . $machine->__get("picture") ?>">
            <h1 class="text-primary"><?= $machine->__get("name") ?></h1>
            <h3 class="text-secondary"><?= $machine->__get("type") ?></h3>
            <div class="flex-center flex-wrap">
                <form class="ajaxForm" data-entity="Machine" data-type-action="info">
                    <input type="hidden" name="typeAction" value="getCard">
                    <input type="hidden" name="id" value="<?= $machine->__get("id") ?>">
                    <button class="button" type="submit">Voir</button>
                </form>
                <form class="ajaxForm" data-entity="Machine" data-type-action="info">
                    <input type="hidden" name="typeAction" value="delete">
                    <input type="hidden" name="id" value="<?= $machine->__get("id") ?>">
                    <button class="button buttonDelete" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}