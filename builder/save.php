<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'pm-projects');  
    if(isset($_POST['submit']) && ($_POST['submit'] == "Submit")){
      
       $builderName =  $_POST['builderName'];
       $projectName =  $_POST['projectName'];
       $projectLocation =  $_POST['projectLocation'];
       $customerName =  $_POST['customerName'];
       $customerMobile =  $_POST['customerMobile'];
       $customeraltMobile =  $_POST['customeraltMobile'];
       $customerEmail =  $_POST['customerEmail'];
       $ChannleId =  $_POST['ChannleId'];
       
       $partnerCheck = mysqli_query($db,"SELECT * FROM channel_partners where `Id` = $ChannleId AND `Status` = 'open'") or die($db -> error);
       $count = mysqli_num_rows($partnerCheck);     
        if($count > 0){
         $sql = mysqli_query($db,"SELECT * FROM leads where `projectName` = '".$projectName."' AND  `mobileNo` = '".$customerMobile."' AND `alterMobileNo` = '".$customeraltMobile."'")  or die($db -> error);    
           
          $Leadcount = mysqli_num_rows($sql); 
            if($Leadcount > 0){
               
            $queryIns = "INSERT INTO dupleads (builderName, projectName, projectLocation, 
                customerName, mobileNo, alterMobileNo, customerEmail, leadSource, cusDate,	leadStatus,leadAssignment, tempDelete ) 
                VALUES('$builderName', '$projectName', '$projectLocation', '$customerName',
                '$customerMobile', '$customeraltMobile', '$customerEmail', '$ChannleId', NOW(),'inactive','No', 'n')";
                $query_exe =  mysqli_query($db, $queryIns);      
                    if($query_exe){
                        $_SESSION['dupLeadRegistered'] = "dupRegistered"; 
                        header('location: index.php');      
                    }
            }
            else{
              
            $queryIns = "INSERT INTO leads (builderName, projectName, projectLocation, 
                customerName, mobileNo, alterMobileNo, customerEmail, leadSource,cusDate,	leadStatus,leadAssignment,tempDelete ) 
                VALUES('$builderName', '$projectName', '$projectLocation', '$customerName',
                '$customerMobile', '$customeraltMobile', '$customerEmail', '$ChannleId', NOW(),'inactive','No', 'n')";
           $query_exe =  mysqli_query($db, $queryIns) or mysqli_error();      
                    if($query_exe){
                        $_SESSION['LeadRegistered'] = "Registered"; 
                        header('location: index.php');        
                    }
            
                }
        }
        else {
            $_SESSION['NotActive'] = "notActive"; 
            header('location: index.php'); 
        }
    }
   
?>