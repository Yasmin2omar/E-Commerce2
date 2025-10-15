<?php
namespace App;

use PDO;

class Contact {
    private PDO $conn;
    private ?int $id = null;
    private ?int $user_id = null;
    private ?string $name = null;
    private ?string $email = null;
    private ?string $message = null;

    public function __construct(PDO $db, ?int $id = null, ?int $user_id = null, ?string $name = null, ?string $email = null, ?string $message = null) {
        $this->conn = $db;
        $this->id = $id;
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }
    public function store(?int $user_id, string $name, string $email, string $message) {
        $stmt = $this->conn->prepare("INSERT INTO messeges (user_id, name, email, messege)VALUES (?, ?, ?, ?)");

        $success= $stmt->execute([$user_id, $name, $email, $message]);
        if($success){
             $id = (int)$this->conn->lastInsertId();
             return new self($this->conn, $id, $user_id, $name, $email, $message);
        }return null;
    }
}
