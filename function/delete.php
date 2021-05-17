<?php

include_once "../scr/DBConect.php";

$database = new DBConect();
$conn = $database->connect();

$id = $_REQUEST['id'];
$sql = "DELETE FROM product WHERE id = $id";
$conn->query($sql);

header('location: ../index.php');