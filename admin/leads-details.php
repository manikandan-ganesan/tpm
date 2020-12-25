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
                                    <h4 class="page-title">Leads Details</h4>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <a href="duplicateleads.php" class="mt-3 btn btn-primary text-white"> Duplicate Leads  </a>
                                <a href="duplicateleadsexport.php" class="mt-3 btn btn-primary text-white"> Export To Excel </a>
                            </div>
                        </div>
                            <div class="row mb-3">
                                <div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                           
                                             <?php
                                            global $db;
                                            $query = "SELECT * FROM leads Where tempDelete ='n'";                                            
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
                                                        <th>Builder Name</th>
                                                        <th>Project Name</th>
                                                        <th>Project Location</th>
                                                        <th>Customer Name</th>
                                                        <th>Mobile No</th>
                                                        <th>Alternative Mobile No</th> 
                                                        <th>Email</th> 
                                                        <th>Source</th>                                                       
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                     
                                                    </tr>
                                                </thead>
            
                                                    <tbody>
                                                    <?php while($user = mysqli_fetch_array($result)){ ?>
                                                    <tr>
                                                        <td>                                                            
                                                            <?php echo $user['builderName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['projectName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['projectLocation']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['customerName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['mobileNo']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user['alterMobileNo']; ?>                                                           
                                                        </td>
                                                        <td>
                                                            <?php echo $user['customerEmail']; ?>                                                           
                                                        </td>
                                                        <td>
                                                            <?php echo $user['leadSource']; ?>                                                           
                                                        </td>
                                                        <td>
                                                            <?php echo $user['cusDate']; ?>                                                           
                                                        </td>
                                                        <td> <a href="leaderDetails.php" class="mt-3 btn btn-primary text-white">Show Details</a></td>
                                                        

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
        <!-- Datatable init js -->                
         <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/pages/form-advanced.js"></script>
        <script src="assets/pages/datatables.init.js"></script>
        <?php include('includes/script-bottom.php'); ?>

</body>

</html>