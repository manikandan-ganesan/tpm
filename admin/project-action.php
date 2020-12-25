<?php
    include('includes/function.php');  

    if(isset($_POST['submit']) && ($_POST['submit'] == 'Submit')){
        
        $projectName = $_POST['projectName'];
        $builderName = $_POST['builderName'];
        $location = $_POST['location'];
        $Status = $_POST['Status'];
        echo $query = "INSERT INTO project_details (projectName, projectLocation, projectStatus, builderName, projectDate, temp_delete) 
        VALUES('$projectName', '$location', '$Status', '$builderName', NOW(), 'n')";
       $query_exe =  mysqli_query($db, $query);
      
       if($query_exe){
            header('location: project.php');
       } else {
            header('location: project.php');
       }
    } 
    else if(isset($_REQUEST['delete']) && ($_REQUEST['delete'] == 'delete')){
      
            $id = $_REQUEST['id']; 
            $query = "Delete from project_details where prod_id = '$id'";
            $query_exe =  mysqli_query($db, $query);
            if($query_exe){
                 header('location: project.php');
            } else {
                 header('location: project.php');
            }
    }
    else if(isset($_POST['edit']) && ($_POST['edit'] == 'Save')){
      
       $id = $_POST['id'];     
     $Status = $_POST['Status'];
     $query = "update project_details Set  projectStatus = '$Status'
        where prod_id = '$id'";
    
       $query_exe =  mysqli_query($db, $query);
    
        if($query_exe){
             header('location: project.php');
        } else {
             header('location: project.php');
        }
}
?>
