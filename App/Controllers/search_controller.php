<?php

use App\Product;

$searchQuery = $_GET['search'] ?? '';

if (!empty($searchQuery)) {
    try {
        $results = Product::searchProducts($db, $searchQuery);
        $_SESSION['search_results'] = $results;
        $_SESSION['search_query'] = $searchQuery;
    } catch (Exception $e) {
        $_SESSION['errors'] = ["Search failed: " . $e->getMessage()];
    }
} else {
    $_SESSION['errors'] = ["Please enter a search term."];
}

header("Location: ./index.php?page=search_results");
exit;
