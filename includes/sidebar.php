


<div class="col-md-4">


                
  <!--Login -->
  <div class="well">




     <h4>Login</h4>
        <form action="includes/login.php" method="post"> 
        <form method="post">
        <div class="form-group">
            <input name="username" type="text" class="form-control" placeholder="Username">
        </div>

          <div class="input-group">
            <input name="password" type="password" class="form-control" placeholder="Password">
          </div>
          <span class="input-group-btn">
               <button class="btn btn-primary" name="login" type="submit">Submit
               </button>
          </span>
            <div class="form-group">

                <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>


            </div>

        </form><!--search form-->
        <!-- /.input-group -->






</div>



<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
        <button name="submit" class="btn btn-default" type="submit">
        <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form> <!--search form -->
    <!-- /.input-group -->
</div>








<!-- Blog Categories Well -->
<div class="well">
<?php

$query = "SELECT * FROM categories ORDER BY cat_id DESC";  
$select_categories_sidebar = mysqli_query($connection, $query);

?>



    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php
            while($row = mysqli_fetch_assoc($select_categories_sidebar))  {
  $cat_title = $row['cat_title'];
  $cat_id = $row['cat_id'];


echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
     

}
            ?>
                
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->

<?php include "includes/widget.php"; ?>
</div>