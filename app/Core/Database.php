<?php
class Database{
    private $db_host = db_host;
    private $db_user = db_user;
    private $db_pass = db_pass;
    private $db_name = db_name;
    private $dbh, $stmt;

    public function __construct()
    {
        $dsn ="mysql:host={$this->db_host};dbname={$this->db_name}";
        try {
            $this->dbh =new PDO($dsn, $this->db_user, $this->db_pass);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt =$this->dbh->prepare($query);
    }

    public function bind($param, $value, $type=null)
    {
        if(is_null($type)){
        switch (true){
            case is_int($value):
            $type= PDO::PARAM_INT;
            break;
            case is_bool($value):
            $type= PDO::PARAM_BOOL;
            break;
            case is_null($value):
            $type= PDO::PARAM_NULL;
            break;
            default:
                $type = PDO::PARAM_STR;
        }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function rowCount()
    {
        $this->stmt->rowCount();
    }

    public function resultAll()
    {
        $this->execute();
        $this->stmt->fetchall(PDO::FETCH_ASSOC);
    }
    public function resultSingle()
    {
        $this->execute();
         return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


}
