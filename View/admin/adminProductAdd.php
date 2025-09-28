<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Admin Panel | Nenasa BookSTORE</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/adminSTYLE.css">
</head>

<body>
    <section id="header">
        <a href="index.php"><img src="../Screenshot_20240329-180954~2.png" class="logo" style="width: 100px;height: 50px;" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="adminProductAdd.php" class="active">Add Book</a>
                <li><a href="adminBooks.php">All Books</a>
                <?php
                session_start();
                
                 if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
                    echo '<li><a href="../Controller/logout.php">Logout</a></li>';
                }
                ?>
            </ul>
        </div>

    </section>

    <main class="admin-main">
        <section class="add-product-form">
            <h2>Add New Product</h2>
            <form action="../../Controller/productAddHandler.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="productName">Book Name:</label>
                    <input type="text" id="productName" name="productName" required>
                </div>
                <div class="form-group">
                    <label for="productAuthor">Author:</label>
                    <input type="text" id="productAuthor" name="productAuthor" required>
                </div>
                <div class="form-group">
                    <label for="productPrice">Price:</label>
                    <input type="text" id="productPrice" name="productPrice" required>
                </div>
                <div class="form-group">
                    <label for="productDescription">Description:</label>
                    <textarea id="productDescription" name="productDescription" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="productImage">Image:</label>
                    <input type="file" id="productImage" name="productImage" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="submit-btn">Add Product</button>
                </div>
            </form>
        </section>
    </main>

</body>

</html>