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
        if ((bool)false !== is_null($type)){
            match ($type) {
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

    public function resultQuery():array{
       $this->QueryExecute();
        while($rows =  $this->stmt->fetchAll(PDO::FETCH_ASSOC)){
            $result = $rows;
        }
        return $result;
    }

}
