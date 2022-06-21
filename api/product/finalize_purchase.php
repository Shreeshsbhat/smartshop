<?php
include_once '../../config/database.php';
include_once '../../objects/purchase.php';

$database = new Database();
$db = $database->getConnection();

$purchase_id = $_GET['purchase_id'];

$purchase = new Purchase($db);


$msg = $purchase->finalize($purchase_id);
 
header("Location:../../admin_home.php");
die();

?>
