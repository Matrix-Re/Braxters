<?php

require_once './Models/Model.php';
require_once './Models/ModelExercice.php';

/**
 * Class ModelParametre
 *
 * This class extends the Model class and provides methods for managing parameter of the app.
 */
class ModelProgram
{
    // Atributs
    private $id = 0;
    private $name = "";
    private $motif = "";
    private $description = "";
    private $picture = "";
    private $exercices = array();

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
        $query = "SELECT * FROM Program WHERE id = ?";

        $resultatReq = Model::ExecuteQuery($query, [$this->id]);

        if ($resultatReq != null) {
            $this->id = $resultatReq[0]['id'];
            $this->name = $resultatReq[0]['name'];
            $this->motif = $resultatReq[0]['motif'];
            $this->description = $resultatReq[0]['description'];
            $this->picture = $resultatReq[0]['picture'];
            $this->exercices = $this->getExercices();
        }
    }

    public static function getAll()
    {
        $query = "SELECT * FROM Program";

        $resultatReq = Model::ExecuteQuery($query);

        $programs = array();
        if ($resultatReq != null) {
            foreach ($resultatReq as $program) {
                $programObj = new ModelProgram();
                $programObj->id = $program['id'];
                $programObj->name = $program['name'];
                $programObj->motif = $program['motif'];
                $programObj->description = $program['description'];
                $programObj->picture = $program['picture'];
                $programObj->exercices = $programObj->getExercices();
                $programs[] = $programObj;
            }
        }
        return $programs;
    }

    public function add($listExercice)
    {
        try{
            Model::ExecuteQuery("BEGIN");
            $query = "INSERT INTO Program (name, motif,description, picture) VALUES (? , ? , ? , ?)";

            $parameters = array($this->name, $this->motif, $this->description, $this->picture);

            Model::ExecuteQuery($query, $parameters);

            $this->id = Model::GetID();

            foreach ($listExercice as $idExercice) {
                $query = "INSERT INTO Entrainement (id_program, id_exercice) VALUES (? , ?)";
                $parameters = array($this->id, $idExercice);
                Model::ExecuteQuery($query, $parameters);
            }
            Model::ExecuteQuery("COMMIT");
        } catch (Exception $e) {
            Model::ExecuteQuery("ROLLBACK");
            throw new Exception("Erreur lors de l'ajout du programme : " . $e->getMessage());
        }
        
    }

    public function update($newListExercice)
    {
        try{
            // On commence la transaction 
            Model::ExecuteQuery("BEGIN");

            $query = "UPDATE Program SET name = ?, motif = ?, description = ?, picture = ? WHERE id = ?";
            $parameters = array($this->name, $this->motif, $this->description, $this->picture, $this->id);
            Model::ExecuteQuery($query, $parameters);

            // on supprime les anciens exercices qui ne sont plus présent dans la liste
            foreach ($this->exercices as $exercice) {
                if (!in_array($exercice->id, $newListExercice)) {
                    // on supprime l'exercice
                    $queryOldExercice = "DELETE FROM Entrainement WHERE id_program = ? AND id_exercice = ?";
                    $parameters = array($this->id , $exercice->id);
                    Model::ExecuteQuery($queryOldExercice, $parameters);
                }
            }

            // on ajoute les nouveaux exercices qui ne sont pas dans la liste
            foreach ($newListExercice as $idExercice) {
                if (!$this->isExerciceInProgram($idExercice)) {
                    // on ajoute l'exercice
                    $queryNewExercice = "INSERT INTO Entrainement (id_program, id_exercice) VALUES (?, ?)";
                    $parameters = array($this->id , $idExercice);
                    Model::ExecuteQuery($queryNewExercice, $parameters);
                }
            }

            // Valide la transaction
            Model::ExecuteQuery("COMMIT");
        }
        catch (Exception $e) {
            // Annule la transaction en cas d'erreur
            Model::ExecuteQuery("ROLLBACK");
            throw new Exception("Erreur lors de la mise à jour du programme : " . $e->getMessage());
        }
    }

    public static function delete($id)
    {
        try {
            Model::ExecuteQuery("BEGIN");

            $query = "DELETE FROM Entrainement WHERE id_program = ?";
            Model::ExecuteQuery($query, [$id]);

            $query = "DELETE FROM Program WHERE id = ?";
            Model::ExecuteQuery($query, [$id]);

            Model::ExecuteQuery("COMMIT");
        }
        catch (Exception $e) {
            Model::ExecuteQuery("ROLLBACK");
            throw new Exception("Erreur lors de la mise à jour du programme : " . $e->getMessage());
        }
    }

    public function getExercices()
    {
        $query = "SELECT Exercice.*, Machine.name AS Machine_name, Machine.picture AS Machine_picture
FROM Exercice
INNER JOIN Entrainement ON Exercice.id = Entrainement.id_exercice
INNER JOIN Machine ON Exercice.id_machine = Machine.id
WHERE Entrainement.id_program = ?";

        $resultatReq = Model::ExecuteQuery($query, [$this->id]);

        $exercices = array();
        if ($resultatReq != null) {
            foreach ($resultatReq as $exercice) {
                $exerciceObj = new ModelExercice();
                $exerciceObj->id = $exercice['id'];
                $exerciceObj->duration = $exercice['duration'];
                $exerciceObj->repetition = $exercice['repetition'];
                $exerciceObj->rest = $exercice['rest'];

                $machine = new ModelMachine();
                $machine->id = $exercice['id_machine'];
                $machine->name = $exercice['Machine_name'];
                $machine->picture = $exercice['Machine_picture'];
                $exerciceObj->machine = $machine;

                $exercices[] = $exerciceObj;
            }
        }
        return $exercices;
    }

    public function isExerciceInProgram($idExercice)
    {
        foreach ($this->exercices as $exercice) {
            if ($exercice->id == $idExercice) {
                return true;
            }
        }
        return false;
    }

    public function getTotalDuration()
    {
        $totalDuration = 0;
        foreach ($this->exercices as $exercice) {
            $totalDuration += $exercice->duration;
        }
        return $totalDuration;
    }
}