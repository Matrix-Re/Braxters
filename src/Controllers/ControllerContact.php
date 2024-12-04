<?php

require_once './Controllers/Controller.php';
require_once './Models/ModelParameter.php';

/**
 * Class ControllerContact
 *
 * This class is used to manage the Contact page of the application.
 */
class ControllerContact extends Controller
{
    public function __construct()
    {
        session_start();

        $mail = new ModelParameter('mail');
        $tel = new ModelParameter('tel');
        $address = new ModelParameter('address');

        $Data = compact("mail", "tel", "address");

        $this::Render('Contact', 'Contact', $Data);
    }
}