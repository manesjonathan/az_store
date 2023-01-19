<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AZ Store">
    <link rel="stylesheet" href="./assets/css/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Outline&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <title>AZ Store</title>
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-900 to-black">
    <?php
    include "./header.php"
    ?>
    <main>
        <section class="flex justify-around m-auto items-center mt-36">
            <article class="flex-col w-2/6">
                <h1 class="text-white text-6xl font-bold">SHOE THE RIGHT <span class="text-blue-600">ONE</span>.</h1>
                <button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-900 p-3 rounded mt-6 font-ligth">See our store</button>
            </article>
            <article class="relative w-2/6 -ml-32">
                <img class="w-full z-10 absolute -bottom-10" src="./assets/image/shoe_one.webp" alt="">
                <p class="stroke-auto">NIKE</p>
            </article>
        </section>
        <div class="h-0.5 w-3/4 mx-auto opacity-5 bg-white mt-8"></div>
        <!-- display the carousel with products-->

        <!-- display all products -->
        <h2 class="text-white font-ubuntu mt-16 ml-40 text-xl mb-10 font-medium"><span class="text-blue-600">Our</span> last products</h2>
        <section class="flex flex-wrap w-4/5 mx-44 font-ubuntu mb-5">
            <?php
            session_start();
            $_SESSION['shopping-cart'] = (isset($_SESSION['shopping-cart'])) ? $_SESSION['shopping-cart'] : array();
            include "tableau.php";

            for ($i = 0; $i < count($items); $i++) {
                $item = $items[$i];
                echo '<div class="article text-white w-1/5 mx-3">';
                echo '<div class="div_img p-2 shadow-black shadow-sm text-center mb-2">';
                echo '<img src="' . $item['image_url'] . '" class="article__img w-3/4 m-auto">';
                echo '</div>';
                echo '<div class="flex justify-around items-center">';
                echo '<div class="div_shoe">';
                echo '<h3 class="article__name font-normal text-base">' . $item['product'] . '</h3>';
                echo '<p class="article__price font-light text-sm">' . $item['price'] . '€</p>';
                echo '</div>';
                echo '<form method="post" action="" class="article_addcart">';
                echo '<input type="submit" class="text-xs bg-blue-500 text-white rounded py-2 px-1.5" name="Add' . $i . '" value="Add to cart">';
                echo '</form>';
                echo '</div>';
                echo '</div>';

                if (isset($_POST["Add{$i}"])) {
                    if (!isset($_SESSION['shopping-cart'])) {
                        $_SESSION['shopping-cart'] = array();
                    }
                    $itemExists = false;
                    // check if item already exists in cart
                    foreach ($_SESSION['shopping-cart'] as $j => $elem) {
                        if ($_SESSION['shopping-cart'][$j]['id'] == $item['id']) {
                            $_SESSION['shopping-cart'][$j]['quantity']++;
                            $itemExists = true;
                            break;
                        }
                    }
                    // if item does not exist in cart, add it
                    if (!$itemExists) {
                        $item['quantity'] = 1;
                        $_SESSION['shopping-cart'][] = $item;
                    }
                }
            }
            ?>
        </section>
        <section class="flex flex-col items-center font-ubuntu">
            <section class="flex flex-col text-white items-center text-center w-1/2 ">
                <model-viewer style="width: 800px; height:600px" alt="" src="./assets/image/nike.glb" ar environment-image="" poster="" shadow-intensity="1" camera-controls touch-action="pan-y"></model-viewer>
                <!-- <img class="w-2/4" src="./assets/image/shoe_two.webp" alt=""> -->
                <h2 class="text-6xl">WE PROVIDE YOU THE <span class="text-blue-600 font-bold">BEST</span> QUALITY.</h2>
                <p class="m-5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
            </section>
            <section class="flex flex-row text-white text-center w-2/3 m-10">
                <article class="flex flex-col items-center m-5">
                    <img class="rounded-full" src="./assets/image/image-emily.webp" alt="">
                    <h4>Emily from xyz</h4>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                </article>
                <article class="flex flex-col items-center m-5">
                    <img class="rounded-full" src="./assets/image/image-thomas.webp" alt="">
                    <h4>Thomas from corporate</h4>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                </article>
                <article class="flex flex-col items-center m-5">
                    <img class="rounded-full" src="./assets/image/image-jennie.webp" alt="">
                    <h4>Jennie from Nike</h4>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                </article>
            </section>
        </section>
    </main>

    <?php
    include "./footer.php"
    ?>
</body>

</html>