<?php
$projectid=$_POST['projectid'];
  
   include '../model/getprojectdetails.inc.php';
  $getprojectdetailsobject=new ProjectDetails();
  $getprojectdetailsobject->getProjectDetails($projectid);
  


?>