<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AZ Store">
    <title>AZ Store</title>
</head>

<body>
    <header>
        <h1>AZ Store</h1>
        <nav>
            <a class="active" href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>

        <a href="./shopping-cart.php">Cart</a>
    </header>
    <main>
        <!-- display the carousel with products-->

        <!-- display all products -->
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

    <footer>
        <nav>
            <a class="active" href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
    </footer>
</body>

</html>