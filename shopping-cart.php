<?php
$_SESSION['price'] = 0;

/* fonction qui calcule le prix total
    le paramètre $array correspond à $_SESSION["shopping-cart"] 
*/
function prize($array)
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
        foreach ($_SESSION['shopping-cart'] as $shopping_item) {
            //display each element in HTML format

            //replace the button "ADD" by "REMOVE"

            //call the function total and add the $shopping_item price to it

        }
        print_r(count($_SESSION['shopping-cart']));
        //display total

        //create the button go to checkout
        ?>

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