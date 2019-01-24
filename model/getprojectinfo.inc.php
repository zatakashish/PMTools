<?php

include 'conn.php';




class ProjectInfo extends Connection{
    
    
    public function getProjectInfo($projectid){
        $conn=$this->connect();
        $sql="SELECT * FROM project_info WHERE project_id='$projectid' ";
        $reult=mysqli_query($conn,$sql);
        $item=array();
        while($row=mysqli_fetch_object($reult)){
            array_push($item, $row);
            
        }
        echo json_encode($item);
    }
    
           
    
    
    
}