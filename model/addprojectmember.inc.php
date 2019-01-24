<?php

include 'conn.php';

class NewProjectMember extends Connection{
    
    public function addProjectMember($projectid,$projectmember){
        $conn=$this->connect();
        $sql="INSERT INTO project_members(project_id,project_member) VALUES('$projectid','$projectmember')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "SUCCESSFULLY INSERTED MEMBER";
        }
        
        
        
    }
    
    
    
    
    
    
    
}