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
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">
                                            Welcome to Property Mechanism
                                        </li>
                                    </ol>                                   
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <form  method="post" action="dashboard-query.php">
                        <div class="row mb-3">
                       
                            <div class="col-6">
                                <div class="dropdown form-group  ">                                   
                                    <select class="form-control" name="projectSelect" id="projectSelect">
                                        <option value="">Select Project</option>
                                        <?php
                                            global $db;
                                            $query = "SELECT * FROM project_details Where temp_delete ='n' AND projectStatus = 'open' ";                                            
                                            $result = mysqli_query($db, $query);
                                            $count = mysqli_num_rows($result);
                                            if($count == 0){
                                        ?>
                                        <option value="">No Project</option>
                                        <?php
                                            } else {  
                                                while($user = mysqli_fetch_array($result)){                                                                  
                                        ?> 
                                                <option value="<?php echo $user['prod_id']; ?>"><?php echo $user['projectName']; ?></option>
                                        <?php 
                                             }
                                         } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                           
                               <div class="form-group">
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control" name="start" placeholder="mm/dd/yyyy" />
                                            <input type="text" class="form-control" name="end" placeholder="mm/dd/yyyy"  />
                                            <input type="submit" class="form-control btn btn-primary" name="submitProjectDate" value="Submit" />
                                        </div>
                                        <div>
                                        
                                        </div>
                                        
                                </div>
                            
                            </div>
                            
                           
                        </div>  
                        </form>  
                        <div class="row">
                                <div class="col-xl-4 col-md-4">
                                    <div class="card mini-stat text-center bg-danger">
                                        <div class="card-body mini-stat-img">                                            
                                            <div class="text-white">
                                               <h5 class="mb-4">Follow Up</h5>
                                            </div>
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-circle">20</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4">
                                    <div class="card mini-stat  text-center bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="text-white">                                              
                                                <h5 class="mb-4">Scheduled</h5>                                                
                                            </div>
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-circle ">20</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4">
                                    <div class="card mini-stat text-center bg-success">
                                        <div class="card-body mini-stat-img">
                                            <div class="text-white">                                              
                                                <h5 class="mb-4">Visited</h5>                                                
                                            </div>
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-circle ">20</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                     
                            </div>
                            <!-- end row -->
            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Leads Details</h4>
                                    </div>
                                </div>
                               
                            </div>
            
                            <div class="row">
                           
                                <div class="col-xl-12">
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
                                                        <td> <a href="leaderDetails.php?id=<?php echo $user['leadId']; ?>" class="mt-3 btn btn-primary text-white">Show Details</a></td>
                                                        

                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-xl-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-30 header-title">Telecaller Task Information</h4>
            
                                            <?php   $query1 = "SELECT * FROM taskdetails Where empDest = 'telecaller'";                                        
                                            $result1 = mysqli_query($db, $query1);
                                            $count1 = mysqli_num_rows($result1);
                                            if($count1 == 0){
                                                ?>
                                                    <p>No Data Found</p>
                                                <?php
                                            } else {
                                         ?>
                                            <div class="table-responsive">
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
                                            </div>
                                                    <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-30 header-title">Sale Person Task  Information</h4>
            
                                            <?php   $query1 = "SELECT * FROM taskdetails Where empDest = 'salePerson'";                                        
                                            $result1 = mysqli_query($db, $query1);
                                            $count1 = mysqli_num_rows($result1);
                                            if($count1 == 0){
                                                ?>
                                                    <p>No Data Found</p>
                                                <?php
                                            } else {
                                         ?>
                                            <div class="table-responsive">
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
         <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/pages/form-advanced.js"></script>
        <script src="assets/pages/datatables.init.js"></script>
        <?php include('includes/script-bottom.php'); ?>

</body>

</html>