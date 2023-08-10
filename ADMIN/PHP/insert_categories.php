<!-- PHP Code -->
<?php
    // Including connect.php to connect to Database 
    include('.././includes/connect.php');

    // If the insert_category is set in the URL i.e button with name="insert_category" is clicked then this block is executed.
    if(isset($_POST['insert_category'])) {
        // Accessing the title using name attribute
        $category_title = trim($_POST['category_title']);

        // Query to get all the category titles from table categories which is equal to $category_title.
        $query_to_get_category_titles = "select * from `categories` where category_title = '$category_title'";
        
        // Getting result of above query.
        $query_result = mysqli_query($con, $query_to_get_category_titles);

        // Getting total number of rows
        $row_number = mysqli_num_rows($query_result);

        // If number of rows is greater than 0 it means there is already data which has category_title equal to the current $category_title we are trying to insert in categories table.
        if($row_number > 0) {
            // Displaying message that the category is already present.
            echo "<script>alert('Category $category_title is already Present.')</script>";
        }
        else if($category_title == "") {
            echo "<script>alert('Input Field is Empty.')</script>";
        }
        else {
            $insert_query = "insert into `categories` (category_title) values ('$category_title')";
            $result = mysqli_query($con, $insert_query);
            if($result) {
                echo "<script>alert('Category $category_title has been inserted Successfully.')</script>";
            }
        }
    }
?>
<!-- PHP Code -->

<h2 class="text-center mb-3">Insert Categories</h2>
<form method="post" action="">
    <!-- ******************************************** || Input Field Starts Here || *********************************************** -->
    <div class="input-group mb-2">
        <span class="input-group-text bg-primary text-light border border-primary" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control border border-primary" name="category_title" placeholder="Insert Category..." aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <!-- ******************************************** || Input Field Ends Here || *********************************************** -->

    <!-- ******************************************** || Insert Button Starts Here || *********************************************** -->
    <div class="input-group mb-2">
        <input type="submit" class="bg-primary border-0 p-2 my-2" name="insert_category" value="Insert Category" aria-describedby="basic-addon1">
    </div>
    <!-- ******************************************** || Insert Button Ends Here || *********************************************** -->

</form>