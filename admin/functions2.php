<?php 

function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

        return true;

    }

    return false;

}


function confirm($result) {
    global $connection;
    if(!$result)    {
        die("QUERY FAILED" . mysqli_error($connection));
    }

}
function insert_categories () {
    global $connection; 
if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
                        
        if ($cat_title == "" || empty($cat_title)){
            echo "This Field Can Not Be Empty"; 
                            
         } else{
            $query = "INSERT INTO categories(cat_title) "; 
            $query .= "VALUE('{$cat_title}') ";
                       
             $create_category_query = mysqli_query($connection, $query);
                           
            if(!$create_category_query) {
            die('QUERY FAILED' . mysqli_error($connection)); 
                }


                }
                            
                }
            }
function findAllCategories () {
global $connection; 
        $query = "SELECT * FROM categories";  
            $select_categories = mysqli_query($connection, $query); 
                while($row = mysqli_fetch_assoc($select_categories))  {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<tr>";            
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>"; 
                echo "<td><a href='categories.php?delete={$cat_id}'</a>Delete</td>";
                echo "<td><a href='categories.php?update={$cat_id}'</a>Update</td>";
                echo "</tr>";            
                    }


}


function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){

    if(isLoggedIn()){

        redirect($redirectLocation);

    }

}


function is_admin($username) {

    global $connection; 

    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirm($result);

    $row = mysqli_fetch_array($result);


    if($row['user_role'] == 'Admin'){

        return true;

    }else {


        return false;
    }

}

function username_exists($username){

    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirm($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }





}



function email_exists($email){

    global $connection;


    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);
    confirm($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}


function register_user($username, $email, $password){

    global $connection;

        $username = mysqli_real_escape_string($connection, $username);
        $email    = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
            
            
        $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}','{$email}', '{$password}', 'subscriber' )";
        $register_user_query = mysqli_query($connection, $query);

        confirm($register_user_query);

        



}

 function login_user($username, $password)
 {

     global $connection;

     $username = ($username);
     $password = ($password);

     $username = mysqli_real_escape_string($connection, $username);
     $password = mysqli_real_escape_string($connection, $password);


     $query = "SELECT * FROM users WHERE username = '{$username}' ";
     $select_user_query = mysqli_query($connection, $query);
     if (!$select_user_query) {

         die("QUERY FAILED" . mysqli_error($connection));

     }


     while ($row = mysqli_fetch_array($select_user_query)) {

         $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];


         if (password_verify($password,$db_user_password)) {

             $_SESSION['username'] = $db_username;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['user_role'] = 'Admin';



             redirect("/cms/admin");


         } else {


             return false;



         }



     }

     return true;

 }


 function isLoggedIn(){

    if(isset($_SESSION['user_role'])){

        return true;


    }


   return false;

}


 function redirect($location){


    header("Location:" . $location);
    exit;

}




            ?>


