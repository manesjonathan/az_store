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
            <a href="index.php">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>
    <main>
        <?php

        foreach ($shopping_cart_list as $shopping_item) {
            //display each element in HTML format (summary of shopping cart), no buttons
        }
        //display total somewhere (variable saved in $_SESSION)

        //display the form + button submit

        //on submit: sanitize and validate data + submit

        //if everything ok, session_destroy()

        //display the confirmation message

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