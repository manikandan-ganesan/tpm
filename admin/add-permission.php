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
                                    <h4 class="page-title">Role Management</h4>
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
                                                                   
                                            <form method="post" action="permission-action.php">
                                            <div class="table-responsive">
                                                <table class="table table-vertical">                                                   
                                                    <tbody>                                                    
                                                    <tr>
                                                    <td>Username</td> 
                                                    <td><input type="text" class="form-control" name="username" id="username" required/></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Password</td> 
                                                    <td><input type="text" class="form-control" name="password" id="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/><span class="small">Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</span></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Status</td> 
                                                    <td>
                                                        <select class="form-control" name="Status" id="Status" required>
                                                            <option value=""> --  Select Status -- </option>
                                                            <option value="Confirm">Confirm</option>
                                                            <option value="Waiting">Waiting</option>
                                                            <option value="Deactive">Deactive</option>
                                                        </select>
                                                      </td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Role</td> 
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