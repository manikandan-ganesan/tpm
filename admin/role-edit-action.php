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
                                    <h4 class="page-title">Role Management Details</h4>
                                </div>
                            </div>                           
                        </div>
                        <!-- end row -->
            
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="card m-b-20">
                                        <div class="card-body"> 
                                                                   
                                            <form method="post" action="permission-action.php">
                                           <?php 
                                              global $db;
                                              $id = $_REQUEST['id'];
                                              $query = "SELECT * FROM login where id= ".$id;                                           
                                              $result = mysqli_query($db, $query);
                                              $user = mysqli_fetch_array($result);
                                           ?>
                                            <div class="table-responsive">
                                                <table class="table table-vertical">                                                   
                                                    <tbody>                                                    
                                                    <tr>
                                                    <td>Username</td> 
                                                    <td><input type="text" class="form-control" name="username" id="username" value="<?php echo $user['username']?>" required/></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Password</td> 
                                                    <td><input type="text" class="form-control" name="password" id="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="<?php echo $user['password']?>" /><span class="small">Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</span></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Status</td> 
                                                    <td>
                                                        <select class="form-control" name="Status" id="Status" required>
                                                            <option value=""> --  Select Status -- </option>
                                                            <option value="Confirm" <?php if($user['Status_update'] == "Confirm") { ?> selected <?php } ?>>Confirm</option>
                                                            <option value="Waiting" <?php if($user['Status_update'] == "Waiting") { ?> selected <?php } ?>>Waiting</option>
                                                            <option value="Deactive" <?php if($user['Status_update'] == "Deactive") { ?> selected <?php } ?>>Deactive</option>
                                                        </select>
                                                      </td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Role</td> 
                                                    <td>
                                                        <select class="form-control" name="role"  id="role" required>
                                                            <option value=""> --  Select Role -- </option>
                                                            <option value="superadmin"  <?php if($user['user_type'] == "superadmin") { ?> selected <?php } ?>>Superadmin</option>
                                                            <option value="admin"  <?php if($user['user_type'] == "admin") { ?> selected <?php } ?>>Admin</option>
                                                            <option value="user"  <?php if($user['user_type'] == "user") { ?> selected <?php } ?>>User</option>
                                                        </select>
                                                    </td>                                                          
                                                    </tr>                                                     
                                                    <tr>                                                    
                                                    <td colspan="2">
                                                    <input type="hidden" class="form-control" name="id" id="id" value=" <?php echo $user['Id']; ?>"/>
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