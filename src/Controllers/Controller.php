<?php

/**
 * Class Controller
 *
 * This class is used to manage views and popups in the application.
 */
abstract class Controller{

    /**
     * Render a view.
     *
     * @param string $NameView The name of the view to render.
     * @param string $NomPage The name of the page.
     * @param array $Data The data to pass to the view. Default is an empty array.
     */
    public static function Render($NameView, $NomPage, $Data = [""]){              
        if(file_exists("Views/$NameView.php"))
        {
            ob_start();
            $title = $NomPage;
            require "Views/$NameView.php";
            $View = new $NameView($Data);
            $content = ob_get_clean();
            require 'Views/layout.php';
        }else {
            require 'Views/NotFound.php';
        }                
    }

    /**
     * Render a view.
     *
     * @param string $NameView The name of the view to render.
     * @param string $NomPage The name of the page.
     * @param array $Data The data to pass to the view. Default is an empty array.
     */
    public static function Message($PopupTitle,$PopupMessage){
        ob_start();
        $typePopup = "popupInformation";
        require 'Views/Popup/PopupInformation.php';
        $PopupContent = ob_get_clean();
        require 'Views/Popup/ModalPopup.php';
    }

    /**
     * Display a popup.
     *
     * @param string $popupName The name of the popup to display.
     * @param array $Data (optional) Data to be passed to the popup.
     */
    public static function DisplayPopup($popupName,$Data = [""]){
        extract($Data);
        ob_start();
        $typePopup = "popupEdition";
        require "Views/Popup/$popupName.php";
        $PopupContent = ob_get_clean();
        require 'Views/Popup/ModalPopup.php';
    }
    
}
