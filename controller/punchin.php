<?php

include '../conn.php';
session_start();
if($_SESSION['loggedin']!=TRUE){
    header('Location:index.php');
}
$remarks1=$_POST['remarks1'];
$id=$_SESSION['id'];
$type=$_SESSION["type"];


 include '../model/punchin.inc.php';
 $punchInObject=new PunchIn();
 $punchInObject->punchInUser($id,$remarks1,$type);













?>