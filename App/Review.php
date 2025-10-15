<?php
namespace App;

use PDO;

class Review {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function addReview($product_id, $user_id, $name, $email, $rating, $comment) {
        $sql = "INSERT INTO reviews (product_id, user_id, name, email, rating, comment) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$product_id, $user_id, $name, $email, $rating, $comment]);
    }
    public function getReviews($product_id) {
        $sql = "SELECT * FROM reviews WHERE product_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}