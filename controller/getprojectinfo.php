<?php


$projectid=$_POST['projectid'];


include "../model/getprojectinfo.inc.php";

$getinfoobject=new ProjectInfo();
$getinfoobject->getProjectInfo($projectid);




?>