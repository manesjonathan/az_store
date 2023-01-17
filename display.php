
<!-- <div class="article">
    <img src="" class="article__img">
    <h3 class="article__name"></h3>
    <p class="article__price"></p>
    <button class="article__addcart">Add to cart</button>                                                                    
</div> -->

<?php

include "tableau.php";

foreach ($items as $item) {
    echo '<div class="article">
    <img src="'.$item['image_url'].'" class="article__img">
    <h3 class="article__name">'.$item['product'].'</h3>
    <p class="article__price">'.$item['price'].'€</p>
    <button class="article__addcart">Add to cart</button>                                                                    
    </div>';

}