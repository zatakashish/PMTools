<?php

 include 'conn.php';
 
 
 class ProjectFiles extends Connection{
     
     
     
     public function getProjectFiles($projectid){
         
         $conn=$this->connect();
         $sql="SELECT * FROM project_files WHERE project_id='$projectid'";
        
         $data=mysqli_query($conn,$sql);
         $item=array();
         
         while($row= mysqli_fetch_object($data)){
             array_push($item, $row);
         }
         
         echo json_encode($item);
     }
 }