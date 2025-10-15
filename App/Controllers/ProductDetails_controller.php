<?php
namespace App\Controllers;
class ProductDetails_controller{
    public static function sendId($db): ?int {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['product_id'])) {
                $productId = $_POST['product_id'];
                header("Location: index.php?page=product-details&id=" . $productId);
                exit;
            }
        }
        return null;
    }
}
