<?php

include "conn.php";

class ProjectMembers extends Connection{
   

        public function getProjectMembers($projectid){
            $conn=$this->connect();
            
            
            $sql="SELECT * FROM project_members where project_id=$projectid ";
         
            $result=mysqli_query($conn,$sql);
            $item=array();
            while($row= mysqli_fetch_assoc($result)){
                array_push($item, $row['project_member']);
                
            }
          
            
            $projectmembers=array();
            foreach ($item as  $value) {
                $query="SELECT * FROM users where id= $value" ;
                $result= mysqli_query($conn, $query);
                while($row=mysqli_fetch_object($result)){
                    array_push($projectmembers,$row);
                }
                
            } 
            
        echo json_encode($projectmembers);
            
            
            
            
            
            
            
        }
    
}



?>