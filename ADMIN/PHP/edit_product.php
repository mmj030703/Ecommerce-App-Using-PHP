<?php
    if (isset($_GET['edit_product'])) {
        $edit_id = $_GET['edit_product'];

        $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
        $result = mysqli_query($con, $get_data);
        $row = mysqli_fetch_assoc($result);

        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];

        $select_category = "SELECT * FROM categories WHERE category_id = $category_id";
        $result_category = mysqli_query($con, $select_category);
        $row_category = mysqli_fetch_assoc($result_category);
        $selected_category_title = $row_category['category_title'];


        // fetching category name
        $select_brand = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
        $result_brand = mysqli_query($con, $select_brand);
        $row_brand = mysqli_fetch_assoc($result_brand);
        $selected_brand_title = $row_brand['brand_title'];
    }
?>

<head>
    <style>
    #product-image {
        width: 90px;
    }
    </style>
</head>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form class='mb-4' action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title"
                class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" value="<?php echo $product_description ?>" name="product_desc"
                class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords ?>" name="product_keywords"
                class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $selected_category_title ?>"><?php echo $selected_category_title ?></option>
                <?php 
                    $fetch_all_categories_query = "SELECT * FROM `categories`";
                    $result_all_categories = mysqli_query($con, $fetch_all_categories_query);
                    while($row_all_categories = mysqli_fetch_assoc($result_all_categories)) {
                        $category_title = $row_all_categories["category_title"];
                        $category_id = $row_all_categories["category_id"];
                        if($category_title != $selected_category_title) {
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    } 
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select">
                <option value="<?php echo $selected_brand_title ?>"><?php echo $selected_brand_title ?></option>
                <?php 
                    $fetch_all_brands_query = "SELECT * FROM `brands`";
                    $result_all_brands = mysqli_query($con, $fetch_all_brands_query);
                    while($row_all_brands = mysqli_fetch_assoc($result_all_brands)) {
                        $brand_title = $row_all_brands["brand_title"];
                        $brand_id = $row_all_brands["brand_id"];
                        if($brand_title != $selected_brand_title) {
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    } 
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto"
                    required="required">
                <img id='product-image' src="./images/<?php echo $product_image1 ?>" alt="Product Image"
                    class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image</label>
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto"
                    required="required">
                <img id='product-image' src="./images/<?php echo $product_image2 ?>" alt="Product Image"
                    class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image</label>
            <div class="d-flex column-gap-2">
                <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto"
                    required="required">
                <img id='product-image' src="./images/<?php echo $product_image3 ?>" alt="Product Image"
                    class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price"
                class="form-control" required="required">
        </div>
        <div class='m-auto w-50'>
            <input type="submit" name='edit_product' value='Update Product'
                class='bg-dark text-white border-0 px-3 py-2'>
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['edit_product'])) {
        $product_title = $_POST['product_title'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brands'];
        $product_price = $_POST['product_price'];
    
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];
    
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];
    
        move_uploaded_file($temp_image1, "./Images/$product_image1");
        move_uploaded_file($temp_image2, "./Images/$product_image2");
        move_uploaded_file($temp_image3, "./Images/$product_image3");

        // query to update products
        $update_product = "UPDATE products SET product_title = '$product_title',
        product_description = '$product_desc', product_keywords = '$product_keywords',
        category_id = '$product_category', brand_id = '$product_brand',
        product_image1 = '$product_image1', product_image2 = '$product_image2',
        product_image3 = '$product_image3', product_price = '$product_price', date = NOW() where product_id = $edit_id";
        $update_product_result = mysqli_query($con, $update_product);
        if($update_product_result) {
            echo "<script>alert('Product updated successfully!')</script>";
            echo "<script>window.open('./index.php', '_self')</script>";
        }
    }
?>