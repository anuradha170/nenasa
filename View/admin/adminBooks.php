<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books - Admin Panel | Nenasa BookSTORE</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/adminBooks.css">
</head>
<body>

    <section id="header">
        <a href="index.php"><img src="../images/Screenshot_20240329-180954~2.png" class="logo"
                style="width: 100px;height: 50px;" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="adminProductAdd.php" >Add Book</a>
                <li><a href="adminBooks.php" class="active">All Books</a>
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
        <h2>Book Inventory</h2>
        <table class="books-table">
            <thead>
                <tr>
                    <th>Image</th>  
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../../Model/connection.php';

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, name, price, author, image FROM products";
                $result = $conn->query($sql);

                if ($result === false) {
                    echo "<tr><td colspan='4'>Error: " . $conn->error . "</td></tr>";
                } elseif ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><img src='../" . $row['image'] . "' alt='" . $row['name'] . "' class='book-image'></td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['author'] . "</td>";
                        echo "<td>Rs " . $row['price'] . "</td>";
                        echo "<td><a href='../../Controller/editProduct.php?id=" . $row['id'] . "'>Edit</a> | <a href='../../Controller/deleteProduct.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No products found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </main>

    <footer class="section-p1">
    </footer>
</body>
</html>
