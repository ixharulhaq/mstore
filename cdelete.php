<?php 

        include("db.php");

        if(isset($_GET['cdelete']))
        {
            $id = $_GET['cdelete'];
            $query = " DELETE from companies WHERE id = '".$id."'";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:companies.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
        else
        {
            header("location:companies.php");
        }
?>