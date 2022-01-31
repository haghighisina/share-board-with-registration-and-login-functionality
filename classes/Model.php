<?php
abstract class Model{
    protected $db;
    protected $stmt;

    public function __construct() {
        try {
            $dsn = "mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=".CHARSET;
            $opt = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];
            return $this->db = new \PDO($dsn, USER_NAME, PASS, $opt);
        }catch (PDOException $ex) { die($ex->getMessage()); }
    }

    //create a query function
    public function query($query){
        $this->stmt = $this->db->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    }

    //create function to bind the parameters
    public function bindParameters($param, $value, $type=null){
        if (is_null($type)){
           $type = match ($type) {
                is_int($value) => $type = PDO::PARAM_INT,
                is_bool($value) => $type = PDO::PARAM_BOOL,
                is_null($value) => $type = PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function QueryExecute(){
        $this->stmt->execute();
    }

    public function resultQuery():?array{
       $this->QueryExecute();
       $stmt = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
       if (false === $stmt){
           return [];
       }
        return $stmt;
    }

    public function lastInsertId(){
        return $this->db->lastInsertId();
    }

    public function single(){
        $this->QueryExecute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function userData($name){
        $this->query("SELECT * FROM users WHERE name= :name ");
        $stmt = $this->bindParameters(":name", $name);
		if (false === $stmt){
            return [];
        }
        $this->QueryExecute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     function ifUserExist($name):bool{
        $this->query("SELECT 1 FROM users WHERE name= :name ");
        $stmt = $this->bindParameters(":name", $name);
        if (false === $stmt){
            return false;
        }
        $this->QueryExecute();
        return (bool)$this->stmt->fetchColumn();
    }
}
