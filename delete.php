<?php 

        include("db.php");

        if(isset($_GET['delete']))
        {
            $id = $_GET['delete'];
            $query = " DELETE from invoices WHERE id = '".$id."'";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:invoices.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
        else
        {
            header("location:data.php");
        }
?>