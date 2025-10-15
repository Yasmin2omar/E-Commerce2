<?php

use App\Database;

$db = Database::getInstance($config)->getConnection();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
}


header("Location: index.php?page=users&deleted=1");
exit;