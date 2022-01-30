<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>FULL NAME</td>
                    <td><input type="text" name="full_name" placeholder="Enter your Name"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name ="password" placeholder="Your password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name ="submit" value ="add admin" class ="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php') ?>
<?php 
//process the value from form and save it in database
//check wheather the submit button is clicked or not 

    if(isset($_POST['submit']))
    {
        // button clicked
        
        //1. get the data from form
        $full_name =$_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption with md5

        //2. sql query to save the data in database
        $sql ="INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        //3. execute query and save data in database 
        

        //$res =mysqli_query($conn, $sql) or die (mysqli_error());
    }
    
?>