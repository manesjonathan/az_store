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
    <?php
    include "./header.php"
    ?>
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
                $_SESSION['shopping-cart'][] = $item;
            }
        }
        ?>
    </main>

    <?php
    include "./footer.php"
    ?>
</body>

</html>