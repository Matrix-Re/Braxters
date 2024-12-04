<?php

require_once './Models/Model.php';

/**
 * Class ModelConnexion
 *
 * This class extends the Model class and provides methods for managing user connections.
 */
class ModelConnexion extends Model{

    // Atributs
    private $Username = "";
    private $ID = 0;

    /**
     * Gets the value of a property.
     *
     * @param string $name The property name.
     * @return mixed The property value.
     */
    public function __get($name) { return $this->$name;  }

    /**
     * Sets the value of a property.
     *
     * @param string $name The property name.
     * @param mixed $value The property value.
     */
     public function __set($name, $value) { $this->$name = $value; }

     /**
     * Logs in a user.
     *
     * If the login and password are not null, it checks if the password is correct and if the user is active.
     * If the password is correct and the user is active, it sets the user ID, identifier, status, and store ID, and redirects to the home page.
     * Otherwise, it displays an error message.
     *
     * @param string $Login The user login.
     * @param string $Password The user password.
     */
    public function Login($Login,$Password){
        $AccesGranted = false;

        if ($Login != null && $Password != null) {
            $reqConnexion = "SELECT * FROM Coach WHERE username = ?";
             
            $resultat = self::ExecuteQuery($reqConnexion, [$Login]);

            if($resultat != null){
                if ($resultat[0]['password'] === $Password) {  
                    // On enregistre l'ID Client dans la session
                    $this->ID = $resultat[0]['id'];
                    $this->Username = $resultat[0]['username'];
     
                    // On redirige vers la page d'accueil  
                    $_SESSION['Connexion'] = $this;
                    $AccesGranted = true;
               }
            }
             
        }

        return $AccesGranted;
   }

    public function Logout(){
        $_SESSION['Connexion'] = NULL;
        header("Location:".APP_LINK);
    }

    public static function ManageAccess()
    {
        if (!self::IsConnected()) {
            header("Location:".APP_LINK);
        }
    }

    public static function IsConnected(){
        $result = false;
        if (isset($_SESSION['Connexion'])) {
            if ($_SESSION['Connexion'] != null) {
                $result = true;
            }
        }
        return $result;
    }
}