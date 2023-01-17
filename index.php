<?php
session_start();
$_SESSION['shopping-cart'] = array();

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
        <?php include 'tableau.php';
        
        ?>
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