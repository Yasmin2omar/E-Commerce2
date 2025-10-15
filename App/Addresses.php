<?php 
namespace App;

use PDO;

class Addresses{
    private int $id;
    private int $customer_id;
    private string $street1;
    private string $city;
    private string $state;
    private string $country;
    private string $type;
    private ?string $street2=null;
    public function __construct(int $id,int $customer_id,string $street1,string $city,string $state,string $country,string $type,?string $street2){ 
        $this->id=$id;
        $this->customer_id=$customer_id;
        $this->street1=$street1;
        $this->street2=$street2;
        $this->city=$city;
        $this->state=$state;
        $this->country=$country;
        $this->type=$type;
    }
    public  function getId(): int{
        return $this->id;
    }
    public  function getCustomerId(): int{
        return $this->customer_id;
    }
    public  function getStreet1(): string{
        return $this->street1;
    }
    public  function getStreet2(): string{
        return $this->street2;
    }
    public  function getCity(): string{
        return $this->city;
    }
    public  function getState(): string{
        return $this->state;
    }
    public  function getCountry(): string{
        return $this->country;
    }
    public  function getType(): string{
        return $this->type;
    }
    public static function saveAddress(PDO $pdo,int $customer_id,string $street1,?string $street2,string $city,string $state,string $country,string $type): Addresses|null{
        $statment=$pdo->prepare("INSERT INTO addresses (customer_id,street1,street2,city,state,country,type)VALUES(?,?,?,?,?,?,?)");
        $success=$statment->execute([$customer_id,$street1,$street2,$city,$state,$country,$type]);
        if($success){
            $id=(int)$pdo->lastInsertId();
            return new self($id,$customer_id,$street1,$street2,$city,$state,$country,$type);
        }return null;
    }
    public static function getAdressByCustomerId(PDO $pdo,int $id): mixed{
        $statment=$pdo->prepare("SELECT * FROM addresses WHERE customer_id=?");
        $statment->execute([$id]);
        $row=$statment->fetch(PDO::FETCH_ASSOC);
        if($row){
            return $row;
        }return false;
    }
}