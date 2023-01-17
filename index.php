<?php
session_start();
$_SESSION['shopping-cart'] = ($_SESSION['shopping-cart'] != null) ? $_SESSION['shopping-cart'] :array() ;

?>

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

        <a href="/shopping-cart.php">Cart</a>
    </header>
    <main>
        <!-- display the carousel with products-->

        <!-- display all products -->
        <?php

        include "tableau.php";
        foreach ($items as $item) {
            echo '<div class="article">';
            echo '<img src="' . $item['image_url'] . '" class="article__img">';
            echo '<h3 class="article__name">' . $item['product'] . '</h3>';
            echo '<p class="article__price">' . $item['price'] . '€</p>';
            echo '<form method="get" action="" class="article_addcart">';
            echo '<input type="submit" name="Add' . $item['id'] . '" value="Add to cart">';
            echo '</form>';
            echo '</div>';
            if (isset($_GET["Add{$item['id']}"])) {
                echo "coucou";
                array_push($_SESSION['shopping-cart'], $item);
            }
        }

     
        ?>
        <!-- display the catch section -->


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