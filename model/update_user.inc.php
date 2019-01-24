<?php
include 'conn.php';

class UserUpdate extends Connection{

         
         
    
      public function updateUser ($id,$name,$address,$contact,$alt_contact,$type,$status,$workhour,$role,$email,$password,$projectmanager){ 
          $conn=$this->connect();

  $sql = "update users set name='$name',address='$address',contact='$contact',alt_contact='$alt_contact', ";
  $sql.= " type='$type', status='$status' , workhour='$workhour',role='$role',email='$email',password='$password',projectmanager='$projectmanager' where id=$id ";
  $result = mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array(
		'id' => $id,		               
                'name' => $name,
		'address' => $address,
		'contact' => $contact,
		'alt_contact' => $alt_contact,
		'type' => $type,
                'status' => $status,
                'workhour'=>$workhour,
                'role'=>$role,
                'email'=>$email,
                'password'=>$password
                
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}


}
}
?>