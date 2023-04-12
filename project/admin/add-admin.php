<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        
        <br><br>

        <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];

                        unset($_SESSION['add']);//removing the msg
                    }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>

                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>
            </table>


        </form>

    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
  // value form and save in database
  //ccheck whether the button is clicked or not

  if(isset($_POST["submit"]))
  {
      // Button Clicked

     // echo "Button Clicked";

     //Get the data from form

    $full_name=$_POST['full_name'];
     $username = $_POST['username'];
    $password=($_POST['password']);
    //sql query to save data into databse

   // $my_insert_query = "INSERT INTO tbl_admin (id,full_name,user_name,password) VALUES ('$full_name','$username','$password')";

    /*$execute_query = mysqli_query($conn,$my_insert_query);
   $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$user_name',
    password='$password'
    ";

    */
   
   // $conn = mysqli_connect('localhost', 'root', '');
   // $db_select = mySqli_select_db($conn,'food-order');
 
    $sql = "INSERT INTO tbl_admin(full_name, user_name, password)
    VALUES('$full_name','$username','$password')";
    
    //echo $full_name."<br>".$username."<br>".$password;
    //$res = mysqli_query($conn,$sql);

    if($conn->query($sql) == TRUE){
       // echo "right";

       $_SESSION['add'] = "ADMIN ADDED SUCCESSFULLY";
       header("location:".SITEURL.'admin/manage-admin.php');

    } else {
        $_SESSION['add'] = "Failed to Add Admin";
        header("location:".SITEURL.'admin/add-admin.php');
    }
    $conn->close();

    
    
 }
  
 ?>