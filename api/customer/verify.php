<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/customer.php';

$phone = $_POST['phone'];
$password = $_POST['password'];

//initialize db and get connection
$database = new Database();
// var_dump($database);

$db = $database->getConnection();
// var_dump($db);
$customer = new Customer($db);

$customer_id = $customer->verify($phone, $password);
//if more than 0 records found
$respose_arr = array();

if ($customer_id != -1){
        $response_arr["customer_id"] = $customer_id;
        $response_arr["status"] = "success";

    }
else{
    $response_arr['status'] = "failure";    
}
    //set response code - 200 OK
http_response_code(200);

echo json_encode($response_arr);
?>