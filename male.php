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
                <li> <a href="index.php">Home</a></li>
                <li>Men</li>
                <li> <a href="female.php">Women</a></li>
                <li> <a href="kids.php">Kids</a></li>
            </ul>
        </div>
    </div>
    <div>
        <div>
            <img src="img/47513566183454.jpg" alt="" width="100%">
        </div>
    </div>

    <div class="maleproducts">
        <div class="hhhhh">
            <div>
                <center><img src="img/male/1.avif" alt="" width="220px"></center>
            </div>
            <div>
                <center>
                    <h1>Spykar</h1>
                </center>
            </div>
            <div>
                <center>
                    <h2>White Solid Casual Full Sleeves Regular Collar Men Slim Fit Shirt</h2>
                </center>
            </div>
            <div>
                <center>
                    <h3>₹200</h3>
                </center>
            </div>
            <div>
                <form method="POST">
                    <input type="hidden" name="product_name" value="Spykar">
                    <input type="hidden" name="product_price" value="₹200.00">
                    <input type="hidden" name="product_description" value="White Solid Casual Full Sleeves Regular Collar Men Slim Fit Shirt">
                    <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                </form>
            </div>
        </div>
        <div class="hhhhh">
            <div>
                <center><img src="img/male/2.avif" alt="" width="220px"></center>
            </div>
            <div>
                <center>
                    <h1>7 ALT</h1>
                </center>
            </div>
            <div>
                <center>
                    <h2>Medium Grey Stripe Casual Half Sleeves Collar Men Relaxed Fit Shirt</h2>
                </center>
            </div>
            <div>
                <center>
                    <h3>₹259</h3>
                </center>
            </div>
            <div>
                <form method="POST">
                    <input type="hidden" name="product_name" value="7 ALT">
                    <input type="hidden" name="product_price" value="₹259.00">
                    <input type="hidden" name="product_description" value="Medium Grey Stripe Casual Half Sleeves Collar Men Relaxed Fit Shirt">
                    <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                </form>
            </div>
        </div>
        <div class="hhhhh">
            <div>
                <center><img src="img/male/3.avif" alt="" width="220px"></center>
            </div>
            <div>
                <center>
                    <h1>PEOPLE</h1>
                </center>
            </div>
            <div>
                <center>
                    <h2>Olive Solid Casual Full Sleeves Mandarin Men Slim Fit Shirt</h2>
                </center>
            </div>
            <div>
                <center>
                    <h3>₹359</h3>
                </center>
            </div>
            <div>
                <form method="POST">
                    <input type="hidden" name="product_name" value="PEOPLE">
                    <input type="hidden" name="product_price" value="₹359.00">
                    <input type="hidden" name="product_description" value="Olive Solid Casual Full Sleeves Mandarin Men Slim Fit Shirt">
                    <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                </form>
            </div>
        </div>
        <div class="hhhhh">
            <div>
                <center><img src="img/male/4.webp" alt="" width="220px"></center>
            </div>
            <div>
                <center>
                    <h1>INDUS ROUTE</h1>
                </center>
            </div>
            <div>
                <center>
                    <h2>White Solid Full Length Casual Men Regular Fit Salwar</h2>
                </center>
            </div>
            <div>
                <center>
                    <h3>₹459</h3>
                </center>
            </div>
            <div>
                <form method="POST">
                    <input type="hidden" name="product_name" value="INDUS ROUTE">
                    <input type="hidden" name="product_price" value="₹459.00">
                    <input type="hidden" name="product_description" value="White Solid Full Length Casual Men Regular Fit Salwar">
                    <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                </form>
            </div>
        </div>
    </div>

    <div class="malelast">
        <h1>ONLINE SHOPPING FOR MEN</h1>
        <p>
            Men’s clothing is experiencing its dynamic era now. With its ever-evolving styles, textures and
            patterns, men’s dresses are all set to stun the world. From, office to casual wear and from party to
            fitness wear, the world of fashion has placed its spotlight on men and it is not expected to shift
            anytime soon. Online shopping for men also has a huge impact on such trends as it is accessible.
        </p>


        <h1>Shop for Men - Clothing & Accessories</h1>
        <p>
            For the men who want to show up in style, Pantaloons men’s dresses collection has a plethora of options,
            so you can always have your outfit on fleek, includingethnic wear for men. We house some of the biggest
            brands in men’s fashion, which include Bare Denim, People, Peter England Casuals, SF Jeans, Byford, 7
            ALT, Urban Ranger and the list goes on.
        </p>
        <br>
        <p>
            - T-Shirts: Ourtop wear for mencollection features one of the finest men’s wear clothing. It is
            available in vibrant colours and stripes. Perfect for any occasion.
            <br>
            - Shirts: Shirts are the go-to item for any event. Pantaloons bring to you the best quality shirts from
            your favourite men’s wear brands.
            <br>
            - Jackets: Keep the cold away and style closer to you. Our collection of jackets features one of the
            comfiest and most fashionable jackets.
            <br>
            - Sweatshirts: Textured, printed, hooded we’ve got it all. Our sweatshirts andactive wear for menwill
            have you looking stylish even during the colder months.
            <br>
            - Trousers: Trousers are an integral part of any outfit, so why not trust the best? For casual or formal
            trousers in men’s clothing, Pantaloons is the way to go.
            <br>
            - Jeans & Joggers: Add a touch of rugged look to your men’s clothing with our extensivebottom wearfor
            men including the jeans and joggers collection.
            <br>
            - Kurtas: Get your Desi swag on with our kurtas from the most trusted brands. From embroidered to
            printed, you will be spoiled with options for men’s clothing.
            <br>
            How to Choose the Best Men's Wear Online?
            The way you dress reflects a lot on your personality. Your outfit can do a lot more for your confidence
            than you can imagine.
            <br>
            - Colour: Dress up in a simple solid formal shirt and trousers with sleek shoes for a sophisticated
            office look. Or for a sharp look try a slim-fit checkered shirt with well-cut trousers. To achieve a
            smart yet relaxed look pair a simple printed shirt with a pair of washed jeans. This festive season is
            all about simplicity and sophistication. So, pastels are the way to go, men’s dresses look the best in
            pastels. Choose a simple solid-coloured kurta and pair it with a complementary pastel-shaded pyjama to
            get that cool and polished look.
            <br>
            - Accessories: You can also add Aviator style glasses to your outfit for that added swag. Or a matching
            belt with your formal outfit will elevate the look like no other. Online shopping for men has made it
            easier to get your hands on that perfect piece of accessory.
            <br>
            - Fabric: Comfort comes first no matter what the occasion. Choose a soft and breathable fabric that will
            keep your skin cool and dry all day long.
            <br>
            Accessories that go with Stylish Clothes for Men
            The world of fashion is ever-evolving. Along with stylish clothes for men, you also need complementary
            accessories to get that all-rounded look.
            <br>
            - Pair of sneakers or sports shoes will provide you with the necessary comfort during your workout.
        </p>
    </div>
</body>

</html>