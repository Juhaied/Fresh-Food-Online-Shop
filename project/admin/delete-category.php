<?php
    //echo "Delete Page";

    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
       // echo "get";
       $id = $_GET['id'];
       $image_name =$_GET['image_name'];

       if($image_name != "")
       {
            $path = "../images/category/".$image_name;

            $remove = unlink($path);

            if($remove== false)
            {
               $_SESSION['remove'] ="<div class='error'>Failed to remove Category image.</div>";
               header('location:'.SITEURL.'admin/manage-category.php');

               die();
            }

       }

       $sql = "DELETE FROM tbl_category WHERE id=$id";

       $res = mysqli_query($conn, $sql);

       if($res==true)
       {
        $_SESSION['delete'] ="<div class='succes'>Category Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');

       }
       else 
       {
        $_SESSION['remove'] ="<div class='error'>Failed to delete Category.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');

       }
       
    }
    else 
    {
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>
