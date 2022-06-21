<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../objects/product.php';
include_once '../../objects/purchase.php';

$database = new Database();
$db = $database->getConnection();

//echo file_get_contents("php://input");
$customer_id = $_POST['customer_id'];
$product_ids = explode(" ",$_POST['barcode_str']);
//echo json_encode(array("message" => $_POST['barcode_str']));
//die();
$final_bill = $_POST['final_bill'];

$purchase = new Purchase($db);

$msg = $purchase->make($customer_id, $final_bill, $product_ids);
if( true ){
 
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array("message" => $msg));
}

// if unable to create the product, tell the user
else{
    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to create product."));
}

?>
