<?php
namespace App;

use PDO;

class Order{
    private int $id;
    private int $customer_id;
    private float $total_price;
    private string $payment_method;
    private ?string $status = "Pendding";
    private ?string $order_date=null;
    private ?string $note=null;
    public function __construct(
        int $id,
        int $customer_id,
        float $total_price,
        string $payment_method,
        string $status,
        ?string $order_date,
        ?string $note)
        {
            $this->id=$id;
            $this->customer_id=$customer_id;
            $this->total_price=$total_price;
            $this->payment_method=$payment_method;
            $this->status=$status;
            $this->order_date=$order_date;
            $this->note=$note;
        }
     public   function getId(): int{
        return $this->id;
    }
    public  function getCustomerId(): int{
        return $this->customer_id;
    }
    public  function geTotalPrice(): float{
        return $this->total_price;
    }
    public  function getMethod(): string{
        return $this->payment_method;
    }
    public  function getStatus(): string{
        return $this->status;
    }
    public  function getTime(): string{
        return $this->order_date;
    }
    public  function getNote(): string{
        return $this->note;
    }public static function getStatusById(PDO $pdo,int $id): mixed{
        $statment=$pdo->prepare("SELECT status FROM orders WHERE id=?");
        $statment->execute([$id]);
        $row=$statment->fetch(PDO::FETCH_ASSOC);
        if($row['status']){
            return $row['status'];
        }return false;
    }
    public static function saveOrder(PDO $pdo, int $customer_id, float $total_price,string $payment_method,?string $status,?string $order_date,?string $note): Order|null{
        $statment=$pdo->prepare("INSERT INTO orders (customer_id,total_price,payment_method,note)VALUES(?,?,?,?)");
        $success=$statment->execute([$customer_id,$total_price,$payment_method,$note]);
        if($success){
            $id=(int)$pdo->lastInsertId();
            return new self($id,$customer_id,$total_price,$payment_method,$status,$order_date,$note);
        }return null;
    }
    public static function getAll(PDO $pdo): array{
        $statment=$pdo->query("SELECT * FROM orders");
        $rows=$statment->fetchAll(PDO::FETCH_ASSOC);
        $orders=[];
        foreach($rows as $row){
             $orders[]=new self($row['id'],$row['customer_id'],$row['total_price'],$row['payment_method'],$row['status'],$row['order_date'],$row['note']);
        }
        return $orders;
    }
    public static function updateStatus(PDO $pdo,string $newStatus,int $id){
        $statment=$pdo->prepare("UPDATE orders SET status =? WHERE id=?");
        $success=$statment->execute([$newStatus,$id]);
        if($success){
            return true;
        }
        return false;
    }

}