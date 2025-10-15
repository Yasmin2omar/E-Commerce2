<?php
namespace App;

use PDO;

class BlogComment {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addComment($blog_id, $name, $email, $comment) {
        $sql = "INSERT INTO blog_comments (blog_id, name, email, comment) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$blog_id, $name, $email, $comment]);
    }

    public function getComments($blog_id) {
        $sql = "SELECT * FROM blog_comments WHERE blog_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$blog_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}