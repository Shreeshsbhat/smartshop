<?php
class Customer{
    private $conn;
    public $fname;
    public $lname;
    public $mname;
    public $email;
    public $phone;
    public $city;
    public $pincode;
    public $password;
    private $table_name="customer";

    public function __construct($db){
        $this->conn = $db;
    }

    public function create(){
        $query = "INSERT INTO $this->table_name SET fname=:fname,mname=:mname,lname=:lname,phone=:phone,email=:email,password=:password,pincode=:pincode,city=:city";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":fname", $this->fname);
        $stmt->bindParam(":lname", $this->lname);
        $stmt->bindParam(":mname", $this->mname);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":pincode", $this->pincode);


        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function verify($phone, $password){
        $query = "select id from customer where phone = '$phone' and password = '$password' limit 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num){
            $row = $stmt->fetch();
            return $row['id'];
        }
        return -1;
        
    }

}
?>