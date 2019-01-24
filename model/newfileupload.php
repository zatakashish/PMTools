<?php


class NewFile {
    
    public function uploadNewFile($conn,$projectid,$filename){
        $sql="SELECT * FROM project_files WHERE project_id ='$projectid' AND filename='$filename' ";
      //  $result=mysqli_query($conn,$sql);
        $numrows= mysqli_num_rows(mysqli_query($conn,$sql));
        
        if(intval($numrows)==0){
            $sql="INSERT INTO project_files(project_id,filename) VALUES ('$projectid','$filename')";
             $result =mysqli_query($conn,$sql);
        }
        else{
            echo "<script>$('#uploaderror').css('color','red')</script>";
            echo "<script>$('#uploaderror').html('<strong>FILE EXISTS ALREADY PLEASE CHECK</strong>')</script>";
            
        }
        
       
       
        
        
    }
    
    
    
}


?>