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
                                <a href="add-permission.php" class="mt-3 btn btn-primary text-white"> Add </a>
                            </div>
                        </div>
                        <!-- end row -->
            
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">  
                                        <?php
                                            global $db;
                                            $query = "SELECT * FROM login";                                            
                                            $result = mysqli_query($db, $query);
                                            $count = mysqli_num_rows($result);
                                            if($count == 0){
                                                ?>
                                                    <p>No Data Found</p>
                                                <?php
                                            } else {
                                                
                                        ?>                                      
            
                                            <div class="table-responsive">
                                                <table class="table table-vertical">
                                                    <thead>
                                                        <tr>
                                                            <th>Username</th>
                                                            <th>Password</th>
                                                            <th>Role</th>                                                           
                                                            <th>Status</th>                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    <thead>
                                                    <tbody>
                                                    <?php while($user = mysqli_fetch_array($result)){ ?>
                                                    <tr>
                                                        <td>                                                            
                                                            <?php echo $user['username']; ?>
                                                        </td>
                                                        <td>                                                            
                                                            <?php echo $user['password']; ?>
                                                        </td>  
                                                        <td>
                                                             <?php echo $user['user_type']; ?>
                                                        </td>                                                      
                                                        <td>
                                                             <?php echo $user['Status_update']; ?>
                                                        </td>                                                                                                               
                                                        <td>
                                                        <a href="role-edit-action.php?id=<?php echo $user['Id']; ?>" class="btn btn-success btn-sm waves-effect waves-light">Edit</a>
                                                        <a href="role-action.php?delete=delete&id=<?php echo $user['Id']; ?>" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>       
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } ?>
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