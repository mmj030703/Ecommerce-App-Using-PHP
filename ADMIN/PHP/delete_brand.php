<?php
    if (isset($_GET['delete_brand'])) {
        $brand_id = $_GET['delete_brand'];

        $delete_query = "DELETE FROM `brands` WHERE brand_id = $brand_id";
        $result = mysqli_query($con, $delete_query);

        if ($result) {
            echo "<script>alert('Brand has been deleted successfully!')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }
    }
?>