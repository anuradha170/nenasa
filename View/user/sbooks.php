<?php
session_start();
include '../../Model/connection.php';

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT name, author, price, description, image FROM products WHERE id = $product_id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Product not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare('INSERT INTO cart (user_id, product_id) VALUES (?, ?)');
    $stmt->bind_param('ii', $user_id, $product_id);
    $stmt->execute();
    $stmt->close();
    echo "<script>alert('Product added to cart successfully.');</script>";
    header('Location: cart.php');  
    exit;
}
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

    <section id="bookdetails" class="section-p1">
        <div class="book-detail-image">
            <img src="../<?php echo $product['image']; ?>" width="100%" alt="">
        </div>

        <div class="book-detailm">
            <h6>Translated books</h6>
            <h4><?php echo $product['name']; ?></h4>
            <h2>rs <?php echo $product['price']; ?></h2>
            <form method="post">
                <button class="normal" type="submit">Add to cart</button>
            </form>
            <h4>Details</h4>
            <span><?php echo $product['description']; ?></span>
        </div>
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
