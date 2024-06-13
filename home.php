<?php include('header.php'); 
$user_id=$_SESSION['id'];
?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <form action="export.php" method="POST">
                      <button type="submit" name="exportdailyreport" class="btn btn-primary">Date Wise</button>
            </form>
          </div>

          <!-- Content Row -->
          <div class="row">
            
            
                
            <!-- Total Credits -->

            <?php  
            $query="SELECT SUM(credit) AS creditsum FROM invoices WHERE user_id=$user_id";
                $qt=mysqli_query($conn,$query) or die( mysqli_error($conn));
                $nt=mysqli_fetch_array($qt);
                
                   $creditsum = $nt['creditsum'];
                   
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Credits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $creditsum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Debits -->

            <?php  
            $query="SELECT SUM(debit) AS debitsum FROM invoices WHERE user_id=$user_id";
                $qt=mysqli_query($conn,$query) or die( mysqli_error($conn));
                $nt=mysqli_fetch_array($qt);
                
                   $debitsum = $nt['debitsum'];
                   
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-danger">Total Debits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $debitsum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Amount -->

            <?php  
            
                
                $pendingamount = $creditsum-$debitsum;
                   
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-info">Pending Payments</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $pendingamount; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
  
  
    <!-- Percentage -->

    <?php 
                    if(!$pendingamount==0){
                      $percent=$pendingamount/$creditsum*100;
                      $round=round($percent);}
                       ?>

    <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Ratio</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">

                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $round; ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <?php if($round>50) {?>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $round; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          <?php }else {?>
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $round; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       </div>
       
       <!--       -->

       <div class="row" >
          
          <div class="card-body" >
              <div class="table-responsive" style="padding-right: 15px; padding-left: 15px;" >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>invoice_no</th>
                      <th >company_id</th>
                      <th>total_debit</th>
                      <th>total_credit</th>
                      <th>net</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php 
                                   
                      
                      // ANY_VALUE(company_id) AS company_id    ?? query for online              
                      $query = "SELECT invoice_no, company_id, SUM(debit) AS dr, SUM(credit) AS cr, (SUM(credit)-SUM(debit)) AS net FROM invoices WHERE user_id=$user_id GROUP BY invoice_no ORDER BY net DESC";  
                      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));  
                      while($row = mysqli_fetch_assoc($result)) 
                                    {
                                        $invoice_no = $row['invoice_no'];
                                        $company_id = $row['company_id'];
                                        $dr = $row['dr'];
                                        $cr = $row['cr'];
                                        $net = $row['net'];
                                                                             
                                     

                                ?>
                                    <tr>
                                        
                                        <td><?php echo $invoice_no; ?></td>
                                        <td><?php echo $company_id; ?></td>
                                        <td><?php echo $dr; ?></td>
                                        <td><?php echo $cr; ?></td>
                                        <td><?php echo $net; ?></td>
                                        
                                        
                                        
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



