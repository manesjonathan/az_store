<?php
session_start();
$arrayForm = array();
if (isset($_POST['submit'])) {
    $error = false;
    $error_message = "";
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $error = true;
            $error_message = "The form is not complete.";
        }
    }
    if ($error) {
?>
        <p class="errorMsg"> <?php $error_message ?></p>
        <?php
        echo $error_message;
    } else {
        $arrayForm = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'streetNumber' => $_POST['streetNumber'],
            'city' => $_POST['city'],
            'postalCode' => $_POST['postalCode'],
            'country' => $_POST['country']
        );
        checkForm($arrayForm);
    }
}

function resetCart()
{
    foreach ($_SESSION['shopping-cart'] as $i => $item) {
        unset($_SESSION['shopping-cart'][$i]);
    }
}

function checkForm($arrayForm)
{
    $fname = $_POST['fname'];
    //echo $fname;
    $lname = $_POST['lname'];
    //echo $lname;
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $postalCode = $_POST['postalCode'];
    if (preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ]+$/', $fname) && preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ]+$/', $lname) && filter_var($email, FILTER_VALIDATE_EMAIL) && ctype_digit($postalCode)) {
        $_SESSION['user_input'] = $arrayForm;
        header("Location: ./confirmation.php");
        include "./mail.php";
        send_mail($email);
        resetCart();
    } else {
        if (!ctype_alpha($fname)) {
        ?>
            <p class="errorMsg">Warning: incorrect first-name. It can only contain letters.</p>
        <?php
        }
        if (!ctype_alpha($lname)) {
        ?>
            <p class="errorMsg">Warning: incorrect last-name. It can only contain letters.</p>
        <?php
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ?>
            <p class="errorMsg">Warning: the format of the e-mail address is incorrect.</p>
        <?php
        }
        if (!ctype_digit($postalCode)) {
        ?>
            <p class="errorMsg">Warning: incorrect postal code. It can only contain numbers.</p>
<?php
        }
    }
}

function display()
{
    foreach ($_SESSION['shopping-cart'] as $shopping_item) {
        //display each element in HTML format
        ?>
        <div class="article flex justify-between bg-white text-black my-3">
            <img src="<?php echo $shopping_item['image_url']; ?>" class="article__img w-10">
            <h3 class="article__name"><?php echo $shopping_item['product']; ?></h3>
            <p class="article__quantity"><?php echo $shopping_item['quantity']; ?></p>
            <p class="article__price"><?php echo $shopping_item['price']; ?>€</p>
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
    <title>AZ Store</title>
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-900 to-black text-center text-white flex flex-col h-screen">
    <?php
    include "./header.php"
    ?>
    <main>
        <h2 class="mt-10 text-4xl">Delivery Information</h2>
        <hr class="w-1/2 h-0.5 mx-auto my-4 bg-gray-100 ">

        <section class="mb-auto flex flex-wrap justify-around items-center mt-10">
            <article class=" m-10 p-2 shadow-xl shadow-black w-full sm:w-4/5 lg:w-1/2 xl:w-3/5 ">
                <h3>Fill in the form below</h3>
                <form action="" method="post" class="text-white flex flex-col center items-center justify-evenly text-left">
                    <div class="my-1 flex w-3/4 justify-between ">
                        <label for="fname" class="block">First-name : </label>
                        <input class="w-1/2" type="text" id="fname" name="fname" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>">
                    </div>
                    <div class="my-1 flex w-3/4 justify-between">
                        <label for="lname" class="block">Last-name : </label>
                        <input class="w-1/2" type="text" id="lname" name="lname" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>">
                    </div>
                    <div class="my-1 flex w-3/4 justify-between">
                        <label for="mail" class="block">E-mail : </label>
                        <input class="w-1/2" type="text" id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">

                    </div>
                    <div class="my-1 flex w-3/4 justify-between">
                        <label for="streetNumber" class="block">Street and number : </label>
                        <input class="w-1/2" type="text" id="streetNumber" name="streetNumber" value="<?php echo isset($_POST["streetNumber"]) ? $_POST["streetNumber"] : ''; ?>">
                    </div>
                    <div class="my-1 flex w-3/4 justify-between">
                        <label for="city" class="block">City : </label>
                        <input class="w-1/2" type="text" id="city" name="city" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>">
                    </div>
                    <div class="my-1 flex w-3/4 justify-between">
                        <label for="postalCode" class="block">Postal code : </label>
                        <input class="w-1/2" type="text" id="postalCode" name="postalCode" value="<?php echo isset($_POST["postalCode"]) ? $_POST["postalCode"] : ''; ?>">
                    </div> 
                    <div class="my-1 flex w-3/4 justify-between">
                        <label for="country" class="block">Country : </label>
                        <input class="w-1/2" type="text" id="country" name="country" value="<?php echo isset($_POST["country"]) ? $_POST["country"] : ''; ?>">
                    </div>
                    <input class="bg-blue-600 px-10 py-2 rounded cursor-pointer my-1  " type="submit"  name="submit" value="Validate">
                </form>
            </article>
            <article class="bg-white  text-black w-4/5 sm:w-3/5 lg:w-2/5 xl:w-1/5 ">
                <h3 class="font-bold">Shopping cart</h3>
                <?php display(); ?>
                <div class="flex justify-between bg-blue-600 px-5 py-2 rounded-tl rounded-tr">
                    <p class="block text-white">Total</p>
                    <p class="block text-white"><?php echo $_SESSION["price"];?>€</p>
                </div>
            </article>
        </section>

    </main>

    <?php
    include "./footer.php"
    ?>
</body>

</html>