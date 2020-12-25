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
                                    <h4 class="page-title">Edit Channel Partner</h4>
                                </div>
                            </div>
                           
                        </div>
                        <!-- end row -->
            
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="card m-b-20">
                                        <div class="card-body"> 
                                                                   
                                            <form method="post" action="add-channel.php">
                                            <?php 
                                              global $db;
                                              $id = $_REQUEST['id'];
                                              $query = "SELECT * FROM channel_partners where Id= ".$id;                                           
                                              $result = mysqli_query($db, $query);
                                              $user = mysqli_fetch_array($result);
                                           ?>
                                            <div class="table-responsive">
                                                <table class="table table-vertical">                                                   
                                                    <tbody>                                                    
                                                    <tr>
                                                    <td>Name</td> 
                                                    <td><input type="text" disabled class="form-control" name="name" id="name" value=" <?php echo $user['partnerName']; ?>"/></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Mobile</td> 
                                                    <td><input type="text"  class="form-control" name="mobile" id="mobile" value=" <?php echo $user['Mobile']; ?>"/></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Email</td> 
                                                    <td><input type="email" class="form-control" name="email" id="email" value=" <?php echo $user['Email']; ?>"/></td>                                                          
                                                    </tr>
                                                    <tr>
                                                    <td>Address</td> 
                                                    <td><input type="text" class="form-control" name="address" id="address" value=" <?php echo $user['Address']; ?>"/></td>                                                          
                                                    </tr>                                                 
                                                    <tr>
                                                    <tr>
                                                    <td>Joining Date</td> 
                                                    <td>
                                                    <div class="input-group">
                                                <input type="text" disabled class="form-control" placeholder="mm/dd/yyyy" name="joiningDate" id="datepicker-autoclose" value=" <?php echo $user['JoiningDate']; ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                                    </td>                                                          
                                                    </tr>
                                                    <td>Status</td> 
                                                    <td>
                                                        <select class="form-control" name="Status" id="Status" required>
                                                          
                                                            <option value=""> --  Select Status -- </option>
                                                            <option value="open" <?php if($user['Status'] == "open") { ?> selected <?php } ?>>open</option>
                                                            <option value="Waiting" <?php if($user['Status'] == "Waiting") { ?> selected <?php } ?>>Waiting</option>
                                                            <option value="closed" <?php if($user['Status'] == "closed") { ?> selected <?php } ?>>closed</option>
                                                        </select>
                                                      </td>                                                          
                                                    </tr>
                                                    <tr>                                                    
                                                    <td colspan="2">
                                                    <input type="hidden" class="form-control" name="id" id="id" value=" <?php echo $user['Id']; ?>"/>
                                                    <input type="submit" name="edit" id="submit" class="btn btn-primary float-right" value="Save"/></td>                                                          
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