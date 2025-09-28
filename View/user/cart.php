<?php
session_start();
include '../../Model/connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT products.name, products.price, products.image, cart.quantity, cart.id AS cart_id
        FROM cart
        JOIN products ON cart.product_id = products.id
        WHERE cart.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

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
                <li><a href="shop.php">STORE</a></li>
                <li><a class="active" href="cart.php">CART</a></li>
                <li><a href="aboutUs.php">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="register.php">REGISTER</a></li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </div>
    </section>

    <?php
    if (isset($_SESSION['message'])) {
        echo '<script>alert("' . $_SESSION['message'] . '");</script>';
        unset($_SESSION['message']);
    }
    ?>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead style="background-color: #09814a;color: white;">
                <tr>
                    <td>&nbsp; Delete</td>
                    <td>Book Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $subtotal = $row['price'] * $row['quantity'];
                        $total += $subtotal;
                        echo '<tr>';
                        echo '<td><a href="../../Controller/remove_from_cart.php?id=' . $row["cart_id"] . '" class="removebtn">Remove</a></td>';
                        echo '<td>' . $row["name"] . '</td>';
                        echo '<td>Rs ' . $row["price"] . '</td>';
                        echo '<td><input type="number" value="' . $row["quantity"] . '" min="1" class="quantity" data-price="' . $row["price"] . '" data-cart-id="' . $row["cart_id"] . '"></td>';
                        echo '<td class="subtotal">Rs ' . $subtotal . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">Your cart is empty.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="subtotal" style="background-color: #ffd65c;color: #632303;">
            <h3 style="color: #632303;">Cart Total</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>Rs <span id="cart-subtotal"><?php echo $total; ?></span></td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>Rs <span id="cart-total"><?php echo $total; ?></span></strong></td>
                </tr>
            </table>
            <button class="normal">Proceed</button>
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

    <script>

document.addEventListener('DOMContentLoaded', function () {
    const quantityInputs = document.querySelectorAll('.quantity');
    const cartSubtotalElement = document.getElementById('cart-subtotal');
    const cartTotalElement = document.getElementById('cart-total');

    quantityInputs.forEach(input => {
        input.addEventListener('change', function () {
            const price = parseFloat(this.dataset.price);
            const quantity = parseInt(this.value);
            const subtotalElement = this.parentElement.nextElementSibling;

             const subtotal = price * quantity;
            subtotalElement.textContent = 'Rs ' + subtotal;

             updateCartTotal();
        });
    });

    function updateCartTotal() {
        let total = 0;

        quantityInputs.forEach(input => {
            const price = parseFloat(input.dataset.price);
            const quantity = parseInt(input.value);
            total += price * quantity;
        });

        cartSubtotalElement.textContent = total;
        cartTotalElement.textContent = total;
    }
});


    </script>
</body>

</html>
