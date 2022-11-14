<title> Categorie </title>
<?php include "includes/admin_header.php" ?>
<div id="wrapper">
<?php include  "includes/admin_navigation.php" ?> 
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Our Blog Categories Admin Page
                        <small><?php echo $_SESSION["username"]; ?> </small>
                        </h1>
                      
                    
                    <div class="col-xs-6"> 
                        
                    <?php
                     insert_categories ()
                    
                    
 ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>    
                            <?php
                            if (isset($_GET['update'])) {
                                 $the_cat_id = $_GET['update'];
                                include "includes/update_categories.php";

                            }
                        ?>
  
                    </div>
                    <div class="col-xs-6">  
                

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>    
                            </thead>
                            <tablebody>
                            <?php
                            findAllCategories (); 
                            ?>
                            <?php 

                            if (isset($_GET['delete'])) {
                                $the_cat_id = $_GET['delete'];
                                $query = "DELETE FROM categories WHERE cat_id ={$the_cat_id} ";
                                $delete_query = mysqli_query($connection, $query); 
                                header ("Location: categories.php"); 
                            }
                            ?>
                            </tablebody>
                        </table>    
                    </div>  
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

</div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>