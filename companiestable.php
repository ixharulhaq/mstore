<?php include('header.php'); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Search Record</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Companies Table</h6><br>
                    <form action="export.php" method="POST">
                      <button type="submit" name="exportcompanies" class="btn btn-primary">Export</button>
                    </form>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="padding-right: 15px; padding-left: 15px;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>company_name</th>
                      <th>mobile</th>
                      <th>email</th>
                      <th>address</th>
                      <th>status</th>
                      <th>user_id</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php 
                                   
                                    $query = "SELECT * from companies WHERE user_id=$user_id ORDER BY id DESC";
                                  
                      
                      // $query = "SELECT * from expense INNER JOIN expenditure ON expenditure.expense_id= expense.id WHERE expenditure.user_id=expense.user_id AND expenditure.user_id=$user_id ORDER BY expenditure.id DESC";

                    $result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $company_name = $row['company_name'];
                                        $mobile = $row['mobile'];
                                        $email = $row['email'];
                                        $address = $row['address'];
                                        $status = $row['status'];
                                        $user_id = $row['user_id'];
                                        $id = $row['id'];
                                        
                                    
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $company_name ?></td>
                                        <td><?php echo $mobile ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $status ?></td>
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


