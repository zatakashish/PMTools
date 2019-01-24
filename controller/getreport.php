<?php 



$empid=$_POST["empid"];
$startdate=$_POST["startdate"];
$enddate=$_POST["enddate"];




include '../model/getreport.inc.php';


$getReportObject=new UserReport();
$getReportObject->getUserReport($empid,$startdate,$enddate);






?>