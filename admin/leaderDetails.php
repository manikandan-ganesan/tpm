<?php
    include('includes/function.php');
    if (!isLoggedIn()) {
        header('location: login.php');
    }
?>
<?php include('includes/head.php'); ?>
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
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Lead Details</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                       
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-30 header-title">Task Details</h4>
                                            <?php
                                            global $db;
                                            $query = "SELECT * FROM leads WHERE leadId = '".$_REQUEST['id']."' ";                                        
                                            $result = mysqli_query($db, $query);
                                            $count = mysqli_num_rows($result);
                                            if($count == 0){
                                                ?>
                                                    <p>No Data Found</p>
                                                <?php
                                            } else {
                                                
                                        ?> 
                                         <?php while($user = mysqli_fetch_array($result)){ ?>
                                           
                                       
                                         <div class="table-responsive">
                                         <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                         <tbody>
                                         <tr>
                                            <td>Customer Name</td>
                                            <td><?php echo $user['customerName']; ?></td>
                                         </tr>
                                         <tr>
                                            <td>Customer Mobile</td>
                                            <td><?php echo $user['mobileNo']; ?></td>
                                         </tr>
                                         <tr>
                                            <td>Customer Alternative Mobile</td>
                                            <td><?php echo $user['alterMobileNo']; ?></td>
                                         </tr>
                                         <tr>
                                            <td>Customer Email</td>
                                            <td><?php echo $user['customerEmail']; ?></td>
                                         </tr>
                                         <tr>
                                            <td>Source </td>
                                            <td><?php echo $user['leadSource']; ?></td>
                                         </tr>
                                         <tr>
                                            <td>Project Name </td>
                                            <td><?php echo $user['projectName']; ?></td>
                                         </tr>
                                         <tr>
                                            <td>Builder Name </td>
                                            <td><?php echo $user['builderName']; ?></td>
                                         </tr>
                                         <tr>
                                            <td>Location </td>
                                            <td><?php echo $user['projectLocation']; ?></td>
                                         </tr>
                                         <tr>
                                            <td>Status </td>
                                            <td><?php echo $user['leadStatus']; ?> </td>
                                         </tr>
                                         
                                         </tbody>
                                         </table>
                                         <?php } } 
                                         
                                         $query1 = "SELECT * FROM taskdetails WHERE leadIds = '".$_REQUEST['id']."' ";                                        
                                            $result1 = mysqli_query($db, $query1);
                                            $count1 = mysqli_num_rows($result1);
                                            if($count1 == 0){
                                                ?>
                                                    <p>No Data Found</p>
                                                <?php
                                            } else {
                                         ?>
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Employee Id </th>
                                                        <th>Status</th>
                                                        <th>Date</th>
                                                        <th>Comments</th>  
                                                    </tr>
                                                </thead>
            
                                                    <tbody>
                                                    <?php while($user1 = mysqli_fetch_array($result1)){ ?>
                                                    <tr>
                                                        <td>                                                            
                                                            <?php echo $user1['employeeIds']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user1['taskStatus']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user1['taskDate']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user1['taskComments']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                           
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                            <!-- end row -->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->



            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
<?php include('includes/footer.php'); ?>
<?php include('includes/script.php'); ?>      

        <!--Morris Chart-->
        <link href="../admin/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"> <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="../admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>        
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="../admin/assets/pages/form-advanced.js"></script>
        <script src="../admin/assets/pages/datatables.init.js"></script>
        <?php include('includes/script-bottom.php'); ?>

</body>

</html>