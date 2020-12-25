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
                            <div class="col-sm-8">
                                <div class="page-title-box">
                                    <h4 class="page-title">Task Management</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">
                                            Pending Task Details
                                        </li>
                                    </ol> 
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
                                            $query = "select * FROM taskdetails WHERE Id = '".$_REQUEST['id']."'";                                            
                                            $result = mysqli_query($db, $query);
                                            $count = mysqli_num_rows($result);
                                            if($count == 0){
                                                ?>
                                                    <p>No Data Found</p>
                                                <?php
                                            } else {
                                                
                                        ?> <form method="post" action="taskaction.php">
                                            <div class="table-responsive">
                     
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                               
            
                                                    <tbody>
                                                    <?php while($user1 = mysqli_fetch_array($result)){ ?>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>                                                        
                                                        <select name="taskStatus" class="form-control">
                                                        <option value="Active"  <?php if($user1['taskStatus'] == "Active") { ?> selected <?php } ?>> Active </option>
                                                        <option value="Approved"  <?php if($user1['taskStatus'] == "Approved") { ?> selected <?php } ?>> Approved </option>
                                                        <option value="Warn"  <?php if($user1['taskStatus'] == "Warn") { ?> selected <?php } ?>> Warn </option>
                                                        <option value="Hold"  <?php if($user1['taskStatus'] == "Hold") { ?> selected <?php } ?>> Hold </option>
                                                        <option value="Scheduled"  <?php if($user1['taskStatus'] == "Scheduled") { ?> selected <?php } ?>> Scheduled </option>
                                                        <option value="Toched"  <?php if($user1['taskStatus'] == "Toched") { ?> selected <?php } ?>> Toched </option>
                                                        <option value="Visited"  <?php if($user1['taskStatus'] == "Visited") { ?> selected <?php } ?>> Visited </option>
                                                        <option value="Sale"  <?php if($user1['taskStatus'] == "Sale") { ?> selected <?php } ?>> Sale </option>
                                                        </select></td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <td>Task Comments</td>
                                                        <td>                                                            
                                                           <textarea name="taskComment" class="form-control"> <?php echo $user1['taskComments']; ?></textarea>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" class="form-control" name="leadIds" id="leadIds" value=" <?php echo $user1['leadIds']; ?>"/>
                                                        <input type="hidden" class="form-control" name="projectIds" id="projectIds" value=" <?php echo $user1['projectIds']; ?>"/>
                                                        <input type="hidden" class="form-control" name="employeeIds" id="employeeIds" value=" <?php echo $user1['employeeIds']; ?>"/>
                                                        <input type="hidden" class="form-control" name="empDest" id="empDest" value=" <?php echo $user1['empDest']; ?>"/>
                                                        <input type="submit" name="edit" id="edit" class="btn btn-primary float-right" value="Save"/>                                                        
                                                    </td>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            </form>
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
        <link href="../admin/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"> <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="../admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../admin/assets/pages/form-advanced.js"></script>
        <?php include('includes/script-bottom.php'); ?>

</body>

</html>