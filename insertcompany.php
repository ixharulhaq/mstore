<?php 
include('db.php');

session_start();

$user_id = $_SESSION['id'];

// id company_name mobile email address status user_id 

if(isset($_POST['submit'])){


    
        if(empty($_POST['company_name']) || empty($_POST['mobile']) || empty($_POST['email']) || empty($_POST['address']))
        {
            
            $_SESSION['message6']="PLEASE FILL IN ALL FIELDS..!";
            header("location:companies.php") ;
        }
        else
        {
            $company_name = $_POST['company_name'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $address = $_POST['address'];
                                 
            

            $query = "INSERT into companies (company_name, mobile, email, address, user_id) VALUES ('$company_name','$mobile','$email','$address','$user_id')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:companies.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:index.php");
    }



?>

