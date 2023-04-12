<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php
            $id=$_GET['id'];

            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            $res=mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                  // echo "Admin Available";

                  $row=mysqli_fetch_assoc($res);

                  $full_name=$row['full_name'];
                  $username = $row['user_name'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>
        <form action="" method="POST">
            <table>
                <table class="tbl-40">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value = "<?php echo $id; ?>">
                            <input type ="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit']))
    {
      //  echo "Button Clicked";
       $id =$_POST['id'];
       $full_name=$_POST['full_name'];
       $username=$_POST['username'];

       $sql = "UPDATE tbl_admin SET
       full_name= '$full_name',
       user_name='$username' 
       WHERE id='$id'
       ";

       $res=mysqli_query($conn, $sql);

       if($res==TRUE)
       {
            $_SESSION['update']="<div class='succes'>Admin Updated Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
       }
       else
       {
            $_SESSION['update']="<div class='error'>FAiled to Delete Admin.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
       }

    }
?>


<?php include('partials/footer.php'); ?>