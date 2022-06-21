<?php
class Product{
    private $conn;
    private $table_name="product";
    public $name;
    public $barcode;
    public $price;
    

    //constructor
    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $query = "SELECT * FROM product";
        // var_dump($this->conn);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO $this->table_name SET name=:name, price=:price, barcode=:barcode";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":barcode", $this->barcode);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>
