<?php

/**
 * Class View
 *
 * This class is used to generate buttons in the application.
 */
abstract class View
{

    /**
     * Generate a button.
     *
     * @param string $Libellé The label of the button.
     * @param string $Style The style of the button.
     * @param string $Link The link of the button. Default is an empty string.
     * @param string $ID The ID of the button. Default is an empty string.
     * @param string $Name The name of the button. Default is an empty string.
     */
    public static function GenerateButton($Libellé = "", $Style = "button", $Link = "", $ID = "", $Name = "", $isForm = false){
        if ($isForm) {
            echo "<form method='POST'>
            <button type='submit' class='$Style' id='$ID' value='$ID' name='$Name'>$Libellé</button>
            </form>";
        } else { 
            echo "<a class='$Style' href='$Link' id='$ID'>$Libellé</a>";
        }
    }

    /**
     * Generate the ressources files.    
     * @param string $fileName The name of the file to add.
     */
    public static function addResourceFile($fileName) {
        // Vérifie si la variable globale 'ressourcesFile' est initialisée
        if (!isset($GLOBALS['ressourcesFile'])) {
            $GLOBALS['ressourcesFile'] = [];
        }
    
        // Vérifie si le fichier est déjà dans la liste
        if (!in_array($fileName, $GLOBALS['ressourcesFile'])) {

            // Vérifie si le fichier est un fichier CSS
            $cssFile = CSS_RESSOURCES . $fileName;

            if (file_exists($cssFile)) {
                $GLOBALS['ressourcesFile']['css'][] = $fileName;
                return;
            }

            // Vérifie si le fichier est un fichier JS
            $jsFile = JS_RESSOURCES . $fileName;
            if (file_exists($jsFile)) {
                $GLOBALS['ressourcesFile']['js'][] = $fileName;
                return;
            }
        }
    }
    

}

?>