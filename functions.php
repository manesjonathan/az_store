<?php

/* fonction qui calcule le prix total
    le paramètre $array correspond à $_SESSION["shopping-cart"] 
*/
function prize($array)
{
    $total_prize = 0;
    foreach ($array as $article) {
        $total_prize = $total_prize + $article["price"];
    }
    return $total_prize;
};

