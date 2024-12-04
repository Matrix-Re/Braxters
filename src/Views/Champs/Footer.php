<?php

require_once '././Models/ModelParameter.php';

View::addResourceFile("footer.css");

$mail = new ModelParameter('mail');
$tel = new ModelParameter('tel');
$address = new ModelParameter('address');
$facebook = new ModelParameter('facebook');
$instagram = new ModelParameter('instagram');
$twitter_x = new ModelParameter('twitter_x');
$followSocialMedia = new ModelParameter('followSocialMedia');

?>
<footer class="background-secondary">
    <div class="socialMedia flex-center background-tertiary">
        <p><?= $followSocialMedia->__get('value') ?></p>
        <div class="socialLink flex-center">
            <a href="<?= $facebook->__get('value') ?>"><img src="<?= APP_LINK . PICTURE_RESSOURCES ?>facebook.svg" alt="Facebook"></a>
            <a href="<?= $twitter_x->__get('value') ?>"><img src="<?= APP_LINK .PICTURE_RESSOURCES ?>twitter_x.svg" alt="Twitter"></a>
            <a href="<?= $instagram->__get('value') ?>"><img src="<?= APP_LINK .PICTURE_RESSOURCES ?>instagram.svg" alt="Instagram"></a>
        </div>        
    </div>

    <div class="flex-center infoSection">
        <div class="Plan_du_site flex-center flex-column">
            <h3>
                Plan du site
                <div class="dashPlanSite"></div>
            </h3>
            
            <ul>
                <li><a href="<?= APP_LINK . "Home" ?>">Accueil</a></li>
                <li><a href="<?= APP_LINK . "Description" ?>">Description</a></li>
                <li><a href="<?= APP_LINK . "Contact" ?>">Contact</a></li>
            </ul>            
        </div>
        <div class="contactFooter flex-center flex-column">
            <h3>
                Contactez-nous
                <div class="dashContact"></div>
            </h3>
            <p class="flex-center"><img src="<?= APP_LINK .PICTURE_RESSOURCES ?>mail.svg">&nbsp;<?= $mail->__get('value') ?></p>
            <p class="flex-center"><img src="<?= APP_LINK .PICTURE_RESSOURCES ?>phone.svg">&nbsp;<?= $tel->__get('value') ?></p>
            <p class="flex-center"><img src="<?= APP_LINK .PICTURE_RESSOURCES ?>adress.svg">&nbsp;<?= $address->__get('value') ?></p>
        </div>
    </div>

    <div class="legalNotices flex-center text-primary background-primary">
        <p>© 2024 - Tous droits réservés - Anas AMIRI</p>
    </div>

</footer>