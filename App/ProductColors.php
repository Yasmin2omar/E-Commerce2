<?php

namespace App;
use PDO;
class ProductColors{
    private int $id;
    private string $image;
    private int $product_id;
    private int $color_id;
    public function __construct(int $id,string $image,int $product_id,int $color_id){
        $this->id=$id;
        $this->image=$image;
        $this->product_id=$product_id;
        $this->color_id=$color_id;
    }
    public function getID(): int{
        return $this->id;
    }
    public function getImage(): string{
        return $this->image;
    }
        public function getProductId(): int{
        return $this->product_id;
    }
    public function getColorId(): string{
        return $this->color_id;
    }
   public static function findByID(PDO $pdo , int $id): ProductColors|null{
        $statment=$pdo->prepare("SELECT * FROM product_color WHERE id=?");
        $statment->execute([$id]);
        $row=$statment->fetch(PDO::FETCH_ASSOC);
        if($row){
            return new self($row['id'],$row['image'],$row['product_id'],$row['color_id']);
        }
        return null;
    }
   public static function findByProductId(PDO $pdo , int $product_id): array{
        $statment=$pdo->prepare("SELECT * FROM product_color WHERE product_id =?");
        $statment->execute([$product_id]);
        $rows=$statment->fetchAll(PDO::FETCH_ASSOC);
        $result=[];
        foreach($rows as $row){
           $result[]=new self($row['id'],$row['image'],$row['product_id'],$row['color_id']);
        }
        return $result;
    }
    public static function findFirstImage(PDO $pdo , int $product_id){
        $statment=$pdo->prepare("SELECT image FROM product_color WHERE product_id =? LIMIT 1");
        $statment->execute([$product_id]);
        return $statment->fetchColumn();

    }
    public static function createProductColor(PDO $pdo,string $image,int $product_id,int $color_id): ProductColors|null{
        $statment=$pdo->prepare("INSERT INTO product_color(image,product_id,color_id)VALUES(?,?,?)");
        $success=$statment->execute( [ $image, $product_id, $color_id]);
        if($success){
            $id=(int)$pdo->lastInsertId();
            return new self($id,$image,$product_id,$color_id);
        }
        return null;
    }
    public static function getAll(PDO $pdo): array{
        $statment=$pdo->query("SELECT * FROM product_color");
        $rows=$statment->fetchAll(PDO::FETCH_ASSOC);
        $product_color=[];
        foreach($rows as $row){
             $product_color[]=new self($row['id'],$row['image'],$row['product_id'],$row['color_id']);
        }
        return $product_color;
    }
}
