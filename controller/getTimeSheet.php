<?php

if(isset($_POST['date'])){
$date=$_POST['date'];
    
}

else{
    $date=date("Y-m-d");
    
}

include '../model/getTimeSheet.inc.php';

$getTimeSheetObject=new TimeSheet();
$getTimeSheetObject->getTimeSheet($date);


?>