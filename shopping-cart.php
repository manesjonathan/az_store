<?php
$_SESSION['price'] = 0;

/* fonction qui calcule le prix total
    le paramètre $array correspond à $_SESSION["shopping-cart"] 
*/
function updatePrice()
{
    $total_price = 0;
    if (isset($_SESSION['shopping-cart'])) {
        foreach ($_SESSION['shopping-cart'] as $i => $article) {
            $total_price = $total_price + ($_SESSION['shopping-cart'][$i]["price"] * $_SESSION['shopping-cart'][$i]['quantity']);
        }
    }
    $_SESSION['price'] = $total_price;
    return $total_price;
}

function remove($item)
{
    foreach($_SESSION['shopping-cart'] as $i => $elem) {
        if ($_SESSION['shopping-cart'][$i]['id'] == $item['id']) {
            if ($item['quantity'] > 1) {
                $_SESSION['shopping-cart'][$i]['quantity'] = $_SESSION['shopping-cart'][$i]['quantity'] - 1;
                break;
            } else {
                unset($_SESSION["shopping-cart"][$i]);
            }
        }
    }
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
        <div class="article flex items-center justify-between bg-white text-black">
            <img src="<?php echo $shopping_item['image_url']; ?>" class="article__img w-1/12 pl-4 py-3">
            <h3 class="article__name w-6/12 pl-4"><?php echo $shopping_item['product']; ?></h3>
            <p class="article__quantity w-2/12"><?php echo $shopping_item['quantity']; ?></p>
            <p class="article__price w-1/12"><?php echo $shopping_item['price']; ?>€</p>
            <form method="get" action="" class="article_removecart w-2/12 text-right px-4">
                <!--replace the button "ADD" by "REMOVE"-->
                <input type="submit" class="bg-blue-500 text-white rounded py-1.5 px-2.5 text-sm" name="remove<?php echo $shopping_item["id"]; ?>" value="remove">
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

<body class="bg-gray-900 text-white min-h-screen flex flex-col">
    <?php
    include "./header.php"
    ?>
    <main class="font-ubuntu">
        <h1 class="font-ubuntu font-semibold text-3xl text-center pt-10 pb-4">Your shopping cart</h1>
        <?php
        session_start();
        ?>

        <section class="articles_wrapper w-9/12 mx-auto border-y border-white">
            <div class="article flex justify-between py-4 font-medium">
                <h3 class="w-7/12 pl-4">Items</h3>
                <p class="w-2/12">Quantity</p>
                <p class="text-left w-3/12">Price</p>
            </div>
        
            <?php        
            display();
            ?>
            
            <form method="post" class="flex justify-end py-4 pr-1">
                <input type="submit" name="reset" class="button bg-white text-blue-700 rounded py-1.5 px-2.5 text-sm" value="Reset cart" />
            </form>
        </section>

        <?php
        if (isset($_POST['reset'])) {
            resetCart();
            echo "<meta http-equiv='refresh' content='0'>";
        }
        foreach ($_SESSION['shopping-cart'] as $shopping_item) {
            if (isset($_GET["remove{$shopping_item["id"]}"])) {
                remove($shopping_item);
                updatePrice();
                header("Location:./shopping-cart.php");
                break;
            };
        };
        //call the function total and add the $shopping_item price to it
        updatePrice();
        //display total
        echo '<div class="total_wrapper flex items-center justify-end w-9/12 mx-auto py-4">';
        echo '<p class="w-2/12 text-left">Total</p>';
        echo '<p class="w-1/12 text-left">' . $_SESSION['price'] . "€</p>";
        //create the button go to checkout
        echo "<form method='post' action='checkout.php' class='button_checkout w-2/12 text-right px-3'>";
        echo '<input type="submit" name="checkout " value="Payment" class="bg-blue-700 text-white rounded py-1.5 px-2.5 text-sm">';
        echo "</form>";
        echo "</div>";
        ?>

    </main>

    <?php
    include "./footer.php"
    ?>
</body>

</html>