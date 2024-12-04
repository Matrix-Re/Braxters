<?php

require_once './Views/View.php';

/**
 * Class Home
 *
 * This class is used to display the home page of the application.
 */
class Home extends View
{

    /**
     * Constructor of the class.
     *
     * @param array $Data The data for the home page display.
     */
     public function __construct($Data = [""])
     {
        extract($Data);
        require "./Views/Champs/Header.php";
        View::addResourceFile('home.css');
        View::addResourceFile('caroussel.js');
?>
         <div class="flex-center">
            <div class="mainContent flex-center flex-column">
                    <h1 class="phraseAccroche text-primary"><?= $phraseAccroche->__get('value') ?></h1>
                    <img class="picture" src="<?= PICTURE_RESSOURCES ?>atlas.avif">
                    <h2 class="text-weight description text-primary "><?= $description->__get('value') ?></h2>
                    <div class="carousel">
                        <div class="machines-images">
                            <?php
                            foreach ($machines as $machine) {
                                ?><img class="picture" src="<?= APP_LINK . PICTURE_RESSOURCES_MACHINE . $machine->__get('picture') ?>" width="200"><?php
                            }
                            ?>
                        </div>
                    </div>
            </div>
        </div>


<?php

    require "./Views/Champs/Footer.php";
    }
}
