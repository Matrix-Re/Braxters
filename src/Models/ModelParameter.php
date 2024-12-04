<?php

require_once './Models/Model.php';

/**
 * Class ModelParametre
 *
 * This class extends the Model class and provides methods for managing parameter of the app.
 */
class ModelParameter extends Model
{

    // Atributs
    private $id = 0;
    private $name = "";
    private $value = "";

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
     * Constructor of the class.
     *
     * @param string $name The name of the parameter.
     */
    function __construct($name = "") {
        if ($name != "") {
            $this->name = $name;
            $this->getInformation();
        }
    }

    /**
     * Gets the information of the parameter.
     */
    public function getInformation(){   
        $query = "SELECT * FROM Parameter WHERE name = '$this->name'";
        
        $resultatReq = self::ExecuteQuery($query);

        if ($resultatReq != null) {
            $this->id = $resultatReq[0]['id'];
            $this->name = $resultatReq[0]['name'];
            $this->value = $resultatReq[0]['pValue'];
        }
    }

    public static function getAll(){
        $query = "SELECT * FROM Parameter";

        $resultatReq = self::ExecuteQuery($query);

        foreach ($resultatReq as $parametre) {
            $parametres[] = new ModelParameter();
            $parametres[count($parametres) - 1]->id = $parametre['id'];
            $parametres[count($parametres) - 1]->name = $parametre['name'];
            $parametres[count($parametres) - 1]->value = $parametre['pValue'];
        }
        return $parametres;
    }

    public function updateValue(){
        $query = "UPDATE Parameter SET pValue = '$this->value' WHERE id = $this->id";
        self::ExecuteQuery($query);
    }
}