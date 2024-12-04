<?php

require_once './Views/View.php';

/**
 * Class TableauDeBord
 *
 * This class is used to display the dashboard in the application.
 */
class Dashboard extends View
{

    /**
     * Constructor of the class.
     *
     * @param array $Data The data for the dashboard display.
     */
    public function __construct($Data = [""])
    {
        extract($Data);
        View::addResourceFile('dashboard.css');
        View::addResourceFile('button.css');
        require "./Views/Champs/Header.php";

        ?>
        
        <div class="pannel">
            <div class="option flex-center">
                <?= View::GenerateButton("Programme", 'button buttonDashboard flex-center background-tertiary', 'Program', 'Program', 'Program'); ?>
            </div>
        
            <div class="option flex-center">
            <?= View::GenerateButton("Exercice", 'button buttonDashboard flex-center background-tertiary', 'Exercice', 'Exercice', 'Exercice'); ?>
            </div>

            <div class="option flex-center">
                <?= View::GenerateButton("Machine", 'button buttonDashboard flex-center background-tertiary', 'Machine', 'Machine', 'Machine'); ?>
            </div>

            <div class="option flex-center">
                <?= View::GenerateButton("Paramètre", 'button buttonDashboard flex-center background-tertiary', 'Parameter', 'Parameter', 'Parameter'); ?>
            </div>
        </div>
        
        <?php
        require "./Views/Champs/Footer.php";
    }
}
