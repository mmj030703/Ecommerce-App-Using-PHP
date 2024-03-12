<?php
    session_start();

    if(isset($_SESSION["admin_email"])) {
        unset($_SESSION["admin_email"]);
    }

    echo "
        <script>window.open('./admin_login.php', '_self')</script>
    ";
?>