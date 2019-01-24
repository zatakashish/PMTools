<?php
include 'conn.php';

class UserUpdate extends Connection{

         
         
    
      public function updateUser ($id,$name,$project_manager,$project_managerid,$start_date,$release_date,$status){ 
          $conn=$this->connect();

  $sql = "update project_details set name='$name',project_manager='$project_manager',project_managerid='$project_managerid',start_date='$start_date', ";
  $sql.= " release_date='$release_date', status='$status'  where id=$id ";
  
 
  $result = mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'name' => $name,
		'project_manager' => $project_manager,
                'project_managerid' => $project_managerid,
		'start_date' => $start_date,
		'release_date' => $release_date,
                'status' => $status
                
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}


}


function getName($id){
    
    $conn=$this->connect();
    $sql="SELECT * FROM users WHERE id='$id' ";
    $result=mysqli_query($conn,$sql);
    $data=mysqli_fetch_assoc($result);
    $name=$data['name'];
    return $name;
    
    
    
    
}
}
?>