  
<?php 
 include('../config/constants.php');
if(isset($_GET['id']) AND isset($_GET['image_name'])) 
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        if($image_name != "")
        {
            $path = "../Images/Food/".$image_name;
            $remove = unlink($path);
            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error-message'>Failed to Remove Image.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }
        $query = "DELETE FROM food_table WHERE id=$id";
        $result = mysqli_query($connection, $query);
        if($result==true)
        {
            $_SESSION['delete'] = "<div class='success-message'>Food Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error-message'>Failed to Delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error-message'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>
