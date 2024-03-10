<?php

    if (isset($_GET['edit_brand'])) {
        $brand_id = $_GET['edit_brand'];        
        
        $select_brand = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
        $select_brand_result = mysqli_query($con, $select_brand);
        
        $row = mysqli_fetch_assoc($select_brand_result);
        $brand_title = $row["brand_title"];
    }

    if(isset($_POST["update_brand"])) {
        $brand_title = $_POST['brand_title'];

        $update_query = "UPDATE `brands` SET brand_title='$brand_title' WHERE brand_id = $brand_id";
        $result_brand = mysqli_query($con, $update_query);

        if ($result_brand) {
            echo "<script>alert('Brand has been updated successfully!')</script>";
            echo "<script>window.open('./index.php?view_brands', '_self')</script>";
        }
    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required="required"
                value='<?php echo $brand_title;?>'>
        </div>
        <input type="submit" name='update_brand' value="Update Brand"
            class="btn btn-dark rounded-0 text-white px-3 mb-3">
    </form>
</div>