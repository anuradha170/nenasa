<?php
session_start();
include '../Model/connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../View/user/login.php');
    exit;
}

$cart_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($cart_id > 0) {
    $stmt = $conn->prepare('DELETE FROM cart WHERE id = ? AND user_id = ?');
    $stmt->bind_param('ii', $cart_id, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->close();
    $_SESSION['message'] = 'Item removed successfully';
}

header('Location: ../View/user/cart.php');
exit;
?>
