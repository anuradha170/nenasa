<?php
require_once '../Model/connection.php';

if (!isset($_GET['id'])) {
    die("ID parameter is missing");
}

$id = $_GET['id'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, price, author, image FROM products WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/admin/css/style.css">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="text"], input[type="file"], input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #16a085;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 14px;

        }
        input[type="submit"]:hover {
            background-color: #1abc9c;
            border-radius: 14px;
        }
        .back-button {
            background-color: #f44336;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 14px;
        }
    </style>
</head>
<body>

<section id="header">
        <a href="index.php"><img src="../View/images/Screenshot_20240329-180954~2.png" class="logo"
                style="width: 100px;height: 50px;" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="../View/admin/adminProductAdd.php" >Add Book</a>
                <li><a href="../View/admin/adminBooks.php" class="active">All Books</a>
                <?php
                session_start();
                
                 if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
                    echo '<li><a href="./logout.php">Logout</a></li>';
                }
                ?>
            </ul>
        </div>

    </section>

    <div class="container">
        <h2>Edit Product</h2>
        <form action="updateProduct.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo $row['author']; ?>">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>">
            <label for="image">Choose Image:</label>
            <input type="file" id="image" name="image">
            <input type="submit" value="Update">
            <a href="../View/admin/adminBooks.php" class="back-button">Go Back</a>
            </form>
    </div>
</body>
</html>
<?php
} else {
    echo "Product not found";
}

$conn->close();
?>
