<?php

/**
 * Class Model
 *
 * This class is used to manage the database connection and execute queries.
 */
abstract class Model
{
     // Attribut
    public static $db = NULL;
    private static $AddressBDD;
    private static $TypeServer = "mysql:host";
    private static $DBName;
    private static $TypeBDD = "dbname";
    private static $Login;
    private static $password;

    public static function setMode($mode)
    {
        if ($mode === 'local') {
            self::$AddressBDD = "localhost";
            self::$DBName = "braxters";
            self::$Login = "root";
            self::$password = "";
        } else if ($mode === 'remote') {
            self::$AddressBDD = "mysql-braxters.alwaysdata.net";
            self::$DBName = "braxters_db";
            self::$Login = "braxters";
            self::$password = "Xy3!pB9@fG4&";
        } else {
            throw new Exception("Invalid mode specified. Use 'local' or 'remote'.");
        }
    }

     /**
     * Class Model
     *
     * This class is used to manage the database connection and execute queries.
     */
     private static function SetBdd()
     {
         self::setMode('remote');
          $bdd =  self::$TypeServer . "=" . self::$AddressBDD . ";" . self::$TypeBDD . "=" . self::$DBName;
          $user = self::$Login;
          $pass = self::$password;

          try {
               self::$db = new PDO($bdd, $user, $pass);
          } catch (Exception $th) {               
               die(Controller::Message("Erreur BDD", "Impossible de se connecter à la base de données<br>".$th->getMessage()));
          }
     }

     /**
     * Executes a query on the database.
     *
     * @param string $query The SQL query to execute.
     * @param array|null $parameters The parameters to bind to the query.
     * @return array|null The result of the query, if it is a SELECT query.
     */
     public static function ExecuteQuery($query, $parameters = NULL)
     {
          $resultat = NULL;
          if (self::$db == NULL) {
               self::SetBdd();
          }

          try {
               // Commence une transaction si demandé
               switch($query){
                    case "BEGIN":
                         self::$db->beginTransaction();
                         return;
                    case "COMMIT":
                         self::$db->commit();
                         return;
                    case "ROLLBACK":
                         self::$db->rollBack();
                         return;
               }

               // Préparation est execution de la requête
               $req = self::$db->prepare($query);
               $execution = $req->execute($parameters);

               if ($execution == false) {
                    throw new Exception("Une erreur est survenue lors de l'execution de la requête.");
               }

               // Si la requête est une selection on récupère les données
               if (strpos(strtolower($query), "select") === 0) {
                    try {
                         $resultat = $req->fetchAll();
                    } catch (Throwable $th) {
                         die(Controller::Message("Erreur execution requête", "Impossible de récupérer le résultat de la requête<br>".$th."<br>".$query));
                    }
               }
          } catch (Throwable $th) {           
               die(Controller::Message("Erreur execution requête", "Impossible d'executer la requête<br>".$th."<br>".$query));
          }

          return $resultat;
     }

     /**
     * Gets the ID of the last inserted row.
     *
     * @return string The ID of the last inserted row.
     */
     public static function GetID()
     {
          return self::$db->lastInsertId();
     }
}
