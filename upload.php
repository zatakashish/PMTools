<?php


//FILE UPLOAD PHP

if(isset($_POST['submit'])){
    $type=$_FILES['file']['type'];
    $name=$_FILES['file']['name'];
    $temp_name=$_FILES['file']['tmp_name'];
    $size=$_FILES['file']['size'];
    
    
    if(!empty($name)){
       
           
           
           if($size<1000000){
               $location="uploads/";
               move_uploaded_file($temp_name, $location.$name);
               echo "UPLOADED SUCCESFULLY";
           }
           
           else{
               echo 'File too big select a smaller file upto 1MB';
           }
       
       
        
    }
    
    else{
        echo "PLEASE CHOOSE A FILE TO UPLOAD";
    }
}





?>