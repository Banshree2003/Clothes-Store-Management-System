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
                <li> <a href="male.php">Men</a></li>
                <li>Women</li>
                <li> <a href="kids.php">Kids</a></li>
            </ul>
        </div>
    </div>
    <div>
        <div>
            <img src="img/femalecoverimg.jpeg" alt="" width="100%">
        </div>
    </div>

    <div class="maleproducts">
        <div class="hhhhh">
            <div>
                <center><img src="img/female/1.webp" alt="" width="220px"></center>
            </div>
            <div>
                <center>
                    <h1>PEOPLE</h1>
                </center>
            </div>
            <div>
                <center>
                    <h2>Green Jacquard Thigh-Length Party Women High Waist Fit Shorts</h2>
                </center>
            </div>
            <div>
                <center>
                    <h3>₹200</h3>
                </center>
            </div>
            <div>
                <form method="POST">
                    <input type="hidden" name="product_name" value="PEOPLE">
                    <input type="hidden" name="product_price" value="₹200.00">
                    <input type="hidden" name="product_description" value="Green Jacquard Thigh-Length Party Women High Waist Fit Shorts">
                    <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                </form>
            </div>
        </div>
        <div class="hhhhh">
            <div>
                <center><img src="img/female/2.webp" alt="" width="220px"></center>
            </div>
            <div>
                <center>
                    <h1>HONEY</h1>
                </center>
            </div>
            <div>
                <center>
                    <h2>Medium Blue Printed V-Neck Casual Knee Length Full Sleeves Women Regular</h2>
                </center>
            </div>
            <div>
                <center>
                    <h3>₹259</h3>
                </center>
            </div>
            <div>
                <form method="POST">
                    <input type="hidden" name="product_name" value="honey">
                    <input type="hidden" name="product_price" value="₹259.00">
                    <input type="hidden" name="product_description" value="Medium Blue Printed V-Neck Casual Knee Length Full Sleeves Women Regular">
                    <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                </form>
            </div>
        </div>
        <div class="hhhhh">
            <div>
                <center><img src="img/female/3.avif" alt="" width="220px"></center>
            </div>
            <div>
                <center>
                    <h1>BIBA</h1>
                </center>
            </div>
            <div>
                <center>
                    <h2> V Neck Half Sleeves Ankle-Length Women Pant Kurta Set</h2>
                </center>
            </div>
            <div>
                <center>
                    <h3>₹300</h3>
                </center>
            </div>
            <div>
                <form method="POST">
                    <input type="hidden" name="product_name" value="honey">
                    <input type="hidden" name="product_price" value="₹300.00">
                    <input type="hidden" name="product_description" value=" V Neck Half Sleeves Ankle-Length Women Pant Kurta Set">
                    <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                </form>
            </div>
        </div>
        <div class="hhhhh">
            <div>
                <center><img src="img/female/4.avif" alt="" width="220px"></center>
            </div>
            <div>
                <center>
                    <h1>HONEY</h1>
                </center>
            </div>
            <div>
                <center>
                    <h2>Peach Self Design V Neck Casual Calf Length Full Sleeves Women Slim Fit Dress</h2>
                </center>
            </div>
            <div>
                <center>
                    <h3>₹499</h3>
                </center>
            </div>
            <div>
                <form method="POST">
                    <input type="hidden" name="product_name" value="honey">
                    <input type="hidden" name="product_price" value="₹499.00">
                    <input type="hidden" name="product_description" value=" Peach Self Design V Neck Casual Calf Length Full Sleeves Women Slim Fit Dress">
                    <center><input type="submit" name="add_to_cart" value="Add to Cart" class="btn"></center>
                </form>
            </div>
        </div>
    </div>

    <div class="malelast">
        <h1>ONLINE SHOPPING FOR WOMEN</h1>
        Women’s clothing has defined the fashion industry since forever. And now, the trends are reflected in women’s clothing online. Online shopping for women has provided a platform to choose from a plethora of women wear options and decide the trendiest clothes for women. Keeping in mind the importance of individuality in fashion trends today, the inclination to shop for women’s dresses online is not expected to slow down anytime soon.

        <h1>Shop for Women - Clothing & Accessories</h1>
        We, at Pantaloons, house one of the biggest collections of women’s clothing by the biggest brands. And to spoil you with classy choices we house some of the best brands in women wear including People, Honey, Annabelle, W, Latin Quarters, Dreamz, Van Heusen, Allen Solly, Marigold Lane, Spykar, Zink London and many more.
        <br></br>
        Western wear: Show up in style with our exhaustive range ofwestern wear for womenfrom premium brands. To add that touch of sophistication to your outfit, shop for blazers and jackets from Allen Solly and Van Heusen. When it comes to tops, we’ve got all the prints, all the patterns, the colours and the looks. Keep your wardrobe stylish with top wear from Marigold Lane, Spykar, Allen Solly, W, Van Heusen, Zink London and many other top brands.
        Pantaloons’ collection of women’s clothing will keep you looking fashionable from top to bottom. To get your hands on the trendiest bottom wear, choose your trousers, jeggings, jeans, leggings and much more from a selection of premium brands. This includes Biba, Bare Denim, Ajile, Spykar and more. And to get you all comfy for your night-time, we got the best sleepwear and pyjama sets from a number of brands to choose from.

        Ethnic wear: Get your Desi girl mode on with ourethnic wear for womento grab the spotlight at any occasion. From casual kurtas to lehengas, we got it all. From solid colours for simplicity to mesmerizing prints to stand out from the crowd, pick your choice from our extensive collection that will have you looking like a princess.

        These fabulous kurtas and churidars from Biba, W and Marigold Lane will make you look like a stunner. Shop for women’s clothing till you drop from our exhaustive collection. Stunning sets available in printed, embroidered and Anarkali, from a classy beige sharara by Global Desi to vibrantly printed palazzo by Aurelia, elevate your look with Pantaloons collection of bottom wear. Embrace classic chic with our spread of sarees in vibrant prints, made with cotton and silk.

        Footwear: Get a touch of glam to our outfit with heels and sandals from Forever Glam, and to get your office look, add a pair from Allen Solly. We believe that there should be no compromises to comfort. The same goes for shoes too, you deserve a pair that will keep you comfy all through the day. Ourwomen’s footwearcollection of sneakers, flip flops and casual shoes from one of the top brands like People, Forever Glam and more.

        Women’s Dresses: A good dress can get your compliments like no other. And our collection is just too good to skip. Choose from a wide range of brilliant prints and patterns by Akkriti. And to add a healthy dose of the glam head towards AND and W for their glamorous dresses. Now, you can also shop for women dresses online through our app.

        How to Choose the Best Women Wear Online?
        The sheer range of stylish outfits for women is huge. However, finding the right outfit for any occasion is a tricky part. An embroidered or printed shirt dress goes well with any occasion and works even as office wear due to its minimal stylings and chic look. But if you need a total boss lady look, go for a solid shirt with neutral colour trousers and a checked blazer, and a pair of black heels to add a finishing touch. While on vacation, keep it simple with a printed or graphic tee and a pair of washed shorts. To get the best women's clothing online, get your hands on the Pantaloons app.

        Accessories that go with Stylish Outfit for Women
        Accessories add that touch of detailing to elevate the look of any stylish outfits for women. Pair your formal dresses with a slim belt to elevate your waistline and a simple watch. Indian outfits are absolutely incomplete without the accessories however if done over the top, it steals the spotlight from the dress. Style your printed Indian outfits with a pair of heavy earrings to carry them with grace. For solid-coloured kurtas or sarees, a statement piece such as a pearl choker will get the job done. Shop handbags for womenand accessories from our collection to get every look right.
    </div>
</body>

</html>