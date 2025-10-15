<?php

namespace App;

use PDO;

class Category{
    private int $id;
    private string $name;
    public function __construct(int $id,string $name){
        $this->id=$id;
        $this->name=$name;
    }
    public function getID(): int{
        return $this->id;
    }
    public function getName(): string{
        return $this->name;
    }
    public static function getAll(PDO $pdo): array{
        $statment=$pdo->query("SELECT * FROM categories");
        $rows=$statment->fetchAll(PDO::FETCH_ASSOC);
        $categories=[];
        foreach($rows as $row){
             $categories[]=new self($row['id'],$row['name']);
        }
        return $categories;
    }
    public static function findByID(PDO $pdo , int $id): Category|null{
        $statment=$pdo->prepare("SELECT * FROM categories WHERE id =?");
        $statment->execute([$id]);
        $row=$statment->fetch(PDO::FETCH_ASSOC);
        if($row){
            return new self($row['id'],$row['name']);
        }
        return null;
    }
        public static function createCategory(PDO $pdo,string $name): Category|null{
        $statment=$pdo->prepare("INSERT INTO categories(name)VALUES(?)");
        $success=$statment->execute( [$name]);
        if($success){
            $id=(int)$pdo->lastInsertId();
            return new self($id,$name);
        }
        return null;
    }
    public static function removeCategory(PDO $pdo,int $id): bool{
        $statment=$pdo->prepare("DELETE FROM categories WHERE id=?");
        $success=$statment->execute([$id]);
        if($success){
            return true;
        }return false;
    }
    public static function updateCategory(PDO $pdo,int $id ,string $newName){
        $statment=$pdo->prepare("UPDATE categories SET name =? WHERE id=?");
        $success=$statment->execute([$newName,$id]);
        if($success){
            return true;
        }
        return false;
    }
}