<?php
//fonction qui calcule le prix total
function prize($array){
    $total_prize=0;
    foreach($_SESSION["shopping-cart"] as $article){
        $total_prize=$total_prize+$article["price"];
    }
    return $total_prize;
};



