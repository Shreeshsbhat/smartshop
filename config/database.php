<?php
class Database{
    //database credentials
    private $host = "localhost:3306";
    private $dbName = "smartshop";
    private $username = "root";
    private $password = "";
    public $conn;
    //get db connection
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName,
                                                            $this->username,
                                        $this->password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                                                $this->password);

            // $this->conn->exec("set names utf-8");
        }
        catch(PDOException $exception){
            echo "Connection error: ".$exception->getMessage();
        }
        return $this->conn;
    }

}
?>