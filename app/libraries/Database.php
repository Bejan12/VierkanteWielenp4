<?php
/**
 * Dit is de database class die alle communicatie met de database verzorgt
 */

class Database
{
    private $dbHost = DB_HOST;
    private $dbName = DB_NAME;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;


    private $dbHandler;
    private $statement;

    public function __construct()
    {
        // TRY-CATCH: Database connectie
        /**
         * Dit is de connectiestring die nodig voor het maken van een
         * nieuw PDO object
         */
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;

        /**
         * We geven nog wat options mee voor het PDO-object om 
         * fouten weer te geven
         */
        $options = array(
            PDO::ATTR_PERSISTENT =>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            /**
             * Maken we eenverbinding met de database mysql server
             */
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: Database connectie succesvol. Host: {$this->dbHost}, DB: {$this->dbName}\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: Verbinding gemaakt met gebruiker: {$this->dbUser}\n", FILE_APPEND);
        } catch (PDOException $e) {
            /**
             * Wanneer er een error optreed daarbij wordt er een PDOException object 
             * aangemaakt met informatie over de error
             */
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: Database fout: " . $e->getMessage() . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: Verbinding mislukt voor gebruiker: {$this->dbUser}\n", FILE_APPEND);
            echo "Op dit moment kunnen we u niet helpen... probeer het later nog eens";
            header('Refresh:30; url=' .URLROOT . '/homepages/index');
        }
    }

    public function query($sql)
    {
        // TRY-CATCH: Query voorbereiden
        try {
            $this->statement = $this->dbHandler->prepare($sql);
            file_put_contents(__DIR__ . '/../../bejan.log', "[" . date('Y-m-d H:i:s') . "] Bejan: Query voorbereid: $sql\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../bejan.log', "[" . date('Y-m-d H:i:s') . "] Bejan: Statement object aangemaakt.\n", FILE_APPEND);
        } catch (PDOException $e) {
            file_put_contents(__DIR__ . '/../../bejan.log', "[" . date('Y-m-d H:i:s') . "] Bejan: Query fout: " . $e->getMessage() . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../bejan.log', "[" . date('Y-m-d H:i:s') . "] Bejan: Query die faalde: $sql\n", FILE_APPEND);
            throw $e;
        }
    }

    /**
     * Deze methode retourneert een array van objecten uit de database
     */
    public function resultSet()
    {
        // TRY-CATCH: Resultset ophalen
        try {
            $this->statement->execute();
            $result = $this->statement->fetchAll(PDO::FETCH_OBJ);
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: resultSet opgehaald. Aantal records: " . count($result) . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: Statement executed in resultSet().\n", FILE_APPEND);
            return $result;
        } catch (PDOException $e) {
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: resultSet fout: " . $e->getMessage() . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: Statement execution failed in resultSet().\n", FILE_APPEND);
            throw $e;
        }
    }

    /**
     * Deze methode bind de waardes aan de parameters in de query
     */
    public function bind($parameter, $value, $type = null)
    {
        // TRY-CATCH: Bind value
        try {
            if ($type === null) {
                if (is_int($value)) {
                    $type = PDO::PARAM_INT;
                } elseif (is_bool($value)) {
                    $type = PDO::PARAM_BOOL;
                } elseif (is_null($value)) {
                    $type = PDO::PARAM_NULL;
                } else {
                    $type = PDO::PARAM_STR;
                }
            }
            $this->statement->bindValue($parameter, $value, $type);
            file_put_contents(__DIR__ . '/../../nick.log', "[" . date('Y-m-d H:i:s') . "] Nick: Bind param $parameter => $value (type $type)\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../nick.log', "[" . date('Y-m-d H:i:s') . "] Nick: BindValue uitgevoerd in bind().\n", FILE_APPEND);
        } catch (PDOException $e) {
            file_put_contents(__DIR__ . '/../../nick.log', "[" . date('Y-m-d H:i:s') . "] Nick: Bind fout: " . $e->getMessage() . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../nick.log', "[" . date('Y-m-d H:i:s') . "] Nick: BindValue failed in bind().\n", FILE_APPEND);
            throw $e;
        }
    }

    /**
     * Deze methode voert de query uit
     */
    public function execute()
    {
        // TRY-CATCH: Execute statement
        try {
            $result = $this->statement->execute();
            file_put_contents(__DIR__ . '/../../bejan.log', "[" . date('Y-m-d H:i:s') . "] Bejan: Query uitgevoerd. Resultaat: " . var_export($result, true) . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../bejan.log', "[" . date('Y-m-d H:i:s') . "] Bejan: Statement executed in execute().\n", FILE_APPEND);
            return $result;
        } catch (PDOException $e) {
            file_put_contents(__DIR__ . '/../../bejan.log', "[" . date('Y-m-d H:i:s') . "] Bejan: Execute fout: " . $e->getMessage() . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../bejan.log', "[" . date('Y-m-d H:i:s') . "] Bejan: Statement execution failed in execute().\n", FILE_APPEND);
            throw $e;
        }
    }

    public function single()
    {
        // TRY-CATCH: Single record ophalen
        try {
            $this->statement->execute();
            $result = $this->statement->fetch(PDO::FETCH_OBJ);
            $this->statement->closecursor();
            file_put_contents(__DIR__ . '/../../nick.log', "[" . date('Y-m-d H:i:s') . "] Nick: single() opgehaald. Resultaat: " . var_export($result, true) . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../nick.log', "[" . date('Y-m-d H:i:s') . "] Nick: Statement executed in single().\n", FILE_APPEND);
            return $result;
        } catch (PDOException $e) {
            file_put_contents(__DIR__ . '/../../nick.log', "[" . date('Y-m-d H:i:s') . "] Nick: single() fout: " . $e->getMessage() . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../nick.log', "[" . date('Y-m-d H:i:s') . "] Nick: Statement execution failed in single().\n", FILE_APPEND);
            throw $e;
        }
    }

    public function outQuery($sql) {
        // TRY-CATCH: Directe query uitvoeren
        try {
            $result = $this->dbHandler->query($sql);
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: outQuery uitgevoerd: $sql\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: outQuery resultaat: " . var_export($result, true) . "\n", FILE_APPEND);
            return $result;
        } catch (PDOException $e) {
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: outQuery fout: " . $e->getMessage() . "\n", FILE_APPEND);
            file_put_contents(__DIR__ . '/../../zakka.log', "[" . date('Y-m-d H:i:s') . "] Zakka: outQuery failed for: $sql\n", FILE_APPEND);
            throw $e;
        }
    }
}

// No changes needed in this file for the reported error.
// The error is caused by a mismatch between the SQL query and the actual database schema.
// Please check the spelling and case of the column names in your database and in your SQL queries.