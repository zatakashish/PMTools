<?php
include 'conn.php';


class FileDelete extends Connection{
    
    
    
    public function delFile($id) {
        $conn=$this->connect();
        $sql="DELETE FROM project_files WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo json_encode(array("success"=>$id));
        }
        
    }
}


