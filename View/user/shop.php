<?php
include '../../Model/connection.php';

$sql = "SELECT id, name, author, price, image FROM products"; // Ensure the table name and column names are correct
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Nenasa bookSTORE</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="index.php"><img src="../images/Screenshot_20240329-180954~2.png" class="logo"
            style="width: 100px;height: 50px;" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">HOME</a></li>
                <li><a class="active" href="shop.php">STORE</a></li>
                <li><a href="cart.php">CART</a></li>
                <li><a href="aboutUs.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="register.php">REGISTER</a></li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </div>
    </section>

    <section id="page-header">
        <h2>Super value Deals</h2>
        <p>Save more with coupons & upto 20% off</p>
    </section>

    <section id="book1" class="section-p1">
        <h2>Featured books</h2>
        <p>Translated books</p>
        <div class="book-container">
            <?php
            if ($result && $result->num_rows > 0) {  
                while($row = $result->fetch_assoc()) {
                    echo '<div class="book">';
                    echo '<a href="sbooks.php?id=' . $row["id"] . '"><img src="../' . $row["image"] . '" alt=""></a>';
                    echo '<div class="des">';
                    echo '<span>' . $row["name"] . '</span>';
                    echo '<h5>' . $row["author"] . '</h5>';
                    echo '<h4>rs ' . $row["price"] . '</h4>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="E:\nenasa\logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address: </strong> 61/5/24 alaswatta kirimetimulla thelijjawila</p>
            <p><strong>phone: </strong> 0774995719</p>
            <p><strong>Hours: </strong> 9.00 - 17.00,Mon - sat</p>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Condition</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign Up</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From Play STORE</p>
            <div class="row">
                <img src="../images/en_badge_web_generic.png" alt="">
            </div>

            <div class="copywright">
                <p>2021, Tech2etc - HTML CSS Ecommerce Template</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>
