<?php



$projectname=$_POST['projectname'];
$projectarea=$_POST['projectarea'];
$time=$_POST['time'];
$userid=$_POST['userid'];
$date=$_POST['date'];
$date=date("Y-m-d",strtotime($date));
$row=$_POST["row"];


if(strlen($_POST['projectname']) && strlen($_POST['projectarea']) && strlen($_POST['time'])){
    include '../model/updateTimeSheet.inc.php';
    $updateTimeSheetObj= new TimeSheetUpdate();
    $updateTimeSheetObj->updateTimeSheet($projectname,$projectarea,$time,$userid,$date,$row);
   
    
    
    
    
}







?>