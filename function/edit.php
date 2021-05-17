<?php

include_once "../scr/DBConect.php";

$database = new DBConect();
$conn = $database->connect();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];
    $des = $_POST["des"];
    $database = new DBConect();
    $conn = $database->connect();
    $id = $_REQUEST['id'];
    $sql = "UPDATE product SET name = '$name', type = '$type', price = '$price',amount = '$amount',des = '$des' WHERE id= $id";
    $conn->query($sql);

    header('location: ../index.php');
}
