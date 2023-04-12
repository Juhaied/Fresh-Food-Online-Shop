<?php

    include('../config/constants.php');
    //get the id of admin for delete


     $id = $_GET['id'];
    //sql query to delete

    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
     //   echo "Success";
     $_SESSION['delete'] = "<div class='succes'>Admin Deleted Successfully.</div>";
     header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
       // echo "Not success";

       $_SESSION['delete'] = "<div class='error'>Admin Not Deleted.</div>";
     header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>