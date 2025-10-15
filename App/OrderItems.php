<?php
namespace App;

use PDO;

class OrderItems{
    private int $id;
    private int $order_id;
    private int $product_id;
    private float $product_price;
    private int $quantity;
    private float $total_price;
    private float $total_with_Shipping;
    public function __construct( int $id,int $order_id,int $product_id,int $quantity,float $product_price,float $total_price,float $total_with_Shipping){
        $this->id=$id;
        $this->order_id=$order_id;
        $this->product_id=$product_id;
        $this->quantity=$quantity;
        $this->product_price=$product_price;
        $this->total_price=$total_price;
        $this->total_with_Shipping=$total_with_Shipping;
    }
    public function getId(): int{
        return $this->id;
    }
    public function getOrderId(): int{
        return $this->order_id;
    }
    public function getProductId(): int{
        return $this->product_id;
    }
    public function getQty(): int{
        return $this->quantity;
    }
    public function getProductPrice(): float{
        return $this->product_price;
    }
    public function getTotalPrice(): float{
        return $this->total_price;
    }
    public function getTotalWithShipping(): float{
        return $this->total_with_Shipping;
    }
    public static function saveOrderItems(PDO $pdo, int $order_id,int $product_id,int $quantity,float $product_price,float $total_price,float $total_with_Shipping): OrderItems|null{
        $statment=$pdo->prepare("INSERT INTO order_items (order_id,product_id,quantity,price,total_price,total_with_Shipping)VALUES(?,?,?,?,?,?)");
        $success=$statment->execute([ $order_id, $product_id, $quantity, $product_price,$total_price,$total_with_Shipping]);
        if($success){
            $id=(int)$pdo->lastInsertId();
            return new self($id,$order_id,$product_id,$quantity, $product_price, $total_price, $total_with_Shipping);
        }return null;
    }
    public static function getAll(PDO $pdo): array{
        $statment=$pdo->query("SELECT * FROM order_items");
        $rows=$statment->fetchAll(PDO::FETCH_ASSOC);
        $orders=[];
        foreach($rows as $row){
             $orders[]=new self($row['id'],$row['order_id'],$row['product_id'],$row['quantity'],$row['price'],$row['total_price'],$row['total_with_Shipping']);
        }
        return $orders;
    }
    public static function getOrderById(PDO $pdo,$id): array{
        $statment=$pdo->query("SELECT * FROM order_items WHERE order_id=$id");
        $rows=$statment->fetchAll(PDO::FETCH_ASSOC);
        $orders=[];
        foreach($rows as $row){
             $orders[]=new self($row['id'],$row['order_id'],$row['product_id'],$row['quantity'],$row['price'],$row['total_price'],$row['total_with_Shipping']);
             
        }
        return $orders;
    }
    public static function getTotalById(PDO $pdo,$id): mixed{
        $statment=$pdo->query("SELECT total_with_Shipping FROM order_items WHERE order_id=$id");
        $row=$statment->fetch(PDO::FETCH_ASSOC);
        if($row){
             return $row;
             
        }
        return false;
    }   
        public static function getProductById(PDO $pdo,$id): bool|OrderItems{
        $statment=$pdo->query("SELECT name FROM products WHERE id=$id");
        $row=$statment->fetch(PDO::FETCH_ASSOC);
        if($row){
             return new self($row['id'],$row['order_id'],$row['product_id'],$row['quantity'],$row['price'],$row['total_price'],$row['total_with_Shipping']);
        }return false;
    }

}