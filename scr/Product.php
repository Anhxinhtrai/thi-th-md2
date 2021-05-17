<?php


class Product
{
    public $name;
    public $type;
    public $price;
    public $amount;
    public $des;


    public function __construct($name, $type, $price, $amount, $des)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->amount = $amount;
        $this->des = $des;
    }


}