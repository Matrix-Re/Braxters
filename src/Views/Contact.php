<?php

require_once './Views/View.php';

/**
 * Class Contact
 *
 * This class is used to display the Contact page of the application.
 */
class Contact extends View
{
    /**
     * Constructor of the class.
     *
     * @param array $Data The data for the Contact page display.
     */
    public function __construct($Data = [""])
    {
        extract($Data);

        View::addResourceFile('input.css');
        View::addResourceFile('login.js');
        View::addResourceFile('contact.css');

        require "./Views/Champs/Header.php";
        ?>

        <div class="contactBox flex-center">

            <div class="infoContact flex-center flex-column background-tertiary">
                <h1>Contactez nous</h1>
                <div>
                    <p class="flex-center"><img src="<?= PICTURE_RESSOURCES ?>mail.svg">&nbsp;<?= $mail->__get('value') ?></p>
                    <p class="flex-center"><img src="<?= PICTURE_RESSOURCES ?>phone.svg"><?= $tel->__get('value') ?></p>
                    <p class="flex-center"><img src="<?= PICTURE_RESSOURCES ?>adress.svg"><?= $address->__get('value') ?></p>
                </div>
            </div>

            <div class="contactForm background-secondary flex-center flex-column">
                <h2>Deviens un Brax Warriors !!!</h2>
                <form class="flex-center flex-column" action="" method="post">
                    <input type="text" name="firstname" placeholder="Nom de guerrier" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="subject" placeholder="Sujet" required>
                    <textarea name="message" placeholder="Message" required></textarea>
                    <input type="submit" value="Envoyer">
            </div>            

        </div>

        <?php
        require "./Views/Champs/Footer.php";
    }
}