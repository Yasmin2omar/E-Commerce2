<?php
namespace App;

use PDO;

class Messege{
    private int $id;
    private ?int $user_id=null;
    private string $name;
    private string $email;
    private string $messege;
    public function __construct(int $id,string $name,string $email,string $messege,?int $user_id){
        $this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->messege=$messege;
        $this->user_id=$user_id;
    }
    public function getId(): int{
        return $this->id;
    }
    public function getUserId(): int{
        return $this->user_id;
    }
        public function getName(): string {
        return $this->name;
    }
        public function getEmail(): string{
        return $this->email;
    }
        public function getMessege(): string{
        return $this->messege;
    }
    public static function getAll(PDO $pdo): array{
        $statment=$pdo->query("SELECT * FROM messeges");
        $rows=$statment->fetchAll(PDO::FETCH_ASSOC);
        $messeges=[];
        foreach($rows as $row){
             $messeges[]=new self($row['id'],$row['name'],$row['email'],$row['messege'],$row['user_id']);
        }
        return $messeges;
    }    
    public static function removeMessege(PDO $pdo,int $id){
        $statment=$pdo->prepare("DELETE FROM messeges WHERE id=?");
        $success=$statment->execute([$id]);
        if($success){
            return true;
        }return false;
    }
}