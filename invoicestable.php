<?php include('header.php'); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Search Record</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <form action="deleteall.php" method="POST">
                      <button type="submit" name="deleteall" class="btn btn-sm btn-danger">deleteall</button>
                    </form>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Invoices Table</h6><br>
                    <form action="export.php" method="POST">
                      <button type="submit" name="exportinvoices" class="btn btn-primary">Export</button>
                    </form>


                    <!-- id invoice_no company_id dated invoice_type debit credit file notes user_id -->
            </div>
            <div class="card-body">
              <div class="table-responsive" style="padding-right: 15px; padding-left: 15px;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>invoice_no</th>
                      <th>company_name</th>
                      <th>dated</th>
                      <th>invoice_type</th>
                      <th>debit</th>
                      <th>credit</th>
                      <th>file</th>
                      <th>notes</th>
                      <th>user_id</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php 
                                   
                      // $query = " SELECT * from data WHERE user_id=$user_id ORDER BY id ASC";
                                    
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
                                        $file = $row['file'];
                                        $notes = $row['notes'];
                                        $user_id = $row['user_id'];
                                        $id = $row['id'];
                                        $name = $row['company_name'];
                                        
                                     

                                ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $invoice_no ?></td>
                                        <td><?php echo $company_id.'-'.$name?></td>
                                        <td><?php echo $dated ?></td>
                                        <td><?php echo $invoice_type ?></td>
                                        <td><?php echo $debit ?></td>
                                        <td><?php echo $credit ?></td>
                                        <td><?php echo $file ?></td>
                                        <td><?php echo $notes ?></td>
                                        <td><?php echo $user_id ?></td>
                                        
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
 

 

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


