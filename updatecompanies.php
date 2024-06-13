<?php 

   include('db.php');
   session_start();

   if(isset($_POST['close'])){
   	header("Location:companies.php");
   }

///  //  id company_name mobile email address status user_id 

    if(isset($_POST['cupdate']))
    {
    
    	$id=$_POST['id'];
    	$company_name = $_POST['company_name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
            
            

        $query = " UPDATE companies SET company_name = '".$company_name."', mobile='".$mobile."', email='".$email."', address='".$address."' WHERE id='".$id."'";
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
?>