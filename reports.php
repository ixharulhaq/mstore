<?php include('header.php'); 
$message3='';
$message1='';
$message2='';

if(isset($_SESSION['message3'])){
    $message3=$_SESSION['message3'];
    unset($_SESSION['message3']);
    }
$message1='';
if(isset($_SESSION['message1'])){
    $message1=$_SESSION['message1'];
    unset($_SESSION['message1']);
    }
$message2='';
if(isset($_SESSION['message2'])){
    $message1=$_SESSION['message2'];
    unset($_SESSION['message2']);
    }


?>


        <!-- Check Invoice -->        

        <div class="container-fluid">
        <strong><center style="color:red;"><?php echo $message1; ?></center></strong>
        <fieldset class="scheduler-border">
        <legend class="scheduler-border" style="color:orangered;">Invoice Enquiry</legend>
        <form method="POST" action="export.php" enctype="multipart/form-data">
        
        <div class="row">
            
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
                    <legend class="scheduler-border" style="color:blue;">Invoice # (*case sensative & without blanks)</legend>
                    <div class="form-group">
                    <label for="invoice_no">Enter Invoice:</label>
                    <input type="invoice_no" class="form-control" placeholder="Enter Invoice #" name="invoice_no" id="invoice_no">
                  </div>
                </fieldset>
            </div>
            <div class="col-4">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border" style="color:blue;">Status</legend>
                    <div class="form-group">
                    <label for="message">Pending Amount:</label>
                    <input type="invoice_no" class="form-control" value="<?php echo $message3; ?>" name="message" id="message" onchange="chgColor();">
                  </div>
                </fieldset>
            </div>
            
       
        </div>
        </br>
               
        <button type="submit" name="invoicestatus" class="btn btn-primary">Status</button>
        
        
        </form>



        </fieldset>
        </br>
        </div>
        
        <!-- Pending Bills -->

        <div class="container-fluid">
        
        <fieldset class="scheduler-border">
        <legend class="scheduler-border" style="color:orangered;">Pending Bills - All by Company</legend>
        <form method="POST" action="export.php" enctype="multipart/form-data">
        
        <div class="row">
            <strong><center style="color:red;"><?php echo $message2; ?></center></strong>
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
                      
            
       
        </div>
        </br>
               
        <button type="submit" name="pendingbills" class="btn btn-primary">Status</button>
        
        
        </form>



        </fieldset>
        </br>
        </div>

        <!-- Pending Bills Dates -->

        <div class="container-fluid">
        <fieldset class="scheduler-border">
        <legend class="scheduler-border" style="color:orangered;">Pending Bills - All by Date</legend>
        <form method="POST" action="export.php" enctype="multipart/form-data">
        <div class="row">
            
            <div class="col-4">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border" style="color:blue;">From Date (*)</legend>
                    <div class="form-group">
                    <label for="dated">Enter Date:</label>
                    <input type="date" class="form-control" placeholder="Enter Date" name="fromdate" id="dated">
                  </div>
                </fieldset>
            </div>
            <div class="col-4">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border" style="color:blue;">To Date (*)</legend>
                    <div class="form-group">
                    <label for="dated">Enter Date:</label>
                    <input type="date" class="form-control" placeholder="Enter Date" name="todate" id="dated">
                  </div>
                </fieldset>
            </div>
        </div>
        </br>
               
        <button type="submit" name="pendingb2report" class="btn btn-primary">Excel</button>
        <button type="submit" name="pendingb2report" class="btn btn-primary" disabled>PDF</button>
        
        </form></fieldset>
        </br>
        </div>

        <!--  -->


        <div class="container-fluid">
        <fieldset class="scheduler-border">
        <legend class="scheduler-border" style="color:orangered;">Company Statement</legend>
        <form method="POST" action="export.php" enctype="multipart/form-data">
        <div class="row">
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
                    <legend class="scheduler-border" style="color:blue;">From Date (*)</legend>
                    <div class="form-group">
                    <label for="dated">Enter Date:</label>
                    <input type="date" class="form-control" placeholder="Enter Date" name="fromdate" id="dated">
                  </div>
                </fieldset>
            </div>
            <div class="col-4">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border" style="color:blue;">To Date (*)</legend>
                    <div class="form-group">
                    <label for="dated">Enter Date:</label>
                    <input type="date" class="form-control" placeholder="Enter Date" name="todate" id="dated">
                  </div>
                </fieldset>
            </div>
        </div>
        </br>
               
        <button type="submit" name="exc1report" class="btn btn-primary">Excel</button>
        <button type="submit" name="pdf1report" class="btn btn-primary" disabled>PDF</button>
        
        </form></fieldset>
        </br>
        </div>


        <!-- /.container-fluid -->
        <div class="container-fluid">
        <fieldset class="scheduler-border">
        <legend class="scheduler-border" style="color:orangered;">Invoice Statement</legend>
        <form method="POST" action="export.php" enctype="multipart/form-data">
        
        <div class="row">
            
            <div class="col-4">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border" style="color:blue;">Invoice # (*case sensative & without blanks)</legend>
                    <div class="form-group">
                    <label for="invoice">Enter Invoice:</label>
                    <input type="invoice" class="form-control" placeholder="Enter Invoice #" name="invoice" id="invoice">
                  </div>
                </fieldset>
            </div>
            <div class="col-4">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border" style="color:blue;">From Date (*)</legend>
                    <div class="form-group">
                    <label for="dated">Enter Date:</label>
                    <input type="date" class="form-control" placeholder="Enter Date" name="fromdate" id="dated">
                  </div>
                </fieldset>
            </div>
            <div class="col-4">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border" style="color:blue;">To Date (*)</legend>
                    <div class="form-group">
                    <label for="dated">Enter Date:</label>
                    <input type="date" class="form-control" placeholder="Enter Date" name="todate" id="dated">
                  </div>
                </fieldset>
            </div>
        
        </div>
        </br>
               
        <button type="submit" name="exc2report" class="btn btn-primary">Excel</button>
        <button type="submit" name="pdf2report" class="btn btn-primary" disabled>PDF</button>
        
        </form>
        </fieldset>
        </br>
        </div>

        
        

<?php include('footer.php'); ?>


<script type="text/javascript">

function chgColor() {
  let x = document.getElementById("message").value;
  if (x.value == null) {
    document.getElementById("message").style.backgroundColor = "yellow";
  } else{
    document.getElementById("message").style.backgroundColor = "greenyellow";
  }
}

chgColor();

</script>