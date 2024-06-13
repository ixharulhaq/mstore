<?php 
include('db.php');

session_start();


$user_id = $_SESSION['id'];


// id   invoice_no  company_id  dated   invoice_type    debit   credit  file    notes   user_id

if(isset($_POST['submit']))
    {
        if(empty($_POST['invoice_no']) || empty($_POST['company_id']) || empty($_POST['dated']) || empty($_POST['invoice_type']))
        {
            $_SESSION['message1']="PLEASE FILL IN MANDATORY FIELDS..!";
            header("location:invoices.php") ;
        }
        else
        {
            
            
            $invoice_no = $_POST['invoice_no'];
            $company_id = $_POST['company_id'];
            $dated = $_POST['dated'];
            $invoice_type = $_POST['invoice_type'];

            if(empty($_POST['debit']){
            $_POST['debit']=0;}

            $debit = $_POST['debit'];
            
            if(empty($_POST['credit']){
            $_POST['credit']=0;}
            
            $credit = $_POST['credit'];
            
            $notes = $_POST['notes'];
            $filename = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            if ($extension==NULL){
                $destination="uploads/logo.png";
                }else{
            $newname = rand(0,100000).$invoice_no.'.'.$extension;
            $destination = 'uploads/' . $newname;           
            }
            $allowed = array('gif', 'png', 'jpg', 'jpeg', 'bmp', '' );
            if (!in_array($extension, $allowed)) {
                    $_SESSION['message2']="PLEASE UPLOAD gif, png, jpg, jpeg or bmp FORMAT!";
                    header("location:invoices.php") ;
                }

            else{


            move_uploaded_file($temp, $destination);}
            
            //$file = $filename;

            
                  
            // id   invoice_no  company_id  dated   invoice_type    debit   credit  file    notes   user_id

            $query = "INSERT into invoices (invoice_no, company_id, dated, invoice_type, debit, credit, file, notes, user_id) VALUES ('$invoice_no','$company_id','$dated','$invoice_type','$debit','$credit','$destination', '$notes','$user_id')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:invoices.php");
            }
            else
            {
                echo 'Please Check Your Query';
            }
        
        }
    }
    else
    {
        header("location:home.php");
    }



?>