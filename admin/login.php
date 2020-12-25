<?php 
 include('includes/function.php'); 
include('includes/head.php'); ?>

<?php include('includes/css.php'); ?>

    <body>

        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.php" class="logo logo-admin"><img src="assets/images/pm-logo.jpg" height="50" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                    
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome Property Machanism  !</h4>
                        <p class="text-muted text-center">Super - Admin.</p>

                        <form class="form-horizontal m-t-30" method="post" action="login.php"">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-6">
                                    <a href="pages-recoverpw.php" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" name="login_btn" type="submit">Log In</button>
                                </div>                             
                            </div>  
                        </form>
                    </div>

                </div>
            </div>

         

        </div>
        

<?php include('includes/script.php'); ?>

<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<?php include('includes/script-bottom.php'); ?>

    </body>
</html>