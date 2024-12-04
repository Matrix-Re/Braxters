<?php

require_once './Models/Model.php';
require_once './Models/ModelMachine.php';

/**
 * Class ModelParametre
 *
 * This class extends the Model class and provides methods for managing parameter of the app.
 */
class ModelExercice extends Model
{
    // Atributs
    private $id = 0;
    private $machine = null;
    private $duration = 0;
    private $repetition = 0;
    private $rest = 0;

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
    function __construct($id = "") {
        if ($id != "") {
            $this->id = $id;
            $this->getInformation();
        }
    }

    /**
     * Gets the information of the parameter.
     */
    public function getInformation()
    {
        $query = "SELECT Exercice.*, Machine.name, Machine.picture
FROM Exercice
INNER JOIN Machine ON Exercice.id_machine = Machine.id WHERE Exercice.id = '$this->id'";

        $resultatReq = self::ExecuteQuery($query);

        if ($resultatReq != null) {
            $this->id = $resultatReq[0]['id'];
            $this->duration = $resultatReq[0]['duration'];
            $this->repetition = $resultatReq[0]['repetition'];
            $this->rest = $resultatReq[0]['rest'];

            $machine = new ModelMachine();
            $machine->id = $resultatReq[0]['id_machine'];
            $machine->name = $resultatReq[0]['name'];
            $machine->picture = $resultatReq[0]['picture'];

            $this->machine = $machine;
        }
    }

    public static function getAll(){
        $query = "SELECT Exercice.*, Machine.name, Machine.picture
                  FROM Exercice
                  INNER JOIN Machine ON Exercice.id_machine = Machine.id;";

        $resultatReq = self::ExecuteQuery($query);
        $execices = [];
        if ($resultatReq != null) {
            foreach ($resultatReq as $execice) {
                $execices[] = new ModelExercice();
                $execices[count($execices) - 1]->id = $execice['id'];
                $execices[count($execices) - 1]->duration = $execice['duration'];
                $execices[count($execices) - 1]->repetition = $execice['repetition'];
                $execices[count($execices) - 1]->rest = $execice['rest'];

                $machine = new ModelMachine();
                $machine->id = $execice['id_machine'];
                $machine->name = $execice['name'];
                $machine->picture = $execice['picture'];

                $execices[count($execices) - 1]->machine = $machine;
            }
        }
        return $execices;
    }

    public function update(){
        $id_machine = $this->machine->__get('id');
        $query = "UPDATE Exercice SET duration = '$this->duration', repetition = '$this->repetition', rest = '$this->rest', id_machine = '$id_machine' WHERE id = '$this->id'";
        self::ExecuteQuery($query);
    }

    public function add(){
        $id_machine = $this->machine->__get('id');
        $query = "INSERT INTO Exercice (duration, repetition, rest, id_machine) VALUES ('$this->duration', '$this->repetition', '$this->rest', '$id_machine')";
        self::ExecuteQuery($query);
    }

    public static function delete($id){
        $query = "DELETE FROM Exercice WHERE id = '$id'";
        self::ExecuteQuery($query);
    }

}