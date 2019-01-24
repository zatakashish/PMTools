<?php



$name = htmlspecialchars($_REQUEST['name']);
$address = htmlspecialchars($_REQUEST['address']);
$contact = htmlspecialchars($_REQUEST['contact']);
$alt_contact = htmlspecialchars($_REQUEST['alt_contact']);
$type = htmlspecialchars($_REQUEST['type']);
$status = htmlspecialchars($_REQUEST['status']);
$email = htmlspecialchars($_REQUEST['email']);
$password = htmlspecialchars($_REQUEST['password']);
$role = htmlspecialchars($_REQUEST['role']);
//$password=md5($password);
$workhour=htmlspecialchars($_REQUEST['workhour']);
$projectmanager=htmlspecialchars($_REQUEST['projectmanager']);






include '../model/save_user.inc.php';

$saveUserObject=new SaveUser();
$result= $saveUserObject->saveNewUser($name,$address,$contact,$alt_contact,$type,$status,$email,$password,$role,$workhour,$projectmanager);



?>