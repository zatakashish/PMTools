<?php



include 'conn.php';


class ProjectInfo extends Connection{
    
    
    public function updateProjectInfo($projectid,$projectinfo){
        $conn =$this->connect();
        
        $checkquery="SELECT* FROM project_info WHERE project_id='$projectid'";
        $resultcheck=mysqli_query($conn,$checkquery);
        $result=mysqli_num_rows($resultcheck);
        
        if(intval($result)=="0"){
            $sql="INSERT INTO project_info(project_id,project_info) VALUES ('$projectid','$projectinfo')";
        }
        
        
        else{
        $sql="UPDATE project_info set project_info='$projectinfo' WHERE project_id='$projectid'";
        }
        $result=mysqli_query($conn,$sql);
         echo "SUCESFULL UPDATE PROJECT INFO";
         
        
        
        
        
    }
}