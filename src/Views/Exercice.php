<?php

require_once './Views/View.php';
class Exercice extends View
{
    public function __construct($Data = [""])
    {
        extract($Data);
        require "./Views/Champs/Header.php";
        View::addResourceFile('input.css');
        View::addResourceFile('card.css');
        View::addResourceFile('admin.js');
        ?>
        <form class="ajaxForm buttonAffichePopup" data-entity="Exercice" data-type-action="info">
            <input type="hidden" name="typeAction" value="getCard">
            <button class="button buttonAdd" type="submit">Ajouter</button>
        </form>

        <div class="listCards" id="listCards"><?php
        foreach ($exercices as $exercie){
            echo $this->generateCard($exercie);
        }
        ?></div><?php
        require "./Views/Champs/Footer.php";
    }

    public static function generateCard($exercie){
        ob_start();
        ?>
        <div id="exercice<?= $exercie->__get("id") ?>">
            <?= self::contentCard($exercie) ?>
        </div>
        <?php
        return ob_get_clean();
    }

    public static function contentCard($exercie)
    {
        ob_start();
        ?>
        <div class="card rounded-box">

            <img src="<?= PICTURE_RESSOURCES_MACHINE . $exercie->__get("machine")->__get("picture") ?>">
            <h1 class="text-primary"><?= $exercie->__get("machine")->__get("name") ?></h1>
            <h3 class="text-secondary">
                <?= $exercie->__get("machine")->__get("type") ?><br>
                Durée : <?= $exercie->__get("duration") ?><br>
                Nombre de répétition : <?= $exercie->__get("repetition") ?><br>
                Temps de repos : <?= $exercie->__get("rest") ?>
            </h3>
            <div class="flex-center flex-wrap">
                <form class="ajaxForm" data-entity="Exercice" data-type-action="info">
                    <input type="hidden" name="typeAction" value="getCard">
                    <input type="hidden" name="id" value="<?= $exercie->__get("id") ?>">
                    <button class="button" type="submit">Voir</button>
                </form>
                <form class="ajaxForm" data-entity="Exercice" data-type-action="delete">
                    <input type="hidden" name="typeAction" value="delete">
                    <input type="hidden" name="id" value="<?= $exercie->__get("id") ?>">
                    <button class="button buttonDelete" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}