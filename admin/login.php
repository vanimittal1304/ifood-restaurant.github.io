<?php include('../config/constants.php') ?>



<html>
    <head>
        <title>Login food order system</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1><br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!--login form starts here-->
            <form action="" method="POST" class="text-center">
                Username:<br>
                <input type="text" name="username" placeholder="Enter user name"><br><br>

                Password:<br>
                <input type="password" name="password" placeholder="enter password"><br><br>


                <input type="submit" name="submit" value="login" class="btn-primary"><br><br>
            </form>

            <!--login form ends here-->

            <p class="text-center">Created by <a href="#">Vani Mittal</a></p>
        </div>
    </body>
</html>
<?php
    //check whether submit button is clicked

    if(isset($_POST['submit']))
    {
        //process for login
        //1.get the data from login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2.sql to check whether the user with username exist or not 
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. to execute the query
        $res = mysqli_query($conn, $sql);

        //4. count rows to check whether the user exists or not 
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user available and login success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //to check whether user is loged in or not and logout will unset it 
            //redirect to home page
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //user not available and login failed
            $_SESSION['login'] = "<div class='error text-center'>Login failed.</div>";
            //redirect to home page
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>