<?php

    if (isset($_GET['edit_category'])) {
        $category_id = $_GET['edit_category'];        
        
        $select_category = "SELECT * FROM `categories` WHERE category_id = $category_id";
        $select_category_result = mysqli_query($con, $select_category);
        
        $row = mysqli_fetch_assoc($select_category_result);
        $category_title = $row["category_title"];
    }

    if(isset($_POST["update_category"])) {
        $category_title = $_POST['category_title'];

        $update_query = "UPDATE `categories` SET category_title='$category_title' WHERE category_id = $category_id";
        $result_category = mysqli_query($con, $update_query);

        if ($result_category) {
            echo "<script>alert('Category has been updated successfully!')</script>";
            echo "<script>window.open('./index.php?view_categories', '_self')</script>";
        }
    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" required="required"
                value='<?php echo $category_title;?>'>
        </div>
        <input type="submit" name='update_category' value="Update Category"
            class="btn btn-dark rounded-0 text-white px-3 mb-3">
    </form>
</div>