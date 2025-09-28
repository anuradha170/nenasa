<?php
session_start();
require_once '../Model/connection.php';

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = trim($_POST['productName']);
    $productAuthor = trim($_POST['productAuthor']);
    $productPrice = trim($_POST['productPrice']);
    $productDescription = trim($_POST['productDescription']);
    $productImage = $_FILES['productImage'];

    if (empty($productName)) {
        $errors[] = 'Product name is required';
    }

    if (empty($productPrice) || !is_numeric($productPrice)) {
        $errors[] = 'Valid price is required';
    }

    if ($productImage['error'] !== UPLOAD_ERR_OK) {
        $errors[] = 'Image upload failed';
    }

    if (empty($productAuthor)) {
        $errors[] = 'Book author name is required';
    }

    if (empty($errors)) {
        $targetDir = "../Model/uploads/";
        $targetFile = $targetDir . basename($productImage["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($productImage["tmp_name"]);
        if ($check === false) {
            $errors[] = 'File is not an image';
        }

        if ($productImage["size"] > 5000000) {  
            $errors[] = 'Sorry, your file is too large';
        }

        $allowedFormats = array("jpg", "png", "jpeg", "gif");
        if (!in_array($imageFileType, $allowedFormats)) {
            $errors[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
        }

        if (empty($errors)) {
            $stmt = $conn->prepare('INSERT INTO products (name, price, description, image, author) VALUES (?, ?, ?, ?, ?)');
            
            if ($stmt === false) {
                $errors[] = 'Failed to prepare statement: ' . $conn->error;
            } else {
                $stmt->bind_param('sssss', $productName, $productPrice, $productDescription, $targetFile, $productAuthor);
                
                if ($stmt->execute()) {
                    echo "<script>alert('Product added successfully'); window.location.href = '../View/admin/adminBooks.php';</script>";
                    exit;
                } else {
                    $errors[] = 'Failed to execute statement: ' . $stmt->error;
                }
                
                $stmt->close();
            }
            
            if (!empty($errors)) {
                echo "<script>";
                echo "var errorMessages = " . json_encode($errors) . ";";
                echo "errorMessages.forEach(function(message) { alert(message); });";
                echo "</script>";
            }
        }
    }
}

$conn->close();
?>
