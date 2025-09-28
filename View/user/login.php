<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login - Nenasa BookSTORE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <header id="header">
        <a href="index.php"><img src="../images/Screenshot_20240329-180954~2.png" class="logo"
                style="width: 100px;height: 50px;" alt=""></a>
        <nav>
            <ul id="navbar">
                <li><a href="index.php">HOME</a></li>
                <li><a href="shop.php">STORE</a></li>
                <li><a href="cart.php">CART</a></li>
                <li><a href="aboutUs.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="register.php">REGISTER</a></li>
                <li><a href="login.php">LOGIN</a></li>

            </ul>
        </nav>
    </header>

    <section id="login" class="section-p1">
        <h1 style="text-align: center;">Member Login</h1>
        <form action="../../Controller/loginHandler.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
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
