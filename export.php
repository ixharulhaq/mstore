<?php include("db.php");
     session_start();
     $user_id=$_SESSION['id']; 
     
     //======================================================     
     if(isset($_POST["exportinvoices"])){

          //  id invoice_no company_id dated invoice_type debit credit file notes user_id 
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=invoicesdata.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('ID', 'Invoices ID', 'Company ID', 'Entry Date', 'Invoice Type', 'Debit', 'Credit', 'File', 'Notes', 'UserID'));  
          $query = "SELECT * from invoices WHERE user_id=$user_id ORDER BY id DESC";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }

     //=======================================================
     if(isset($_POST["exportcompanies"])){

          //  id invoice_no company_id dated invoice_type debit credit file notes user_id 
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=companiesdata.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('ID', 'Company Name', 'Mobile', 'Email', 'Address', 'Status', 'UserID'));  
          $query = "SELECT * from companies WHERE user_id=$user_id ORDER BY id DESC";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }

     //=========================================================
     if(isset($_POST['invoicestatus']))
     {

        if(empty($_POST['invoice_no']) || empty($_POST['company_id']))
        {
            $_SESSION['message1']="PLEASE FILL IN MANDATORY FIELDS..!";
            header("location:reports.php") ;
        }
        else
        {
                       
            $invoice_no = $_POST['invoice_no'];
            $company_id = $_POST['company_id'];
            $dr=0;
            $cr=0;

          $query="SELECT debit, credit from invoices WHERE company_id=$company_id AND user_id=$user_id AND invoice_no='$invoice_no'";
          $result = mysqli_query($conn, $query) or die;  
          
          

          while($row=mysqli_fetch_assoc($result)){
               $dr = $dr+$row['debit'];
               $cr = $cr+$row['credit'];
               $invoice=$row['invoice_no'];
          }
          
          
          if(mysqli_num_rows($result)==0){

               $_SESSION['message3'] = "Check Invoice Number!";
               header("location:reports.php") ;

          }else{
          
          if($cr>$dr || $cr<$dr){
               $tr=$cr-$dr;
               $_SESSION['message3'] = $tr;
               header("location:reports.php") ;
          }
          elseif($cr==$dr){
               $_SESSION['message3'] = "Bill Paid";
               header("location:reports.php") ;
          }
          
     } } }

     //=========================================================
     if(isset($_POST["pendingbills"])){

          if(empty($_POST['company_id']))
        {
            $_SESSION['message2']="PLEASE FILL IN MANDATORY FIELDS..!";
            header("location:reports.php") ;
        }
        else
        {

          $company_id=$_POST['company_id'];
          
          //  id invoice_no company_id dated invoice_type debit credit file notes user_id 
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=pendingbills.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('Invoice #', 'Company ID', 'Paid Amount', 'Bill Amount', 'Arrears'));  
          $query = "SELECT invoice_no, company_id, SUM(debit) AS dr, SUM(credit) AS cr, (SUM(credit)-SUM(debit)) AS net from invoices WHERE company_id=$company_id AND user_id=$user_id GROUP BY invoice_no ORDER BY net DESC";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }
     }

     //=========================================================
     if(isset($_POST["pendingb2report"])){

          $fromdate=$_POST['fromdate'];
          $todate=$_POST['todate'];

          //  id invoice_no company_id dated invoice_type debit credit file notes user_id 
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=pendingbillsall.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('Invoice #', 'Company ID', 'Paid Amount', 'Bill Amount', 'Arrears'));
          // ANY_VALUE(company_id) AS company_id        >> if giving error online
          $query = "SELECT invoice_no, company_id, SUM(debit) AS dr, SUM(credit) AS cr, (SUM(credit)-SUM(debit)) AS net from invoices WHERE user_id=$user_id AND dated BETWEEN '$fromdate' AND '$todate' GROUP BY invoice_no ORDER BY net DESC";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }

     //=========================================================

     if(isset($_POST["exc1report"])){

          $company_id=$_POST['company_id'];
          $fromdate=$_POST['fromdate'];
          $todate=$_POST['todate'];

          //  id invoice_no company_id dated invoice_type debit credit file notes user_id 
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=Report1.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('ID', 'Invoice #', 'Company ID', 'Dated', 'Invoice Type', 'Debit', 'Credit', 'Notes'));  
          $query = "SELECT id, invoice_no, company_id, dated, invoice_type, debit, credit, notes from invoices WHERE user_id=$user_id AND dated BETWEEN '$fromdate' AND '$todate' AND company_id=$company_id";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }

     //========================================================
     if(isset($_POST["exc2report"])){

          $invoice=$_POST['invoice'];
          $fromdate=$_POST['fromdate'];
          $todate=$_POST['todate'];

          //  id invoice_no company_id dated invoice_type debit credit file notes user_id 
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=Report2.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('ID', 'Invoice #', 'Company ID', 'Dated', 'Invoice Type', 'Debit', 'Credit', 'Notes'));  
          $query = "SELECT id, invoice_no, company_id, dated, invoice_type, debit, credit, notes from invoices WHERE user_id=$user_id AND dated BETWEEN '$fromdate' AND '$todate' AND invoice_no='$invoice'";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }

     //============================================================

     if(isset($_POST["exportdailyreport"])){

          //  id invoice_no company_id dated invoice_type debit credit file notes user_id 
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=datewisepending.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('Entry Date', 'Payments Made', 'Bill Amount', 'Pending'));  
          $query="SELECT dated, SUM(credit) AS credits, SUM(debit) AS debits, SUM(credit) - SUM(debit) AS pneding FROM invoices WHERE user_id=$user_id GROUP BY dated ORDER BY dated DESC"; 
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }


     ?>



