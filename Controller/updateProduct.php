<?php
require_once '../Model/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['id'])) {
        die("ID parameter is missing");
    }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name=?, author=?, price=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $name, $author, $price, $id);

    if ($stmt->execute()) {
        echo "Product details updated successfully.<br>";
    } else {
        echo "Error updating product details: " . $conn->error . "<br>";
    }

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../Model/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.<br>";
            $uploadOk = 0;
        }

        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $sql = "UPDATE products SET image=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $targetFile, $id);

                if ($stmt->execute()) {
                    echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded and product image updated.<br>";
                } else {
                    echo "Error updating image: " . $conn->error . "<br>";
                }
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    }

    echo "<script>alert('Book Detail updated successfully.'); window.location.href = '../View/admin/adminBooks.php';</script>";
} else {
    echo "Method not allowed.";
}

$conn->close();
?>
