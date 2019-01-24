<?php

include "conn.php";

class ProjectMembers extends Connection{
   

        public function getProjectMembers($projectid){
            $conn=$this->connect();
            
            
            $sql="SELECT * FROM project_version where project_id='$projectid' ";
         
            $result=mysqli_query($conn,$sql);
            $item=array();
            while($row= mysqli_fetch_assoc($result)){
                array_push($item, $row);
                
            }
          
            
            
            
        echo json_encode($item);
            
            
            
            
            
            
            
        }
    
}



?>