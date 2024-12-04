<html lang="FR">

<head>
     <meta charset="utf-8" />
     <title><?= $title ?></title>
     <link rel="icon" type="image/x-icon" href="<?= APP_LINK . PICTURE_RESSOURCES ?>favicon.svg">
     <!-- RESSOURCES DU SITE -->
     <link href="<?=APP_LINK?>/Views/CSS/style.css" rel="stylesheet">
     <link href="<?=APP_LINK?>/Views/CSS/print.css" rel="stylesheet" media="print">

    <?php
    if (isset($GLOBALS['ressourcesFile'])){
        foreach ($GLOBALS['ressourcesFile']['css'] as $value) {

            echo "<link href='" . $cssFile = APP_LINK . CSS_RESSOURCES . $value . "' rel='stylesheet'>" . "\n";
        }
    }
    ?>
        <!-- FIN RESSOURCES DU SITE -->
</head>

<body class="background-primary">

    <?= $content ?>

    <script src="<?=APP_LINK?>Views/JS/outils.js"></script>
    <?php
    if (isset($GLOBALS['ressourcesFile'])){
        foreach ($GLOBALS['ressourcesFile']['js'] as $value) {
            echo "<script src='" . $jsFile = APP_LINK . JS_RESSOURCES . $value . "'></script>" . "\n";
        }
    }
    ?>

</body>

</html>