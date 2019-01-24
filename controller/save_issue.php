<?php
//summary description priority status module createdby assignedto sprint version estimate timespent comment

//$summary=$_POST['summary'];
$summary=date("Y-m-d");
$projectnameandid=$_POST['project_name'];
$projectnameandid = explode(",", $projectnameandid); 
$project_name= $projectnameandid[0];
$projectid = $projectnameandid[1];
$description=$_POST['description'];
$priority=$_POST['priority'];
$status=$_POST['status'];
$module=$_POST['module'];
$createdby=$_GET['userid'];
$assignedto=$_POST['assignedto'];
$sprint=$_POST['sprint'];
$version=$_POST['version'];
$estimate=$_POST['estimate'];
$timespent=$_POST['timespent'];
$comment=$_POST['comment'];


include '../model/save_issue.inc.php';

$saveIssueObject=new NewIssue();
$saveIssueObject->createIssue($summary, $description, $priority, $status, $module, $createdby, $assignedto, $sprint, $version, $estimate, $timespent, $comment,$project_name,$projectid);
?>