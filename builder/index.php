
<?php 
      include('save.php');      
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>:: Property Mechanisam Project Lead Entry ::</title>
  </head>
  <body>
  <?php
  if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
    $id = base64_decode($_REQUEST['id']);     
   
  ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 my-5 mx-auto text-center">
                <img src="assets/pm-logo.png" class="img-fluid" />
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-8 my-5 mx-auto text-left">
            <?php
                 global $db;
                 $query = "SELECT * FROM project_details where projectStatus = 'open' AND prod_id= ".$id;                                           
                 $result = mysqli_query($db, $query);
                 $user = mysqli_fetch_array($result); 
                 if($user){              
            ?>
            <form method="post" action="save.php">
            
                <div class="form-group">
                    <label for="builderName">Builder Name</label>
                    <input type="text" disable class="form-control" id="builderName" name="builderName" value="<?php echo $user['builderName']; ?>" aria-describedby="builderName" required>                    
                </div>
                <div class="form-group">
                    <label for="projectName">Project Name</label>
                    <input type="text" disable class="form-control" id="projectName" name="projectName" value="<?php echo $user['projectName']; ?>" aria-describedby="projectName" required>                    
                </div>               
                <div class="form-group">
                    <label for="projectLocation">Project Location</label>
                    <input type="text" disable class="form-control" id="projectLocation" name="projectLocation" value="<?php echo $user['projectLocation']; ?>" aria-describedby="projectLocation" required>                    
                </div>
                <div class="form-group">
                    <label for="customerName">Customer Name</label>
                    <input type="text"  class="form-control" id="customerName" name="customerName" aria-describedby="customerName" required>                    
                </div>
                <div class="form-group">
                    <label for="customerMobile">Customer Mobile No</label>
                    <input type="tel"  class="form-control" id="customerMobile" pattern="[0-9]{10}" name="customerMobile" aria-describedby="customerMobile" required >
                    <small>Ex. 9000090000</small>
                </div>
                <div class="form-group">
                    <label for="customeraltMobile">Customer Alternative Mobile No</label>
                    <input type="tel"  class="form-control" id="customeraltMobile" pattern="[0-9]{10}" name="customeraltMobile" aria-describedby="customeraltMobile">                    
                    <small>Ex. 9000090000</small>
                </div>
                <div class="form-group">
                    <label for="customerEmail">Customer Email</label>
                    <input type="email"  class="form-control" id="customerEmail"  name="customerEmail" aria-describedby="customerEmail" required >
                    <small>Ex. mail@mail.com</small>
                </div>
                <div class="form-group">
                    <label for="ChannleId">Channel Partners Id</label>
                    <input type="text"  class="form-control" id="ChannleId" name="ChannleId" aria-describedby="ChannleId" required>                    
                </div>               
                <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
            </form>
            <?php
                } 
                else { 
                  echo '<div class="container">
                        <div class="row">
                            <div class="col-12 mt-5">
                                <div class="alert alert-danger">
                                    The Lead Registeration Process not availabile. Please Contact Your admin
                                </div>
                            </div>
                        </div>
                    </div>';

                }
            ?>
           
            </div>
        </div>
    </div>
      <?php  }  
      ?>
  
      <?php 
        if(isset($_SESSION['dupLeadRegistered'])){
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="alert alert-danger">
                           The Lead are Already Register. Please Contact Admin

                        </div>
                    </div>
                </div>
            </div>

       <?php 
       unset($_SESSION['dupLeadRegistered']);
     }
        if(isset($_SESSION['LeadRegistered'])){
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="alert alert-success">
                            The Lead are Register Sucessfully.
                        </div>
                    </div>
                </div>
            </div>
       <?php 
         unset($_SESSION['LeadRegistered']);   
    }
    if(isset($_SESSION['NotActive'])){
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                       The Channel Partner Id is not Activate. Please Contact your Admin
                    </div>
                </div>
            </div>
        </div>
   <?php 
     unset($_SESSION['NotActive']);   
}
      
      ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>