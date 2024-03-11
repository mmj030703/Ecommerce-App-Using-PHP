<!-- PHP Code -->
<?php
    include('../../includes/connect.php');
    include('../../Functions/common_function.php');
?>
<!-- PHP Code -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    body {
        overflow-x: hidden;
    }

    .admin-form {
        margin-top: -10px;
    }
    </style>
</head>

<body>
    <div class="container-fluid mt-3 mx-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center column-gap-5">
            <div class="col-lg-6 col-xl-4">
                <img src="../Images/admin_registration_image.avif" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="admin-form col-lg-6 col-xl-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your Username"
                            required="required" class="form-control">
                    </div>
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

                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Enter your Confirm Password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_image" class="form-label">Image</label>
                        <input type="file" name="admin_image" id="admin_image" class="form-control" required="required">
                    </div>
                    <div>
                        <input type="submit" class="bg-primary text-white py-2 px-3 border-0" name="admin_registration"
                            value="Register">
                        <p class="small fw-bold mt-2 pt-1">Already have an
                            account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<!-- PHP Code -->
<?php 
    if(isset($_POST['admin_registration'])) {
        $admin_username = $_POST['username'];
        $admin_email = $_POST['email'];
        $admin_password = $_POST['password'];
        // Password Hashing for security purpose.
        $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
        $admin_password_confirmed = $_POST['confirm_password'];
        $admin_image = $_FILES['admin_image']['name'];
        $admin_image_tmp = $_FILES['admin_image']['tmp_name'];

        // Checking Edge Cases 
        $check_query = "select * from `admin_table` where admin_email = '$admin_email'";
        $check_query_result = mysqli_query($con, $check_query);
        $number_of_rows = mysqli_num_rows($check_query_result);

        // If there are already records with same email address than we dont register this user and give that user a suitable message.
        if($number_of_rows > 0) {
            echo "
                <script>
                    alert('Admin Already Registered! Please Log In.');
                    window.open('admin_login.php', '_self');
                </script>
            ";
        }
        // If the passwords do not match then give the user a suitable mesaage.
        else if($admin_password != $admin_password_confirmed) {
            echo "
                <script>
                    alert('Passwords do not Match.');
                </script>
            ";
        }
        // If user is not already registered and passwords are matching then this users details can be added to the database.
        else {
            move_uploaded_file($admin_image_tmp, "../Images/$admin_image");

            $insert_query = "INSERT INTO `admin_table` (admin_username, admin_email, admin_password, admin_image) VALUES ('$admin_username', '$admin_email', '$hash_password', '$admin_image')";
            $insert_query_result = mysqli_query($con, $insert_query);

            if($insert_query_result) {
                echo "
                    <script>
                        alert('Admin Registered Successfully !');
                        window.open('./admin_login.php', '_self');
                    </script>
                ";
            }
        }
    }
?>
<!-- PHP Code -->