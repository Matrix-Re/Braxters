<?php

require_once './Controllers/Controller.php';

class ControllerError extends Controller
{
    public function __construct()
    {
        session_start();
        $this::Render('NotFound', 'Erreur 404');
    }
}