<?php
    //Auhorisation - Access control
    //check whether user is loged in or not
    if(!isset($_SESSION['user']))  //if user session is not set 
    {
        //user is not loged in 
        //redirect to login page with message 
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        //redirect to login page 
        header('location:'.SITEURL.'admin/login.php');
    }
?>