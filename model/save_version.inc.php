<?php



include 'conn.php';

class SaveNewVersion extends Connection{
    
    
    public function saveVersion($version,$startdate,$enddate,$projectid){
        $conn=$this->connect();
        $sql = "insert into project_version(version,startdate,enddate,project_id) values('$version','$startdate','$enddate','$projectid')";
       $result = mysqli_query($conn,$sql);
       
   
       
   if ($result){
	echo json_encode(array(
		
		'version' => $version,
		'startdate' => $startdate,
		'enddate' => $enddate,
                'id'=>$projectid
		
	));
}      else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
        
        
        
    }
    
}

