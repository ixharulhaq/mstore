<?php 

   include('db.php');
   session_start();

   if(isset($_POST['close'])){
   	header("Location:invoices.php");
   }

    if(isset($_POST['update']))
    {
    
    		$id=$_POST['id'];
    		$invoice_no = $_POST['invoice_no'];
            $company_id = $_POST['company_id'];
            $dated = $_POST['dated'];
            $invoice_type = $_POST['invoice_type'];
            $debit = $_POST['debit'];
            $credit = $_POST['credit'];
            $notes = $_POST['notes'];

    
        
        $query = "UPDATE invoices SET invoice_no = '".$invoice_no."', company_id='".$company_id."', dated='".$dated."', invoice_type='".$invoice_type."', debit = '".$debit."', credit='".$credit."', notes='".$notes."' WHERE id='".$id."'";
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
?>