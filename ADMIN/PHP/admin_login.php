<!-- PHP Code -->
<?php 
    include('../../includes/connect.php');
    include('../../Functions/common_function.php');

    // Starting the Session
    @session_start();
?>
<!-- PHP Code -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    body {
        overflow-x: hidden;
    }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center column-gap-5">
            <div class="col-lg-6 col-xl-4">
                <img src="../Images/admin_login_image.webp" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4 mt-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your Email" required="required"
                            class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your Password"
                            required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-primary text-white py-2 px-3 border-0" name="admin_login"
                            value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<!-- PHP Code -->
<?php 
    // Checking if user clicked on Login Button
    if(isset($_POST['admin_login'])) {
        $admin_email = $_POST['email'];
        $admin_password = $_POST['password'];

        $select_query = "SELECT * FROM `admin_table` WHERE admin_email = '$admin_email'";
        $select_query_result = mysqli_query($con, $select_query);
        $number_of_users = mysqli_num_rows($select_query_result);

        $hash_password = null;
        $admin_email_db = null;
        while($admin_table = mysqli_fetch_assoc($select_query_result)) {
            $hash_password = $admin_table['admin_password'];
            $admin_email_db = $admin_table['admin_email'];
            break;
        }

        // Checking if there is a user with the entered email in the database already and the password matches the one present in the database then login the user.
        // password_verify() function checks whether the entered passwords hash and password in database in hash format are equal or not.
        if($number_of_users > 0 && ($admin_email == $admin_email_db) && password_verify($admin_password, $hash_password)) {
            $_SESSION['admin_email'] = $admin_email;
            echo "
                <script>
                    alert('Login Successful !');
                    window.open('../index.php', '_self');
                </script>
            ";
        }
        else {
            echo "
                <script>
                    alert('Invalid Credentials !');
                </script>
            ";
        }
    }
?>
<!-- PHP Code -->