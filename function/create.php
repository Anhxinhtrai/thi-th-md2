<?php
include_once "../scr/DBConect.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];
    $des = $_POST["des"];
    $database = new DBConect();
    $conn = $database->connect();
    $sql = "insert into product (name,type,price,amount,date,des) value('$name','$type','$price','$amount',now(),'$des')";

    $conn->query($sql);
    header('location: ../index.php');
}


