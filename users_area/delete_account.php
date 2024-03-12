<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <div class="pb-2">
        <h1 class="text-center">Delete Account</h1>
        <form action="" method="post" class="mt-5">
            <div class="form-outline mb-4">
                <input type="submit" class="form-control w-50 py-2 m-auto" name="delete" value="Delete Account">
            </div>
        </form>
    </div>
</body>
</html>




<?php
    $user_email = $_SESSION['email'];

    if(isset($_POST['delete'])) {
        $delete_query = "DELETE FROM `user_table` WHERE user_email = '$user_email'";
        $result = mysqli_query($con, $delete_query);
        if($result) {
            if(isset($_SESSION['email'])) {
                unset( $_SESSION['email'] );
            }
            if(isset($_SESSION['username'])) {
                unset( $_SESSION['username'] );
            }
            echo "<script>alert('Account Deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
?>