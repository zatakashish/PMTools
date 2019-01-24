<?php
include '../model/punchout.inc.php';
session_start();
$id=$_SESSION['id'];
$remarks2=$_POST['remarks2'];


$punchOutObject=new PunchUserOut();
$punchOutObject->punchOut($id, $remarks2);













?>