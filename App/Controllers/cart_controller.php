<?php
namespace App\Controllers;
use App\Cart;
use App\CartItem;
use App\Product;

class Cart_controller{
    public static function handler($db){
        $cart=new Cart();
        $action=$_GET['action'] ?? null;
        switch($action){
            case "add":
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $productId=$_POST['product-id'];
                    $product=Product::findByID($db,$productId);
                    if($product){
                        $cart->addItem($product);
                        
                    }
                }
                break;
            case "remove":
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $productId=$_POST['product-id'];
                    $product=Product::findByID($db,$productId);
                    if($product){
                        $cart->removeItem($product);
                        
                    }
                }
                break;
                
            case "delete":
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $productId=$_GET['id'];
                    $product=Product::findByID($db,$productId);
                    if($product){
                        $cart->removeItem($product);
                        
                    }
                }
                break;
            case "clear":
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $cart->clearItems();
                }
                break;
        }
        header("location: index.php?page=cart");
        exit;
    }
}

Cart_controller::handler($db);