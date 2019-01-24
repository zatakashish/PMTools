<?php


session_start();
$userid=$_SESSION['id'];
$role=$_SESSION['role'];

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
$offset = ($page-1)*$rows;




include '../model/get_issue.inc.php';

$getIssueObject=new Issues();
$getIssueObject->getIssues($userid,$role,$rows,$sort,$order,$offset);
?>