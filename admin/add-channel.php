<?php
    include('includes/function.php');  

    if(isset($_POST['submit']) && ($_POST['submit'] == 'Submit')){
        
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $joiningDate = $_POST['joiningDate'];
        $Status = $_POST['Status'];
        echo $query = "INSERT INTO channel_partners (partnerName, Mobile, Email, Address, JoiningDate, Status) 
        VALUES('$name', '$mobile', '$email', '$address', '$joiningDate', '$Status')";
       $query_exe =  mysqli_query($db, $query);
      
       if($query_exe){
            header('location: channel-partner.php');
       } else {
            header('location: channel-partner.php');
       }
    } 
    else if(isset($_REQUEST['delete']) && ($_REQUEST['delete'] == 'delete')){
      
            $id = $_REQUEST['id']; 
            $query = "Delete from channel_partners where Id = '$id'";
            $query_exe =  mysqli_query($db, $query);
            if($query_exe){
                 header('location: channel-partner.php');
            } else {
                 header('location: channel-partner.php');
            }
    }
    else if(isset($_POST['edit']) && ($_POST['edit'] == 'Save')){
      
          $id = $_POST['id'];     
          $Status = $_POST['Status'];
          $mobile = $_POST['mobile'];
          $email = $_POST['email'];
          $address = $_POST['address'];
     $query = "update channel_partners Set Mobile ='$mobile',
     Email = '$email',
     Address = '$address',
     Status = '$Status'
        where Id = '$id'";
    
       $query_exe =  mysqli_query($db, $query);
    
        if($query_exe){
             header('location: channel-partner.php');
        } else {
             header('location: channel-partner.php');
        }
}
?>
