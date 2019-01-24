<?php

$id = intval($_REQUEST['id']);
$version = htmlspecialchars($_REQUEST['version']);
$startdate = htmlspecialchars($_REQUEST['startdate']);
$enddate = htmlspecialchars($_REQUEST['enddate']);

$startdate=date("Y-m-d",strtotime($startdate));
$enddate=date("Y-m-d",strtotime($enddate));




include '../model/update_version.inc.php';
$updateversionobject= new UpdateVersion();
$updateversionobject->updateProjectVersion($id,$version, $startdate, $enddate);
?>