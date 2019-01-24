<?php

$name = htmlspecialchars($_REQUEST['name']);
$project_managerid = htmlspecialchars($_REQUEST['project_managerid']);
$start_date = htmlspecialchars($_REQUEST['start_date']);
$release_date = htmlspecialchars($_REQUEST['release_date']);
$status = htmlspecialchars($_REQUEST['status']);
$start_date=date("Y-m-d", strtotime($start_date) );
$release_date=date("Y-m-d", strtotime($release_date));









include '../model/save_project.inc.php';
$saveProjectObject=new SaveProject();
$project_manager=$saveProjectObject->getName($project_managerid);
$result= $saveProjectObject->saveNewProject($name,$project_manager,$project_managerid,$start_date,$release_date,$status);



?>