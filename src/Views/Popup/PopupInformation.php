<?php 
// Gestion d'erreur
if (!isset($PopupTitle)) $PopupTitle = "";
if (!isset($PopupMessage)) $PopupMessage = "";
?>

<h3><?= $PopupTitle ?></h3>
<p><?= $PopupMessage ?></p>
<button onclick="closePopup()" class="buttonClosePopup">Fermer</button>