<?php
 include('includes/function.php');
    $sql_select = "select * FROM leads JOIN  empdetails ON leads.projectName = empdetails.empProject  AND leads.leadAssignment = 'No' AND empStatus = 'Active' AND empDestination = 'telecaller'";
    $result = mysqli_query($db, $sql_select);
    echo $count = mysqli_num_rows($result);
    if($count > 0){
        while($user = mysqli_fetch_array($result)){             
        $sql_Insert = "insert Into taskdetails Values('','".$user['leadId']."','".$user['empProject']."','".$user['empId']."','".$user['empDestination']."','Active','Assign Task',NOW())" or die(mysqli_error());
        mysqli_query($db, $sql_Insert);
        $SQL_UPDATE = "update leads set leadStatus = 'Active',	leadAssignment ='Yes' WHERE leadId = '".$user['leadId']."'";
        mysqli_query($db, $SQL_UPDATE);
        }
    }
    else {
        exit;
    }

?>