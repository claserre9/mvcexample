<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $port = DB_PORT;
    private $name = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->name;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Prepare statement
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Bind values
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //Execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    //Get resultset
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Get single record
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Get rowcount
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
