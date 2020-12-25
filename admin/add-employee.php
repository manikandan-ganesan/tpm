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
                            <div class="col-sm-4 text-right">
                                <a href="add-employee.php" class="mt-3 btn btn-primary text-white"> Add </a>
                            </div>
                        </div>
                        <!-- end row -->
            
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="card m-b-20">
                                        <div class="card-body"> 
                                                                   
                                            <form method="post" action="employee-action.php">
                                            <div class="table-responsive">
                                                <table class="table table-vertical">                                                   
                                                    <tbody>   
                                                    <tr>
                                                    <td>Employee Email</td> 
                                                    <td><input type="email" class="form-control" name="employeeEmail" id="employeeEmail" required/></td>                                                          
                                                    </tr> 
                                                    <tr>
                                                    <td>Employee Password</td> 
                                                    <td><input type="text" class="form-control" name="employeepasssword" id="employeepasssword" required/></td>                                                          
                                                    </tr>  
                                                    <tr>
                                                    <td>Employee Role</td> 
                                                    <td>
                                                        <select class="form-control" name="role"  id="role" required>
                                                            <option value=""> --  Select Role -- </option>
                                                            <option value="superadmin">Superadmin</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="user">User</option>
                                                        </select>
                                                    </td> 
                                                    </tr>  
                                                   
                                                    <tr>
                                                    <td>Proejct Name</td> 
                                                    <td>
                                                        <select class="form-control" name="projectName" id="projectName">
                                                            <option value=""> --  Select Status -- </option>
                                                            <?php
                                                                global $db;
                                                                $query = "SELECT * FROM project_details Where temp_delete ='n' AND projectStatus = 'open' ";                                            
                                                                $result = mysqli_query($db, $query);
                                                                $count = mysqli_num_rows($result);
                                                                if($count == 0){
                                                            ?>
                                                                <p>No Data Found</p>
                                                            <?php
                                                                } else {  
                                                                    while($user = mysqli_fetch_array($result)){                                                                  
                                                            ?>     
                                                                <option value="<?php echo $user['projectName']; ?>"><?php echo $user['projectName']; ?></option>
                                                                
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
                                                            <option value="telecaller">Telecaller</option>
                                                            <option value="salePerson">Sale Person</option>
                                                        </select>
                                                                                                             
                                                    </tr>
                                                    <tr>
                                                    <td>Employee Status</td> 
                                                    <td>
                                                        <select class="form-control" name="employeeStatus" id="employeeStatus">
                                                            <option value=""> --  Select Status -- </option>
                                                            <option value="Active">Active</option>
                                                            <option value="Deactive">Deactive</option>
                                                        </select>
                                                                                                             
                                                    </tr>
                                                    <tr>
                                                    <td>Employee Name</td> 
                                                    <td><input type="text" class="form-control" name="employeeName" id="employeeName" require/></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Employee Mobile</td> 
                                                    <td><input type="text" class="form-control" name="employeemobile" id="employeemobile" require/></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Employee Address</td> 
                                                    <td><textarea id="empAddress" name="empAddress" class="form-control" maxlength="225" rows="3" placeholder="Enter Address"></textarea></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Employee Joining Date</td> 
                                                    <td>
                                                    <div class="input-group">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="joinDate" id="datepicker-autoclose" autocomplete="off"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                                    </td>                                                          
                                                    </tr>
                                                    
                                                    <tr>                                                    
                                                    <td colspan="2"><input type="submit" name="submit" id="submit" class="btn btn-primary float-right" value="Submit"/></td>                                                          
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