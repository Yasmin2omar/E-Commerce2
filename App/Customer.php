<?php
namespace App;

use PDO;

class Customer{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $country;
    private string $city;
    private string $state;
    private string $email;
    private string $phone;
    private string $password;
    private string $check_method;
    private string $street1;
    private ?string $street2=null;
    private ?string $company_name=null;
    public function __construct( 
        int $id,
        string $first_name,
        string $last_name,
        ?string $company_name,
        string $country,
        string $city,
        string $state,
        string $email,
        string $phone,
        string $password,
        string $check_method,
        string $street1,
        ?string $street2
        ){
            $this->id=$id;
            $this->first_name=$first_name;
            $this->last_name=$last_name;
            $this->company_name=$company_name;
            $this->country=$country;
            $this->city=$city;
            $this->state=$state;
            $this->street1=$street1;
            $this->street2=$street2;
            $this->email=$email;
            $this->phone=$phone;
            $this->password=$password;
            $this->check_method=$check_method;
        }
    public  function getId(): int{
        return $this->id;
    }
    public  function getFirstName(): string{
        return $this->first_name;
    }
    public  function getLastName(): string{
        return $this->last_name;
    }
    public  function getCountry(): string{
        return $this->country;
    }
    public  function getCity(): string{
        return $this->city;
    }
    public  function getState(): string{
        return $this->state;
    }
    public  function getStreet1(): string{
        return $this->street1;
    }
    public  function getStreet2(): string{
        return $this->street2;
    }
    public  function getPhone(): string{
        return $this->phone;
    }
    public  function getEmail(): string{
        return $this->email;
    }
    public  function getMethod(): string{
        return $this->check_method;
    }
    public  function getCompany(): string{
        return $this->company_name;
    }
    public static function saveCustomer(PDO $pdo,string $first_name, string $last_name,?string $company_name,string $country,string $city,string $state, string $email, string $phone, string $password,string $check_method,string $street1,?string $street2): Customer|null{
        $hash_password=password_hash($password,PASSWORD_DEFAULT);
        $statment=$pdo->prepare("INSERT INTO customers (first_name,last_name,company_name,country,city,state,email,phone,password,payment_method,street1,street2)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
        $success=$statment->execute([ $first_name,  $last_name, $company_name, $country, $city, $state,  $email,  $phone,  $hash_password, $check_method,$street1,$street2]);
        if($success){
            $id=(int)$pdo->lastInsertId();
            return new self($id,$first_name,$last_name,$company_name,$country,$city,$state,$email,$phone,$password,$check_method,$street1,$street2);
        }
        return null;
    }    
    public static function getAll(PDO $pdo): array{
        $statment=$pdo->query("SELECT * FROM customers");
        $rows=$statment->fetchAll(PDO::FETCH_ASSOC);
        $customers=[];
        foreach($rows as $row){
             $customers[]=new self($row['id'],$row['first_name'],$row['last_name'],$row['company_name'],$row['country'],$row['city'],$row['state'],$row['email'],$row['phone'],$row['password'],$row['payment_method'],$row['street1'],$row['street2']);
        }
        return $customers;
    }
    public static function getCustomerNameById(PDO $pdo,$customer_id): mixed{
       $statment=$pdo->prepare("SELECT first_name FROM customers WHERE id=?");
       $statment->execute([$customer_id]);
       $row=$statment->fetch(PDO::FETCH_ASSOC);
       if($row){
            return $row['first_name'];
       }return false;
    }
    public static function getCustomerPhoneById(PDO $pdo,$customer_id): mixed{
       $statment=$pdo->prepare("SELECT phone FROM customers WHERE id=?");
       $statment->execute([$customer_id]);
       $row=$statment->fetch(PDO::FETCH_ASSOC);
       if($row){
            return $row['phone'];
       }return false;
    }
    public static function getCustomerEmailById(PDO $pdo,$customer_id): mixed{
       $statment=$pdo->prepare("SELECT email FROM customers WHERE id=?");
       $statment->execute([$customer_id]);
       $row=$statment->fetch(PDO::FETCH_ASSOC);
       if($row){
            return $row['email'];
       }return false;
    }
    public static function removeCustomer(PDO $pdo,int $id): bool{
        $statment=$pdo->prepare("DELETE FROM customers WHERE id=?");
        $success=$statment->execute([$id]);
        if($success){
            return true;
        }return false;
    }
}