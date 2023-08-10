<!-- PHP Code -->
<?php
    // Including connect.php to connect to Database 
    include('.././includes/connect.php');

    // If the insert_brand is set in the URL i.e button with name="insert_brand" is clicked then this block is executed.
    if(isset($_POST['insert_brand'])) {
        // Accessing the title using name attribute
        $brand_title = trim($_POST['brand_title']);

        // Query to get all the brand titles from table brands which is equal to $brand_title.
        $query_to_get_brand_titles = "select * from `brands` where brand_title = '$brand_title'";

        // Getting result of above query.
        $query_result = mysqli_query($con, $query_to_get_brand_titles);

        // Getting total number of rows
        $row_number = mysqli_num_rows($query_result);

        // If number of rows is greater than 0 it means there is already data which has brand_title equal to the current $brand_title we are trying to insert in brands table.
        if($row_number > 0) {
            // Displaying message that the brand is already present.
            echo "<script>alert('Brand $brand_title is already Present.')</script>";
        }
        else if($brand_title == "") {
            echo "<script>alert('Input Field is Empty.')</script>";
        }
        else {
            $query_to_add_brand_title = "insert into `brands` (brand_title) values ('$brand_title')";
            $result = mysqli_query($con, $query_to_add_brand_title);

            if($result) {
                echo "<script>alert('Brand $brand_title has been inserted Successfully.')</script>";
            }
        }
    }
?>
<!-- PHP Code -->

<h2 class="text-center mb-3">Insert Brands</h2>
<form method="POST" action="">
    <!-- ******************************************** || Input Field Starts Here || *********************************************** -->
    <div class="input-group mb-2">
        <span class="input-group-text bg-primary text-light border border-primary" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control border border-primary" name="brand_title" placeholder="Insert Brand..." aria-label="Brands" aria-describedby="basic-addon1">
    </div>
    <!-- ******************************************** || Input Field Ends Here || *********************************************** -->

    <!-- ******************************************** || Insert Button Starts Here || *********************************************** -->
    <div class="input-group mb-2">
        <input type="submit" class="bg-primary border-0 p-2 my-3" name="insert_brand" value="Insert Brand" aria-describedby="basic-addon1">
    </div>
    <!-- ******************************************** || Insert Button Ends Here || *********************************************** -->
</form>