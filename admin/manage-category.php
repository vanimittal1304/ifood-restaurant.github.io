<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE CATEGORY</h1>

        <br />
            <br />
            <br />
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
           <br><br> 

            <!-- button to add admin -->
            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">ADD CATEGORY </a>
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

                <tr>
                    <td>1.</td>
                    <td>Vani Mittal</td>
                    <td>Vani__001</td>
                    <td>
                        <a href="#" class="btn-secondary">Updte Admin</a>
                        <a href="#" class="btn-danger">delete Admin</a> 
                    </td>
                </tr>

                <tr>
                    <td>2.</td>
                    <td>Vani Mittal</td>
                    <td>Vani__001</td>
                    <td>
                        <a href="#" class="btn-secondary">Updte Admin</a>
                        <a href="#" class="btn-danger">delete Admin</a>  
                    </td>
                </tr>

                <tr>
                    <td>3.</td>
                    <td>Vani Mittal</td>
                    <td>Vani__001</td>
                    <td>
                        <a href="#" class="btn-secondary">Updte Admin</a>
                        <a href="#" class="btn-danger">delete Admin</a>  
                    </td>
                </tr>
            </table>
    </div>
</div>

<?php include('partials/footer.php') ?>