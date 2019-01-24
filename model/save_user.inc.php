<?php

include 'conn.php';

class SaveUser extends Connection{


 function saveNewUser($name,$address,$contact,$alt_contact,$type,$status,$email,$password,$role,$workhour,$projectmanager){
     $conn=$this->connect();
     
   if(strlen($role)==0){
       $role="user";
   }

$sql = "INSERT INTO USERS(name,address,contact,alt_contact,type,status,email,password,role,workhour,projectmanager)";
$sql.= "  VALUES('$name','$address','$contact','$alt_contact','$type','$status','$email','$password','$role','$workhour','$projectmanager')";
$result = mysqli_query($conn,$sql);


if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'name' => $name,
		'address' => $address,
		'contact' => $contact,
		'alt_contact' => $alt_contact,
		'type' => $type,
                'status' => $status,
                'email' => $email,
                'password' => $password,
                'role' => $role
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

}
}
?>