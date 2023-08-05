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
    <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
    <!-- ******************************************** || Header Starts Here || *********************************************** -->
    <header class="container-fluid p-0">
        <!-- ******************************************** || Navbar Starts Here || *********************************************** -->
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <img class="logo" src="./Images/Logo.png" alt="Logo">
                <a class="navbar-brand" href="#">Shoppers Bay</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"><sup>1</sup></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price : 100/-</a>
                        </li>
        <!-- ******************************************** || Navbar Ends Here || *********************************************** -->

        <!-- ******************************************** || Search Starts Here || *********************************************** -->
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search Products..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        <!-- ******************************************** || Search Ends Here || *********************************************** -->
        </nav>
    </header>
    <!-- ******************************************** || Navbar Ends Here || *********************************************** -->


    <div class="footer container-fluid bg-primary text-center fs-5">
        <p>Made by Mayank M Jain ♥</p>
    </div>
    <!-- BootStrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>