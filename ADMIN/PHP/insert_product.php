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
                        <option value="" class="m-4">Category 1</option>
                        <option value="" class="m-4">Category 2</option>
                        <option value="" class="m-4">Category 3</option>
                        <option value="" class="m-4">Category 4</option>
                        <option value="" class="m-4">Category 5</option>
                        <option value="" class="m-4">Category 6</option>
                    </select>
                </div> 

                <!-- Brands -->
                <div class="brands_container form-outline mb-4 w-50 m-auto">
                    <select name="product_brand" class="form-select">
                        <option value="" class="m-4">Select a Brand</option>
                        <option value="" class="m-4">Brand 1</option>
                        <option value="" class="m-4">Brand 2</option>
                        <option value="" class="m-4">Brand 3</option>
                        <option value="" class="m-4">Brand 4</option>
                        <option value="" class="m-4">Brand 5</option>
                        <option value="" class="m-4">Brand 6</option>
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