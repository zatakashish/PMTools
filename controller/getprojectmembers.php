<?php


$projectid=$_POST['projectid'];


        

include '../model/projectmembers.inc.php';

$projectmembersobject=new ProjectMembers();
$projectmembersobject->getProjectMembers($projectid);






?>