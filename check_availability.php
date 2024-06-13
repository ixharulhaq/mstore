<?php 

include('db.php');


if(!empty($_POST["invoice_no"])) {
$result = mysqli_query($conn,"SELECT count(*) FROM invoices WHERE invoice_no='" . $_POST["invoice_no"] . "'");
$row = mysqli_fetch_row($result);
$email_count = $row[0];
if($email_count>0) echo "yes";
else echo "no";
}

?>