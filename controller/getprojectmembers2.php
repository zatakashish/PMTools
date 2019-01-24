<?php


$projectidplusname=$_POST['projectid'];
$projectidd=explode(",",$projectidplusname);
$projectid=$projectidd[1];


        

include '../model/projectmembers.inc2.php';

$projectmembersobject=new ProjectMembers();
$projectmembersobject->getProjectMembers($projectid);






?>