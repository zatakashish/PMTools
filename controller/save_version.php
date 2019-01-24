<?php

$version = htmlspecialchars($_REQUEST['version']);
$startdate = htmlspecialchars($_REQUEST['startdate']);
$enddate = htmlspecialchars($_REQUEST['enddate']);
$startdate=date("Y-m-d",strtotime($startdate));
$enddate=date("Y-m-d",strtotime($enddate));
$projectid=$_GET["projectid"];

include '../model/save_version.inc.php';

$saveuserobject=new SaveNewVersion();
$saveuserobject->saveVersion($version, $startdate, $enddate,$projectid);


?>