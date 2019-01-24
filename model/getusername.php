<?php
//THIS CLASS GETS BASIC USER INFORMATION THROUGH THEIR USER ID WHEN REQUIRED


  
  class getUserInformation {
      
      
      
      public function getUserName($id){
          $conn=$this->connect();
          $sql="SELECT * FROM project_details WHERE id='$id' " ;
          $result=mysqli_query($conn,$sql);
          $array=mysqli_fetch_assoc($result);
          $name=$array['name'];
          return $name;
          
      }
      
      
      
      
      
      
      
      
      
      
      
      
  }




?>