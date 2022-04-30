<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        
        ?>
        <form action="" method="Post">
            <table class="tbl-30">
                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name ="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm PASSWORD</td>
                    <td>
                        <input type="password" name ="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    //check whether submit button is clickd
    if(isset($_POST['submit']))
    {
        //1. getting data from from 
        $id=$_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);

        //2. check  whether user current id and password exits or not

        $sql = "SELECT *FROM tbl_admin WHERE id=$id AND password='$current_password'";

        //execute the query 
        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            //whether data is available or not 
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //user exists and password can be change 
                //check whether new password and confirm password match 
                if($new_password==$confirm_password)
                {
                    //update password
                    $sql2 = "UPDATE tbl_admin SET
                        password='$new_password'
                        WHERE id = $id
                    "; 
                    //execute query
                    $res2 = mysqli_query($conn, $sql2);

                    //check executed or not 
                    if($res2==true)
                    {
                        $_SESSION['change-password'] = "<div class='success'>password change successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        $_SESSION['change-password'] = "<div class='error'>failed to change password.</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    //we will redirect
                    $_SESSION['password-not-match'] = "<div class='error'>password did not match.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                //user doesnot exits. set message and redirect 
                $_SESSION['user-not-found'] = "<div class='error'>user not found.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        //3. check whether current and new password match or not 

        //4. change password if all above is true 
    }
?>
<?php include('partials/footer.php')?>