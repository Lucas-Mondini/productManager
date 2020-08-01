<?php
class Product
{
    private $product_name;
    private $product_type;
    private $product_tax;
    private $product_price;
    private $product_amount;
        
    function __construct($name = NULL, $type = NULL, $price = NULL, $amount = NULL, $tax = NULL){
        $this->product_name = $name;
        $this->product_type = $type;
        $this->product_price = $price;
        $this->product_tax = $tax;
        $this->product_amount = $amount;
    }
    function get_query(){
        $p = ' , ';
        $ret =  "'" .strval($this->product_name) . "'" . $p;
        $ret = $ret . "'" . strval($this->product_type) . "'" . $p;
        $ret = $ret . strval($this->product_price) . $p;
        $ret = $ret . strval($this->product_amount) . $p;
        $ret = $ret . strval($this->product_tax);
        return $ret;
    }
    function is_initializated(){
        if(is_null($this->product_name) || is_null($this->product_type) 
        || is_null($this->product_price) || is_null($this->product_amount))
            return false;
        return true;
    }
}
?>