<?php 

    require_once("header.php");
    
    // id   invoice_no  company_id  dated   invoice_type    debit   credit  file    notes   user_id

    $id = $_GET['edit'];
    $query = " SELECT * from invoices WHERE id='".$id."'";
    $result = mysqli_query($conn,$query);

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

            $id = $row['id'];


    }

   
?>

<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Update Record</h3>
                        </div>
                        <div class="card-body">
                            
                            <span></span>
                            <form action="updatedata.php" method="POST">
                            
                                <label>invoice_no:</label><br />
                                <input type="text" class="form-control mb-2" name="invoice_no" value="<?php echo $invoice_no ?>"><br />
                                <label>company_id:</label><br />
                                <input type="text" class="form-control mb-2" name="company_id" value="<?php echo $company_id ?>" readonly><br />
                                <label>dated:</label><br />
                                <input type="date" class="form-control mb-2" name="dated" value="<?php echo $dated ?>"><br />
                                <label>invoice_type:</label><br />
                                <input type="text" class="form-control mb-2" name="invoice_type" value="<?php echo $invoice_type ?>"><br />
                                <label>debit:</label><br />
                                <input type="text" class="form-control mb-2" name="debit" value="<?php echo $debit ?>"><br />
                                <label>credit:</label><br />
                                <input type="text" class="form-control mb-2" name="credit" value="<?php echo $credit ?>"><br />
                                <label>notes:</label><br />
                                <input type="text" class="form-control mb-2" name="notes" value="<?php echo $notes ?>"><br />
                                 <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $id ?>">                                     
                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                                <button type="close" class="btn btn-danger" name="close">Close</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
