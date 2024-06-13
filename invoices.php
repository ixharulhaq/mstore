<?php include('header.php'); 
$message1='';
$message2='';
if(isset($_SESSION['message1'])){
	$message1=$_SESSION['message1'];
	unset($_SESSION['message1']);
	}
if(isset($_SESSION['message2'])){
	$message2=$_SESSION['message2'];
	unset($_SESSION['message2']);
	}

?>

<div class="container">

 		<strong><center style="color:red;"><?php echo $message1; ?></center></strong>
 		<strong><center style="color:red;"><?php echo $message2; ?></center></strong>
 		
 		
		<button id="show" class="btn btn-primary btn-sm">Show</button>
		<button id="hide" class="btn btn-danger btn-sm">Hide</button>
		<br><br>
		<span id="showhide">
 		<form method="POST" action="insertinvoice.php" enctype="multipart/form-data">

 		<div class="row">
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border" style="color:blue;">Invoice Number (*)</legend>
    				<div class="form-group">
				    <label for="invoice_no">Invoice # <span style="color:red;"> (auto generated) </span></label>
				    <?php 
				    $number=date('Ymd').'-'.rand(1,9999);

				    ?>
				    <input type="text" style="color:darkgreen; font-weight: bold;" class="form-control" onBlur="checkAvailability()" value="<?php echo $number; ?>" name="invoice_no" id="invoice_no">
				    
				  </div>
    			</fieldset>
 			</div>
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border" style="color:blue;">Company Name (*)</legend>
    				
				  <?php 
				  $user_id=$_SESSION['id'];
				  $custquery = " SELECT * from companies WHERE user_id=$user_id ORDER BY id DESC";
		    						$resultcust = mysqli_query($conn,$custquery);?>
                                    
									  <div class="form-group">
					  <label for="company_id">Select from list:</label>
					  <select class="form-control" id="company_id" name="company_id">
					    <option disabled selected="">Select</option>
					   <?php  while($rowsc=mysqli_fetch_assoc($resultcust)) { ?>
					    <option value='<?php echo $rowsc['id'];?>'>'<?php echo $rowsc['id'].'-'.$rowsc['company_name'];?>'</option> <?php  } ?> 
					    </select>
					</div>
				
    			</fieldset>
 			</div>
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border" style="color:blue;">Invoice Date (*)</legend>
    				<div class="form-group">
				    <label for="dated">Enter Date:</label>
				    <input type="date" class="form-control" placeholder="Enter Date" name="dated" id="dated">
				  </div>
    			</fieldset>
 			</div>
 		</div></br>

 		<div class="row">
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border" style="color:blue;">Invoice Type (*)</legend>
    				<div class="form-group">
				    <label for="invoice_type">Select Type:</label>
				    <select class="form-control" id="invoice_type" name="invoice_type">
					<option disabled selected="">Select</option>
                    <option value="New">New</option>
        			<option value="Old">Old</option>
                    </select>
                
				  </div>
    			</fieldset>
 			</div>
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border" style="color:blue;">Payment Made (Debit)</legend>
    				<div class="form-group">
				    <label for="debit">Enter Amount:</label>
				    <input type="text" class="form-control" placeholder="Enter Payments" name="debit" id="debit">
				  </div>
    			</fieldset>
 			</div>
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border" style="color:blue;">Bill Amount (Credit)</legend>
    				<div class="form-group">
				    <label for="credit">Enter Amount:</label>
				    <input type="text" style="background-color: yellow;" class="form-control" placeholder="Bill Amount" name="credit" id="credit">
				    <span id="duplicate"></span>
				  </div>
    			</fieldset>
 			</div>
 		</div><br>
 		<div class="row">
 			<div class="col-12">
 			<fieldset class="scheduler-border">
    				<legend class="scheduler-border" style="color:blue;">Invoice Upload</legend>
    				<div class="form-group">
				    
				    Select invoice to upload:
					  <input type="file" name="file" id="file">
					  <span style="color:blue;">Formats: gif, png, jpg, jpeg or bmp</span>				
				  </div>
    		</fieldset>
    		</div>

 		</div><br>
 		<div class="row">
 			<div class="col-12">
 			<fieldset class="scheduler-border">
    				<legend class="scheduler-border" style="color:blue;">Notes</legend>
    				<div class="form-group">
				    <label for="notes">Enter Remarks:</label>
				    <textarea class="form-control" placeholder="Enter Remarks" name="notes" id="notes"></textarea> 
				  </div>
    		</fieldset>
    		</div>

 		</div>
 		</br><p align="center">
 		<button type="submit" name="submit" class="btn btn-primary">Submit</button></p>
 		</form></span>


 	<br>
	 	<div class="row">
	 		 
	 		 
	 		
	 		<div class="table-responsive" style="padding-right: 15px; padding-left: 15px;">
	 			<table class="table table-striped" id="dataTable" style="width:100%;">

			    <thead>
			      <tr>
			        <th>Invoice #</th>
			        <th>Company</th>
			        <th>Dated</th>
			        <th>Invoice Type</th>
			        <th>Debit</th>
			        <th>Credit</th>
			        <th>Notes</th>
			        <th>Invoice</th>
			        <th>Edit</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			         <?php 
                                   
                                    // $query = " SELECT * from invoices WHERE user_id=$user_id ORDER BY id DESC";
                                    
			         				$query = "SELECT * from companies INNER JOIN invoices ON invoices.company_id= companies.id WHERE invoices.user_id=companies.user_id AND invoices.user_id=$user_id ORDER BY invoices.id DESC";

		    						$result = mysqli_query($conn,$query) or die( mysqli_error($conn));
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $invoice_no = $row['invoice_no'];
                                        $company_id = $row['company_id'];
                                        $dated = $row['dated'];
                                        $invoice_type = $row['invoice_type'];
                                        $debit = $row['debit'];
                                        $credit = $row['credit'];
                                        $notes = $row['notes'];
                                        $file = $row['file'];
                                        
                                        $id = $row['id'];
                                        $name = $row['company_name'];
                                     

                            		?>
                                    <tr>
                                        <td><?php echo $invoice_no ?></td>
                                        <td><?php echo $company_id .'-'.$name ?></td>
                                        <td><?php echo $dated ?></td>
                                        
                                        <td><?php echo $invoice_type ?></td>
                                        <td><?php echo $debit ?></td>
                                        <td><?php echo $credit ?></td>
                                        
                                        <td><?php echo $notes ?></td> 
                                        
                                       
                                        <td>
                                        	
                                        	<img  src="<?php echo $file ?>" style="width:50px; height:30px;" onClick="window.open(this.src)">
                                        	
                            			 </td>
                                    	

                                    	

                                        <td><a href="edit.php?edit=<?php echo $id; ?>"><span class="btn btn-primary btn-sm">Edit</span></a></td>
                                        <td><a  href="delete.php?delete=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger btn-sm">Delete</button></a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
			     

			     </tbody>

			  </table>
			 

	 		</div>
	 	</div>
</div>
	 




<?php include('footer.php'); ?>   

<script >
function image(img) {
    var src = img.src;
    window.open(src);
    
}

$(document).ready(function(){
  $("#hide").click(function(){
    $("#showhide").hide();
  });
  $("#show").click(function(){
    $("#showhide").show();
  });
});

</script>

<script type="text/javascript">
function checkAvailability() {

jQuery.ajax({
url: "check_availability.php",
data:'invoice_no='+$("#invoice_no").val(),
type: "POST",
success:function(data){

if(data == 'yes'){

$("#credit").prop('disabled',true);
$("#credit").css('backgroundColor', 'red');


} 
else if(data == 'no'){
$("#credit").show();
}
},

});
}

</script>    

