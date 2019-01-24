<?php


$id=$_POST['id'];

include '../model/destroy_issue.inc.php';
$destroyIssueObject=new IssueDestroyer();
$destroyIssueObject->destroyIssue($id);

?>