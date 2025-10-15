<?php
namespace App;

use PDO;

class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($data) {
        $query = "INSERT INTO {$this->table} 
                  (first_name, last_name, email, password, phone, address)
                  VALUES (:first_name, :last_name, :email, :password, :phone, :address)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":first_name", $data['first_name']);
        $stmt->bindParam(":last_name", $data['last_name']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":password", $data['password']);
        $stmt->bindParam(":phone", $data['phone']);
        $stmt->bindParam(":address", $data['address']);

        $success= $stmt->execute();
        if($success){
            $id = (int)$this->conn->lastInsertId();
            return $id;
        }
    }

    public function emailExists($email) {
        $query = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
}
//---------------------------------------------------------------------------
//login
public function getUserByEmail($email)
{
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($user['email'] == "Admin@gmail.com") {
            header("Location: ./admin/index.php?page=orders");
            exit;
        }
        return $user;
    }

    return null; 
}
public function getAdminEmail($email)
{
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user= $stmt->fetch(PDO::FETCH_ASSOC);
    if($user['email']=="Admin@gmail.com"){
        header("location: ./../admin/index.php?page=login");
        exit;
    }return false;
}
//------------------------------------------------------------------------------
//reset-password
public function updatePassword($id, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE {$this->table} SET password = :password WHERE id = :id";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
       return $stmt->fetch(PDO::FETCH_ASSOC) !== false;

    }

    return false;
}
}