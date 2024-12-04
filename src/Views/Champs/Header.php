<?php

require_once '././Models/ModelConnexion.php';

View::addResourceFile("header.css");
View::addResourceFile("button.css");
View::addResourceFile("header.js");

?>
<!-- NAVIGATION -->
<header class="headerMenu">

    <div class="burgerMenu">
        <div id="burgerMenuButton">
            <img src="<?= APP_LINK . PICTURE_RESSOURCES ?>burgerMenu.svg" class="burgerMenuIcon">
        </div>
        <h1 class="appNameMenuText"><?= APP_NAME ?></h1>
    </div>

    <nav class="menu" id="menu">
        <?php View::GenerateButton(APP_NAME, 'button buttonTitle', APP_LINK . 'Home', 'Accueil', 'Accueil'); ?>

        <div class="listPage">
            <?php View::GenerateButton("Accueil", 'button buttonMenu', APP_LINK . 'Home', 'Accueil', 'Accueil'); ?>
    
            <?php View::GenerateButton("Description", 'button buttonMenu', APP_LINK . 'Description', 'Accueil', 'Accueil'); ?>
     
            <?php View::GenerateButton("Contact", 'button buttonMenu', APP_LINK . 'Contact', 'Accueil', 'Accueil'); ?>
        </div>

        <?php
        if (!ModelConnexion::IsConnected()){
            View::GenerateButton("Connexion", 'button buttonMenu test', APP_LINK.'Login', 'Login', 'Login');
        }
        else{        
            if (ltrim($_SERVER['REQUEST_URI'], '/') == 'Dashboard'){
                View::GenerateButton("Déconnexion", 'button buttonMenu', APP_LINK.'Logout', 'Logout', 'Logout', true);
            }else{
                View::GenerateButton("Dashboard", 'button buttonMenu', APP_LINK.'Dashboard', 'Dashboard', 'Dashboard');
            }
        }
        ?>

    </nav>
</header>