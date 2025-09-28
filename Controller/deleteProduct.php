<?php

if (!isset($_GET['id'])) {
    die("ID parameter is missing");
}

$id = $_GET['id'];

require_once '../Model/connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM products WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Product deleted successfully'); window.location.href = '../View/admin/adminBooks.php';</script>";

} else {
    echo "Error deleting product: " . $conn->error;
}

$conn->close();
?>
