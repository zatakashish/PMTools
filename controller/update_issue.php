<?php

session_start();

$issueid=$_GET['id'];
//$summary=$_POST['summary'];
$description=$_POST['description'];
$priority=$_POST['priority'];
$status=$_POST['status'];
$module=$_POST['module'];
$assignedto=$_POST['assignedto'];
$sprint=$_POST['sprint'];
$version=$_POST['version'];
$estimate=$_POST['estimate'];
$timespent=$_POST['timespent'];
$comment=$_POST['comment'];


include '../model/update_issue.inc.php';

$updateIssueObject=new IssueUpdate();
$updateIssueObject->updateIssue($issueid, $description, $priority, $status, $module, $assignedto, $sprint, $version, $estimate, $timespent, $comment);



?>

