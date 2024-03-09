<?php
    // Including connect.php to connect to Database 
    include('../includes/connect.php');

    // including common_function.php which contains all the helper functions.
    include('../Functions/common_function.php');

    // Starting the Session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Link -->
    <link rel="stylesheet" href="../USER/CSS/style.css">

    <!-- Internal CSS -->
    <style>
    body {
        overflow-x: hidden;
    }

    .profile-image {
        object-fit: cover;
        width: 200px;
        height: 180px;
        border-radius: 50%;
    }
    </style>
    <!-- Internal CSS -->
</head>

<body>
    <!-- ******************************************** || Header Starts Here || *********************************************** -->
    <header class="container-fluid p-0">
        <!-- ******************************************** || Navbar Starts Here || *********************************************** -->
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a href="../index.php"><img class="logo" src="../USER/Images/Logo.png" alt="Logo"></a>
                <a class="navbar-brand" href="../index.php">Shoppers Bay</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all_products.php">Products</a>
                        </li>
                        <?php
                            if(isset($_SESSION['username'])){
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='./profile.php'>My Account</a>
                                </li>";
                            }
                            else {
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='./user_registration.php'>Register</a>
                                </li>";
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php">
                                <i class="fa-solid fa-cart-shopping">
                                    <sup>
                                        <!-- PHP Code -->
                                        <?php 
                                            // Function to get number of items in cart from database
                                            getNumberOfCartItems(); 
                                        ?>
                                        <!-- PHP Code -->
                                    </sup>
                                </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                Total Price : &#8377;
                                <!-- PHP Code -->
                                <?php
                                    // Function to get total price of items in cart from database
                                    getTotalCartPrice();
                                ?>
                                <!-- PHP Code -->
                            </a>
                        </li>
                    </ul>

                    <!-- ******************************************** || Search Starts Here || *********************************************** -->
                    <form action="../search_product.php" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search_data"
                            placeholder="Search Products..." aria-label="Search">
                        <input type="submit" class="btn btn-outline-light" value="Search"
                            name="search_data_product"></input>
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
                <!-- PHP Code -->
                <?php
                    if(!isset($_SESSION['email'])) {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link text-light'>Welcome Customer</a>
                            </li>
                        ";
                    }
                    else {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link text-light'>Welcome ".$_SESSION['username']."</a>
                            </li>
                        ";
                    }

                    if(!isset($_SESSION['email'])) {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link text-light' href='user_login.php'>Login</a>
                            </li>
                        ";
                    }
                    else {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link text-light' href='logout.php'>Logout</a>
                            </li>
                        ";
                    }
                ?>
                <!-- PHP Code -->
            </ul>
        </div>
    </section>
    <!-- ******************************************** || Welcome Ends Here || *********************************************** -->


    <!-- ******************************************** || Main Starts Here || *********************************************** -->
    <main>
        <!-- ******************************************** || Profile Section Starts Here || *********************************************** -->
        <section class="profile_section">
            <h1 class="text-center fw-bold text-black mt-4">Profile</h1>
            <div class="profile_section_container row mt-4 mb-5 pe-4 ps-2">
                <!-- ******************************************** || Profile Header Starts Here || *********************************************** -->
                <div class="profile_header col-md-3">
                    <div
                        class="profile_row row mx-1 bg-dark w-100 text-bg-primary px-2 pt-4 flex-column align-items-center rounded-2">
                        <!-- PHP Code  -->
                        <?php
                            $user_email = $_SESSION["email"];
                            $image_query = "Select * from `user_table` where user_email='$user_email'";
                            $image_query_result = mysqli_query($con, $image_query);
                            $user_table_result = mysqli_fetch_assoc($image_query_result);
                            $imageURL = $user_table_result['user_image'];
                            $username = $user_table_result['username'];
                            echo "
                                <img class='profile-image' src='./user_images/$imageURL' alt='Profile Image'>
                                <p class='text-center fs-3 fw-bold mt-2'>$username</p>
                            ";
                        ?>
                        <!-- PHP Code  -->
                    </div>
                    <div class="profile_row row mx-1 bg-dark w-100 mt-3 text-bg-primary rounded-3">
                        <nav>
                            <ul class="navbar navbar-nav py-3">
                                <a href="profile.php"
                                    class="text-bg-primary text-decoration-none bg-secondary d-block w-100 text-center py-2 rounded-5">
                                    <li role="button">
                                        Orders
                                        Pending</li>
                                </a>
                                <a href="profile.php?edit_account"
                                    class="text-bg-primary text-decoration-none mt-2 bg-secondary d-block w-100 text-center py-2 rounded-5">
                                    <li role="button">Edit Account</li>
                                </a>
                                <a href="profile.php?my_orders"
                                    class="text-bg-primary text-decoration-none mt-2 bg-secondary d-block w-100 text-center py-2 rounded-5">
                                    <li role="button">My
                                        Orders</li>
                                </a>
                                <a href="profile.php?delete_account"
                                    class="text-bg-primary text-decoration-none mt-2 bg-secondary d-block w-100 text-center py-2 rounded-5">
                                    <li role="button">
                                        Delete Account</li>
                                </a>
                                <a href="logout.php"
                                    class="text-bg-primary text-decoration-none mt-2 bg-secondary d-block w-100 text-center py-2 rounded-5">
                                    <li role="button">
                                        Logout</li>
                                </a>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- ******************************************** || Profile Header Ends Here || *********************************************** -->

                <!-- ******************************************** || Profile Body Starts Here || *********************************************** -->
                <div class="profile_body h-100 col-md-9 p-0 px-3 py-2 pb-1 bg-dark text-bg-primary rounded-3">
                    <!-- PHP Code -->
                    <?php
                        // Function for getting the number of rows in user order table
                        getUserOrderDetails();

                        if(isset($_GET['edit_account'])) {
                            include('edit_account.php');
                        }
                        if(isset($_GET['my_orders'])) {
                            include('user_orders.php');
                        }
                        if(isset($_GET['delete_account'])) {
                            include('delete_account.php');
                        }
                    ?>
                    <!-- PHP Code -->
                </div>
                <!-- ******************************************** || Profile Body Ends Here || *********************************************** -->
            </div>
        </section>
        <!-- ******************************************** || Profile Section Ends Here || *********************************************** -->
    </main>
    <!-- ******************************************** || Main Ends Here || *********************************************** -->

    <!-- ******************************************** || Footer Starts Here || *********************************************** -->
    <!-- PHP Code -->
    <?php
        // File containing code for footer section.
        include('../USER/PHP/footer.php');
    ?>
    <!-- PHP Code -->
    <!-- ******************************************** || Footer Ends Here || *********************************************** -->

    <!-- BootStrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>