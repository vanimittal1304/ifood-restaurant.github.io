<?php include('partials/menu.php'); ?>
        
        <!--main content section starts -->
        <div class="main-content">
            <div class="wrapper" >

            <h1>MANAGE ADMIN </h1>
            <br />
            <br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //displaying session message
                    unset($_SESSION['add']); //removing session message
                }
                if (isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if (isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if (isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                if (isset($_SESSION['password-not-match']))
                {
                    echo $_SESSION['password-not-match'];
                    unset($_SESSION['password-not-match']);
                }
                if (isset($_SESSION['change-password']))
                {
                    echo $_SESSION['change-password'];
                    unset($_SESSION['change-password']);
                }
             
            ?>
            <br><br><br>

            <!-- button to add admin -->
            <a href="add-admin.php" class="btn-primary">ADD ADMIN </a>
            <br />
            <br />
            <br />

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>FULL NAME</th>
                    <th>username</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    //query to get all admin 
                    $sql = "SELECT * FROM tbl_admin";
                    // execute the query 
                    $res = mysqli_query($conn, $sql);

                    //check whether the query is executed or not 
                    if($res==TRUE)
                    {
                        //COUNT ROWS TO CHECK WHETHER WE HAVE DATA IN DATABASE OR NOT 
                        $count = mysqli_num_rows($res); //function to get all the rows in database 

                        $sn=1; //create a variable and assign a value

                        //check the num of rows 
                        if ($count >0)
                        {
                            //we have data in database 
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //using while loop to get all the data from database
                                //and while loop will run as long as we have data in database 

                                //get individual data 
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //display the values in our table 
                                ?>
                                <tr>
                                    <td> <?php echo $sn++ ; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Updte Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">delete Admin</a> 
                                        </td>
                                </tr>
                     
                                <?php
                            }

                        }
                        else
                        {
                            //we don't have data in database

                        }
                    }


                ?>

                
            </table>

            
            </div>
        </div>
        <!--main content section ends -->
<?php include('partials/footer.php') ?>