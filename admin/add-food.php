<?php include("partials/menu.php"); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>
            <br><br>
            <!--create form-->
            <form action="" mathod="POST" enctype="multiparts/form-data">

                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" placeholder="title of the food">
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="description" cols="30" rows="5" placeholder="description of he food"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>
                    <tr>
                        <td>Select Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category" >

                                <?php
                                    //create php code to display categories from database 
                                    //1. Create categories to get all active categories from database
                                    $sql = "SELECT * FROM tbl_category WHERE active='yes'";

                                    //executing query

                                    $res = mysqli_query($conn, $sql);

                                    //count rows to check whether we have categories or not 
                                    $count = mysqli_num_rows($res);

                                    //if count is greater then 0, we have categories else we don't have 
                                    if($count>0)
                                    {
                                        //we have category
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            //get the details of category 
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            ?>
                                            <option value="<?php echo $id ; ?>"><?php echo $title; ?></option>
                                            <?php
                                        }
                                    } 
                                    else{
                                        //we don't have 
                                        ?>
                                        <option value="0">No Category Found</option>
                                        <?php
                                    }
                            
                                    //2. display on drop-down

                                ?>
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="yes">yes
                            <input type="radio"name="featured" value="no">no 
                        </td>
                    </tr>
                    <tr>
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active" value="yes">yes
                            <input type="radio"name="active" value="no">no 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
<?php include("partials/footer.php"); ?>