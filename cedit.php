<?php 

    require_once("header.php");
    
    //  id company_name mobile email address status user_id 

    $id = $_GET['cedit'];
    $query = " SELECT * from companies WHERE id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
            $company_name = $row['company_name'];
            $mobile = $row['mobile'];
            $email = $row['email'];
            $address = $row['address'];
                      
            
            $id = $row['id'];
    }

?>

<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3">Update Record</h3>
                        </div>
                        <div class="card-body">
                            
                            <span></span>
                            <form action="updatecompanies.php" method="POST">
                            
                                <label>company_name:</label><br />
                                <input type="text" class="form-control mb-2" name="company_name" value="<?php echo $company_name ?>" ><br />
                                <label>mobile:</label><br />
                                <input type="text" class="form-control mb-2" name="mobile" value="<?php echo $mobile ?>" ><br />
                                <label>email:</label><br />
                                <input type="text" class="form-control mb-2" name="email" value="<?php echo $email ?>" ><br />
                                <label>address:</label><br />
                                <input type="text" class="form-control mb-2" name="address" value="<?php echo $address ?>"><br />
                                                                                                
                                <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $id ?>">                                     
                                <button type="submit" class="btn btn-primary" name="cupdate">Update</button>
                                <button type="close" class="btn btn-danger" name="close">Close</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
