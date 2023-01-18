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
    foreach ($_SESSION['shopping-cart'] as $i => $item) {
        unset($_SESSION['shopping-cart'][$i]);
    }
}

function display()
{
    foreach ($_SESSION['shopping-cart'] as $shopping_item) {
        //display each element in HTML format
        ?>
        <div class="article flex justify-between bg-white text-black">
            <img src="<?php echo $shopping_item['image_url']; ?>" class="article__img w-10">
            <h3 class="article__name"><?php echo $shopping_item['product']; ?></h3>
            <p class="article__price"><?php echo $shopping_item['price']; ?>€</p>
            <form method="get" action="" class="article_removecart">
                <!--replace the button "ADD" by "REMOVE"-->
            <input type="submit" name="remove<?php echo $shopping_item["id"]; ?>" value="remove">
            </form>
        </div>
        <?php
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
    <link rel="stylesheet" href="./assets/css/output.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>AZ Store</title>
</head>

<body class="bg-black text-white">
    <?php
    include "./header.php"
    ?>
    <main>
        <h1 class="font-ubuntu font-semibold text-3xl text-center pt-10">Your shopping cart</h1>
        <?php
        session_start();
        ?>

        <section class="articles_wrapper w-9/12 mx-auto pt-10">

        <?php
        display();
        ?>
        
        </section>

        <?php
        if (isset($_POST['reset'])) {
            resetCart();
            echo "<meta http-equiv='refresh' content='0'>";
        }
        foreach ($_SESSION['shopping-cart'] as $shopping_item) {
            if (isset($_GET["remove{$shopping_item["id"]}"])) {
                remove($shopping_item);
                echo "<meta http-equiv='refresh' content='0'>";
            };
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

    <?php
    include "./footer.php"
    ?>
</body>

</html>