<?php


$projectid=$_POST['projectid'];

include '../model/getProjectFiles.inc.php';

$getFilesObject=new ProjectFiles();
$getFilesObject->getProjectFiles($projectid);


?>