<?php
    // Including connect.php to connect to Database 
    include('./includes/connect.php');

    // including common_function.php which contains all the helper functions.
    include('./Functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppers Bay</title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Link -->
    <link rel="stylesheet" href="./USER/CSS/style.css">
</head>

<body>
    <!-- ******************************************** || Header Starts Here || *********************************************** -->
    <header class="container-fluid p-0">
        <!-- ******************************************** || Navbar Starts Here || *********************************************** -->
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a href="index.php"><img class="logo" src="./USER/Images/Logo.png" alt="Logo"></a>
                <a class="navbar-brand" href="index.php">Shoppers Bay</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all_products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                    </ul>

        <!-- ******************************************** || Search Starts Here || *********************************************** -->
                    <form action="search_product.php" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search_data" placeholder="Search Products..." aria-label="Search">
                        <input type="submit" class="btn btn-outline-light" value="Search" name="search_data_product"></input>
                    </form>
                </div>
            </div>
        <!-- ******************************************** || Search Ends Here || *********************************************** -->
        </nav>
        <!-- ******************************************** || Navbar Ends Here || *********************************************** -->
    </header>

    <!-- PHP Code -->
    <?php
        cart();
    ?>
    <!-- PHP Code -->
    <!-- ******************************************** || Header Ends Here || *********************************************** -->

    <!-- ******************************************** || Welcome Starts Here || *********************************************** -->
    <section class="welcome_container container_fluid">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-light">Welcome Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./users_area/user_login.php">Login</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- ******************************************** || Welcome Ends Here || *********************************************** -->

    <!-- ******************************************** || Main Starts Here || *********************************************** -->
    <main>
        <!-- ******************************************** || Cart Section Starts Here || *********************************************** -->
        <section class="cart_section mt-4 px-5 pb-3">
            <form action="" method="POST">
                <div class="cart row">
                    <!-- ******************************************** || Cart Details Starts Here || ******************************************** -->
                    <div class="cart_details col-md-8"> 
                        <div class="cart_table">
                            <h2 class="fs-2 bg-dark text-light py-2 px-3">
                                Your Cart (
                                    <!-- PHP Code -->
                                    <?php 
                                        // Function to get number of items in cart from database
                                        getNumberOfCartItems(); 
                                    ?>
                                    <!-- PHP Code -->
                                )
                            </h2>

                            <!-- PHP Code -->
                            <?php
                                // Function to get all the products details from the database
                                getProductsToDisplayInCart();
                            ?>
                            <!-- PHP Code -->
                        </div>
                    </div>
                    <!-- ******************************************** || Cart Details Ends Here || ******************************************** -->

                    <!-- ******************************************** || Cart Summary Starts Here || ******************************************** -->
                    <div class="cart_summary p-4 pb-0 col-md-4 bg-dark h-25">
                        <!-- PHP Code -->
                        <?php
                            // Function to get the Cart Summary Details from the database
                            getCartSummary();
                        ?>
                        <!-- PHP Code -->
                    </div>
                    <!-- ******************************************** || Cart Summary Ends Here || ******************************************** -->
                </div>
            </form>
        </section>
        <!-- ******************************************** || Cart Section Ends Here || *********************************************** -->
    </main>
    <!-- ******************************************** || Main Ends Here || *********************************************** -->

    <!-- ******************************************** || Footer Starts Here || *********************************************** -->
    <!-- PHP Code -->
    <?php
        // File containing code for footer section.
        include('./USER/PHP/footer.php');
    ?>
    <!-- PHP Code -->
    <!-- ******************************************** || Footer Ends Here || *********************************************** -->

    <!-- BootStrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="./USER/JavaScript/cart_details.js" defer></script>
</body>

</html>