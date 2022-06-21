<?php

include_once '../../config/database.php';
include_once '../../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$name = $_POST['name'];
$price = $_POST['price'];
$barcode = $_POST['barcode'];

$product = new Product($db);
$product->name = $name;
$product->price = $price;
$product->barcode = $barcode;

if($product->create()){

    header("Location: ../../add_product.php");
    die();
    // set response code - 201 created
    // http_response_code(201);

    // tell the user
    // echo json_encode(array("message" => "Product was created."));
}

// if unable to create the product, tell the user
else{
    // set response code - 503 service unavailable
    echo "FAILURE!!!";
    header("Location: ../../add_product.php");
    die();

}

?>