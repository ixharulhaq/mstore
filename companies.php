<?php 
include('header.php');
$user_id=$_SESSION['id'];
$message6='';
 if(isset($_SESSION['message6'])){
	$message6=$_SESSION['message6'];
	unset($_SESSION['message6']);
	}
?>

 
 	</br>
 	<div class="container">
 		 	
			  <strong><center><?php echo $message6; ?></center></strong><br>
			

 		<form method="POST" action="insertcompany.php">

 		<div class="row">
 			
 			<!-- id company_name mobile email address status user_id -->

 			
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Company Name</legend>
    				<div class="form-group">
				    <label for="company_name">Enter Name:</label>
				    <input type="text" class="form-control" placeholder="Enter Name" name="company_name" id="company_name">
				  </div>
    			</fieldset>
 			</div>

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Mobile</legend>
    				<div class="form-group">
				    <label for="mobile">Enter Mobile:</label>
				    <input type="text" class="form-control" placeholder="00923001234567" name="mobile" id="mobile">
				  </div>
    			</fieldset>
 			</div>

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Email</legend>
    				<div class="form-group">
				    <label for="email">Enter Mpbile:</label>
				    <input type="text" class="form-control" placeholder="abc@gmail.com" name="email" id="email">
				  </div>
    			</fieldset>
 			</div>
 		</div></br>

 		<div class="row">
 			<div class="col-12">
 			<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Address</legend>
    				<div class="form-group">
				    <label for="address">Enter Address:</label>
				    <textarea class="form-control" placeholder="Enter Address" name="address" id="address"></textarea> 
				  </div>
    		</fieldset>
    		</div>

 		</div><br>
 		
 		</br><p align="center">
 		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 		</form></p>
 		<br>

 		<!-- Retriew Data -->
 		<!-- id company_name mobile email address status user_id -->

 		<div class="row">
	 		 
	 		
	 		<div class="table-responsive" style="padding-right: 15px; padding-left: 15px;">
	 			<table class="table table-striped" id="dataTable" style="width: 100%;">
			    <thead>
			      <tr>
			        <th>company_name</th>
			        <th>mobile</th>
			        <th>email</th>
			        <th width="30%;">address</th>
			        <th>Edit</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			         <?php 
                                   
                                    $query = "SELECT * from companies WHERE user_id=$user_id ORDER BY id DESC";
                                  
			         				
		    						$result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $company_name = $row['company_name'];
                                        $mobile = $row['mobile'];
                                        $email = $row['email'];
                                        $address = $row['address'];
                                        
                                        $id = $row['id'];
                                        
                                    
                            		?>
                                    <tr>
                                        
                                        <td><?php echo $company_name ?></td>
                                        <td><?php echo $mobile ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $address ?></td>
                                                                               
                                        
                                        
                                        <td><a href="cedit.php?cedit=<?php echo $id; ?>"><span class="btn btn-primary btn-sm">Edit</span></a></td>
                                        <td><a  href="cdelete.php?cdelete=<?php echo $id; ?>" onclick="return confirm('Security Check! Are you sure you want to delete? This will also delete all the other records linked with this Customer.');"><button type="button" class="btn btn-sm btn-danger" style="font-size: 14px;" disabled>Delete</button></a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
			      
			     </tbody>
			  </table>
	 		</div>
	 	</div>

	</div>



<?php include ('footer.php'); ?>



