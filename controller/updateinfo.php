<?php




$projectid=$_POST["projectid"];
$projectinfo=$_POST["projectinfo"];

include '../model/updateinfo.inc.php';

$updateinfoobject= new ProjectInfo();
$updateinfoobject->updateProjectInfo($projectid,$projectinfo);



?>