<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <br><br>
        <!--Add category form starts-->
        <form action="" method="POST" enctype="multipart/force-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="category title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="yes">Yes
                        <input type="radio" name="featured" value="no">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="yes">Yes
                        <input type="radio" name="active" value="no">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <!--Add category form ends-->

        <?php
            //check whether submit buttonis clicked or not 
            if(isset($_POST['submit']))
            {
                //1. get value from form 
                $title = $_POST['title'];

                //for radio input type we need to check whether button is selected or not 
                if(isset($_POST['featured']))
                {
                    //get the value from form
                    $featured = $_POST['featured']; 
                }
                else
                {
                    //get the default value 
                    $featured = "no";
                }
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "no";
                }
                //check whether image is selected or not and set the value for image name accordingly
                if(isset($_FILES['image'])){
                print_r($_FILES['image']);
                }

                die(); //break the code here


                //2. create sql query to insert category into database 
                $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    featured='$featured',
                    active='$active'
                
                ";

                //3. execute the query and save in database 
                $res = mysqli_query($conn, $sql);

                //4. check whether query is executed or not and data added or not 
                if($res==true)
                {
                    //query executed and category added
                    $_SESSION['add'] = "<div class='success'>Category added successfully.</div>";
                    //redirect to manage category page 
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //failed to add query
                    $_SESSION['add'] = "<div class='error'>Failed to add Category.</div>";
                    //redirect to manage category page 
                    header('location:'.SITEURL.'admin/add-category.php');

                }
            }

        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>
