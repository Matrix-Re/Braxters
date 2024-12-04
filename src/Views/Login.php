<?php

require_once './Views/View.php';

/**
 * Class Login
 *
 * This class is used to display the login form of the application.
 */
Class Login extends View{

    /**
     * Constructor of the class.
     */
    public function __construct()
    {
        View::addResourceFile('input.css');
        View::addResourceFile('login.js');

        ?>
        <div class="containerForm flex-center viewport-full">
            <div class="loginForm flex-grid rounded-box">
                <h3 class="text-primary flex-center">Login :</h3>

                <form class="flex-center flex-column" id="ajaxForm" method="POST">
                    <input type="text" class="ConnexionInput" name="Username" placeholder="Username"><br>

                    <input type="text" class="ConnexionInput" name="Password" placeholder="Mot de passe"><br>

                    <input type="submit" class="buttonForm" value="Se connecter"><br>

                    <b class="text-primary">Vous devez obligatoirement saisir un login et mot de passe pour entrer sur l'interface d'administration.</b>

                </form>

            </div>
        </div>
        <?php
    }

}