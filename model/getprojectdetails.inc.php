<?php

include 'conn.php';
class ProjectDetails extends Connection{
    
    public function getProjectDetails($projectid){
        
        $conn=$this->connect();
        $sql ="SELECT * FROM project_details WHERE id=$projectid ";
        $result=mysqli_query($conn,$sql);
        $items=array();
        while ($row = mysqli_fetch_object($result)) {
            array_push($items, $row);
            
            
        }
        
        
        echo json_encode($items);
        
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
}








?>