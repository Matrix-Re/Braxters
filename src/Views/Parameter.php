<?php

require_once './Views/View.php';

/**
 * Class Parameter
 *
 * This class is used to display the Parameter form of the application.
 */
Class Parameter extends View{

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

        ?><div class="listCards flex-wrap"><?php
            foreach ($parametres as $parametre) {
                $this->genereateForm($parametre);
            }
        ?></div><?php
        require "./Views/Champs/Footer.php";
    }

    public function genereateForm($parametre){
        ?>
        <div class="card rounded-box parameter-box">
            <form class="ajaxForm flex-column" method="post" data-entity="Parameter" data-type-action="update">

                <h1 class="text-primary"><?php echo $parametre->name; ?></h1>
                <input type="hidden" name="id" value="<?php echo $parametre->id; ?>">
                <textarea name="newValue"><?php echo $parametre->value; ?></textarea>
                <button class="button" type="submit" class="buttonForm">Se connecter</button><br>

            </form>
        </div>


        <?php
    }
    
}