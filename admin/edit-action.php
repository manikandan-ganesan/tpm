<?php
    include('includes/function.php');
    if (!isLoggedIn()) {
        header('location: login.php');
    }
?>
<?php include('includes/head.php'); ?>
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">

<?php include('includes/css.php'); ?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">


<?php 
    include('includes/topbar.php');
    include('includes/sidebar.php'); 
?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="page-title-box">
                                    <h4 class="page-title">Employee Details</h4>
                                </div>
                            </div>                           
                        </div>
                        <!-- end row -->
            
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="card m-b-20">
                                        <div class="card-body"> 
                                                                   
                                            <form method="post" action="employee-action.php">
                                           <?php 
                                              global $db;
                                              $id = $_REQUEST['id'];
                                              $query = "SELECT * FROM empDetails where id= ".$id;                                           
                                              $result = mysqli_query($db, $query);
                                              $user = mysqli_fetch_array($result);
                                           ?>
                                            <div class="table-responsive">
                                                <table class="table table-vertical">                                                   
                                                    <tbody>                                                    
                                                    <tr>
                                                    <td>Employee Password</td> 
                                                    <td><input type="text" class="form-control" name="employeepasssword" id="employeepasssword"  value="<?php echo $user['empPassword']; ?>" required/></td>                                                          
                                                    </tr>                                      
                                                    <tr>
                                                    <td>Proejct Name</td> 
                                                    <td>
                                                        <select class="form-control" name="projectName" id="projectName">
                                                            <option value=""> --  Select Status -- </option>
                                                            <?php
                                                                global $db;
                                                                $query1 = "SELECT * FROM project_details Where temp_delete ='n' AND projectStatus = 'open' ";                                            
                                                                $result1 = mysqli_query($db, $query1);
                                                                $count1 = mysqli_num_rows($result1);
                                                                if($count1 == 0){
                                                            ?>
                                                                <p>No Data Found</p>
                                                            <?php
                                                                } else {  
                                                                    while($user1 = mysqli_fetch_array($result1)){                                                                  
                                                            ?>     
                                                                <option value="<?php echo $user1['projectName']; ?>" <?php if($user1['projectName'] == $user['empProject']) { ?> selected <?php } ?>><?php echo $user1['projectName']; ?></option>
                                                                
                                                            <?php 
                                                         }
                                                        } ?>
                                                        </select>
                                                                                                             
                                                    </tr>
                                                    <tr>
                                                    <td>Designation</td> 
                                                    <td>
                                                        <select class="form-control" name="designation" id="designation">
                                                            <option value=""> --  Select Designation -- </option>
                                                            <option value="telecaller" <?php if($user['empDestination'] == "telecaller") { ?> selected <?php } ?>>Telecaller</option>
                                                            <option value="salePerson" <?php if($user['empDestination'] == "salePerson") { ?> selected <?php } ?>>Sale Person</option>
                                                        </select>
                                                                                                             
                                                    </tr>
                                                   
                                                    <tr>
                                                    <td>Employee Status</td> 
                                                    <td>
                                                        <select class="form-control" name="employeeStatus" id="employeeStatus">
                                                            <option value=""> --  Select Status -- </option>
                                                            <option value="Active" <?php if($user['empStatus'] == "Active") { ?> selected <?php } ?>>Active</option>
                                                            <option value="Deactive" <?php if($user['empStatus'] == "Deactive") { ?> selected <?php } ?>>Deactive</option>
                                                        </select>
                                                                                                             
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Employee Mobile</td> 
                                                    <td><input type="text" class="form-control" name="employeemobile" id="employeemobile" value="<?php echo $user['empMobile']; ?>"/></td>                                                          
                                                    </tr>  
                                                    <td>Employee Address</td> 
                                                    <td><textarea id="empAddress" name="empAddress" class="form-control" maxlength="225" rows="3" placeholder="Enter Address"><?php echo $user['empAddress']; ?></textarea></td>                                                          
                                                    </tr>   
                                                    <tr>                                                    
                                                    <td colspan="2">
                                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>"/>
                                                    <input type="submit" name="edit" id="edit" class="btn btn-primary float-right" value="Save"/></td>                                                          
                                                    </tr>                                                   
                                                    </tbody>
                                                </table>
                                            </div>
                                            </form>
                                          
                                        </div>
                                    </div>
                                </div>
            
                               
                            </div>
                            <!-- end row -->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

<?php include('includes/footer.php'); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
            

<?php include('includes/script.php'); ?>      

        <!--Morris Chart-->
        <link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"> <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/pages/form-advanced.js"></script>
        <?php include('includes/script-bottom.php'); ?>

</body>

</html>