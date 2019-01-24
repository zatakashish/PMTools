<?php

$id = intval($_REQUEST['id']);
$name = htmlspecialchars($_REQUEST['name']);
$project_managerid= htmlspecialchars($_REQUEST['project_managerid']);
$start_date = htmlspecialchars($_REQUEST['start_date']);
$release_date = htmlspecialchars($_REQUEST['release_date']);
$status = htmlspecialchars($_REQUEST['status']);

$start_date=date("Y-m-d",strtotime($start_date));
$release_date=date("Y-m-d",strtotime($release_date));


include '../model/update_project.inc.php';
$updateUserObject=new UserUpdate();
$project_manager=$updateUserObject->getName($project_managerid);
$updateUserObject->updateUser($id,$name,$project_manager,$project_managerid,$start_date,$release_date,$status);


?>