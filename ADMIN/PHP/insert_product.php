<!-- PHP Code -->
<?php
    include('../../includes/connect.php');

    // If the Submit button is clicked then execute the following block. 
    if(isset($_POST['insert_product'])) {
        // Accessing Products Details
        $product_title = $_POST['product_title'];
        $product_description = $_POST['product_description'];
        $product_keywords = $_POST['product_keywords'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_status = 'true';

        // Accessing Images using name & tmp_name attribute.
        $product_image1 = $_FILES['product_image_1']['name'];
        $product_image2 = $_FILES['product_image_2']['name'];
        $product_image3 = $_FILES['product_image_3']['name'];

        $tmp_image1 = $_FILES['product_image_1']['tmp_name'];
        $tmp_image2 = $_FILES['product_image_2']['tmp_name'];
        $tmp_image3 = $_FILES['product_image_3']['tmp_name'];

        // Contidion for Empty Fields
        if($product_title == "" or $product_description == "" or $product_keywords == "" or $product_category == "" or $product_brand == "" or $product_price == "" or $product_image1 == "" or $product_image2 == "" or $product_image3 == "") {
            echo "
                <script>
                    alert('Please Fill all the available Fields.');
                </script>
            ";
            exit();
        }
        else {
            // Moves the file specified as 1st parameter in the location specified in the 2nd parameter.
            move_uploaded_file($tmp_image1, "../Images/$product_image1");
            move_uploaded_file($tmp_image2, "../Images/$product_image2");
            move_uploaded_file($tmp_image3, "../Images/$product_image3");

            // Query to insert product details into products table
            $query_to_insert_product_data = "insert into `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) values ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price', 'NOW()', '$product_status')";

            // Result of above query
            $query_result = mysqli_query($con, $query_to_insert_product_data);

            // If query is executed then alert the success message.
            if($query_result) {
                echo "
                    <script>
                        alert('$product_title Inserted Successfully.');
                    </script>
                ";
            }
        }
    }
?>
<!-- PHP Code -->

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
        <div class="form_container">
            <h1 class="heading text-center mt-2">Insert Product</h1>

            <!-- ******************************************** || Form Starts Here || *********************************************** -->
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Product Title -->
                <div class="title_container form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
                </div> 

                <!-- Product Description -->
                <div class="description_container form-outline mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product Description</label>
                    <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
                </div> 

                <!-- Product Keywords -->
                <div class="keywords_container form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product Keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
                </div> 

                <!-- Categories -->
                <div class="categories_container form-outline mb-4 w-50 m-auto">
                    <select name="product_category" class="form-select">
                        <option value="" class="m-4">Select a Category</option>

                        <!-- PHP Code -->
                        <?php
                            // Query to Select all the Categories from Database.
                            $query_to_select_all_categories = "select * from `categories`";

                            // Result of above Query.
                            $query_result = mysqli_query($con, $query_to_select_all_categories);

                            // Running while loop till the end of categories table.
                            while($table_row = mysqli_fetch_assoc($query_result)) {
                                // Accessing category title
                                $category_title = $table_row['category_title'];

                                // Accessing category id
                                $category_id = $table_row['category_id'];

                                // Adding category title to select tag in DOM.
                                echo "
                                    <option value='$category_id' class='m-4'>$category_title</option>
                                ";
                            }
                        ?>
                        <!-- PHP Code -->

                    </select>
                </div> 

                <!-- Brands -->
                <div class="brands_container form-outline mb-4 w-50 m-auto">
                    <select name="product_brand" class="form-select">
                        <option value="" class="m-4">Select a Brand</option>
                        <?php
                            $query_to_select_all_brands = "select * from `brands`";
                            $query_result = mysqli_query($con, $query_to_select_all_brands);

                            while($table_row = mysqli_fetch_assoc($query_result)) {
                                $brand_title = $table_row['brand_title'];
                                $brand_id = $table_row['brand_id'];

                                echo "
                                    <option value='$brand_id' class='m-4'>$brand_title</option>
                                ";
                            }
                        ?>
                    </select>
                </div> 

                <!-- Product Image 1 -->
                <div class="product_image_1_container form-outline mb-4 w-50 m-auto">
                    <label for="product_image_1" class="form-label">Product Image 1</label>
                    <input type="file" name="product_image_1" id="product_image_1" class="form-control" required="required">
                </div>

                <!-- Product Image 2 -->
                <div class="product_image_2_container form-outline mb-4 w-50 m-auto">
                    <label for="product_image_2" class="form-label">Product Image 2</label>
                    <input type="file" name="product_image_2" id="product_image_2" class="form-control" required="required">
                </div>

                <!-- Product Image 3 -->
                <div class="product_image_3_container form-outline mb-4 w-50 m-auto">
                    <label for="product_image_3" class="form-label">Product Image 3</label>
                    <input type="file" name="product_image_3" id="product_image_3" class="form-control" required="required">
                </div>

                <!-- Product Price -->
                <div class="price_container form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
                </div>

                <!-- Submit Button -->
                <div class="submit_button_container form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-primary mb-3" value="Insert Product">
                </div> 
            </form>
            <!-- ******************************************** || Form Ends Here || *********************************************** -->
        </div>
    </main>
    <!-- ******************************************** || Main Ends Here || *********************************************** -->
</body>
</html>