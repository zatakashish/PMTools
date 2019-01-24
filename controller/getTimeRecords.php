<?php



$userid=$_POST['userid'];




include '../model/getTimeRecords.inc.php';
$getTimeRecordObject= new TimeRecords();
$getTimeRecordObject->getTimeRecord($userid);
?>