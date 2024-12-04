<?php

require_once './Views/View.php';

class Program extends View
{
    public function __construct($Data = [""])
    {
        extract($Data);
        require "./Views/Champs/Header.php";
        View::addResourceFile('input.css');
        View::addResourceFile('card.css');
        View::addResourceFile('admin.js');

        ?>
        <form class="ajaxForm buttonAffichePopup" data-entity="Program" data-type-action="info">
            <input type="hidden" name="typeAction" value="getCard">
            <button class="button buttonAdd" type="submit">Ajouter</button>
        </form>

        <div class="listCards" id="listCards"><?php
        foreach ($programs as $program){
            echo $this->generateCard($program);
        }
        ?></div><?php
        require "./Views/Champs/Footer.php";
    }

    public static function generateCard($program){
        ob_start();
        ?>
        <div id="program<?= $program->__get("id") ?>">
            <?= self::contentCard($program) ?>
        </div>
        <?php
        return ob_get_clean();
    }

    public static function contentCard($program){
        ob_start();
        ?>
        <div class="card rounded-box">
            <img src="<?= PICTURE_RESSOURCES_PROGRAM . $program->__get("picture") ?>">
            <h1 class="text-primary"><?= $program->__get("name") ?></h1>
            <div class="flex-center flex-wrap">
                <form class="ajaxForm" data-entity="Program" data-type-action="info">
                    <input type="hidden" name="typeAction" value="getCard">
                    <input type="hidden" name="id" value="<?= $program->__get("id") ?>">
                    <button class="button" type="submit">Voir</button>
                </form>
                <form class="ajaxForm" data-entity="Program" data-type-action="delete">
                    <input type="hidden" name="typeAction" value="delete">
                    <input type="hidden" name="id" value="<?= $program->__get("id") ?>">
                    <button class="button buttonDelete" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}