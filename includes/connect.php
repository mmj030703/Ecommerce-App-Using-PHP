<?php 

    $con = mysqli_connect('localhost', 'root', '', 'ecommerce app');
    if(!$con) {
        die(mysqli_error($con));
    }

?>