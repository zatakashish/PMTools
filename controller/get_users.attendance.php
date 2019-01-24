<?php

session_start();
$role=$_SESSION['loggedin'];
if($role!=true){
	header('Location:index.php');
}


$id=$_SESSION["id"];




    include '../model/get_users.attendance.inc.php';
    
    $getAttandanceObject=new GetUserAttendance();
    $getAttandanceObject->getAttendance($id);











?>