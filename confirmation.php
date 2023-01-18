<?php
session_start();

$arrayForm = $_SESSION['user_input'];
$fname = $arrayForm['fname'];
$lname = $arrayForm['lname'];
$email = $arrayForm['email'];
$street_number = $arrayForm['streetNumber'];
$city = $arrayForm['city'];
$postal_code = $arrayForm['postalCode'];
$country = $arrayForm['country'];

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
            <a href="./index.php">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <main>

        <?php
        echo "<h2> THANK YOU " . strtoupper($fname) . " " . strtoupper($lname) . " !</h2>";
        echo "<h3> We have received your order and you will be contacted soon by our team.</h3>";
        ?>

    </main>
    <footer>
        <nav>
            <a href="./index.php">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
    </footer>
</body>

</html>