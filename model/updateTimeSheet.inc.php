<?php

include 'conn.php';
class TimeSheetUpdate extends Connection{
    public function updateTimeSheet($projectname,$projectarea,$time,$userid,$date,$row){

    
    $conn=$this->connect();
    
    $sqlcheck="SELECT * FROM timesheet WHERE  ";
    $sqlcheck.=" userid='$userid' AND date='$date' AND row='$row' " ;
    
    $resultcheck=mysqli_query($conn,$sqlcheck);
    $rowcount=mysqli_num_rows($resultcheck);
    $data=mysqli_fetch_assoc($resultcheck);
    
    if($rowcount==0){
        $sql="INSERT INTO timesheet(projectname,projectarea,time,userid,date,row) VALUES ";
    $sql.=" ('$projectname','$projectarea','$time','$userid','$date','$row')";
    
    
    $result=mysqli_query($conn,$sql);
    
    echo json_encode(array(
		'projectname' => $projectname,
		'projectarea' => $projectarea,
		'time' => $time,
		'date' => $date,
                'row'=>$row
		
	));
    
    
    
    }
    
    else if($data["status"]!="Approved"){
        
    $sql="UPDATE timesheet SET projectname='$projectname',time='$time', projectarea='$projectarea' , status='Submitted' ";
    $sql.=" WHERE userid='$userid' AND date='$date' AND row='$row' ";
     
      $result=mysqli_query($conn,$sql);
      
      
      
      echo json_encode(array(
		'projectname' => $projectname,
		'projectarea' => $projectarea,
		'time' => $time,
		'date' => $date,
                'row'=>$row
		
	));
     
       }
     
       
     
    
    else {
        
        echo json_encode(array(
		'projectname' => $data['projectname'],
		'projectarea' => $data['projectarea'],
		'time' => $data['time'],
		'date' => $data['date'],
                'row'=>$row
		
	));
        
    }
   
   
    
    
      
    
 


}
}



?>