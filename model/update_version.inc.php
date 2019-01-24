<?php


include 'conn.php';

class UpdateVersion extends Connection{
    
    
    
    public function updateProjectVersion($id,$version,$startdate,$enddate){
        $conn=$this->connect();
        
        $sql = "update project_version set version='$version',startdate='$startdate',enddate='$enddate'  where id=$id";
$result = mysqli_query($conn,$sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'version' => $version,
		'startdate' => $startdate,
		'enddate' => $enddate
		
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
    }
}
