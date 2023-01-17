<!-- <div class="article">
    <img src="" class="article__img">
    <h3 class="article__name"></h3>
    <p class="article__price"></p>
    <form method="get" action="display.php" class="article_addcart"> 
        <input type="submit" name="" value="Add to cart">
    </form>                                                                    
</div> -->

<?php
session_start();
$shopping_cart = $_SESSION['shopping-cart'];

include "tableau.php";

foreach ($items as $item) {
    echo '<div class="article">
    <img src="'.$item['image_url'].'" class="article__img">
    <h3 class="article__name">'.$item['product'].'</h3>
    <p class="article__price">'.$item['price'].'€</p>
    <form method="get" action="display.php" class="article_addcart"> 
        <input type="submit" name="Add'.$item['id'].'" value="Add to cart">
    </form>                                                                    
    </div>';
    if (isset($_GET["Add{$item['id']}"])) {
        // echo 'ca marche'; 
        // $array_push($shopping_cart, 'test');
        // echo '<pre>';
        // print_r($shopping_cart);
        // echo '</pre>';
    }

}