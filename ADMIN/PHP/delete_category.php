<?php
    if (isset($_GET['delete_category'])) {
        $category_id = $_GET['delete_category'];

        $delete_query = "DELETE FROM `categories` WHERE category_id = $category_id";
        $result = mysqli_query($con, $delete_query);

        if ($result) {
            echo "<script>alert('Category has been deleted successfully!')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }
    }
?>