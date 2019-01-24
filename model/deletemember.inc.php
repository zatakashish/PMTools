<?php

include 'conn.php';

class DelMember extends Connection{
    
    public function deleteMember($memberid,$projectid){
        
        $conn=$this->connect();
        $sql="DELETE FROM project_members WHERE project_member='$memberid' AND project_id='$projectid'";
        $result=mysqli_query($conn,$sql);
        if($result){
           
        }
            
    }
}











?>