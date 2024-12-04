<?php

require_once './Models/Model.php';

/**
 * Class ModelMachine
 *
 * This class extends the Model class and provides methods for managing the machine.
 */
class ModelMachine extends Model{

    // Attributs
    private $id = 0;
    private $name = "";
    private $picture = "";
    private $type = null;

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
    function __construct($id = 0) {
        if ($id != 0) {
            $this->id = $id;
            $this->getInformation();
        }
    }

    public function getInformation(){
        $query = "SELECT * FROM Machine WHERE id = '$this->id'";
        
        $resultatReq = self::ExecuteQuery($query);

        if ($resultatReq != null) {
            $this->id = $resultatReq[0]['id'];
            $this->name = $resultatReq[0]['name'];
            $this->picture = $resultatReq[0]['picture'];
            $this->type = "test";
        }
    }

    public static function delete($id){
        $query = "DELETE FROM Machine WHERE id = '$id'";
        self::ExecuteQuery($query);
    }

    public static function getAll()
    {
        $query = "SELECT * FROM Machine WHERE 1";

        $resultatReq = self::ExecuteQuery($query);

        foreach ($resultatReq as $machine) {
            $machines[] = new ModelMachine();
            $machines[count($machines) - 1]->id = $machine['id'];
            $machines[count($machines) - 1]->name = $machine['name'];
            $machines[count($machines) - 1]->picture = $machine['picture'];
            $machines[count($machines) - 1]->type = $machine['type'];
        }
        return $machines;
    }

    public static function update($id, $name, $type, $picture){
        $query = "UPDATE Machine SET name = '$name', type = '$type', picture = '$picture' WHERE id = '$id'";
        self::ExecuteQuery($query);
    }

    public static function add($machine){
        $query = "INSERT INTO Machine (name, type, picture) VALUES ('$machine->name', '$machine->type', '$machine->picture')";
        self::ExecuteQuery($query);
    }

    public static function getLast(){
        $query = "SELECT * FROM Machine ORDER BY id DESC LIMIT 1";
        $resultatReq = self::ExecuteQuery($query);
        $machine = new ModelMachine();
        $machine->id = $resultatReq[0]['id'];
        $machine->name = $resultatReq[0]['name'];
        $machine->picture = $resultatReq[0]['picture'];
        $machine->type = "test";
        return $machine;
    }
}