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
                <img class="logo" src="./USER/Images/Logo.png" alt="Logo">
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
                    </ul>

        <!-- ******************************************** || Search Starts Here || *********************************************** -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search Products..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        <!-- ******************************************** || Search Ends Here || *********************************************** -->
        </nav>
        <!-- ******************************************** || Navbar Ends Here || *********************************************** -->
    </header>
    <!-- ******************************************** || Header Ends Here || *********************************************** -->

    <!-- ******************************************** || Welcome Starts Here || *********************************************** -->
    <section class="welcome_container container_fluid">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-light">Welcome Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Login</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- ******************************************** || Welcome Ends Here || *********************************************** -->

    <!-- ******************************************** || Hero Starts Here || *********************************************** -->
    <section class="hero_container">
        <div class="hero bg-light mt-2">
            <h3 class="text-center fs-1">SHOPPERS BAY</h3>
            <p class="text-center fs-5">Shopping Made Easy!</p>
        </div>
    </section>
    <!-- ******************************************** || Hero Ends Here || *********************************************** -->

    <!-- ******************************************** || Main Starts Here || *********************************************** -->
    <main>
        <!-- ******************************************** || Product Section Starts Here || *********************************************** -->
        <section class="product_section">
            <div class="product_section_container row">
                <!-- ******************************************** || Products Container Starts Here || *********************************************** -->
                <div class="products_container col-md-10">
                    <div class="products_row row">
                        <!-- Product 1 -->
                        <div class="product_1 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/61VNtSQCi8L._SL1500_.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product 2 -->
                        <div class="product_2 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/81LO0QPqZAL._SL1500_.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product 3 -->
                        <div class="product_3 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/81YEyQqHjPL._SL1500_.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product 4 -->
                        <div class="product_4 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/41o-KkXEkSL.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product 5 -->
                        <div class="product_5 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/518kb55qKdL._UL1500_.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product 6 -->
                        <div class="product_6 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/71u-UfyEy3L._SL1500_.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product 7 -->
                        <div class="product_7 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/61mKIt8BtYL._SL1500_.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product 8 -->
                        <div class="product_8 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/61EXU8BuGZL._SL1500_.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product 9 -->
                        <div class="product_9 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/61id5NxI2aS._SL1500_.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product 10 -->
                        <div class="product_10 col-md-4 mb-4">
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/61v0-iGlR1L._SL1500_.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Add to Cart</a>
                                  <a href="#" class="btn btn-dark">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ******************************************** || Products Container Ends Here || *********************************************** -->

                <!-- ******************************************** || Filter Container Starts Here || *********************************************** -->
                <div class="filter_container col-md-2 bg-dark p-0">

                    <!-- ******************************************** || Brands Starts Here || *********************************************** -->
                    <ul class="brands navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                            <a class="nav-link text-light fs-4" href="#">Delivery Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Brand 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Brand 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Brand 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Brand 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Brand 5</a>
                        </li>
                    </ul>
                    <!-- ******************************************** || Brands Ends Here || *********************************************** -->

                    <!-- ******************************************** || Category Starts Here || *********************************************** -->
                    <ul class="categories navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                            <a class="nav-link text-light fs-4" href="#">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Category 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Category 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Category 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Category 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fs-5" href="#">Category 5</a>
                        </li>
                    </ul>
                    <!-- ******************************************** || Category Ends Here || *********************************************** -->
                </div>
                <!-- ******************************************** || Filter Container Ends Here || *********************************************** -->
            </div>
        </section>
        <!-- ******************************************** || Product Section Ends Here || *********************************************** -->
    </main>

    <!-- ******************************************** || Footer Starts Here || *********************************************** -->
    <div class="footer container-fluid bg-primary text-center">
        <h4 class="text-black mt-2">All Rights Reserved &copy; Shoppers Bay.</h4>
        <p class="fs-5 m-2">Made by Mayank M Jain ♥</p>
    </div>
    <!-- ******************************************** || Footer Ends Here || *********************************************** -->

    <!-- BootStrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>