<?php include('includes/function.php');
        include('includes/head.php'); ?>

<?php include('includes/css.php'); ?>

    <body>

        <!-- Begin page -->
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.php" class="logo logo-admin"><img src="assets/images/logo.png" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Free Register</h4>
                        <p class="text-muted text-center">Get your free fonik account now.</p>

                        <form class="form-horizontal m-t-30" method="post" action="pages-register.php">

                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input type="email" class="form-control" name="email"   id="useremail" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"   placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" name="password_1" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="userconfirmpassword">Password</label>
                                <input type="password" class="form-control" id="userconfirmpassword" name="password_2" placeholder="Enter Comfirm password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="register_btn">Register</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <p class="font-14 text-muted mb-0">By registering you agree to the Lexa <a href="#" class="text-primary">Terms of Use</a></p>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>Already have an account ? <a href="pages-login.html" class="text-primary"> Login </a> </p>
                <p>© <?php echo date('Y');?> Lexa. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
            </div>           

        </div>
            

<?php include('includes/script.php'); ?>

        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<?php include('includes/script-bottom.php'); ?>

    </body>

</html>