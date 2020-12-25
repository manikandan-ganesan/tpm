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
                                <a href="employee-export.php" class="mt-3 btn btn-primary text-white"> Export To Excel </a>
                            </div>
                        </div>
                        <!-- end row -->
            
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">  
                                        <?php
                                            global $db;
                                            $query = "SELECT * FROM empDetails";                                            
                                            $result = mysqli_query($db, $query);
                                            $count = mysqli_num_rows($result);
                                            if($count == 0){
                                                ?>
                                                    <p>No Data Found</p>
                                                <?php
                                            } else {
                                                
                                        ?>                                   
            
                                            <div class="table-responsive">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Employee Id</th>
                                                            <th>Email</th> 
                                                            <th>Password</th> 
                                                            <th>Role</th> 
                                                            <th>Working Project</th>
                                                            <th>Status</th>
                                                            <th>Designation</th>
                                                            <th>Name</th>
                                                            <th>Mobile</th>
                                                            <th>Address</th>                                                             
                                                            <th>Join Date</th>
                                                            <th>Recent Updated Date</th>
                                                           
                                                            <th>Action</th>
                                                        </tr>
                                                    <thead>
                                                    <tbody>
                                                    <?php while($user = mysqli_fetch_array($result)){ ?>
                                                    <tr> 
                                                         <td>
                                                            <?php echo $user['empId']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['empEmail']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['empPassword']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['empRole']; ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            $query1 = "SELECT * FROM  project_details where projectName = '".$user['empProject']."'";                                           
                                                            $result1 = mysqli_query($db, $query1);
                                                             $usercheck = mysqli_fetch_array($result1);
                                                            
                                                            echo $usercheck['projectName'];
                                                            
                                                            ?>
                                                        </td>
                                                        <td><?php echo $user['empDestination']; ?></td> 
                                                        <td>
                                                            <?php echo $user['empStatus']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['empName']; ?>
                                                        </td>
                                                        <td><?php echo $user['empMobile']; ?></td>                                                      
                                                       
                                                        <td><?php echo $user['empAddress']; ?></td>                                                      
                                                        <td>
                                                            <?php echo $user['empJOD']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['empDate']; ?>
                                                        </td>
                                                      
                                                        <td>
                                                            <a href="edit-action.php?id=<?php echo $user['Id']; ?>" class="btn btn-success btn-sm waves-effect waves-light">Edit</a>
                                                            <a href="employee-action.php?delete=delete&id=<?php echo $user['Id']; ?>" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                                        </td>
                                                    </tr> 
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php 
                                        } 
                                        ?>
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
<!-- Datatable init js -->                
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<script src="assets/pages/datatables.init.js"></script>
<?php include('includes/script-bottom.php'); ?>

</body>

</html>