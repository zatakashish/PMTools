<?php

include '../model/loginauth.php';//CLASS FOR LOGIN AUTHENTICATION PROCESS
$checkuser=new LoginAuthentication();//LOGIN AUTHENTICATION OBJECT
$conn=$checkuser->connect();//COINNECTING TO DATABASE

$email=mysqli_real_escape_string($conn,$_POST['email']);//GETTING THE VALUE FROM AJAX REQUEST
$password=mysqli_real_escape_string($conn,$_POST['password']);//GETTING THE VALUE FROM AJAX REQUEST
//$password=md5($password);


$result=$checkuser->loginCheck($email,$password);//SQL SELECT QUERY
$row_count=$checkuser->loginValidation($result);//Number of user with the right Username/Password
$data=$checkuser->fetchUserData($result);//Obtain an assosciative array
$fetchrole=$checkuser->fetchRole($data);//Obtain user role if Admin/User
$fetchtype=$checkuser->fetchType($data);//Obtain employee type if intern, fulltimer or parttimer




//ENGINE TAKES THE FINAL DECISION IF WHAT IS TO BE DONE AFTER ALL THE DETAILS ARE GOTTEN
include '../engine/loginauthentication.php';
$finaldecision=new FinalLoginAuthentication();
$finaldecision->finalloginvalidation($row_count,$data,$fetchrole,$fetchtype);




?>