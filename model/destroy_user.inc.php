<?php

include 'conn.php';

class DestroyUser extends Connection{
    
   public function deleteUser($id){
       $conn=$this->connect();
       $sql = "delete from users where id=$id";
     $result = mysqli_query($conn,$sql);
   if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
       
       
   }
    
    
    
    
}
}

?>

