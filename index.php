<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AZ Store">
    <link rel="stylesheet" href="./assets/css/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Outline&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>AZ Store</title>
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-900 to-black">
    <?php
    include "./header.php"
    ?>
    <main>
        <section class="flex justify-around mx-25 items-center mt-32">
            <article class="flex-col w-2/6">
                <h1 class="text-white text-6xl font-bold">SHOE THE RIGHT <span class="text-blue-600">ONE</span>.</h1>
                <button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-900 p-3 rounded mt-6">See our store</button>
            </article>
            <article class="relative w-2/6 -ml-32">
                <img class="w-full z-10 absolute -bottom-10" src="./assets/image/shoe_one.webp" alt="">
                <p class="stroke-auto">NIKE</p>
            </article>
        </section>
        <!-- display the carousel with products-->

        <!-- display all products -->
        <h2 class="text-white font-ubuntu"><span class="text-blue-600">Our</span> last products</h2>
        <section>
            <?php
            session_start();
            $_SESSION['shopping-cart'] = (isset($_SESSION['shopping-cart'])) ? $_SESSION['shopping-cart'] : array();
            include "tableau.php";

            for ($i = 0; $i < count($items); $i++) {
                $item = $items[$i];
                echo '<div class="article">';
                echo '<img src="' . $item['image_url'] . '" class="article__img">';
                echo '<h3 class="article__name">' . $item['product'] . '</h3>';
                echo '<p class="article__price">' . $item['price'] . '€</p>';
                echo '<form method="post" action="" class="article_addcart">';
                echo '<input type="submit" name="Add' . $i . '" value="Add to cart">';
                echo '</form>';
                echo '</div>';

                if (isset($_POST["Add{$i}"])) {
                    if (!isset($_SESSION['shopping-cart'])) {
                        $_SESSION['shopping-cart'] = array();
                    }
                    $itemExists = false;
                    // check if item already exists in cart
                    foreach ($_SESSION['shopping-cart'] as $j => $elem) {
                        if ($_SESSION['shopping-cart'][$j]['id'] == $item['id']) {
                            $_SESSION['shopping-cart'][$j]['quantity']++;
                            $itemExists = true;
                            break;
                        }
                    }
                    // if item does not exist in cart, add it
                    if (!$itemExists) {
                        $item['quantity'] = 1;
                        $_SESSION['shopping-cart'][] = $item;
                    }
                }
            }
            ?>
        </section>
        <section>
            <img src="./assets/image/shoe_two.webp" alt="">
            <h2>WE PROVIDE YOU THE BEST QUALITY.</h2>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
        </section>
        <section>
            <article>
                <img src="./assets/image/image-emily.webp" alt="">
                <h4>Emily from xyz</h4>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
            </article>
            <article>
                <img src="./assets/image/image-thomas.webp" alt="">
                <h4>Thomas from corporate</h4>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
            </article>
            <article>
                <img src="./assets/image/image-jennie.webp" alt="">
                <h4>Jennie from Nike</h4>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
            </article>
        </section>

    </main>

    <?php
    include "./footer.php"
    ?>
</body>

</html>