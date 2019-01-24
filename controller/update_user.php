<?php

$id = intval($_REQUEST['id']);
$name = htmlspecialchars($_REQUEST['name']);
$address = htmlspecialchars($_REQUEST['address']);
$contact = htmlspecialchars($_REQUEST['contact']);
$alt_contact = htmlspecialchars($_REQUEST['alt_contact']);
$type = htmlspecialchars($_REQUEST['type']);
$status = htmlspecialchars($_REQUEST['status']);
$workhour=htmlspecialchars($_REQUEST['workhour']);
$role=htmlspecialchars($_REQUEST['role']);
$email=htmlspecialchars($_REQUEST['email']);
$password=htmlspecialchars($_REQUEST['password']);
//$password= md5($password);
$projectmanager=htmlspecialchars($_REQUEST['projectmanager']);

include '../model/update_user.inc.php';
$updateUserObject=new UserUpdate();
$updateUserObject->updateUser($id,$name,$address,$contact,$alt_contact,$type,$status,$workhour,$role,$email,$password,$projectmanager);


?>