<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:ital@1&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    session_start();

    function isUserLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    function loginUser($user_id)
    {
        $_SESSION['user_id'] = $user_id;
    }

    function logoutUser()
    {
        unset($_SESSION['user_id']);
    }

    if (!isUserLoggedIn()) {
        header('Location: login.php');
        exit;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_POST['add_to_cart'])) {
        $productName = $_POST['product_name'];
        $productPrice = $_POST['product_price'];
        $productDescription = $_POST['product_description'];
        $product = [
            'name' => $productName,
            'price' => $productPrice,
            'description' => $productDescription,
        ];
        addToCart($product);
    }

    function addToCart($product)
    {
        $_SESSION['cart'][] = $product;
    }

    if (isset($_COOKIE['user_name'])) {
        $userName = $_COOKIE['user_name'];
    } else {
        $userName = 'Guest';
    }

    ?>

    <div class="nav">
        <div class=".search">
            <img src="img/icons8-search-50.png" alt="" width="20px" class="search-icon">
            <input type=" search" name="" id="" class="search1" placeholder="Search...">
        </div>
        <div class="item">
            <div class="flexxx">
                <div>
                    <a href="login.php">
                        <img src="img/icons8-user-24.png" alt="">
                    </a>
                </div>
                <p><?php echo $userName; ?></p>
            </div>
            <div>
                <a href="cart.php"><img src="img/icons8-cart-30.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="nav2">
        <div class="webname">
            <h4>Style Haven</h4>
        </div>
        <div class="ul1">
            <ul>
                <li>Home</li>
                <li> <a href="male.php">Men</a></li>
                <li> <a href="female.php">Women</a></li>
                <li> <a href="kids.php">Kids</a></li>
            </ul>
        </div>
    </div>
    <div>
        <div>
            <img src="img/asdasdasd.jpg" alt="" width="100%">
        </div>
    </div>

    <div class="product">
        <div class="producttitle">
            <h1>Deals of the Day</h1>
        </div>
        <div class="productlist">
            <div class="pro">
                <div class="productimg">
                    <img src="img/products/12.avif" alt="" width="220px">
                </div>
                <div class="productname">
                    <h4>Bare Denim</h4>
                </div>
                <div class="productinfo">
                    <center>
                        <h5>Off White Floral Printed Round Neck Casual Women Regular Fit Dress
                        </h5>
                    </center>
                </div>
                <div>
                    <center>
                        <h3>₹1036</h3>
                    </center>
                </div>
                <div>
                    <form method="POST">
                        <input type="hidden" name="product_name" value="Bare Denim">
                        <input type="hidden" name="product_price" value="₹1036.00">
                        <input type="hidden" name="product_description" value="Off White Floral Printed Round Neck Casual Women Regular Fit Dress">
                        <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                    </form>
                </div>
            </div>
            <div class="pro">
                <div class="productimg">
                    <img src="img/products/2.avif" alt="" width="220px">
                </div>
                <div class="productname">
                    <h4>Bare Denim</h4>
                </div>
                <div class="productinfo">
                    <center>
                        <h5>Medium Blue Solid Ankle-Length Casual Women Skinny Fit Jeans</h5>
                    </center>
                </div>
                <div>
                    <center>
                        <h3>₹934</h3>
                    </center>
                </div>
                <div>
                    <form method="POST">
                        <input type="hidden" name="product_name" value="Bare Denim">
                        <input type="hidden" name="product_price" value="₹934.00">
                        <input type="hidden" name="product_description" value="Medium Blue Solid Ankle-Length Casual Women Skinny Fit Jeans">
                        <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                    </form>
                </div>
            </div>
            <div class="pro">
                <div class="productimg">
                    <img src="img/products/3.webp" alt="" width="220px">
                </div>
                <div class="productname">
                    <h4>SF Jeans</h4>
                </div>
                <div class="productinfo">
                    <center>
                        <h5>Black Check Casual 3/4th Sleeves Round Neck Women Regular Fit Shirt</h5>
                    </center>
                </div>
                <div>
                    <center>
                        <h3>₹779</h3>
                    </center>
                </div>
                <div>
                    <form method="POST">
                        <input type="hidden" name="product_name" value="SF Jeans">
                        <input type="hidden" name="product_price" value="₹779.00">
                        <input type="hidden" name="product_description" value="Black Check Casual 3/4th Sleeves Round Neck Women Regular Fit Shirt">
                        <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                    </form>
                </div>
            </div>
            <div class="pro">
                <div class="productimg">
                    <img src="img/products/4.avif" alt="" width="220px">
                </div>
                <div class="productname">
                    <h4>Ajile</h4>
                </div>
                <div class="productinfo">
                    <center>
                        <h5>Black Printed Active Wear Half Sleeves Round Neck Women Regular Fit Top</h5>
                    </center>
                </div>
                <div>
                    <center>
                        <h3>₹499</h3>
                    </center>
                </div>
                <div>
                    <form method="POST">
                        <input type="hidden" name="product_name" value="Ajile">
                        <input type="hidden" name="product_price" value="₹499.00">
                        <input type="hidden" name="product_description" value="Black Printed Active Wear Half Sleeves Round Neck Women Regular Fit Top">
                        <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                    </form>
                </div>
            </div>
            <div class="pro">
                <div class="productimg">
                    <img src="img/products/5.avif" alt="" width="220px">
                </div>
                <div class="productname">
                    <h4>Bare Denim</h4>
                </div>
                <div class="productinfo">
                    <center>
                        <h5>Medium Blue Solid Casual Elbow Sleeves Regular Collar Women Regular Fit Shirt</h5>
                    </center>
                </div>
                <div>
                    <center>
                        <h3>₹869</h3>
                    </center>
                </div>
                <div>
                    <form method="POST">
                        <input type="hidden" name="product_name" value="Bare Denim">
                        <input type="hidden" name="product_price" value="₹869.00">
                        <input type="hidden" name="product_description" value="Medium Blue Solid Casual Elbow Sleeves Regular Collar Women Regular Fit Shirt">
                        <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="producttitle">
        <h1>Shop By Occasion</h1>
    </div>
    <div class="cover">
        <div>
            <div class="cover1">
                <center> <img src="img/coverimg/image.jpeg" alt=""></center>
            </div>
            <div class="covername">
                <h1>Super Staples</h1>
            </div>
        </div>
        <div>
            <div class="cover1">
                <center> <img src="img/coverimg/image1.jpeg" alt=""></center>
            </div>
            <div class="covername">
                <h1>Outdoor</h1>
            </div>
        </div>
        <div>
            <div class="cover1">
                <center> <img src="img/coverimg/image2.jpeg" alt=""></center>
            </div>
            <div class="covername">
                <h1>Festive Season</h1>
            </div>
        </div>
        <div>
            <div class="cover1">
                <center> <img src="img/coverimg/imag3.jpeg" alt=""></center>
            </div>
            <div class="covername">
                <h1>Feels Like Spring</h1>
            </div>
        </div>
    </div>

    <div class="hh">
        <img src="img/sdlkllbhlksbdlkbfsld.png" alt="" width="100%">
    </div>

    <div class="last">
        <h2>© copyrights 2023 Banshree All Rights Reserved. </h2>
    </div>
</body>

</html>