<?php

include_once "DBConect.php";

class BaseController
{
    protected $connect;

    public function __construct()
    {
        $dbConnect = new DBConect();
        $this->connect = $dbConnect->connect();
    }

    public function getAllProduct()
    {
        $sql = "SELECT * FROM product";
        $query = $this->connect->query($sql);

        return $query->fetchAll();
    }

    public function addProduct($product)
    {
        $sql = "INSERT INTO product(name,type,price,amount,date,des) VALUE (?,?,?,?,now(),?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $product->name);
        $stmt->bindParam(2, $product->type);
        $stmt->bindParam(3, $product->price);
        $stmt->bindParam(4, $product->amount);
        $stmt->bindParam(5, $product->des);
        return $stmt->execute();
    }
}
