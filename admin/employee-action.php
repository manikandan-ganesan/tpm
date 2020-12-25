<?php
    include('includes/function.php');  
    if(isset($_POST['submit']) && ($_POST['submit'] == 'Submit')){
       $employeeEmail = $_POST['employeeEmail'];
       $employeepasssword = $_POST['employeepasssword'];
       $role = $_POST['role'];
       $projectName = $_POST['projectName'];
       $designation = $_POST['designation'];
       $employeeStatus = $_POST['employeeStatus'];

        $employeeName = $_POST['employeeName'];
        $employeemobile = $_POST['employeemobile'];
        $empAddress = $_POST['empAddress'];

      
        $joinDate = $_POST['joinDate'];
       $sql_select =  "select * from empDetails where empProject = '$projectName' OR empEmail = '$employeeEmail'";
       $result =  mysqli_query($db, $sql_select);
       $count = mysqli_num_rows($result);
       if($count === 0){
        $query = "INSERT INTO empDetails (empEmail, empPassword, empRole, empProject, empDestination, empStatus, empName,empMobile,empAddress,empJOD,empDate) 
        VALUES('$employeeEmail', '$employeepasssword', '$role', '$projectName', '$designation', '$employeeStatus','$employeeName','$employeemobile','$empAddress','$joinDate',NOW())";
       $query_exe =  mysqli_query($db, $query);
       $logged_in_user_id = mysqli_insert_id($db);
			$prefix = "EMPID00".$logged_in_user_id;
			$sql_update = "UPDATE empDetails SET empId ='$prefix' WHERE Id = '$logged_in_user_id'"; 
			$query_exe1 =  mysqli_query($db, $sql_update);
       if($query_exe1){
            header('location: employee-details.php');
       } else {
            header('location: employee-details.php');
       }
     }else {
          
          header('location: employee-details.php');
     }
    } 
    else if(isset($_REQUEST['delete']) && ($_REQUEST['delete'] == 'delete')){
      
            $id = $_REQUEST['id']; 
            $query = "Delete from empDetails where Id = '$id'";
            $query_exe =  mysqli_query($db, $query);
            if($query_exe){
                 header('location: employee-details.php');
            } else {
                 header('location: employee-details.php');
            }
    }
    else if(isset($_POST['edit']) && ($_POST['edit'] == 'Save')){
      
        $id = $_POST['id']; 
        $employeepasssword = $_POST['employeepasssword'];
        $employeemobile = $_POST['employeemobile'];
        $projectName = $_POST['projectName'];
        $designation = $_POST['designation'];
        $empAddress = $_POST['empAddress'];
        $employeeStatus = $_POST['employeeStatus'];
        $sql_select =  "select * from empDetails where empProject = '$projectName' OR empEmail = '$employeeEmail'";
        $result =  mysqli_query($db, $sql_select);
        $count = mysqli_num_rows($result);
        if($count === 0){
          $query = "update empDetails Set  empPassword = '$employeepasssword',
          empProject = '$projectName',
          empDestination = '$designation',
          empStatus = '$employeeStatus',
          empMobile = '$employeemobile',
          empAddress = '$empAddress',
          empDate = Now()    
          where Id = '$id'";
          $query_exe =  mysqli_query($db, $query);
          if($query_exe){
               header('location: employee-details.php');
          } else {
               header('location: employee-details.php');
          }
     }
     }
?>
