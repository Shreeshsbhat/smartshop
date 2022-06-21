<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/product.php';

//initialize db and get connection
$database = new Database();
// var_dump($database);

$db = $database->getConnection();
// var_dump($db);
$product = new Product($db);

$stmt = $product->read();
$stmt->execute();
$num = $stmt->rowCount();
$products_arr = array();
$products_arr["products"] = array();
//if more than 0 records found
if ($num > 0){
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $product_item = array(
            "id"=>$id,
            "name"=>$name,
            "barcode"=>$barcode,
            "price"=>$price
        );
        array_push($products_arr["products"], $product_item);
    }
    //set response code - 200 OK
    http_response_code(200);
}
echo json_encode($products_arr);
?>