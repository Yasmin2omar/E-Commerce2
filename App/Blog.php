<?php
namespace App;

use PDO;

class Blog{
    private int $id;
    private string $title;
    private string $short_description;
    private string $long_description;
    private string $image;
    public function __construct(int $id,string $title,string $short_description,string $long_description,string $image){
        $this->id=$id;
        $this->title=$title;
        $this->short_description=$short_description;
        $this->long_description=$long_description;
        $this->image=$image;
    }
    public function getId(): int{
        return $this->id;
    }
    public function getTitle(): string{
        return $this->title;
    }
    public function getShDes(): string{ 
        return $this->short_description;
    }
    public function getLoDes(): string{ 
        return $this->long_description;
    }
    public static function getCreator(PDO $pdo ,int $id){ 
        $statment=$pdo->prepare("SELECT creator FROM blogs WHERE id=?");
        $statment->execute([$id]);
        $creator=$statment->fetch(PDO::FETCH_ASSOC);
        if($creator){
            return $creator;
        }return false;
    }
    public function getTime(PDO $pdo ,int $id){  
        $statment=$pdo->prepare("SELECT created_at FROM blogs WHERE id=?");
        $statment->execute([$id]);
        $time=$statment->fetch(PDO::FETCH_ASSOC);
        if($time){
            return $time;
        }return false;
    }
    public function getImage(): string{ 
        return $this->image;
    }
    public static function getAll(PDO $pdo): array{
        $statment=$pdo->query("SELECT * FROM blogs");
        $rows=$statment->fetchAll(PDO::FETCH_ASSOC);
        $blogs=[];
        foreach($rows as $row){
             $blogs[]=new self($row['id'],$row['Title'],$row['short_description'],$row['long_description'],$row['image']);
        }
        return $blogs;
    }
    public static function getBlogById(PDO $pdo,int $id){
        $statment=$pdo->prepare("SELECT * FROM blogs WHERE id=?");
        $statment->execute([$id]);
        $row=$statment->fetch(PDO::FETCH_ASSOC);
        if($row){
            return $row;
        }return false;
    }
    public static function createBlog(PDO $pdo,string $title,string $short_description,string $long_description,string $image): Blog|null{
        $statment=$pdo->prepare("INSERT INTO blogs(title,short_description,long_description,image)VALUES(?,?,?,?)");
        $success=$statment->execute([$title,$short_description,$long_description,$image]);
        if($success){
            $id=$pdo->lastInsertId();
            return new self($id,$title,$short_description,$long_description,$image);
        }
        return null;
    }
    public static function deleteBlogById($pdo ,$id): bool{
        $statment=$pdo->prepare("DELETE FROM blogs WHERE id=?");
        $success=$statment->execute([$id]);
        if($success){
            return true;
        }
            return false;
    }
}