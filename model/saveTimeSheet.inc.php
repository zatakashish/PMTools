<?php

include 'conn.php';
class TimeSheet extends Connection{
    public function getTimeSheet($projectname,$projectarea,$time,$userid,$date,$row){

    
    $conn=$this->connect();
    $sql="INSERT INTO timesheet(projectname,projectarea,time,userid,date,row) VALUES ";
    $sql.=" ('$projectname','$projectarea','$time','$userid','$date','$row')"; 
    $result=mysqli_query($conn,$sql);
    if ($result){
	echo json_encode(array(
		'projectname' => $projectname,
		'projectarea' => $projectarea,
		'time' => $time,
		'date' => $date,
                'row'=>$row
		
	));
    
    
    
    
}
}
}



?>