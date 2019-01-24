<?php



include 'conn.php';

class TimeRecords extends Connection{
    
    
    
    public function getTimeRecord($userid){
        $conn=$this->connect();
        $sql="SELECT * FROM timesheet WHERE status = 'Submitted' AND userid='$userid' ORDER by date ASC " ;
        $result=mysqli_query($conn,$sql);
        $item=array();
        while($row =mysqli_fetch_assoc($result)){
            array_push($item,$row);
            
        }
            
        if($item){
        echo json_encode($item);}
        
        else{
            echo json_encode(array("nodata" => 'nodata'));
        }
        
        
        
        
    }
    
    
    
}