<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- ******************************************** || Main Starts Here || *********************************************** -->
    <main>
        <div class="form_container container_fluid pb-5 mb-3 mt-4">
            <h1 class="heading text-center mb-2">Login</h1>

            <div class="w-100 mt-4">
                <!-- ******************************************** || Form Starts Here || *********************************************** -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- Email -->
                    <div class="email_container form-outline mb-4 w-50 m-auto">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="user_email" id="email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required">
                    </div> 
                    
                    <!-- Password -->
                    <div class="password_container form-outline mb-4 w-50 m-auto">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required">
                    </div>

                    <!-- Register Button -->
                    <div class="register_button_container form-outline mb-4 w-50 m-auto">
                        <input type="submit" name="register_user" class="btn btn-primary mb-3" value="Login">
                        <p class="mx-1 fw-bold small">Don't have an account ?<a class="text-danger text-decoration-none" href="./user_registration.php"> Register</a></p>
                    </div> 
                </form>
                <!-- ******************************************** || Form Ends Here || *********************************************** -->
            </div>
        </div>
    </main>
    <!-- ******************************************** || Main Ends Here || *********************************************** -->
</body>
</html>