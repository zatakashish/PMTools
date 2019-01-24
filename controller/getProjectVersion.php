<?php


$projectidplusname=$_POST['projectid'];
$projectidd=explode(",",$projectidplusname);
$projectid=$projectidd[1];


        

include '../model/projectVersion.inc.php';

$projectmembersobject=new ProjectMembers();
$projectmembersobject->getProjectMembers($projectid);






?>