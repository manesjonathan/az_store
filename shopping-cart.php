<?php
$_SESSION['price'] = 0;

/* fonction qui calcule le prix total
    le paramètre $array correspond à $_SESSION["shopping-cart"] 
*/
function price($array)
{
    $total_price = 0;
    foreach ($array as $article) {
        $total_price = $total_price + $article["price"];
    }
    $_SESSION['price'] = $total_price;
    return $total_price;
};

function remove($item)
{
    $key = array_search($item, $_SESSION["shopping-cart"]);
    unset($_SESSION["shopping-cart"][$key]);
};

function resetCart()
{
    unset($_SESSION['shopping-cart']);
}

function display()
{
    foreach ($_SESSION['shopping-cart'] as $shopping_item) {
        //display each element in HTML format
        echo '<div class="article">';
        echo '<img src="' . $shopping_item['image_url'] . '" class="article__img">';
        echo '<h3 class="article__name">' . $shopping_item['product'] . '</h3>';
        echo '<p class="article__price">' . $shopping_item['price'] . '€</p>';
        echo '<form method="get" action="" class="article_removecart">';
        //replace the button "ADD" by "REMOVE"
        echo '<input type="submit" name="remove' . $shopping_item["id"] . '" value="remove">';
        echo '</form>';
        echo '</div>';
    }
}

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
            <a href="/index.php">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>
    <main>
        <?php
        session_start();
        display();

        if (isset($_POST['reset'])) {
            resetCart();
        }
        if (isset($_SESSION['shopping-cart'])) {
            foreach ($_SESSION['shopping-cart'] as $shopping_item) {
                if (isset($_GET["remove{$shopping_item["id"]}"])) {
                    remove($shopping_item);
                    echo "<meta http-equiv='refresh' content='0'>";
                };
            }
        }
        //call the function total and add the $shopping_item price to it
        price($_SESSION['shopping-cart']);
        //display total
        echo "<p>" . $_SESSION['price'] . "€</p>";
        //create the button go to checkout
        echo "<div class='button'>";
        echo "<form method='post' action='checkout.php' class='button_checkout'>";
        echo '<input type="submit" name="checkout " value="Checkout">';
        echo "</form>";
        echo "</div>";
        ?>
        <form method="post">
            <input type="submit" name="reset" class="button" value="Reset cart" />
        </form>

    </main>

    <footer>
        <nav>
            <a href="/index.php">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
    </footer>
</body>

</html>