<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
class Purchase{
    private $table_name = "purchase";
    private $aux_table_name = "purchase_product";
    private $db;    
    public function __construct($db){
        $this->db = $db;
    }

    public function make($customer_id, $total_price, $product_ids){
	
        try{
        $uid = uniqid($more_entropy=true);

        $query = "INSERT INTO $this->table_name SET id='$uid', total_price=$total_price, customer_id=$customer_id"; 


        $this->db->beginTransaction();
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        foreach($product_ids as $product_id){
            $query = "INSERT INTO $this->aux_table_name SET product_id=$product_id, purchase_id='$uid'"; 
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }
        $this->db->commit();
        return "success,".$uid;//true;
    }
    catch(Exception $e){
        echo $e->getMessage();
        $this->db->rollback();
        return $query;
    }
         
    }

    public function read(){
        $query = "select purchase_id,fname,total_price, date(purchase_date) as purchase_date,phone from purchase,purchase_product,customer where purchase.id = purchase_product.purchase_id and completed=false and purchase.customer_id = customer.id
";

        // var_dump($this->conn);
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function finalize($pid){
        try{
            $query = "update purchase set completed = 1 where id='$pid'";
            $stmt = $this->db->prepare($query);
            if($stmt->execute()){
                return "success";
            }
            else
                return "failure";
        }
        catch(Exception $e){
            echo $e->getMessage();
            return "failure";
        }
    }
}
?>
