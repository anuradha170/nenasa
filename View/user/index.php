<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Nenasa bookSTORE </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="index.php"><img src="../images/Screenshot_20240329-180954~2.png" class="logo"
                style="width: 100px;height: 50px;" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">HOME</a>
                <li><a href="shop.php">STORE</a>
                <li><a href="cart.php">CART</a>
                <li><a href="aboutUs.php">ABOUT</a>
                <li><a href="contact.php">CONTACT</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">LOGOUT</a></li>
                <?php else: ?>
                    <li><a href="register.php">REGISTER</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                <?php endif; ?>

            </ul>
        </div>

    </section>

    <section id="hero">
        <!-- Video container -->
        <div class="video-container">
            <video autoplay muted loop poster="../video/poster.jpg">
                <source src="../indexbg.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <!-- Text overlay -->
            <div class="text-overlay">
                <h1>Nenasa Book-STORE</h1>
                <h4>Trade-in-offer</h4>
                <h2 style="color: wheat;">super value deals</h2>
                <h1>on all products</h1>
                <p>Welcome to Nenasa BookSTORE, your one-stop destination for a wide range of books. Explore our collection of translated, local, and international titles. Happy reading!</p>  
            </div>
        </div>
    </section>
    
    
    

    <section id="book1" class="section-p1">
        <h2>Featured books</h2>
        <p>Translated books</p>
        <div class="book-container">
            <div class="book">
                <img src="../monte_cristo_situwaraya_1_alexandre_dumas_ k_g_karunathilaka-500x500~2.jpg" alt="">
                <div class="des">
                    <span>monte cristo 1</span>
                    <h5>K.G.karunathilake</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>rs 450.00</h4>
                </div>
            </div>

            <div class="book">
                <img src="../Wanarayange-Tarzen-711x1024.jpg" alt="">
                <div class="des">
                    <span>wanarayange tarzon</span>
                    <h5>K.G.karunathilake</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>rs 400.00</h4>
                </div>
            </div>

            <div class="book">
                <img src="../IMG_20220126_144010.jpg" alt="">
                <div class="des">
                    <span>lohitha parikshanaya</span>
                    <h5>dr.chandana Mendis</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>rs 450.00</h4>
                </div>
            </div>
        </div>

        <div class="book-container">

            <div class="book">
                <img src="../mother-fcover-sri-lanka.jpg" alt="">
                <div class="des">
                    <span>Amma</span>
                    <h5>dadigama v rodrigo</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>rs 2450.00</h4>
                </div>
            </div>

            <div class="book">
                <img src="../Ea Hewath Ayesha - 01.PNG" alt="">
                <div class="des">
                    <span>ae hewath ayesha 1</span>
                    <h5>K.G.karunathilake</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>rs 450.00</h4>
                </div>
            </div>

            <div class="book">
                <img src="../Harry_Poter_Saha_Maya_Gala.jpg" alt="">
                <div class="des">
                    <span>Harry potter and the socerers stone</span>
                    <h5>abhaya hewawasam</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>rs 3550.00</h4>
                </div>
            </div>
        </div>


    </section>

    <section id="banner" class="section-m1">
        <h4> In This valentine month</h4>
        <h2>Up to<span> 40% off</span> All novels & local books</h2>
        <a href="shop.php"><button class="normal">Explore More</button></a>

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