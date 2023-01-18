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
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>AZ Store</title>
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-900 to-black">
    <?php
    include "./header.php"
    ?>
    <main>
        <section>
            <article>
                <h1>SHOE THE RIGHT ONE.</h1>
                <button>See our store</button>
            </article>
            <article>

            </article>
        </section>
        <!-- display the carousel with products-->

        <!-- display all products -->
        <h2 class="text-white font-ubuntu">Our last products</h2>
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
                if(!isset($_SESSION['shopping-cart'])) {
                    $_SESSION['shopping-cart'] = array();
                }
                $itemExists = false;
                // check if item already exists in cart
                foreach($_SESSION['shopping-cart'] as $j => $elem) {
                    if($_SESSION['shopping-cart'][$j]['id'] == $item['id']) {
                        $_SESSION['shopping-cart'][$j]['quantity']++;
                        $itemExists = true;
                        break;
                    }
                }
                // if item does not exist in cart, add it
                if(!$itemExists) {
                    $item['quantity'] = 1;
                    $_SESSION['shopping-cart'][] = $item;
                }
            }
        }
        ?>
    </main>

    <?php
    include "./footer.php"
    ?>
</body>

</html>