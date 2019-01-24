<?php 


$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$searchtype=$_POST['searchtype'];

$startdate=date("Y-m-d", strtotime($startdate));
$enddate=date("Y-m-d",strtotime($enddate));



include '../model/bugreport.inc.php';

$bugreportobject=new BugReportClass();
$bugreportobject->getBugReport($startdate,$enddate,$searchtype);








?>