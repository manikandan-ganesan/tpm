<?php
    include('includes/function.php');  
 
    if(isset($_POST['submit']) && ($_POST['submit'] == 'Submit')){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $Status = $_POST['Status'];
        $role = $_POST['role'];
        $query = "INSERT INTO login (username, password, Status_update, user_type) 
        VALUES('$username', '$password', '$Status', '$role')";
       $query_exe =  mysqli_query($db, $query);
       exit;
       if($query_exe){
            header('location: permission.php');
       } else {
            header('location: permission.php');
       }
    } 
    else if(isset($_REQUEST['delete']) && ($_REQUEST['delete'] == 'delete')){
      
            $id = $_REQUEST['id']; 
            $query = "Delete from login where Id = '$id'";
            $query_exe =  mysqli_query($db, $query);
            if($query_exe){
                 header('location: permission.php');
            } else {
                 header('location: permission.php');
            }
    }
    else if(isset($_POST['edit']) && ($_POST['edit'] == 'Save')){
      
        $id = $_POST['id']; 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $Status = $_POST['Status'];
        $role = $_POST['role'];
        $query = "update login Set  username = '$username',
        password = '$password',
        Status_update = '$Status',
        user_type = '$role'  
        where Id = '$id'";
       $query_exe =  mysqli_query($db, $query);
    
        if($query_exe){
             header('location: permission.php');
        } else {
             header('location: permission.php');
        }
}
?>
