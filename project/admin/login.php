<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Fresh Mart </title>
        <link rel="stylesheet" href="../css/admin.css"> 
    </head>

    <body>

        <div class="login"> 
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset( $_SESSION['no-login-msg']))
                {
                    echo  $_SESSION['no-login-msg'];
                    unset($_SESSION['no-login-msg']);
                }

            ?>

            <br><br>
            <!-- login form-->
            <form action=""method="POST" class="text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>

        </div>
    </body>
</html>

<?php

        if(isset($_POST['submit']))
        {
             $username = $_POST['username'];
             $password = $_POST['password'];

            // $sql = "SELECT * FROM tbl_admin WHERE username ='$username' AND password='$password'";
             
             $res = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username ='$username' AND password='$password'");
            if($res == true){
             $count = mysqli_num_rows($res);
             //$count = $res->mysqli_num_rows;
            // mysqli_close($conn);

            if($count == 1)
            {
                $_SESSION['login'] = "<div class='succes'>Login Successfull.</div>";
                $_SESSION['user'] = $username;

                header('location:'.SITEURL.'admin');

            }
            else
            {
                $_SESSION['login'] = "<div class='error'>Login Failed.</div>";


                header('location:'.SITEURL.'admin/login.php');

            }
            }


        }

?>