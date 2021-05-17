<?php
include_once "scr/BaseController.php";
include_once "scr/DBConect.php";
$controller = new BaseController;
$dbConect = new DBConect();
$conn = $dbConect->connect();



if($_SERVER["REQUEST_METHOD"]=="POST"){
    $value=$_POST["value"];
    $sql= "SELECT * FROM product WHERE name LIKE '%$value%'";
    $stmt = $conn->query($sql);
    $products = $stmt->fetchAll();
}else{
    $products = $controller->getAllProduct();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <form class="d-flex" method="post">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="value">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <button  class="btn btn-outline-success" "><a href="view/add.php"> Add</a></button>
        </div>
    </nav>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Tên Hàng</th>
            <th>Loại Hàng</th>
            <th colspan="2">Refactor</th>
        </tr>
        <?php foreach ($products as $key): ?>
            <tr>
                <td><?php echo $key["id"] ?> </td>
                <td><?php echo $key["name"] ?></td>
                <td><?php echo $key["type"] ?></td>
                <td><a onclick="return confirm('are you sure?')" href="function/delete.php?id=<?php echo $key["id"] ?>">Delete</a></td>
                <td><a href="view/edit.php?id=<?php echo $key["id"] ?>">Edit</td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
