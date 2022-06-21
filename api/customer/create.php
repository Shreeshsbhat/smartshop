<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../objects/customer.php';

$database = new Database();
$db = $database->getConnection();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mname = $_POST['mname'];
$city = $_POST['city'];
$email = $_POST['email'];
$pincode = $_POST['post_pin'];
$password = $_POST['password'];
$phone = $_POST['phone'];


$customer = new Customer($db);
$customer->fname = $fname;
$customer->lname = $lname;
$customer->mname = $mname;
$customer->email = $email;
$customer->pincode = $pincode;
$customer->phone = $phone;
$customer->city = $city;
$customer->password = $password;

if($customer->create()){
 
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array("message" => "Product was created."));
}

// if unable to create the product, tell the user
else{
    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to create product."));
}

?>