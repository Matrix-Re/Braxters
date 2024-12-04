<?php

require_once './Views/View.php';

/**
 * Class Home
 *
 * This class is used to display the home page of the application.
 */
class NotFound extends View
{

    /**
     * Constructor of the class.
     *
     * @param array $Data The data for the home page display.
     */
    public function __construct($Data = [""])
    {
        extract($Data);
        View::addResourceFile('button.css');
        ?>
        <div class="infoError">
            <h2>Erreur 404</h2>
            <p>La page demandée n'existe pas.</p>
            <?php $this->GenerateButton("Retour à l'accueil", 'button buttonMenu', APP_LINK, 'Accueil', 'Accueil'); ?>
        </div>
        <?php


    }
}
